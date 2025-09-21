<?php
require_once "../classes/book.php";
$bookObj = new Book();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title  = $_POST["title"];
    $author = $_POST["author"];
    $genre  = $_POST["genre"];
    $year   = $_POST["year"];

    if ($bookObj->addBook($title, $author, $genre, $year)) {
        echo "✅ Book added successfully.";
    } else {
        echo "❌ Error adding book.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Genre:</label><br>
        <select name="genre" required>
            <option value="">--SELECT--</option>
            <option value="History">History</option>
            <option value="Science">Science</option>
            <option value="Fiction">Fiction</option>
            <option value="Self Improvement">Self Improvement</option>
        </select><br><br>

        <label>Publication Year:</label><br>
        <input type="number" name="year" required><br><br>

        <button type="submit">Add Book</button>
    </form>

    <br>
    <a href="view-book.php">📚 View Book List</a>
</body>
</html>
