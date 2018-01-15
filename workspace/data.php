<?php

//Login Parameters for MySQL
$servername = "localhost";
$username = "root";
$password = "";
$db = "scout";

//Scouter Information
$name = $_POST["name"];
$team_num = $_POST["team"];

//Autonomous
$auto_low = $_POST["Low"];
$auto_high = $_POST["High"];
$auto_gear = $_POST["AutoGears"];
$auto_base = $_POST["Baseline"];

//Teleoperation
$tele_gear = $_POST["TeleGears"];
$tele_high = $_POST["TeleHigh"];
$high_acc = $_POST["TeleHighAccuracy"];
$tele_low = $_POST["TeleLow"];
$low_acc = $_POST["TeleLowAccuracy"];
$gearDrop = $_POST["GearDrop"];

//Defense Bot
$defense = $_POST["Defense"];

//Sweeper
$sweep = $_POST["Sweeper"];

//Climbing
$climb = $_POST["Climb"];

//Comments
$comment = $_POST["comments"];

if ($name == "")
{
    $name = "Joe";
}
if ($team_num == "")
{
    $team_num = 0;
}
if ($auto_low == "")
{
    $auto_low = 0;
}
if ($auto_high == "")
{
    $auto_high = 0;
}
if ($auto_gear == "")
{
    $auto_gear = 0;
}
if ($auto_base == "")
{
    $auto_base = 0;
}
if ($tele_low == "")
{
    $tele_low = 0;
}
if ($low_acc == "")
{
    $low_acc = 0;
}
if ($tele_high == "")
{
    $tele_high = 0;
}
if ($high_acc == "")
{
    $high_acc = 0;
}
if ($tele_gear == "")
{
    $tele_gear = 0;
}
if ($gearDrop == "")
{
    $gearDrop = 0;
}
if ($defense == "")
{
    $defense = 0;
}
if ($sweep == "")
{
    $sweep = 0;
}
if ($climb == "")
{
    $climb = 0;
}

//Calculate Composite Score
if ($climb == 2)
{
    $weighted_score = $auto_high + ($auto_low / 3) + ($auto_gear * 16) + ($auto_base * 4) + (($tele_high * 4) * ($high_acc - 1)) + ($tele_gear * 11) + ($gearDrop * -2) + ($defense * 5) + ($climb * 7);
}
else {
    $weighted_score = $auto_high + ($auto_low / 3) + ($auto_gear * 16) + ($auto_base * 4) + (($tele_high * 4) * ($high_acc - 1)) + ($tele_gear * 11) + ($gearDrop * -2) + ($defense * 5) + ($climb * 4);
}

echo ("Robot Composite Score: " . $weighted_score);

//Calculates Team Score
$team_score = ($auto_gear * 20) + ($auto_high) + ($auto_low / 3) + ($auto_base * 5) + ($tele_gear * 13) + (($tele_high / 3) * $high_acc) + (($tele_low / 9) * $low_acc) + ($climb * 25) + ($defense * 5);

echo ("<br>" . "Team Score for the Match: " . $team_score);

//Creates connection to MySQL
$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error)
{
    die("The Connection Failed: " . $conn->connect_error);
}

echo("<br>" . "Connection Successful");

//Inserts Raw Data into Table
$sql = "INSERT INTO result (name, team_num, auto_high, auto_low, auto_gear, auto_base, tele_gear, gearDrop, tele_high, high_acc, tele_low, low_acc, defense, sweeper, climbing, composite, teamScore, comments) 
VALUES ('$name', '$team_num', '$auto_high', '$auto_low', '$auto_gear', '$auto_base', '$tele_gear', '$gearDrop', '$tele_high', '$high_acc', '$tele_low', '$low_acc', '$defense', '$sweep', '$climb', '$weighted_score', '$team_score', '$comment')";

if ($conn->query($sql) == TRUE)
{
    echo("<br>" . "Data Sent to Server");
}
else
{
    echo("Error: " . $sql . "<br>" . $conn->error);
}

//Inserts Averages into Table
$avg = "replace into averages (team_num, auto_high, auto_low, auto_gear, auto_base, high, high_acc, low, low_acc, gear, gearDrop, climbing, defense, composite, teamScore, teamScore_stanDev) select team_num, avg(auto_high), avg(auto_low), avg(auto_gear), avg(auto_base), avg(tele_high), avg(high_acc), avg(tele_low), avg(low_acc), avg(tele_gear), avg(gearDrop), avg(climbing), avg(defense), avg(composite), avg(teamScore), stddev(teamScore) from result where team_num = '$team_num'";
if ($conn->query($avg) == TRUE)
{
    echo("<br>" . "Averages Sent to Server");
}
else
{
    echo("Error: " . $avg . "<br>" . $conn->error);
}

//Fetches Averages for Strength Calculation
$avg_defense = mysqli_query("SELECT defense from averages where team_num = '$team_num'");
$defense_result = mysqli_fetch_field($avg_defense);

$avg_high_acc = mysqli_query("SELECT high_acc from averages where team_num = '$team_num'");
$high_acc_result = mysqli_fetch_field($avg_high_acc);

$avg_high = mysqli_query("SELECT high from averages where team_num = '$team_num'");
$high_result = mysqli_fetch_field($avg_high);

$avg_low = mysqli_query("SELECT low from averages where team_num = '$team_num'");
$low_result = mysqli_fetch_field($avg_low);

$avg_low_acc = mysqli_query("SELECT low_acc from averages where team_num = '$team_num'");
$low_acc_result = mysqli_fetch_field($avg_low_acc);

$avg_gear = mysqli_query("SELECT gear from averages where team_num = '$team_num'");
$gear_result = mysqli_fetch_field($avg_gear);

//Calculates Strength based on Averages
if ($defense_result == 1) 
{
    $strength = 1; //1 = Defense
}
elseif ($high_acc_result >= 2 || $high_result > $low_result || $high_result > $gear_result)
{
    $strength = 2; //2 = High-Goal
}
elseif ($gear_result >= $low_result || $gear_result >= $high_result || $gear_result >= 3)
{
    $strength = 3; //3 = Gear
}
elseif ($low_acc_result >= 2)
{
    $strength >= 4; //4 = low-Goal
}
else
{
    $strength = 0; //0 = No Strength
}

//Inserts Averages + STRENGTH + teamScore_stanDev back into the Table
$avg2 = "replace into averages (team_num, auto_high, auto_low, auto_gear, auto_base, high, high_acc, low, low_acc, gear, gearDrop, climbing, defense, composite, teamScore, teamScore_stanDev, strength) select team_num, round(auto_high), round(auto_low), round(auto_gear), round(auto_base), round(high), round(high_acc), round(low), round(low_acc), round(gear), round(gearDrop), ceiling(climbing), round(defense), round(composite), round(teamScore), round(teamScore_stanDev), '$strength' from averages";
if ($conn->query($avg2) == TRUE)
{
    echo("<br>" . "Strength Sent to Server");
}
else
{
    echo("Error: " . $avg2 . "<br>" . $conn->error);
}

//Executes the Bash Script to create a Raw Data CSV File
$bash = shell_exec("~/workspace/manage.sh");
print_r($bash);

//Executes the Bash Script to create the Final CSV File
$bash2 = shell_exec("~/workspace/avg.sh");
print_r($bash2);

//Executes the Bash Script to create the CSV that is read by Java Program on Driver Station
$bash3 = shell_exec("~/workspace/java_avg.sh");
print_r($bash3);

?>