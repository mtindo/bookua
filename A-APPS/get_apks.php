<?php
$connection = new mysqli("localhost", "root", "", "a_apk_db");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM apk_table";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $apkList = array();

    while ($row = $result->fetch_assoc()) {
        $apkList[] = array(
            'appName' => $row['appName'],
            'appVersion' => $row['appVersion'],
            'filePath' => $row['filePath']
        );
    }

    echo json_encode($apkList);
} else {
    echo "No APKs published yet.";
}

// $connection->close();
?>
