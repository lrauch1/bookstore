<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/site.css') ?>"> 
        <script src="https://efalder.ca/jquery.min.js"></script>
        <title>ITAS255 Project 2 - Browse</title>
    </head>
    <body>
        <?php
$security=$app->getSecurity();
if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
    $uname=$security->getToken()->getUser()->getUsername();
    $uid=$security->getToken()->getUser()->getId();
}else{
    $uname=NULL;
    $uid=NULL;
}
?>
        <div id="header">
    <table border="1">
        <col style="width:20%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:35%">
        <tr>
            <td id="title"><a href="<?php echo $view['router']->generate('bookstore_homepage'); ?>">ITAS Bookstore</a></td>
            <td>
                <?php 
                    if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
                        echo "Logged in as: ";
                        echo $uname;
                        echo "<br><a href='".
                                $view['router']->generate('account',
                                        array(
                                            'id'=>$uid
                                        ))
                                ."'>Account Settings</a>";
                    }else{
                        echo "Not logged in<br><strike>Account Settings</strike>";
                    }
                ?>
            </td>
            <td>
                <?php
                    if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
                        echo "<a href='".
                                $view['router']->generate('view_cart',
                                        array(
                                            'id'=>$uid
                                        ))
                                ."'>View Cart</a><br>";
                        //TODO
//                        $repository=$this->getDoctrine()->getRepository('BookstoreBundle:Cart');
//                        $cart=$repository->findByUid($uid);
//                        echo count($cart);
//                        echo " Item(s)";
                    }else{
                        echo "<strike>Cart</strike><br>0 Items";
                    }
                ?>
            </td>
            <td>
                <?php
                    if($security->isGranted('IS_AUTHENTICATED_REMEMBERED')){
                        echo "<a href='".
                                $view['router']->generate('logout')
                        . "'>Logout</a>";
                    }else{
                        echo "<a href='".
                                $view['router']->generate('login')
                        . "'>Login</a>";
                    }
                ?>
            </td>
            <td>
                <form action="<?php echo $view['router']->generate('search'); ?>" method="POST">
                    Search By:
                    <select name="type">
                        <option value="title">Title</option>
                        <option value="isbn">ISBN</option>
                        <option value="course">Course</option>
                        <option value="instructor">Instructor</option>
                    </select>
                    <input type="text" name="text">
                    <input type="submit" value="Search">
                </form>
            </td>
        </tr>
    </table>
</div>