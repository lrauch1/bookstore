  <?php
            include 'header.php';
        ?>
        <div>
            <table border="1">
                <tr class="tbl_header">
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <!--<th>Course</th>-->
                    <!--<th>Instructor</th>-->
                    <th>Price</th>
                    <th>Rating</th>
                    <!--<th>Description</th>-->
                    <!--<th>Quantity</th>-->
                </tr>
                <?php
                    $stripe=false;
                    foreach($books as $book){
                        $stripe=!$stripe;
                        if ($stripe) {
                            echo "<tr class=\"odd\">";
                        } else {
                            echo "<tr class=\"even\">";
                        }
                        $detailurl=$view['router']->generate('details_books',
                                array(
                                    'id'=>$book->getId()
                                ));
                        echo<<<EOD
<td>
    <a href="{$detailurl}">
        <img src="{$book->getImg()}" width=100>
    </a>            
</td>
<td>
    <a href="{$detailurl}">
        {$book->getTitle()}
    </a>
</td>
<td>{$book->getAuthor()}</td>
<td>{$book->getIsbn()}</td>
<!--<td>ITAS{$book->getCourse()}</td>-->
<!--<td>{$book->getInstructor()}</td>-->
<td>{$book->getPrice()}</td>
<td>{$book->getRating()}</td>
<!--<td>{$book->getDescShort()}</td>-->
<!--<td>{$book->getQty()}</td>-->
</tr>
EOD;
                    }
                ?>
            </table>
        </div>
    </body>
</html>