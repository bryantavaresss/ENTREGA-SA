<?php
/*
  config/conexao.php — abre a conexão com o MySQL.
  É o ÚNICO arquivo que conhece servidor, usuário, senha e banco.
  As outras páginas apenas fazem:  require __DIR__ . '/../config/conexao.php';
  e passam a ter a variável $conexao.

  Forma escolhida: mysqli orientado a objetos (a mesma do projeto base e das aulas).
*/

$db_servidor = 'localhost';
$db_usuario  = 'root';
$db_senha    = '';            // no XAMPP o root vem sem senha
$db_banco    = 'ferrovias';

// Desde o PHP 8.1 o mysqli lança exceção quando a conexão falha, e o if com
// connect_error abaixo nunca rodaria. Esta linha liga o modo clássico: os erros
// viram valores de retorno (false / connect_error) e nós tratamos cada um.
mysqli_report(MYSQLI_REPORT_OFF);

$conexao = new mysqli($db_servidor, $db_usuario, $db_senha, $db_banco);

// Verifica se a conexão foi realmente criada
if ($conexao->connect_error) {
    http_response_code(500);
    header('Content-Type: text/html; charset=UTF-8');
    exit(
        '<p><strong>Não foi possível conectar ao banco de dados.</strong></p>'
        . '<p>Confira se o MySQL está ligado no painel do XAMPP, se o banco "'
        . htmlspecialchars($db_banco, ENT_QUOTES, 'UTF-8')
        . '" existe (execute banco/script.sql) e se usuário e senha estão corretos.</p>'
        . '<p>Detalhe técnico: ' . htmlspecialchars($conexao->connect_error, ENT_QUOTES, 'UTF-8') . '</p>'
    );
}

// Sem isso, acentos viram símbolos estranhos
if (!$conexao->set_charset('utf8mb4')) {
    http_response_code(500);
    header('Content-Type: text/html; charset=UTF-8');
    exit('<p><strong>Não foi possível definir o conjunto de caracteres utf8mb4 na conexão.</strong></p>');
}

// A senha do banco não precisa continuar na memória das páginas que incluem este arquivo
unset($db_servidor, $db_usuario, $db_senha, $db_banco);
