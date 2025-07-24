<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 0;
            color: #333;
        }
        .email-container {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>Hello, {{ $data['name'] }}</h2>
        <p>Thank you for registering. To continue using your account, please verify your email address.</p>
        
        <a href="{{route('admin.dashboard')}}" class="btn">
            Verify Email Address
        </a>

        <p class="footer">
            If you did not create an account, no further action is required.<br>
            
        </p>
    </div>
</body>
</html>
