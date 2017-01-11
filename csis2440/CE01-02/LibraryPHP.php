<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (_POST['Subject'] == NULL || $_POST['Title'] == "Title of Book") {
            printf("<br><div style='color:red'>No books are entered</div>");
        } else {
            $sub = htmlentities($_POST['Subject']);
            $title = htmlentities($_POST['Title']);
            $isbn = htmlentities($_POST['ISBN']);
            $edition = htmlentities($_POST['Edition']);
            $condition = htmlentities($_POST['Condition']);
            $price = htmlentities($_POST['Price']);
            $seller = htmlentities($_POST['Seller']);
            $email = htmlentities($_POST['Email']);

            if ($price > 200)
                $price = 200.00;
            if ($price < 0)
                $price = 0.00;

            printf("<br><div style='color:white'>%s<br> "
                    ."Title: $title , Edition: $edition, ISBN:$isbn<br>"
                    . "Reported in $condition condition.<br>"
                    . "$seller would like %.2f dollars for it and will be "
                    . "contacted at $email</div><br>", $sub, $price);
        }
        ?>
    </body>
</html>
