<!DOCTYPE html>
<html lang="en">

<head>
   <title>Discuss Project</title>
   <?php include('./client/commonFiles.php'); // linking happening here ?>
</head>

<body>
<?php
   session_start();
   include('./client/header.php'); // linking process

   if (isset($_GET['signup']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
       include('./client/signup.php'); // linking signup page here
   } else if (isset($_GET['login']) && (!isset($_SESSION['user']) || !isset($_SESSION['user']['username']))) {
       include('./client/login.php'); // linked
   } else if (isset($_GET['ask'])) { // check if 'ask' is set in the URL
       include('./client/ask.php');
   } else if (isset($_GET['q-id'])) {
       $qid = $_GET['q-id'];
       include('./client/question-details.php');
   } else if (isset($_GET['c-id'])) {
       $cid = $_GET['c-id'];
       include('./client/questions.php');
   } else if (isset($_GET['u-id'])) {
       $uid = $_GET['u-id'];
       include('./client/questions.php');
   } else if (isset($_GET['latest'])) {
       include('./client/questions.php');
   } else if (isset($_GET['search'])) {
       $search = $_GET['search'];
       include('./client/questions.php');
   } else {
       include('./client/questions.php');
   }
?>
</body>
</html>
