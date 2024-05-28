# Operações CRUD

## Resumo

- C: CREATE (INSERT)    -> inserir dados
- R: READ (SELECT)      -> ler/carregar dados
- U: UPDATE (UPDATE)    -> atualizar dados
- D: DELETE (DELETE)    -> excluir dados

## Exemplos

### INSERT na tabela de usuários

```sql
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Dayane', 'dayane@gmail.com', '123senac', 'admin');
```

```sql
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Cristina', 'cristina@gmail.com', '123senac', 'editor');
```

```sql
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Clara', 'clara@gmail.com', '123senac', 'editor');
```

### SELECT na tabela de usuários

```sql
SELECT nome, email FROM usuarios;
```

```sql
SELECT nome, email FROM usuarios WHERE tipo = 'admin';
```

```sql
SELECT * FROM usuarios WHERE id>1;
```

### UPDATE na tabela de usuários

```sql
UPDATE usuarios SET tipo = 'editor'
WHERE id = 1;

-- Obs.: NUNCA esqueça de passar pelo menos uma condição para UPDATE!
```

### DELETE na tabela de usuários
```sql
DELETE FROM usuarios WHERE id = 2;
-- Obs.: NUNCA esqueça de passar pelo menos uma condição para o DELETE!
```

```sql
-- Abaixo inserimos mais dois usuarios
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Davi', 'davi@gmail.com', '123456', 'admin');
```
```sql
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Laura Luísa', 'lauraluisa@gmail.com', '456789', 'editor');
```

```sql
SELECT id, nome, tipo FROM usuarios;
```

## Exemplo de tabela de notícias

### Inserir notícias

```sql
INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Meu pai ganhou na mega-sena',
    'Jogou bons números e bla bla bla',
    'Vai pegar o prêmio',
    'premio.jpg',
    1
);
```
```sql
INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Meu irmão virou um excelente design 3D',
    'Estudou muito e se aperfeiçoou fazendo bons cursos na área',
    'Virou o melhor design 3D',
    'irmao.jpg',
    3
);
```
```sql
INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Cursos de gastronomia, panificação e confeitaria no Senac',
    'Os alunos são os mais felizes fazendo cursos para fazer todo tipo de comida, doce ou pão',
    'Área de culinária no Senac é referência',
    'culinaria.jpg',
    4
);
```
```sql
INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Será lançado filmes antes de O Hobbit',
    'Fã estão muito felizes após o anúncio de novos filmes do mesmo autor de O Hobbit',
    'Filmes novos serão lançados',
    'filmes.jpg',
    5
);
```

### Select em notícias
```sql
SELECT titulo, data FROM noticias;
```

```sql
SELECT titulo, data FROM noticias ORDER BY data DESC;
-- Usamos o ORDER BY data DESC para classificar em ordem decrescente pela data
```

### SELECT com JOIN (consulta com junção de tabelas)
**Objetivo** realizar uma consulta que mostre a data e o título da notícia **e** o nome do autor da notícia.

````sql
SELECT
    noticias.data,
    noticias.titulo,
    usuarios.nome
FROM noticias JOIN usuarios 
ON noticias.usuario_id = usuarios.id;   
```
