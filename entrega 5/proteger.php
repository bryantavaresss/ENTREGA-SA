<?php
/*
  includes/proteger.php — exige sessão ativa.
  Coloque no TOPO de toda página interna, antes de qualquer HTML.

  Defina $raiz ANTES do require, para o redirecionamento achar o login:
    página na raiz do projeto:      $raiz = '';
    página dentro de uma pasta:     $raiz = '../';
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
}

// Páginas internas não devem ficar guardadas no cache do navegador:
// sem isso, o botão "voltar" mostraria a tela mesmo depois do logout.
header('Cache-Control: no-store');

if (!isset($_SESSION['usuario_id'], $_SESSION['login'], $_SESSION['papel'])) {
    header('Location: ' . ($raiz ?? '') . 'index.php');
    exit;
}
