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
        <link rel="stylesheet" type="text/css" href="view.css" media="all">
    </head>
    <body>
        <div id="form_container">
            <form method="post" action="LibraryInput.php">
                <legend class="form_description"><h2>Your Information</h2></legend>
                <ul>
                    <li>
                        <div>
                            <label class="description">Subject</label>
                            <select name="Subject" id="Subject" class="element select medium required" >
                                <option value="English">English</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="World Languages">World Languages</option>
                                <option value="History and Social Sciences">History and Social Sciences</option>
                                <option value="Science">Science</option>
                                <option value="Visual and Performing  Arts">Visual and Performing  Arts</option>
                                <option value="Technology">Technology</option>
                                <option value="Communications">Communications</option>
                                <option value="Physical Education">Physical Education</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Title</label>

                            <input type="text" name="Title" id="Title" value="Title of Book" class="element text medium required" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">ISBN #</label>

                            <input type="text" name="ISBN" id="ISBN" value="" class="element text medium required" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Edition</label>

                            <input type="text" name="Edition" id="Edition" value="" class="element text medium" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Condition</label>


                            <select name="Condition" id="Condition" class="element select medium required" >
                                <option value="New">New</option>
                                <option value="Like New">Like New</option>
                                <option value="Very Good">Very Good</option>
                                <option value="Good">Good</option>
                                <option value="Acceptable">Acceptable</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Price</label>

                            <input type="text" name="Price" id="Price" value="" class="element text medium" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Seller</label>

                            <input type="text" name="Seller" id="Seller" value="last, first" class="element text medium required" />
                        </div>
                    </li>
                    <li>
                        <div>
                            <label class="description">Email</label>

                            <input type="text" name="Email" id="Email" value="your email address here" class="element text medium required" />
                        </div>
                    </li>

                </ul>
                <div>
                    <input type="submit" name="Send"><br>
                </div>
            </form>
        </div>
        <br><div style='color:red'>  No books are entered</div><br>    

    <?php
    
    echo "test";
    
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

        if ($price > 200) {
            $price = 200.00;
        }
        if ($price < 0) {
            $price = 0.00;
        }

        printf("<br><div style='color:white'>%s<br> "
                . "Title: $title , Edition: $edition, ISBN:$isbn<br>"
                . "Reported in $condition condition.<br>"
                . "$seller would like %.2f dollars for it and will be"
                . " contacted at $email</div><br>", $sub, $price);
    }
    ?>   

    </body>  
</html>
