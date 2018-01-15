<?php

//Login Parameters for MySQL
$servername = "localhost";
$username = "root";
$password = "";
$db = "scout";

//Creates connection to MySQL
$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error)
{
    die("The Connection Failed: " . $conn->connect_error);
}

echo("<br>" . "Connection Successful" . "<br>");

//Recieves Scouter Input
$auto_gear = $_POST["auto_gear"];
$auto_high = $_POST["auto_high"];
$auto_low = $_POST["auto_low"];
$gear = $_POST["gear"];
$high = $_POST["high"];
$low = $_POST["low"];
$climb = $_POST["climb"];
$composite = $_POST["composite"];
$team = $_POST["team"];

//Orders Data based on Input
if ($auto_gear == 1)
{
    echo "Sorting by Autonomous Gears";
    $bash = shell_exec("~/workspace/sort/autoGear.sh");
    print_r($bash);
}
else if ($auto_high == 1)
{
    echo "Sorting by Autonomous High Goals";
    $bash = shell_exec("~/workspace/sort/autoHigh.sh");
    print_r($bash);
}
else if ($auto_low == 1)
{
    echo "Sorting by Autonomous Low Goals";
    $bash = shell_exec("~/workspace/sort/autoLow.sh");
    print_r($bash);
}
else if ($gear == 1)
{
    echo "Sorting by Teleoperation Gears";
    $bash = shell_exec("~/workspace/sort/teleGear.sh");
    print_r($bash);
}
else if ($high == 1)
{
    echo "Sorting by Teleoperation High Goals";
    $bash = shell_exec("~/workspace/sort/teleHigh.sh");
    print_r($bash);
}
else if ($low == 1)
{
    echo "Sorting by Teleoperation Low Goals";
    $bash = shell_exec("~/workspace/sort/teleLow.sh");
    print_r($bash);
}
else if ($climb == 1)
{
    echo "Sorting by Climbing";
    $bash = shell_exec("~/workspace/sort/climb.sh");
    print_r($bash);
}
else if ($composite == 1)
{
    echo "Sorting by Robot Composite Score";
    $bash = shell_exec("~/workspace/sort/composite.sh");
    print_r($bash);
}
else if ($team == 1)
{
    echo "Sorting by Team Score";
    $bash = shell_exec("~/workspace/sort/team.sh");
    print_r($bash);
}

//Download the Output CSV
echo "<html>";
echo "<br>";
echo "<body>";
echo "<a href = 'output.csv' download> Click here to Download Sorted Data </a>";
echo "</body>";
echo "</html>";
?>