<?php
require_once "../inc/funcoes-sessao.php";
require_once "../inc/funcoes-noticias.php";

// Verificando se o usuário pode acessar esta página
verificaAcesso();

// Pegando o id do usuário logado
$idUsuario = $_SESSION['id'];

// OBTER O ID DA NOTÍCIA QUE SERÁ EXCLUIDA
$idNoticia = $_GET['id'];

// Capturando o tipo do usuário logado
$tipoUsuario = $_SESSION['tipo'];

// CHAMAR/ EXECUTOR A FUNÇÃO QUE IRÁ FAZER O DELETE

excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

// REDIRECIONAR PARA A PÁGINA DE USUÁRIOS
header("location:noticias.php");
?>