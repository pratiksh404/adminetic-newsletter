<?php

namespace Adminetic\Newsletter\Models\Admin;

use Adminetic\Newsletter\Mail\NewsletterSubscriptionMail;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Subscriber extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('subscribers') ? Cache::forget('subscribers') : '';
    }

    // Logs
    protected static $logName = 'subscriber';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $casts = [
        'data' => 'array',
    ];

    protected $appends = ['name'];

    // Accessors
    public function getNameAttribute()
    {
        [$username, $domain] = explode('@', $this->email);

        return $this->data['name'] ?? $username;
    }

    // Scopes
    public function scopeSubscribed($qry)
    {
        return $qry->where('status', 1);
    }

    public function scopeUnsubscribed($qry)
    {
        return $qry->where('status', 0);
    }

    public function scopeVerified($qry)
    {
        return $qry->where('verified', 1);
    }

    public function scopeUnverified($qry)
    {
        return $qry->where('verified', 0);
    }

    // Helper function
    public function unsubscribe()
    {
        $this->update([
            'status' => 0,
        ]);

        return $this;
    }

    public function subscribe()
    {
        $this->update([
            'status' => 1,
        ]);

        return $this;
    }

    public function verify()
    {
        $this->update([
            'verified' => 1,
        ]);

        return $this;
    }

    public function unverify()
    {
        $this->update([
            'verified' => 0,
        ]);

        return $this;
    }

    public function send_subscription_notification_email()
    {
        try {
            $receiver =
                (object) [
                    'email' => $this->email,
                    'name' => $this->name,
                ];
            Mail::to($receiver)->send(new NewsletterSubscriptionMail($this));
        } catch (Exception $e) {
            Log::warning($e->getMessage().' - '.Carbon::now());
        }
    }
}
