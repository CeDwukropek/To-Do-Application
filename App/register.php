<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styl1.css">
    <title>Formularz Rejestracji</title>
</head>
<body>
<h2>Rejestracja</h2>
<form action="index.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Hasło:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="register" value="Zarejestruj"><br>
    <h1> Masz już konto? Zaloguj się! </h1>
    <input type="submit" value = "Zaloguj"/> 
</form>
</body>
</html>