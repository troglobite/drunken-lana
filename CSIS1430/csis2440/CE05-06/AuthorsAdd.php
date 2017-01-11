<?php

require_once 'DataBaseConnection.php';

$newAuth = array(
    array("William", "Shakespeare", "", "1564-01-01", "M"),
    array("Dante", "Alighieri", "", "1265-01-01", "M"),
    array("Homer", "--", "", "00-01-01", "M"),
    array("Leo", "Tolstoy", "", "1828-01-01", "M"),
    array("Geoffrey", "Chaucer", "", "1340-01-01", "M"),
    array("Charles", "Dickens", "", "1812-01-01", "M"),
    array("James", "Joyce", "", "1882-01-01", "M"),
    array("John", "Milton", "", "1608-01-01", "M"),
    array("Virgil", "--", "", "00-01-01", "M"),
    array("Johann", "Wolfgang von Goethe", "", "1749-01-01", "M")
);
//print_r($newAuth);
foreach ($newAuth as $insertArray) {

    $insert = "INSERT INTO `Library`.`Authors` (`FirstName`, `LastName`, `Bio`, `birth`, `gender`, "
            . "`Active`) VALUES ('$insertArray[0]', '$insertArray[1]', '$insertArray[2]',"
            . " '$insertArray[3]', '$insertArray[4]', 'Y');";
    $success = mysql_query($insert, $con);
    if ($success == FALSE) {
        $failmess = "Whole query " . $insert . "<br>";
        echo $failmess;
        die('Invalid query: ' . mysql_error());
    } else {
        echo "$insertArray[0] $insertArray[1] was added<br>";
    }
}
echo "<br><h2>Now removing</h2><br><hr>";
for ($i = 0; $i < sizeof($newAuth); $i+=2) {
    $update = "UPDATE `Library`.`Authors` SET `Active`='N' "
            . "WHERE `FirstName`='" . $newAuth[$i][0] . "'";
    $success = mysql_query($update, $con);
    if ($success == FALSE) {
        $failmess = "Whole query " . $insert . "<br>";
        echo $failmess;
        die('Invalid query: ' . mysql_error());
    } else {
        echo $newAuth[$i][0]." ". $newAuth[$i][1]." was removed<br>";
    }
}
echo "<br>This is who is left<hr>";
$search = "SELECT * FROM Library.Authors where Active = 'Y'";

$return = mysql_query($search, $con);

if (!$return) {
    $message = "Whole query " . $search;
    echo $message;
    die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($return)) {
    echo "Name: " . $row['FirstName'] . " " . $row['LastName'] . ", Bio: " . $row['Bio'] 
            . " Birth Year:".date('Y',strtotime($row['birth']))." Gender:".$row['gender']."<br>";
}

close($con);


