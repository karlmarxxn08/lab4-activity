<?php
class Book {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=books", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Add a new book
    public function addBook($title, $author, $genre, $year) {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO library (title, author, genre, publication_year) 
                 VALUES (:title, :author, :genre, :year)"
            );
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':year', $year);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error adding book: " . $e->getMessage();
            return false;
        }
    }

    // View all books
    public function viewBook() {
        try {
            $stmt = $this->conn->query("SELECT * FROM library");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching books: " . $e->getMessage();
            return [];
        }
    }
}
?>
