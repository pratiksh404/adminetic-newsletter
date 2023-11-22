<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Payment Received">
    <meta name="author" content="{{ title() }}">
    <link rel="icon" href="{{ favicon() }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ favicon() }}" type="image/x-icon">
    <title>{{ title() }}</title>

</head>

<body style="margin: 30px auto;">
    <table style="width: 100%">
        <tbody>
            <tr>
                <td>
                    <table style="background-color: #f6f7fb; width: 100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                                        <tbody>
                                            <tr>
                                                <td><img src="{{ url(logo()) }}" alt="{{ title() }}"
                                                        width="100"></td>
                                                <td style="text-align: right; color:#999">
                                                    <span>Newsletter Subscription Notice</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table
                                        style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 30px">
                                                    <p>Dear {{ $subscriber->name ?? 'Visitor' }},</p>
                                                    <p>
                                                        {!! subscription_body() !!}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; margin-top: 30px">
                        <tbody>
                            <tr style="text-align: center">
                                <td>
                                @if(!$subscriber->verified)
                                                <a href="{{route('verify',$subscriber->uuid)}}" class="btn btn-success btn-air-success">Verify</a>    
                                @endif
                                    {{--       <p style="color: #999; margin-bottom: 0">{{ address() }}</p>
                                    <p style="color: #999; margin-bottom: 0">{{ phone() }}</p> --}}
                                    <p>
                                        <a href="{{route('unsubscribe', $subscriber->uuid)}}"
                                            style="cursor:pointer;margin:5px">Unsubscribe</a>
                                    </p>
                                    <p style="color: #999; margin-bottom: 0">Powered By Doctype
                                        Innovations</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
</body>

</html>
