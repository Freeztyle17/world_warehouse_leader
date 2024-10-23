<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<h1>Авторизация</h1>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="login">Логин:</label>
    <input type="text" id="login" name="login" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Войти</button>
</form>
<p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
</body>
</html>
