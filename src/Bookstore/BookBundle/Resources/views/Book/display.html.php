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
                    <th>Price</th>
                    <th>Rating</th>
                </tr>
                <?php
                    $stripe=false;
                    foreach($books as $book){
                        if(!isset($ratings[$book->getBid()]))$ratings[$book->getBid()]="Not Rated";
                        $stripe=!$stripe;
                        if ($stripe) {
                            echo "<tr class=\"odd\">";
                        } else {
                            echo "<tr class=\"even\">";
                        }
                        $detailurl=$view['router']->generate('details_books',
                                array(
                                    'id'=>$book->getBid()
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
<td>{$ratings[$book->getBid()]}</td>
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