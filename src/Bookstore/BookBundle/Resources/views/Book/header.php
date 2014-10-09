<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/site.css') ?>"> 
        <title>ITAS255 Project 2 - Browse</title>
    </head>
    <body>


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