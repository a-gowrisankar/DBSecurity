<?php

session_start();

$user = $_SESSION['useremail'];
$loginnTime = $_SESSION['logTime'];
$logooutTime = $_SESSION['logoTime'];
$name = $_SESSION['fName'];
#echo $name;
#echo

$username = "ananth";
$password = "ananth1";
$hostname = "www.papademas.net:3307"; 
$db ="fitb";
$conn = mysqli_connect($hostname, $username, $password, $db);
// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
exit();

}


$query ="SELECT 
User_id, 
Email_id,
First_Name,
Last_Name,
LOGOUT_TIME,
userType,
account_status,
login_attempts,
LOGIN_TIME
FROM db_sec_users
where UserType not in ('A', 'SU');";

$data = mysqli_query($conn,$query);




echo '<div id ="head"><h1>User Reports</h1><hr></div>';
echo '<div id = "menu"></div><div id ="choice">';
echo '<ul>';
echo '<li> <a href = ""> Welcome' . "  " . $name . '</a></li>';
echo '<li> <a href = "../HTML/Logout.php"> Logout</a></li>';
echo '</ul></div>';

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>Databse user Details </title>';
echo '<link rel="stylesheet" type="text/css" href="../HTML/JoinLeague_css.css">';
echo '</head><body>';
echo 'Hello Admin. You now have Admin priviliges';
echo' <br><br>';
echo 'You have Admin Priviliges';
echo' <br><br>';
echo 'Your Last Login Time was';
echo $loginnTime ;
echo' <br><br>';
echo'and Last Logout Time was '; 
echo $logooutTime ;


echo  '<table>';
echo '<tr>';
echo '<th>UserID</th>';
echo '<th>EmailID</th>';
echo '<th>FName</th>';
echo '<th>LName</th>';
echo '<th>LogoutTime</th>';
echo '<th>user_Type</th>';
echo '<th>AccountStatus</th>';
echo '<th>LoginAttempts</th>';
echo '<th>LoginTime</th>';



echo '</tr>';
while($row = mysqli_fetch_array($data)) 
{
echo '<tr>';
echo '<td>' . $row['User_id'] . '</td>';
echo '<td>' . $row['Email_id'] . '</td>';
echo '<td>' . $row['First_Name'] . '</td>';
echo '<td>' . $row['Last_Name'] . '</td>';
echo '<td>' . $row['LOGOUT_TIME'] . '</td>';
echo '<td>' . $row['userType'] . '</td>';
echo '<td>' . $row['account_status'] . '</td>';
echo '<td>' . $row['login_attempts'] . '</td>';
echo '<td>' . $row['LOGIN_TIME'] . '</td>';
echo '</tr>';
}
echo '</table>';
echo '</body></html>';




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Report Page</title>
<link rel="stylesheet" type="text/css" href = "../HTML/League_css.css">
</head>
<body>
</body>
</html>