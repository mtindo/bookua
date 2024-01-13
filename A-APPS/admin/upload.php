<?php
$uploadDir = 'uploads/';
$uploadedFile = $uploadDir . basename($_FILES['apkFile']['name']);

if (move_uploaded_file($_FILES['apkFile']['tmp_name'], $uploadedFile)) {
    $appName = $_POST['appName'];
    $appVersion = $_POST['appVersion'];

    $connection = new mysqli("localhost", "root", "", "a_apk_db");

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO apk_table (appName, appVersion, filePath) VALUES ('$appName', '$appVersion', '$uploadedFile')";

    if ($connection->query($sql) === TRUE) {
        echo "APK uploaded and published successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
} else {
    echo "Error uploading file.";
}
?>
