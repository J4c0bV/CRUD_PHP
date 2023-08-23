<?php 
   include("../util.php");

    $conn = conecta("pgsql:host=localhost; dbname=turma72a; user=mcperes; 
                    password=ct1ct1");


    //linha de inserção no banco de dados
    $linha = ['idLocal' => $_POST['idlocal'], 'matriculaLocal' => $_POST['matriculalocal'], 'nomeLocal'=>$_POST['nomelocal'],'emailLocal'=>$_POST['emaillocal'], 'dateLocal'=>$_POST['datelocal'] ];

    //prepara a linha de insert
    $inserSql= 'insert into joaojacob values (:idLocal, :matriculaLocal, :nomeLocal, :emailLocal, :dateLocal)';
    $insert = $conn ->prepare($inserSql);

    //executa
    $insert->execute($linha);

    echo"deu certo";

    unset($insert);
    unset($conn);

    header('Location: ../index.php');       
?>