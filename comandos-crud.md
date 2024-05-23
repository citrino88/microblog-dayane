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

