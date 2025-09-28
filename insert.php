<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    if (!empty($title)) {
        $stmt = $conn->prepare("INSERT INTO tasks (title) VALUES (?)");
        $stmt->bind_param("s", $title);
        $stmt->execute();
    }
}
header("Location: index.php");
exit;
?>
