<?php
   include("../util.php");

    $conn = conecta("pgsql:host=localhost; dbname=turma72a; user=mcperes; 
                     password=ct1ct1");

    $id = $_GET['id'];
    $sql = "delete from joaojacob 
            where id = $id";
    $delete = $conn->prepare($sql);

    $delete->execute($idTeste);

    unset($delete);
    unset($conn);

    header('Location: ../index.php');
?>