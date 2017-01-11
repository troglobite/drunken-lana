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
        <style>
            .bg-1 {
                border-color: red;
                background-color: red;
                border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                -webkit-border-radius: 10px 10px 10px 10px;
                width: 250px;
                height: auto;
                padding: 20px;
                margin: 50px;
            }
        </style>
    </head>
    <body>
    <center>
        <div class="bg-1">//initial form the user fills out
            <form method="post" action="WhoYouAre.php">
                <strong>Name</strong>
                <input type="text" name="Name" id="Name" value="Name goes here"><br>
                <strong>Age</strong><br>
                <input type="text" name="Age" id="Age" value="0"><br>
                <strong>Address</strong>
                <input type="text" name="Address" id="Address" value=""><br>
                <strong>State</strong>
                <input type="text" name="State" id="State" value="State goes here"><br>
                <strong>Gender</strong><br>
                Male<input type="radio" name="Sex" id="Sex" value="Male">
                Female<input type="radio" name="Sex" id="Sex" value="Female"><br>
                <input type="submit" value="Submit">
                
            </form>
        </div>
    </center>    
</body>
</html>
