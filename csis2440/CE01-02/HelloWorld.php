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
        
        $d = date("D");
        
        if ($d == "Fri") {
            $message = "have a nice weekend!";
        } 
        elseif (($d == "Sat") || ($d=="Sun")) {
        $message = "It is the weekend";
        }
        else {
            $message = "It is the work week";
        }
        
        echo $message."<br>";
        
        ?>
    </body>
</html>
