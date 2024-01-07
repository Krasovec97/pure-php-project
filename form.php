<?php
header("Content-Type: application/json");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payload = json_decode(file_get_contents("php://input"), true);;
    $data = $payload;

    // Validate forms
    $name = $payload['name'];
    if (empty($name)) {
        $response = [
            'success' => false,
            'error' =>  "Name is required"
        ];

        echo json_encode($response);
        exit();
    }

    $dob = $payload['date_of_birth'];
    if (empty($dob)) {
        $response = [
            'success' => false,
            'error' =>  "Date of birth is required"
        ];

        echo json_encode($response);
        exit();
    }

    $email = $payload['email'];
    if (empty($email)) {
        $response = [
            'success' => false,
            'error' =>  "Email is required"
        ];

        echo json_encode($response);
        exit();
    }

    $gender = $payload['gender'];
    if (empty($gender)) {
        $response = [
            'success' => false,
            'error' =>  "Gender is required"
        ];

        echo json_encode($response);
        exit();
    }

    $cv_link = $payload['cv_link'];
    if (empty($cv_link)) {
        $response = [
            'success' => false,
            'error' =>  "CV link is required"
        ];

        echo json_encode($response);
        exit();
    }

    $servername = "localhost";
    $username = "purephp";
    $password = "secret";
    $dbname = "pure_php_table";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM job_applications WHERE email = '$email'";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $response = [
            'success' => false,
            'error' =>  "Prijava z tem email že obstaja, če ta prijava ni bila iz vaše strani, nas prosimo kontaktirajte na info@krneki.si"
        ];
        echo json_encode($response);
        $conn->close();
        exit();
    }


    $sql = "INSERT INTO job_applications (full_name, date_of_birth, gender, email, cv_link)
            VALUES ('$name', '$dob', '$gender', '$email', '$cv_link')";

    if ($conn->query($sql) === TRUE) {
        $response = [
            'success' => true,
            'response' =>  "Vaša prijava na delovno mesto je bila uspešno zabeležena, v kolikor se odločimo za sodelovanje, vas kontaktiramo."
        ];

    } else {
        $response = [
            'success' => false,
            'error' =>  "Error: " . $sql . "<br>" . $conn->error
        ];
    }

    echo json_encode($response);
    $conn->close();
    exit();

}