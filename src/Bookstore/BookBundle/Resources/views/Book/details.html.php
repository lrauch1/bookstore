<?php include 'header.php'; ?>
        <div>
            <table border="1">
                <?php
                    echo<<<EOD
<tr class="odd">
    <td>Title</td>
    <td>{$book->getTitle()}</td>
</tr>
<tr class="even">
    <td>Author</td>
    <td>{$book->getAuthor()}</td>
</tr>
<tr class="odd">
    <td>ISBN</td>
    <td>{$book->getIsbn()}</td>
</tr>
<tr class="even">
    <td>Course</td>
    <td>ITAS{$book->getCourse()}</td>
</tr>
<tr class="odd">
    <td>Instructor</td>
    <td>{$book->getInstructor()}</td>
</tr>
<tr class="even">
    <td>Price</td>
    <td>{$book->getPrice()}</td>
</tr>
<tr class="odd">
    <td>Rating</td>
    <td>{$book->getRating()}</td>
</tr>
<tr class="even">
    <td>Description</td>
    <td>{$book->getDesclong()}</td>
</tr>
<tr class="odd">
    <td>Quantity</td>
    <td>{$book->getQty()}</td>
</tr>
EOD;
                ?>
            </table>
            <a href="<?php
              //  echo $view['router']->generate('add_cart',array('bid'=>$book->getId()));
            ?>">Add to cart</a><br>
            <a href="<?php
                echo $view['router']->generate('display_books');
            ?>">Back</a>
        </div>
    </body>
</html>