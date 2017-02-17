<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <title></title>
        <?php
        //the variable $url is used to change the value of the background image
        //it needs to be calulated using $sex before the style is tag ran
        $url;
        $sex = htmlentities($_POST['Sex']);

        if ($sex == "Male") {
            $url = 'male.jpg';
        }
        if ($sex == "Female") {
            $url = 'female.jpg';
        }
        ?>
        <style>            
            body {
                background-image: url('<?php echo $url ?>');
                color:#996600;
            }
            .bg-1 {
                position: absolute;
                top: 10%;
                right: 10%;
                width: 300px;
                height: auto;
                padding: 20px;
                margin: 50px;
                border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                -webkit-border-radius: 10px 10px 10px 10px;
                border: 5px solid #000000;
                background-color:#ffffff;
            }
            .bg-2 {      
                position: absolute;
                top: 10%;
                left: 20%;
                width: 200px;
                height: 400px;
                padding: 20px;
                margin: 50px;
                border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                -webkit-border-radius: 10px 10px 10px 10px;
                border: 5px solid #000000;
                background-color:#ffffff;
                overflow: scroll;
            }
        </style>
    </head>
    <body>
    <center>
        <h2><strong>Who You Are</strong></h2>
        <div class="bg-1">

            <?php
            // turning the POST variables into local variables            
            $name = htmlentities($_POST['Name']);
            $name = strtolower($name);
            $name = ucwords($name);
            $age = htmlentities($_POST['Age']);
            $addess = htmlentities($_POST['Address']);
            $state = htmlentities($_POST['State']);
            $sex = htmlentities($_POST['Sex']);

            //if statment disallowing any negative age values, sets the value to 0 if negative
            if ($age < 0) {
                $age = 0;
            }

            //prints out the information gathered from POST as well as completes a div tag to seperate the information
            printf("Your name is %s <br>"
                    . "Your are %d years old <br>"
                    . "Your address is %s <br>"
                    . "The state you live in is %s<br>"
                    . "and you are a %s", $name, $age, $addess, $state, $sex);
            echo '</div>';

            //prints out the years counting down from the current year 2016 until $count is equal to $age as well as a div tag to seperate the info
            $count = 0;
            $date = 2016;
            echo '<div class="bg-2">';
            echo '<h4>The Years You Have Lived Through</h4>';
            while ($count <= $age) {
                printf("<strong>%d</strong><br>", $date);
                $count++;
                $date--;
            }
            echo '</div>';
            //printing the contents of PostPage
            $count = 0; //reseting count to be reused
            $postPage = explode("\n", file_get_contents('PostPage.txt')); //using explode to create a string of each new line of the doument
            while (count($postPage) != $count) {//looping through the array made from explode using count as a index
                echo $postPage[$count] . "<br>";
                $count++;
            }
            ?>
    </center>
</body>
</html>
