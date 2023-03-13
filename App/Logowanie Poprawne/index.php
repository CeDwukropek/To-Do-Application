<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styl1.css">

    <title>Formularz Logowania</title>
</head>
<body>
    <h2>Logowanie</h2>
    <form action="index.php" method="post">
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

session_start();
$_SESSION['log'] = false;

require_once('php/conncection.php');
$conn = mysqli_connect($host, $user , $password, $database);

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
        header("Location: register.php");
        echo "Użytkownik o takim adresie email już istnieje!";
    }else {
        // dodanie nowego użytkownika do bazy danych
        $query = "INSERT INTO user (email, password, preset_id) VALUES ('$email', '$password', $preset_id)";
        if (mysqli_query($conn, $query)) {
            echo "Rejestracja przebiegła pomyślnie!";
        } else {
            echo "Błąd rejestracji: " . mysqli_error($conn);
        }
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
        $_SESSION['log'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: strona.php");
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
            header("Location: strona.php");
        }
     }
}

mysqli_close($conn);

?>
