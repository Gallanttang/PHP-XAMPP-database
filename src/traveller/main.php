<?php
function login($conn, $sql)
{
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header('Location: ../../html/failedLogin.html');
    }
    $rows = mysqli_fetch_assoc($result);
    $name = array_values($rows)[0];
    if ($name) {
        header('Location: welcome.php?username='.$name);
    } else {
        header('Location: ../../html/failedLogin.html');
    }
}
include '../connect.php';
echo 'Logging in...';
$username = $_POST['username'];
$password = $_POST['password'];
$connection = OpenCon();
$sql = "SELECT u.Name FROM users u WHERE u.Username = '$username' AND u.Password = '$password'";
login($connection, $sql);
CloseCon($connection);