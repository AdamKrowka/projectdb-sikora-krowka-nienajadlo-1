
<?php
session_start();
include 'connection.php';
$projectMessage = $_POST["messageText"];
// try to connect with database
try {
    $dbh = new PDO($db_dsn, $db_username, $db_password);
    $connection_status = true;
} 

// exception
catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    $connection_status = false;
    die();
}

if($connection_status){
    try{
        $stmt = $dbh->prepare("INSERT INTO projectchat (project_ID, employee_ID, message) VALUES (".$_GET['currentProjectID'].",".$_SESSION['id'].",'".$projectMessage."')"); 
        $stmt->execute();
        header("Location:../SUBPAGES/dashboard.php");
        
        }
    
    catch(PDOException $e){
        print("Can't execute this query!");
    }
}
?>
