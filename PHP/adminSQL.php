<?php
include 'connection.php';

// form variables initialization and declaration
    $SQL =$_REQUEST['SQLComandLine'];

// try to connect with database
try {
    $dbh = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection_status = true;
    // print("Connection estabilished");
} 

// exception
catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    $connection_status = false;
    die();
}

if($connection_status){
    try{
        // database prepared statements
        $logIn = $dbh->prepare($SQL);
        $logIn->execute();
        print("<br> Query executed!");

        header("Location: ../SUBPAGES/dashboard.html");
    }
    catch(PDOException $e){
    var_dump($e->getMessage());
    }
}

?>