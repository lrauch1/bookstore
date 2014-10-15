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
<td>Ratings</td>
    <td>
        <table border=1>
            <tr>
                <th>
                    User
                </th>
                <th>
                    Rating
                </th>
                <th>
                    Comment
                </th>
            </tr>
EOD;
                    foreach ($ratings as $rating) {
                        echo "<tr><td>{$rating['user']}</td><td>{$rating['rating']}</td><td>{$rating['comment']}</td></tr>";
                    }
echo<<<EOD
        </table>
    </td>
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
            <?php
            if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
                $disabler="";
                foreach($ratings as $rating){
                    if($rating['user']==$uname)$disabler="disabled";
                }
                echo<<<EOD
            <form action="{$view['router']->generate('rate_form',array('id'=>$book->getBid()))}" method="POST">
                <table border="0" class="no100Width">
                    <tr>
                        <th>
                            Rating:
                        </th>
                        <td>
                            <input type="number" name="rating" min="1" max="5" value="5">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Comment:
                        </th>
                        <td>
                            <input type="text" name="comment">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Rate!" {$disabler}></td>
                    </tr>
                </table>
            </form>
EOD;
}
?>
            <a href="<?php
                echo $view['router']->generate('cart_add',array('bid'=>$book->getBid()));
            ?>">Add to cart</a><br>
            <a href="<?php
                echo $view['router']->generate('display_books');
            ?>">Back</a>
        </div>
    </body>
</html>