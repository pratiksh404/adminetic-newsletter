<?php

namespace Adminetic\Newsletter\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Subscriber extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

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
        'data' => 'array'
    ];

    protected $appends = ['name'];

    // Accessors
    public function getNameAttribute()
    {
        list($username, $domain) = explode('@', $this->email);
        return $this->data['name'] ?? $username;
    }

    // Helper function
    public function unsubscribe()
    {
        $this->update([
            'status' => 0
        ]);

        return $this;
    }
    public function subscribe()
    {
        $this->update([
            'status' => 1
        ]);

        return $this;
    }
}
