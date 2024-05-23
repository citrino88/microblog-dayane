# Comandos SQL para Modelagem Física

Implantar o banco de dados no servidor/back-end.

## Comandos SQL para modelagem

### Criar o banco de dados

```sql
CREATE DATABASE microblog_dayane CHARACTER SET utf8mb4;
```

### Criar tabela de usuários

```sql
CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin','editor') NOT NULL
);    
```
