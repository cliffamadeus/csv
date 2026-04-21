<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "csv";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</head>
<body>

<h2>Users List</h2>

<!-- Export Button -->
<a href="export.php">
    <button>Export to CSV</button>
</a>

<br><br>

<table id="usersTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable();
});
</script>

</body>
</html>