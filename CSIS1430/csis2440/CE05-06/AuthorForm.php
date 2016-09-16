<!DOCTYPE html>
<?php
require_once "DatabaseConnection.php";
//get the post
$first = $_POST['fname'];
$last = $_POST['lname'];
$birth = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
$gender = $_POST['gen'];
$bio = $_POST['bio'];
$sub = $_POST['Doit'];
//add to the database
if ($sub == "Add") {
    $insert = "INSERT INTO `LIBRARY`.`Author` (`FirstName`, `LastName`, `Bio`, `birth`, `Sex`, `Active`)"
            . "VALUES ('$first', '$last', '$bio', '$birth', '$gender', 'Y');";
    $success = mysql_query($insert, $con);
    if ($success == FALSE) {
        $message = "Whole query " . $insert . "<br>";
        echo $message;
        die('Invalid query: ' . mysql_error());
    } else {
        echo "$first $last was added!";
    }
}
//update the database
if ($sub == "Update") {
    $update = "UPDATE `LIBRARY`.`Author` SET `Bio`='$bio' WHERE `FirstName` = '$first' AND `LastName`= '$last'";
    $success = mysql_query($update, $con);
    if ($success == FALSE) {
        $message = "Whole query " . $update . "<br>";
        echo $message;
        die('Invalid query: ' . mysql_error());
    } else {
        echo "$first $last was updated!";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Author Add Form</title>
        <link rel="stylesheet" type="text/css" href="AuthorStyleSheet.css">
    </head>
    <body>
        <h2>Author Form</h2>
        <table>
            <form method="post" action="AuthorForm.php">
                <tr><td align='right'>First Name</td><td align='left'>
                        <input type="text" name="fname">
                    </td>
                </tr>
                <tr><td align='right'>Last Name</td><td align='left'>
                        <input type="text" name="lname">
                    </td>
                </tr>
                <tr><td align='right'>Birth</td><td align='left'>
                        <select name="month">
                            <?php
                            //you should really look at this and understand what I did here
                            for ($month = 1; $month < 13; $month++) {
                                printf("<option value='%d'>%d</option>", $month, $month);
                            }
                            ?>
                        </select>
                        <select name="day">
                            <?php
                            for ($day = 1; $day < 31; $day++) {
                                printf("<option value='%d'>%d</option>", $day, $day);
                            }
                            ?>
                        </select>
                        <select name="year">
                            <?php
                            for ($year = date('Y'); $year > 1950; $year--) {
                                printf("<option value='%d'>%d</option>", $year, $year);
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td align='right'>Gender</td><td align='left'><input type="radio" value="M" name="gen">Male 
                        <input type="radio" value="F" name="gen" checked>Female
                    </td>
                </tr>
                <tr><td align='right'>Biography</td><td align='left'><textarea name="bio" rows="4" cols="50" >Some Stuff </textarea></td></tr>
                <tr><td colspan="2"><input type="submit" name="Doit" value="Add"><input type="submit" name="Doit" value="Update"><input type="submit" name="Doit" value="Search"></td></tr>
            </form>
        </table>
        <?php
//searching for an author
        if ($sub == "Search") {

            $search = "SELECT * FROM `LIBRARY`.`Author` WHERE `FirstName` LIKE '$first' AND `LastName` LIKE '$last'";

            $return = mysql_query($search, $con);

            if (!$return) {
                $message = "Whole query " . $search;
                echo $message;
                die('Invalid query: ' . mysql_error());
            }
            while ($row = mysql_fetch_array($return)) {
                echo "<table border = 1|0><tr><th>First</th><th>Last</th><th>Bio</th><th>Birth</th><th>Gender</th></tr>"
                . "";
                echo "<tr>" . "<td>" . $row['FirstName'] . "<td>" . $row['LastName'] . "<td>" . $row['Bio'] . "<td>"
                . $row['birth'] . "<td>" . $row['Sex'] . "</tr>";
                echo "</table>";
            }
        }
        echo $message;
        ?>
    </body>
</html>

