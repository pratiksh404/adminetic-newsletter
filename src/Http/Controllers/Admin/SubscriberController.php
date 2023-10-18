<?php

namespace Adminetic\Newsletter\Http\Controllers\Admin;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', $email)->first();

        if (!is_null($subscriber)) {
            return view('newsletter::admin.subscriber.unsubscribe', compact('subscriber'));
        } else {
            return abort(404);
        }
    }
}
