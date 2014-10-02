<!--DISPLAY View -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/site.css')
?>"/>
        <title>Browse Books</title>
    </head>
    <body>
        <div id="header">Browse Books</div>
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
                foreach ($books as $entry) {
                    // Shade every 2nd line
                    $stripe = !$stripe;
                    if ($stripe) {
                        echo '<tr class="odd"> ';
                    } else {
                        echo '<tr class="even"> ';
                    }
                    echo '<td>' . $entry->getTitle() . '</td>';
                    echo '<td>' . $entry->getAuthor() . '</td>';
                    echo '<td>' . $entry->getPrice() . '</td>';
                    echo '<td>' . $entry->getRating() . '</td>';
                    echo '<td>' . $entry->getImg() . '</td>';                    
                    echo '</div>';
                    //echo '<td>';
                    //echo '<div class="tbl_header">';
                    //echo "<a href='/blog/edit/" . $entry->getId() . "'> Edit</a> |";
                    //echo "<a href='/blog/delete/" . $entry->getId() . "'> Delete</a> ";
                    //echo '</div>';
                    //echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <p><a href="/blog/add">Add a NEW blog entry</a></p>
        </div>
    </body>
</html>
