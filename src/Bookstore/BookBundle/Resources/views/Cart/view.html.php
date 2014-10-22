<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'header.php';
if (isset($_GET['status']) && $_GET['status'] == 1)
    echo<<<'EOD'
<script>
    $(document).ready(function(){
        $('#update').fadeIn('slow').delay(3000).fadeOut('slow');
    });
</script>
<h2 style="text-align:center;display:none;" id=update>Cart Updated!</h2>
EOD;
?>
<table border="1">
    <tr class="tbl_header">
        <th>Picture</th>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Price (each)</th>
        <th>Qty in Cart</th>
        <th>Price (total)</th>
    </tr>
    <?php
    $stripe = false;
    foreach ($cart as $cartentry) {
        $stripe = !$stripe;
        $book = $cartentry->getBook();
        if ($stripe) {
            echo "<tr class=\"odd\">";
        } else {
            echo "<tr class=\"even\">";
        }
        $detailurl = $view['router']->generate('details_books', array(
            'id' => $book->getBid()
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
<td>\$ {$book->getPrice()}</td>
<form method=post action="{$view['router']->generate('update_cart')}">
    <input type=hidden name=uid value="{$cartentry->getUid()}">
    <input type=hidden name=bid value="{$cartentry->getBook()->getBid()}">
    <td>
        <input
            type=number
            name="qty"
            class=itemqty
            value="{$cartentry->getQty()}"
            min=0
            max="{$cartentry->getBook()->getQty()}"
        >
        <input type=submit value=Update>
    </td>
</form>
<td class=itemtotal>\$ 
EOD;
        echo $book->getPrice() * $cartentry->getQty();
        echo<<<EOD
</td>
</tr>
EOD;
    }
    ?>
</table>
<div id="totals">
    <table border="1">
        <tr>
            <th class="label">Subtotal</th>
            <td id="subtotal">$ PLACEHOLDER</td>
        </tr>
        <tr>
            <th class="label">Tax (12%)</th>
            <td id="taxtotal">$ PLACEHOLDER</td>
        </tr>
        <tr>
            <th class="label">Total</th>
            <td id="finaltotal">$ PLACEHOLDER</td>
        </tr>
        <tr><th></th><td><input type="button" id="purchase" value="Purchase"></td></tr>
    </table>
</div>
<script>
    $(document).ready(function() {
        var sum = 0;
        $('.itemtotal').each(function() {
            sum += parseFloat($(this).text().substring(2, $(this).text().length));  //Or this.innerHTML, this.innerText
        });
        sum = sum.toFixed(2);
        $("#subtotal").text("$ " + sum);
        var tax = sum * 0.12;
        tax = tax.toFixed(2);
        $("#taxtotal").text("$ " + tax);
        sum = parseFloat(tax) + parseFloat(sum);
        sum = sum.toFixed(2);
        $("#finaltotal").text("$ " + sum);
    });
    $('#purchase').click(function() {
        window.location.href = '<?php
    echo $view['router']->generate("purchase");
    ?>';
    });
</script>
</body>