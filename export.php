<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "csv";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="users.csv"');

$output = fopen("php://output", "w");

fputcsv($output, array('ID', 'Name', 'Email', 'Created At'));

$query = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

$conn->close();
fclose($output);
exit;
?>