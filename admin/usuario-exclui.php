<?php
require_once "../inc/funcoes-sessao.php";
require_once "../inc/funcoes-usuarios.php";

// Verificando se o usuário pode acessar esta página
verificaAcesso();
verificaNivel();

// OBTER O ID DO USUÁRIO QUE SERÁ EXCLUIDO

$id = $_GET['id'];
// esse id vem de usuario.php, poderia ser outro nome como teste por exemplo

// CHAMAR/ EXECUTOR A FUNÇÃO QUE IRÁ FAZER O DELETE

excluirUsuario($conexao, $id);

// REDIRECIONAR PARA A PÁGINA DE USUÁRIOS
header("location:usuarios.php");
?>

