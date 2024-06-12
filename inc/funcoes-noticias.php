<?php
require "conecta.php";

function formataData($data){
    return date("d/m/Y H:i", strtotime($data));
}

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

function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId){

        $sql = "INSERT INTO noticias(
            titulo, texto, resumo, imagem, usuario_id)
            VALUES ('$titulo', '$texto', '$resumo', '$nomeImagem', $usuarioId)";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}

function lerNoticias($conexao, $idUsuario, $tipoUsuario){
    // aqui não deixamos * tudo, pois tras muita informação e só vamos usar, Titulo, Data e Autor
    // Admin pode ver TUDO
    if ($tipoUsuario == 'admin') {
        $sql = "SELECT 
                noticias.id, 
                noticias.titulo, 
                noticias.data,
                usuarios.nome 
            FROM noticias JOIN usuarios -- Aqui ocorre a junção/relação
            ON noticias.usuario_id = usuarios.id -- Aqui onde relaciona a FK com a PK
            ORDER BY data DESC";
    } else {
        // Editor pode ver SOMENTE a notícia que é DELE/DELA
        $sql = "SELECT titulo, data, id FROM noticias
                WHERE usuario_id = $idUsuario
                ORDER BY data DESC";
    }

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario){
    if ($tipoUsuario == 'admin') {
        // Pode carregar/ver qualquer notícia
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia";
    } else {
        /* Pode carregar/ver SOMENTE SUA notícia
         (basta saber qual notícia e qual usuário) */
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    /* Retornamos UM ÚNICO array associativo com os dados da notícia escolhida */
    return mysqli_fetch_assoc($resultado);
}

function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario){
    if ($tipoUsuario == 'admin') {
        // Pode atualizar qualquer notícia (basta saber qual notícia)
        $sql = "UPDATE noticias SET
                    titulo = '$titulo',
                    texto = '$texto',
                    resumo = '$resumo',
                    imagem = '$imagem'
                WHERE id = $idNoticia "; // PERIGOOOO!💀
    } else {
        /* Pode atualizar SOMENTE suas notícias (basta saber qual notícia E qual usuário) */
        $sql = "UPDATE noticias SET
                    titulo = '$titulo',
                    texto = '$texto',
                    resumo = '$resumo',
                    imagem = '$imagem'
                WHERE 
                id = $idNoticia 
                AND 
                usuario_id = $idUsuario"; // PERIGOOOO!💀
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirNoticia($conexao, $idNoticia, $idUsuario,$tipoUsuario){
    if ($tipoUsuario == 'admin') {
        // Pode EXCLUIR qualquer notícia (basta saber qual notícia)
    $sql = "DELETE FROM noticias
                WHERE id = $idNoticia";
    } else {
        /* Pode EXCLUIR SOMENTE suas notícias (basta saber qual notícia E qual usuário) */
    $sql = "DELETE FROM noticias
                WHERE id = $idNoticia
                AND
                usuario_id = $idUsuario";
    }                            
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));   
    // Obs.: NUNCA esqueça de passar pelo menos uma condição para o DELETE!
}

/* ************************************************** */

/* Funções usadas nas páginas PÚBLICAS do Microblog:
index, noticia, resultados */

// index.php
function lerTodasNoticias($conexao){
    $sql = "SELECT titulo, imagem, resumo, id
            FROM noticias ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));  
    
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// noticia.php
function lerNoticiaCompleta($conexao, $id){
    $sql = "SELECT noticias.id, 
                noticias.titulo, 
                noticias.data,
                noticias.imagem, 
                noticias.texto,
                usuarios.nome 
                FROM noticias JOIN usuarios -- Aqui ocorre a junção/relação
                ON noticias.usuario_id = usuarios.id -- Aqui onde relaciona a FK com a PK
                WHERE noticias.id = $id";
        
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));  
    
    return mysqli_fetch_assoc($resultado);   
}

// resultados.php
function busca($conexao, $termoDigitado){
    /* Atenção ao uso do operador LIKE em vez do igual e do operador coringa %.
        Ambos são necessários para que a busca seja mais abrangente, permitindo que o termo esteja em qualquer lugar dentro das colunas.*/
    $sql = "SELECT id, data, titulo, resumo
            FROM noticias
            WHERE titulo LIKE '%$termoDigitado%' OR
                  resumo LIKE '%$termoDigitado%' OR
                  texto LIKE '%$termoDigitado%'
            ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}