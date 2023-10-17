<?php

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Illuminate\Support\Facades\Validator;

if (!function_exists('subscribe')) {
    function subscribe($email)
    {
        $request = new \Illuminate\Http\Request();

        $request->replace(['email' => trim(strtolower($email))]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:subscribers,email|email:rfc,dns'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        return Subscriber::create([
            'email' => trim(strtolower($email))
        ]);
    }
}

if (!function_exists('unsubscribe')) {
    function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', trim(strtolower($email)))->first();

        if ($subscriber->count() > 0) {
            $subscriber->update([
                'status' => false
            ]);

            return $subscriber;
        }

        return false;
    }
}
