<?php
require_once 'config.php';

$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Full_Name = $_POST['Full_Name'] ?? '';
    $User_Name = $_POST['Username'] ?? '';
    $Email = $_POST ['Email'] ?? '';
    $Password = $_POST['Password'] ?? '';
    $Confirm_Password = $_POST['confirm_password'] ?? '';
}
if($Full_Name){
   $stmt = $dbConnection->prepare('INSERT INTO sign_in_tbl (Full_Name, User_Name, Email, Password, Confirm_Password)VALUES(?,?,?,?,?)');
   $stmt->bind_param('sssss',$Full_Name, $User_Name, $Email, $Password, $Confirm_Password );
   $stmt->execute();

   header('Location: ./index.html');

}
?>
