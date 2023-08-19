<?php 
  //////  funcao de conexao
  //////  14-8-2023
  function conecta ($params) 
  {
    $varConn = new PDO($params);
    if (!$varConn) {
        echo "Nao foi possivel conectar";
    } else { return $varConn; }
  }
  /////////////////////////
?>