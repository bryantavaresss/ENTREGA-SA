-- banco/script.sql — criação e carga do banco do sistema de ferrovias (GoMobi).
-- Como executar: phpMyAdmin → aba "SQL" → colar e executar, ou aba "Importar".
-- Pode ser executado mais de uma vez: não apaga nada e não duplica o administrador.

CREATE DATABASE IF NOT EXISTS ferrovias
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE ferrovias;

-- Usuários do sistema.
-- senha:  VARCHAR(255) porque o hash do password_hash() passa de 60 caracteres e pode crescer.
-- papel:  ENUM, então o próprio banco recusa um papel inválido.
--         A lista precisa ser a mesma de PAPEIS em includes/permissao.php.
-- login:  UNIQUE; guarda o e-mail usado para entrar.
CREATE TABLE IF NOT EXISTS usuario (
  id     INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome   VARCHAR(100) NOT NULL,
  login  VARCHAR(100) NOT NULL,
  senha  VARCHAR(255) NOT NULL,
  papel  ENUM('administrador', 'operador', 'tecnico') NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_usuario_login (login)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;

-- Administrador inicial (o primeiro usuário não é cadastrado pela tela).
-- A senha NÃO está aqui: só o hash dela.
-- Senha inicial: Admin@2026. Para usar outra senha, gere um novo hash no terminal do XAMPP:
--   C:\xampp\php\php.exe -r "echo password_hash('sua_senha', PASSWORD_DEFAULT);"
-- e troque o texto entre aspas na linha abaixo.
INSERT IGNORE INTO usuario (nome, login, senha, papel) VALUES
  ('Administrador', 'admin@gomobi.com', '$2y$10$2G94syXwCmD2ISTqh7I7SuFizHWkS.hWXlxLViU2K.AqS1zykyTda', 'administrador');
