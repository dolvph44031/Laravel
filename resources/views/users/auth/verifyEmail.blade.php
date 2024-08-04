<!DOCTYPE html>
<html>
<head>
    <title>Xác Nhận Email</title>
</head>
<body>
    <h1>Chào {{ $userName }}</h1>
    <p>Vui lòng nhấp vào liên kết dưới đây để xác nhận email của bạn:</p>
    <a href="{{ route('verify', $token) }}">Xác Nhận Email</a>
</body>
</html>
