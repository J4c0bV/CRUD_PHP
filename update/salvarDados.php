<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("../util.php");

   $conn = conecta("pgsql:host=localhost; dbname=turma72a; user=mcperes; 
                    password=ct1ct1");

   $linha = [ 'id'        => $_POST['id'],
        'nome'      => $_POST['nome'],
        'matricula' => $_POST['matricula'],
        'email'     => $_POST['email'],
        'data_nasc' => $_POST['data_nasc']];

   $sql = "update joaojacob set nome = :nome, matricula = :matricula, email = :email, data_nascimento = :data_nasc
           where id = :id"; 
   $update = $conn->prepare($sql); 
   $update->execute($linha);

   header('Location: ../index.php');     

?>
