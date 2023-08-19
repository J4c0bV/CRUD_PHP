<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("../util.php");
 
   $conn = conecta("pgsql:host=localhost; dbname=turma72a; user=mcperes; 
                    password=ct1ct1");
     
   $id = $_GET['id']; 

   $sql = "select * from joaojacob where id=$id";
     
   // faz um select basico
   $select = $conn->query($sql)->fetch();

   $id        = $select['id'];
   $nome      = $select['nome'];
   $matricula = $select['matricula'];
   $email     = $select['email'];
   $data_nasc = $select['data_nascimento'];
     
   $varHTML = "
     <form action='salvarDados.php' method='post'>
       <br>Id<br>
       <input type='text' name='id' value='$id'>
       <br>Nome<br>
       <input type='text' name='nome' value='$nome'>
       <br>Matricula<br>
       <input type='text' name='matricula' value='$matricula'>
       <br>Email<br>
       <input type='email' name='email' value='$email'>
       <br>Data de Nascimento<br>
       <input type='date' name='data_nasc' value='$data_nasc'>
       <input type='submit' value='Salvar'>

     </form>
     ";
     
   echo $varHTML;
   
?>
