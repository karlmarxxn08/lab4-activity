<?php
require_once "../classes/book.php";
$bookObj = new Book();
$books = $bookObj->viewBook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Publication Year</th>
        </tr>
        <?php if (!empty($books)) { ?>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td><?= $book["id"] ?></td>
                    <td><?= $book["title"] ?></td>
                    <td><?= $book["author"] ?></td>
                    <td><?= $book["genre"] ?></td>
                    <td><?= $book["publication_year"] ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">No books found.</td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <button>
        <a href="add-book.php">➕ Add New Book</a>
    </button>
</body>
</html>
