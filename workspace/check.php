<?php

//Clears Table of Previous Entry
$bash = shell_exec("~/workspace/trun.sh");
print_r($bash);

//Login Parameters for MySQL
$servername = "localhost";
$username = "root";
$password = "";
$db = "scout";

//Team Number Request
$team_num = $_POST["team"];
echo $team_num;
//Creates connection to MySQL
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error)
{
    die("The Connection Failed: " . $conn->connect_error);
}

echo("<br>" . "Connection Successful");

//Inputs Autonomous Gears Attemps and Successes into Table
$query1 = "replace into phone (team_num, autoGearTry) select team_num, count(*) from result where team_num = '$team_num'";

if ($conn->query($query1) == TRUE)
{
    echo("<br>" . "Autonomous Gear Attempts Sent to Server");
}
else
{
    echo("Error: " . $query1 . "<br>" . $conn->error);
}

$query2 = "update phone set autoGearSuccess = (select count(*) from result where (team_num = 540 and auto_gear = 1))";

if ($conn->query($query2) == TRUE)
{
    echo("<br>" . "Autonomous Gear Successes Sent to Server");
}
else
{
    echo("Error: " . $query2 . "<br>" . $conn->error);
}

//Inputs Teleop Gears into Table
$query3 = "update phone set averageTeleopGear = (select gear from averages where team_num = '$team_num')";

if ($conn->query($query3) == TRUE)
{
    echo("<br>" . "Teleop Gear Average Sent to Server");
}
else
{
    echo("Error: " . $query3 . "<br>" . $conn->error);
}

//Inputs Climbing Attempts into Table
$query4 = "update phone set climbTry = (select count(*) from result where team_num = '$team_num')";

if ($conn->query($query4) == TRUE)
{
    echo("<br>" . "Climbing Attempts Sent to Server");
}
else
{
    echo("Error: " . $query4 . "<br>" . $conn->error);
}

//Inputs Climbing Successes into Table
$query5 = "update phone set climbSuccess = (select count(*) from result where (team_num = '$team_num' and climbing = 2))";

if ($conn->query($query5) == TRUE)
{
    echo("<br>" . "Climbing Successes Sent to Server");
}
else
{
    echo("Error: " . $query5 . "<br>" . $conn->error);
}

//Inputs Autonomous Baseline Attempts into Table
$query6 = "update phone set baselineTry = (select count(*) from result where team_num = '$team_num')";

if ($conn->query($query6) == TRUE)
{
    echo("<br>" . "Baseline Attempts Sent to Server");
}
else
{
    echo("Error: " . $query6 . "<br>" . $conn->error);
}

//Inputs Autonomous Baseline Successes into Table
$query7 = "update phone set baselineSuccess = (select count(*) from result where (team_num = '$team_num' and auto_base = 1))";

if ($conn->query($query7) == TRUE)
{
    echo("<br>" . "Baseline Successes Sent to Server");
}
else
{
    echo("Error: " . $query7 . "<br>" . $conn->error);
}

//Inputs Autonomous High Goal Average into Table
$query8 = "update phone set autoHigh = (select auto_high from averages where team_num = '$team_num')";

if ($conn->query($query8) == TRUE)
{
    echo("<br>" . "Autonomous High Goal Averages Sent to Server");
}
else
{
    echo("Error: " . $query8 . "<br>" . $conn->error);
}

//Inputs Average Composite Score into Table
$query9 = "update phone set composite = (select composite from averages where team_num = '$team_num')";

if ($conn->query($query9) == TRUE)
{
    echo("<br>" . "Average Robot Composite Score Sent to Server");
}
else
{
    echo("Error: " . $query9 . "<br>" . $conn->error);
}

//Inputs Average Team Score into Table
$query10 = "update phone set teamScore = (select teamScore from averages where team_num = '$team_num')";

if ($conn->query($query10) == TRUE)
{
    echo("<br>" . "Average Team Score Sent to Server");
}
else
{
    echo("Error: " . $query10 . "<br>" . $conn->error);
}

//Inputs Team Score Standard Deviation into Table
$query11 = "update phone set teamScore_stanDev = (select teamScore_stanDev from averages where team_num = '$team_num')";

if ($conn->query($query11) == TRUE)
{
    echo("<br>" . "Team Score Standard Deviation Sent to Server");
}
else
{
    echo("Error: " . $query11 . "<br>" . $conn->error);
}

//Inputs Total Gears Dropped into Table
$query12 = "update phone set gearDrop = (select sum(gearDrop) from result where team_num = '$team_num')";

if ($conn->query($query12) == TRUE)
{
    echo("<br>" . "Total Gears Dropped Sent to Server");
}
else
{
    echo("Error: " . $query12 . "<br>" . $conn->error);
}

//Adds Raw Data on the Team to raw_phone
$query13 = "truncate raw_phone";
if ($conn->query($query13) == TRUE)
{
    echo("<br>" . "Raw Values Initialized");
}
else
{
    echo("Error: " . $query13 . "<br>" . $conn->error);
}

$query14 = "replace into raw_phone (team_num, auto_high, auto_low, auto_gear, auto_base, tele_gear, gearDrop, tele_high, high_acc, tele_low, low_acc, defense, sweeper, climbing, composite, teamScore) select team_num, auto_high, auto_low, auto_gear, auto_base, tele_gear, gearDrop, tele_high, high_acc, tele_low, low_acc, defense, sweeper, climbing, composite, teamScore from result where team_num = '$team_num'";
if ($conn->query($query14) == TRUE)
{
    echo("<br>" . "Raw Data Created for the Selected Team");
}
else
{
    echo("Error: " . $query14 . "<br>" . $conn->error);
}


echo "<br>" . "Done";

//Creates Temp. CSV Files
$bash2 = shell_exec("~/workspace/phone.sh");
print_r($bash2);
$bash3 = shell_exec("~/workspace/rawPhone.sh");
print_r($bash3);

//Download Link
echo "<html>";
echo "<br>";
echo "<body>";
echo "<a href = 'rawPhone.csv' download> Click here to Download Fetched Raw Data </a> <br>";
echo "<a href = 'phone.csv' download> Click here to Download Fetched Averages Data </a>";
echo "</body>";
echo "</html>";

?>