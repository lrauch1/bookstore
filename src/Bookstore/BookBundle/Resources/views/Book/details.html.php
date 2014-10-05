<!--DISPLAY View -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/site.css')
?>"/>
        <title>Book Detail</title>
    </head>
    <body>
        <div id="header">Book Detail</div>
        <div>
            <table border="0">
                <tr class="tbl_header">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Image</th>
                </tr>
                <?php
                $stripe = false;
                //foreach ($books as $entry) {
                    // Shade every 2nd line
                    $stripe = !$stripe;
                    if ($stripe) {
                        echo '<tr class="odd"> ';
                    } else {
                        echo '<tr class="even"> ';
                    }
                    echo '<td>' . $book->getTitle() . '</td>';
                    echo '<td>' . $book->getAuthor() . '</td>';
                    echo '<td>' . $book->getPrice() . '</td>';
                    echo '<td>' . $book->getRating() . '</td>';
                    echo '<td>' . $book->getImg() . '</td>';                    
                    echo '</div>';
                    echo '<td>';
                    echo '<div class="tbl_header">';
                   // echo "<a href='" . $view['router']->generate("details_books",array("id"=>$entry->getId())) . "'> View</a> ";
                    //echo "<a href='/blog/delete/" . $entry->getId() . "'> Delete</a> ";
                    echo '</div>';
                    //echo '</td>';
                    echo '</tr>';
                
                ?>
            </table>
            <p><a href="/">Back to Browse</a></p>
        </div>
    </body>
</html>
