<?php

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Illuminate\Support\Facades\Validator;

if (! function_exists('subscribe')) {
    function subscribe($email)
    {
        $request = new \Illuminate\Http\Request();

        $request->replace(['email' => trim(strtolower($email))]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:subscribers,email|email:rfc,dns',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subscriber = Subscriber::create([
            'email' => trim(strtolower($email)),
        ]);
        if (setting('subscription_mail', config('newsletter.subscription_mail' ?? false))) {
            $subscriber->send_subscription_notification_email();
        }

        return $subscriber;
    }
}

if (! function_exists('unsubscribe')) {
    function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', trim(strtolower($email)))->first();

        if ($subscriber->count() > 0) {
            $subscriber->update([
                'status' => false,
            ]);

            return $subscriber;
        }

        return false;
    }
}

if (! function_exists('subscription_body')) {
    function subscription_body()
    {
        return setting('subscription_body', config('newsletter.subscription_body', 'We are thrilled to welcome you to our community! Thank you for confirming your subscription. Get ready to stay updated on the latest trends, exclusive offers, and valuable content tailored just for you.'));
    }
}
