<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<body>";
echo "INVOICE<br>----------<br>";
$sum=0;
foreach ($cart as $cartentry) {
    echo $cartentry->getBook()->getTitle();
    echo ":<br>&nbsp;&nbsp;&nbsp;&nbsp; Unit Price: \$";
    echo number_format($cartentry->getBook()->getPrice(), 2);
    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp; Quantity Ordered: ";
    echo $cartentry->getQty();
    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp; Total: \$";
    echo number_format($cartentry->getBook()->getPrice()*$cartentry->getQty(),2);
    $sum+=($cartentry->getBook()->getPrice()*$cartentry->getQty());
    echo "<br>";
}
echo "----------<br>";
echo "Subtotal: \$";
echo number_format($sum, 2);
echo "<br>Tax (12%): \$";
echo number_format($sum*0.12, 2);
$sum*=1.12;
echo "<br>Total: \$";
echo number_format($sum, 2);
echo "</body>";