<?php
    $serwer = "localhost";
    $user = "root";
    $password = "";
    $dbname = "database";

    $conn = new mysqli($serwer, $user, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $otherGender = isset($_POST['otherGender']) ? mysqli_real_escape_string($conn, $_POST['otherGender']) : null;
        $newsletter = isset($_POST['newsletter']) ? 1 : 0;
        $regulamin = isset($_POST['regulamin']) ? 1 : 0;


        if ($conn->query("INSERT INTO users (name, surname, birthdate, email, phone, province, gender, other_gender, newsletter, regulamin) VALUES ('$name', '$surname', '$birthdate', '$email', '$phone', '$province', '$gender', '$otherGender', $newsletter, $regulamin)") === TRUE) {
            echo "Dodano użytkownika do bazy danych! :)";
        } else {
            echo "NIe dodano użytkownika do bazy danych :(";
        }
    }

    $conn->close();
?>