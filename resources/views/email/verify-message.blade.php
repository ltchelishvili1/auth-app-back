<!-- resources/views/emails/verify-message.blade.php -->
@props(['url', 'name', 'appName'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .header img {
            width: 60px;
            height: 60px;
        }
        .header h1 {
            margin: 10px 0;
            font-size: 28px;
            color: #333;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 15px 25px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            color: #999;
            border-top: 1px solid #eee;
        }
        .url {
            word-break: break-all;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .content h2 {
                font-size: 20px;
            }
            .content p {
                font-size: 14px;
            }
            .button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $appName }}</h1>
        </div>
        <div class="content">
            <h2>Hello, {{ ucwords($name) }}!</h2>
            <p>Thank you for joining {{ $appName }}! We are thrilled to have you on board. Please verify your email address by clicking the button below:</p>
            <a href="{{ $url }}" class="button">Verify Email</a>
            <p>If the button above doesn't work, copy and paste the following link into your browser:</p>
            <a class='url' href="{{ $url }}">{{ $url }}</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $appName }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
