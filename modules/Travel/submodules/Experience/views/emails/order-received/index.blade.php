<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $application->site->title }}</title>
    <style type="text/css">
        body { margin: 0; padding: 0; min-width: 100%!important; }
        img { height: auto; }
        .content {width: 100%; max-width: 600px;}
        .innerpadding {padding: 30px 30px 30px 30px; box-shadow: 0 1px 3px rgba(0,0,0,.2),0 1px 1px rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)!important;}
        .borderbottom {border-bottom: 1px solid #f2eeed;}
        .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
        .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
        .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
        .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
        .bodycopy {font-size: 16px; line-height: 22px;}
        .button {text-align: center; font-size: 14px; font-family: sans-serif; text-transform: uppercase; font-weight: bold; padding: 0 30px 0 30px; box-shadow: 0 1px 3px rgba(0,0,0,.2),0 1px 1px rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)!important;}
        .button a {color: #ffffff; text-decoration: none;}
        .footer {padding: 40px 0 80px 0;}
        .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
        .footercopy a {color: #ffffff; text-decoration: underline;}

        @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
            body[yahoo] .hide {display: none!important;}
            body[yahoo] .buttonwrapper {background-color: transparent!important;}
            body[yahoo] .button {padding: 0px!important;}
            body[yahoo] .button a {background-color: #fdbe3c; padding: 15px 15px 13px!important;}
            body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
        }

        /*@media only screen and (min-device-width: 601px) {
        .content {width: 600px !important;}
        .col425 {width: 425px!important;}
        .col380 {width: 380px!important;}
        }*/
  </style>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body yahoo bgcolor="#ecf0f5">
    <table width="100%" bgcolor="#ecf0f5" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <!--[if (gte mso 9)|(IE)]>
                <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                <![endif]-->
                <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td class="header">
                            <table align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding: 40px 0 30px 0; font-family: Open Sans, sans-serif;">
                                        <img src="{{ $message->embed(assets('experience/images/brand.png')) }}" alt="{{ settings('site_title') }}" width="80" style="display: block;" />
                                        <h1 style="font-weight: 400; color: #424242; font-size: 23px;">Your booking <br> has been confirmed</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="innerpadding borderbottom" bgcolor="#ffffff" style="border-radius: 3px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" bgcolor="#66b9e5" style="padding: 40px 0 30px 0; border-radius: 3px;">
                                        <img src="{{ $message->embed(assets('experience/images/display.png')) }}" alt="{{ settings('site_title') }}" width="120" style="display: block;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 40px 0 30px 0; border-radius: 3px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr style="font-size: 20px">
                                                <td><strong>{{ ucfirst($order->product->type) }}</strong></td>
                                                <td>{{ $order->product->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Reference Number</strong></td>
                                                <td>{{ $order->product->refnum }}</td>
                                            </tr>

                                            {{--  --}}
                                            <tr><td style="padding: 5px 0 5px 0"></td></tr>
                                            {{--  --}}

                                            <tr>
                                                <td><strong>Total Price</strong></td>
                                                <td>{{ settings('site_currency.code', 'PHP') }} {{ $order->total }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="color: #555555">for {{ $order->quantity }} people</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="color: #555555">{{ settings('site_currency.code', 'PHP') }} {{ $order->price }} each</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="color: #555555">
                                                    <em>
                                                        You're going with
                                                        @if (unserialize($order->metadata))
                                                            @foreach (unserialize($order->metadata) as $metadata)
                                                                <strong>{{ $metadata['name'] }}</strong>,&nbsp;
                                                            @endforeach
                                                        @endif
                                                    </em>
                                                </td>
                                            </tr>

                                            {{--  --}}
                                            <tr><td style="padding: 10px 0 10px 0"></td></tr>
                                            {{--  --}}

                                            <tr>
                                                <td><strong>Purchase Date</strong></td>
                                                <td>{{ date('F d, Y', strtotime($order->purchased_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td>{{ ucfirst($order->status) }}</td>
                                            </tr>

                                            {{--  --}}
                                            <tr><td style="padding: 10px 0 10px 0"></td></tr>
                                            {{--  --}}

                                            <tr>
                                                <td><strong>PayPal Payment ID</strong></td>
                                                <td>{{ $order->payment_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>PayPal Payer ID</strong></td>
                                                <td>{{ $order->payer_id }}</td>
                                            </tr>

                                            {{--  --}}
                                            <tr><td style="padding: 10px 0 10px 0"></td></tr>
                                            {{--  --}}

                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    {{--  --}}
                    <tr><td style="padding: 5px 0 5px 0"></td></tr>
                    {{--  --}}

                    <tr>
                        <td class="innerpadding borderbottom" bgcolor="#ffffff" style="border-radius: 3px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="color: #555555; font-size: 20px;padding: 10px 0 10px 0">
                                        <a href="{{ route(str_plural($order->product->type).".show", $order->product->code) }}">{{ $order->product->name }}</a>
                                    </td>
                                </tr>
                                @if ($order->scheduled['start_date'])
                                    <tr>
                                        <td>
                                            {{ $order->scheduled['start_date'] . " - " . $order->scheduled['end_date'] }}
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td style="color: #555555">Package Inclusions</td>
                                </tr>
                                <tr>
                                    <td style="color: #555555;">
                                        <ul>
                                            @foreach ($order->product->amenities as $amenities)
                                                <li>{{ $amenities->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{--  --}}
                    <tr><td style="padding: 5px 0 5px 0"></td></tr>
                    {{--  --}}

                    <tr>
                        <td class="innerpadding borderbottom" bgcolor="#ffffff" style="border-radius: 3px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding: 30px 0 30px 0; font-family: Open Sans, sans-serif; margin: 0; color: #636262; font-size: 14px; font-weight: 500;">
                                        For more details, you may contact <strong>{{ settings('site_title') }}</strong> through the following:
                                        <br><br>
                                        @if (settings('site_phone'))
                                            <span>{{ settings('site_phone') }}</span>
                                            <br>
                                            <strong>Phone</strong>
                                            <br><br>
                                        @endif
                                        @if (settings('site_email'))
                                            <span>{{ settings('site_email') }}</span>
                                            <br>
                                            <strong>Email</strong>
                                            <br><br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 10px 0 10px 0;">
                                        <a style="text-align: center;
                                            font-size: 14px;
                                            font-family: sans-serif;
                                            text-transform: uppercase;
                                            font-weight: bold;
                                            padding: 0 30px 0 30px;
                                            box-shadow: 0 1px 3px rgba(0,0,0,.2),0 1px 1px rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12) !important;
                                            text-decoration: none;
                                            color: #fff;
                                            height: 45px;
                                            background: #fdbe3c;
                                            padding: 10px 20px;
                                            border-radius: 3px;"
                                            href="{{ route('bookings.history') }}">
                                            View Booking History
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <td class="footer">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                <a href="{{ settings('social_links', '', 'facebook.url') }}">
                                                    <img src="{{ $message->embed(assets('experience/images/facebook.png')) }}" width="37" height="37" alt="Facebook" border="0" />
                                                </a>
                                            </td>
                                            <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                <a href="{{ settings('social_links', '', 'twitter.url') }}">
                                                    <img src="{{ $message->embed(assets('experience/images/twitter.png')) }}" width="37" height="37" alt="Twitter" border="0" />
                                                </a>
                                            </td>
                                            <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                <a href="{{ settings('social_links', '', 'youtube.url') }}">
                                                    <img src="{{ $message->embed(assets('experience/images/youtube.png')) }}" width="37" height="37" alt="YouTube" border="0" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="footercopy" style="font-size: 12px; padding: 20px 0 0 0; color: #636262; font-family: Open Sans, sans-serif;">
                                    {{ $application->site->copyright  }}<br/>
                                    All rights reserved.
                                </td>
                            </tr>
                        </table>
                    </td>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
</body>
</html>
