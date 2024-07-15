
<?php
try{
    session_start();
    $dsn="mysql:dbname=bloodbankautomation;host=localhost";
    $username='root';
    $password='';
    
    $conn=new PDO($dsn,$username,$password,array(PDO::ATTR_AUTOCOMMIT=>false));
}
catch(Exception $ex){
    die($ex->getMessage());
}
