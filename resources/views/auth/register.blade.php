<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required>
    <br>
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="patronymic">Отчество:</label>
    <input type="text" id="patronymic" name="patronymic">
    <br>
    <label for="birth_date">Дата рождения:</label>
    <input type="date" id="birth_date" name="birth_date" required>
    <br>
    <label for="passport_series">Серия паспорта:</label>
    <input type="text" id="passport_series" name="passport_series" required>
    <br>
    <label for="passport_number">Номер паспорта:</label>
    <input type="text" id="passport_number" name="passport_number" required>
    <br>
    <label for="inn">ИНН:</label>
    <input type="text" id="inn" name="inn" required>
    <br>
    <label for="snils">СНИЛС:</label>
    <input type="text" id="snils" name="snils">
    <br>
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="type">Тип:</label>
    <select id="type" name="type" required>
        <option value="физическое лицо">Физическое лицо</option>
        <option value="юридическое лицо">Юридическое лицо</option>
    </select>
    <br>
    <label for="login">Логин:</label>
    <input type="text" id="login" name="login" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="legal_login">Логин юр. лица:</label>
    <input type="text" id="legal_login" name="legal_login">
    <br>
    <label for="legal_password">Пароль юр. лица:</label>
    <input type="password" id="legal_password" name="legal_password">
    <br>
    <button type="submit">Зарегистрироваться</button>
</form>
<p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
</body>
</html>
