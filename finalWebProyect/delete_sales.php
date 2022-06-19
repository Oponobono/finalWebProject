<?php 
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM sales WHERE index_venta = '$id'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('No se pudo eliminar el registro de la venta');
        }
        
        header('Location: sales.php');
    }
    

?>