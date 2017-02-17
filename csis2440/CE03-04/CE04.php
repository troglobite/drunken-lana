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
        echo "test";
        ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Story Idea Generator</title>
            <style>
                body {
                    font-family: "Trebuchet MS", Verdana, sans-serif;
                    font-size: 16px;
                    background-color: dimgrey; 
                    color: #696969;
                    padding: 3px;
                }

                #main {
                    padding: 5px;
                    padding-left:  15px;
                    padding-right: 15px;
                    background-color: #ffffff;
                    border-radius: 0 0 5px 5px;
                }

                h1 {
                    font-family: Georgia, serif;
                    border-bottom: 3px solid #cc9900;
                    color: #996600;
                    font-size: 30px;
                }
            </style>
        </head>
        <body>
            <h1>Story Idea Generator</h1>
            <div id="main">
                <form action="CE04.php" method="post">
                    <?php
                    //form only shows if the hidden input in empty
                    if ($_POST['sneaky'] == 0) {
                        print <<<HTML
                        Please Create a Character to put into the story.<br>
                        Name: <input type = "text" name = "Name"><br>
                        Age: <input type = "number" name = "Age"><br>
                        Gender: F<input type = "radio" value = "F" name = "Gender" checked = "true"> M<input type = "radio" value = "M" name = "Gender"><br>
                        Class: <select name = "Class">
                        <option value = "Detective">Detective</option>
                        <option value = "Scientist">Scientist</option>
                        <option value = "Soldier">Soldier</option>
                        <option value = "Doctor">Doctor</option>
                        </select><br>
                        <input type = "submit" value = "Show Me" name = "Create"><br>

                            <input type = "hidden" value = "1" name = "sneaky">

                        </form>
HTML;
                    } else {
                        
                        $name = htmlentities($_POST['Name']);
                        $name = strtolower($name);
                        $name = ucwords($name);
                        $age = htmlentities($_POST['Age']);
                        $gender = htmlentities($_POST['Gender']);
                        $class = htmlentities($_POST['Class']);
                        
                        $settings = explode("\n", file_get_contents('settings.txt'));
                        $objectives = explode("\n", file_get_contents('objectives.txt'));
                        $antagonists = explode("\n", file_get_contents('antagonists.txt'));
                        $complications = explode("\n", file_get_contents('complications.txt'));
                        
                        shuffle($settings);
                        shuffle($objectives);
                        shuffle($antagonists);
                        shuffle($complications);
                        
                        if($gender == "F"){
                            $title = "Lady";
                        } else {
                            $title = "Gentlemen";
                        }
                        
                        printf("This is a story about %s named %s, who at only %d years old is a %s.<br> "
                                . "this is beginning.....<br>", $title, $name, $age, $class);
                        
                        echo $settings[0].' '.$objectives[0].' '.$antagonists[0].' '.$complications[0]
                                ."<br /><input type = 'submit' value = 'Try Again' name = 'Create'><br>"
                                . "<input type='hidden' value ='0' name ='sneaky'></form>   ";                        
                    }
                    ?>
            </div>

        </body>
    </html>
</body>
</html>
