<?php
require "conecta.php";

/* upload vai receber o arquivo */
function upload($arquivo){
    /* Array para validação dos tipos permitidos */
    $tiposValidos = [
        "image/png", "image/jpeg", "image/gif", "image/svg+xml"
    ];

    /* Vamos verificar se o tipo de arquivo NÃO É um dos existentes no array tiposValidos */
    if( !in_array($arquivo['type'], $tiposValidos) ){
        echo "<script>
            alert('Formato inválido!');
            history.back();
            </script>";
        exit;
    }

    /* Pegando apenas o nome/extensão do arquivo */    
    $nome = $arquivo['name'];

    /* Obtendo do servidor o local/nome temporário para o processo de upload. Verificação de segurança do servidor. */
    $temporario = $arquivo['tmp_name'];

    /* Definindo da pasta de destino + nome do arquivo da imagem. O pontinho é a concatenação feita via php */
    $destino = "../imagens/".$nome;

    /* Movendo o arquivo/imagem da área temporária para a pasta de destino indicada (imagens) */
    move_uploaded_file($temporario, $destino);
}

function inserirNoticia($conexao){}

function lerNoticias($conexao){}

function lerUmaNoticia($conexao){}

function atualizarNoticia($conexao){}

function excluirNoticia($conexao){}