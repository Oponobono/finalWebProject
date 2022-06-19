<?php 
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM customers WHERE identification = '$id'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('No se pudo eliminar el cliente');
        }
        
        header('Location: clients.php');
    }
    

?>