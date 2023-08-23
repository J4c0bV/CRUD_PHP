<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("../util.php");
 
   echo "<link rel='stylesheet' href='../style.css'>";
   $conn = conecta("pgsql:host=localhost; dbname=turma72a; user=mcperes; 
                    password=ct1ct1");
     
   $id = $_GET['id']; 

   if($id != ""){
    $sql = "select * from joaojacob where id=$id";
     
    // faz um select basico
    $select = $conn->query($sql)->fetch();
 
    $id        = $select['id'];
    $nome      = $select['nome'];
    $matricula = $select['matricula'];
    $email     = $select['email'];
    $data_nasc = $select['data_nascimento'];
      
    $varUpdate = "
      <form action='salvarDados.php' method='post' class = 'update';>
        <br>Id<br>
        <input type='text' name='id' value='$id' readonly>
        <br>Nome<br>
        <input type='text' name='nome' value='$nome'>
        <br>Matricula<br>
        <input type='text' name='matricula' value='$matricula'>
        <br>Email<br>
        <input type='email' name='email' value='$email'>
        <br>Data de Nascimento<br>
        <input type='date' name='data_nasc' value='$data_nasc'>
        <input type='submit' value='Salvar'>
        
      </form>";
      echo $varUpdate;
   }else if($id == ""){
    $varInsert = "
    <form action='../insert/Insert.php' method='post'; class='insert'>
    <label for='Id'>Id</label><br>
    <input type='number' id='Id' name='idlocal'><br>
    <label for='Nome'>Nome</label><br>
    <input type='text' id='Nome' name='nomelocal'><br>
    <label for='Matricula'>Matricula</label><br>
    <input type='number' id='Matricula' name='matriculalocal'><br>
    <label for='Email'>Email</label><br>
    <input type='email' id='Email' name='emaillocal'><br>
    <label for='Data_Nasc'>Data nascimento</label><br>
    <input type='date' id='Data_Nasc' name='datelocal'>

    <button type='submit'>Enviar</button>
  </form>";

    echo $varInsert;
   }


   echo "<a href='../index.php'><img src='../imagens/cancel.png' alt='cancelar'></a>";
   
?>
