<?php

namespace Adminetic\Newsletter\Http\Controllers\Admin;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function unsubscribe($uuid)
    {
        $subscriber = Subscriber::where('uuid',$uuid)->first();
        if (! is_null($subscriber)) {
            return view('newsletter::admin.subscriber.unsubscribe', compact('subscriber'));
        } else {
            return abort(404);
        }
    }

    public function verify($uuid)
    {
        $subscriber = Subscriber::where('uuid',$uuid)->first();
        if (! is_null($subscriber)) {
            $subscriber->verify();

            return view('newsletter::admin.subscriber.verified', compact('subscriber'));
        } else {
            return abort(404);
        }
    }
}
