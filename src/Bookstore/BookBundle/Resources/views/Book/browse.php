<?php

/**
 * Autoload the required class files
 * 
 * @param type $class_name
 */
function __autoload($class_name) {
    include $class_name . '.php';
}

// Make a MySQL connection to the 'dog' database
$mysqli = mysqli_connect("localhost", "root", "", "book");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Books</title>
    </head>
    <h1>Browse</h1>
    <body>
        <?php
        $gw = new BookTDG($mysqli);
        $books = $gw->findAll();
        foreach ($books as $book) {
            echo "Title: " . $book->getTitle() . "<br>";
            echo "Author: " . $book->getAuthor() . "<br>";
            echo "Price: " . $book->getPrice() . "<br>";
            echo "Rating: " . $book->getRating() . "<br>";
            echo "Image: " . '<img border="0" src="' . $book->getImg() . '" width="60" height="60">' . "<br><br>";
          //  echo ' <a href="detail.php?id=' . $boat->getId() . '">Full Details</a><br>';
          //  echo ' <a href="edit.php?id=' . $boat->getId() . '">Edit </a><br>';
            //echo ' <a href="edit.php?id=' . $boat->getOwnerId() . '">Edit Owner </a><br>';
           // echo ' <a href="delete.php?id=' . $boat->getId() . '">Delete </a><br><br>';
        }
        ?>
        <b>Menu:<br><br>
            <a href="add.php"> Add Owner and Boat </a><br>   
            <a href="logout.php"> Log out </a><br>  
            <a href="login.php"> Log in </a><br>  

            </body>
            </html>
