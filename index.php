<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);   
   
   include("util.php");

   /// coloca esse css fora e abre do jeito certo ok?
   echo "<link rel='stylesheet' href='style.css'>";
  echo"<center>";
   // faz conexao 
   $conn = conecta("pgsql:host=localhost; 
            dbname=turma72a; user=mcperes; 
            password=ct1ct1");
   
   $sql = "SELECT * FROM public.joaojacob
   ORDER BY nome ASC";
   
   // faz um select basico
   $select = $conn->query($sql);
   
   // enquanto houver registro leia em $linha
   echo "<table border='1' id='tabela'>";
   echo "<th>Id</th><th>Nome</th><th>Matricula</th><th>Email</th><th>Data Nascimento</th><th>Exclusão</th><th>Alteração</th>";

  while ( $linha = $select->fetch() )  
  {
     // imprime as posicoes de $linha que sao os campos carregados  
    $varId        = $linha['id'];
    $varNome      = $linha['nome'];
    $varMatricula = $linha['matricula'];
    $varEmail     = $linha['email'];
    $varDataNasc  = $linha['data_nascimento'];  

    echo "<tr>"; 
    echo "<td>$varId</td>
          <td>$varNome</td>
          <td>$varMatricula</td>
          <td>$varEmail</td>
          <td>$varDataNasc</td>
          <td>
            <a href='delete/delete.php?id=$varId'><img src='imagens/delete.png' alt='delete' width=30%></a>
          </td>
          <td>
            <a href='update/formAluno.php?id=$varId'><img src='imagens/altera.png' alt='altera' width=30%></a>
          </td>";
    echo "</tr>";       
  }

  echo "</table>";

  $imgInsert = "<a href='insert/insert.html'><img src='imagens/add.png' alt='insert' width=2%></a>";
  echo $imgInsert;

?>
