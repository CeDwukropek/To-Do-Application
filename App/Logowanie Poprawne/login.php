<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styl1.css">

    <title>Formularz Logowania</title>
</head>
<body>
    <h2>Logowanie</h2>
    <form action="login.php" method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" name="login" value="Zaloguj">
        <h1>Nie masz konta? Zarejestruj Się!</h1>
        <form method="POST">
        <input type="submit" name="zarejestruj" value="zarejestruj się">
        </form>
        <?php
// Jeśli przycisk został kliknięty
if(isset($_POST['zarejestruj'])){
    // Przekieruj na inną stronę
    header('Location: register.php');
    exit;
}
?>
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
    } 
}

// obsługa formularza logowania
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // sprawdzenie, czy użytkownik o podanym adresie email i haśle istnieje w bazie danych
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // logowanie przebiegło pomyślnie - przekierowanie do strony głównej
        header("Location: index.php");
        exit();
    } else {
        echo "Nieprawidłowy email lub hasło!";
    }
    if($email == NULL){
        return 0;
     }
     if($password == NULL){
        
        return 0;
     }else{
        if($email == 1){
            header("Location: index.php");
        }
     }
}

mysqli_close($conn);

?>
