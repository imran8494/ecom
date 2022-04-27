<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <p>Dear {{ $details['name'] }},</p>
    <p>You have requested to recover password. New password is given below:-</p>
    
    <p>Password: {{ $details['password'] }}</p>
<br>
    <p>Thanks & Regards</p>
    <p>Ecommerce Website</p>
</body>
</html>