<?php 
/* Script de conexão ao servidor de banco de dados
Necessários para que o Microblog possa usar o MySQL */

// Parâmeros para conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_dayane";

// Função para conexão com o servidor de banco de dados, colocamos dentro de uma variável abaixo conexao
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//
mysqli_set_charset($conexao, "utf8");

/* Fazendo um teste de conexão */
/* if ( !$conexao ) {
    // Deu problema? "Mate/Pare" a aplicação!
    die("Deu ruim: " .mysqli_connect_error());
} else {
    echo "Beleza, conectado...";
} 

comentamos esse if pois serviu apenas para testar se deu certo*/


?>