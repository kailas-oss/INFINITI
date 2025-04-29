<?php
// $conn = new PDO("mysql:host=localhost;dbname=online_book_store", "root", "123456789");
// $stmt = $conn->prepare("INSERT INTO books (book_name, author_name, genre, price, available_copies, r_admin_id) VALUES (:book_name, :author_name, :genre, :price, :available_copies, :r_admin_id)");
// $stmt->bindValue(':book_name', 'qwert');
// $stmt->bindValue(':author_name', 'asdfg');
// $stmt->bindValue(':genre', 'fun');
// $stmt->bindValue(':price', 123);
// $stmt->bindValue(':available_copies', 246);
// $stmt->bindValue(':r_admin_id', 3);
// $stmt->execute();
$conn = new PDO("mysql:host=localhost;dbname=online_book_store", "root", "123456789");
$stmt = $conn->prepare("INSERT INTO books (book_name, author_name, genre, price, available_copies, r_admin_id) VALUES (?, ?, ?, ?, ?, ?)");
$book_name = "qwert";
$author_name = "asdfg";
$genre = "fun";
$price = 123;
$available_copies = 246;
$r_admin_id = 3;
$stmt->bindParam(1, $book_name);
$stmt->bindParam(2, $author_name);
$stmt->bindParam(3, $genre);
$stmt->bindParam(4, $price);
$stmt->bindParam(5, $available_copies);
$stmt->bindParam(6, $r_admin_id);
$stmt->execute();
?>
