<?php
include('conn.php');
  session_unset($_SESSION['email']);
  session_destroy();
  header('location: ../index.html');
  exit();




?> 

<!-- 1248094 -->