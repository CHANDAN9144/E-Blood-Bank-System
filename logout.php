<?php
include 'dbconfig.php';
unset($_SESSION['member_id']);
session_destroy();
header('Location:../userlogin.php');


