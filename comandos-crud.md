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
