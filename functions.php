<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "oishiike-ki";

$conn = mysqli_connect($servername, $username, $password, $database);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>