<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styl1.css">
    <title>Formularz Rejestracji</title>
</head>
<body>
<h2>Rejestracja</h2>
<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Hasło:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="register" value="Zarejestruj"><br>
    <h1> Masz już konto? Zaloguj się! </h1>
    <input type="submit" onclick="myFunction()" value = "Zaloguj"/> 

<script>
  function myFunction() {
    window.location.href="login.php";  
  }
</script>
</form>
</body>
</html>
<?php

// połączenie z bazą danych
$host = 'localhost'; // adres hosta
$username = 'root'; // nazwa użytkownika bazy danych
$password = ''; // hasło użytkownika bazy danych
$database = 'to-do-application'; // nazwa bazy danych

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Nieudane połączenie z bazą danych: " . mysqli_connect_error());
}

// obsługa formularza rejestracji
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $preset_id = 1;

    // sprawdzenie, czy użytkownik o podanym adresie email już istnieje
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Użytkownik o takim adresie email już istnieje!";
    } else {
        // dodanie nowego użytkownika do bazy danych
        $query = "INSERT INTO user (email, password, preset_id) VALUES ('$email', '$password', $preset_id)";
        if (mysqli_query($conn, $query)) {
            echo "Rejestracja przebiegła pomyślnie!";
        } else {
            echo "Błąd rejestracji: " . mysqli_error($conn);
        }
    }
}


mysqli_close($conn);

?>