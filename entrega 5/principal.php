<?php
/*
  principal.php — primeira tela depois de entrar (o dashboard do sistema).
  Mesmo conteúdo e visual do dashboard.html original; agora só abre com sessão ativa.
*/

$raiz = '';   // esta página está na raiz do projeto
require __DIR__ . '/includes/proteger.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GoMobi — Dashboard</title>
  <link rel="icon" type="image/png" href="<?= $raiz ?>assets/img/favicon.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Lato:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= $raiz ?>assets/css/style.css" />
</head>

<body data-page="dashboard">

  <div class="app">

<?php require __DIR__ . '/includes/sidebar.php'; ?>

    <div class="main-column">
<?php require __DIR__ . '/includes/cabecalho.php'; ?>

      <!-- conteudo -->
      <main class="content">
        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">Real-time overview of railway operations</p>

        <div class="stats-grid">
          <div class="card stat-card">
            <div>
              <p class="stat-label">Active Trains</p>
              <p class="stat-value" id="stat-trens">12</p>
            </div>
            <div class="stat-icon blue">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="12" rx="3"/><line x1="5" y1="10" x2="19" y2="10"/><circle cx="8.5" cy="18" r="1.5"/><circle cx="15.5" cy="18" r="1.5"/><line x1="8" y1="15" x2="6" y2="18"/><line x1="16" y1="15" x2="18" y2="18"/></svg>
            </div>
          </div>
          <div class="card stat-card">
            <div>
              <p class="stat-label">Online Sensors</p>
              <p class="stat-value">47</p>
            </div>
            <div class="stat-icon green">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M8.5 8.5a5 5 0 0 0 0 7"/><path d="M15.5 8.5a5 5 0 0 1 0 7"/><path d="M5.5 5.5a9 9 0 0 0 0 13"/><path d="M18.5 5.5a9 9 0 0 1 0 13"/></svg>
            </div>
          </div>
          <div class="card stat-card">
            <div>
              <p class="stat-label">Active Alerts</p>
              <p class="stat-value">2</p>
            </div>
            <div class="stat-icon red">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v4"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/><circle cx="12" cy="17" r="0.5"/></svg>
            </div>
          </div>
          <div class="card stat-card">
            <div>
              <p class="stat-label">Average Speed</p>
              <p class="stat-value">85 km/h</p>
            </div>
            <div class="stat-icon purple">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 12 8 12 10 6 14 18 16 12 21 12"/></svg>
            </div>
          </div>
        </div>

        <div class="card alerts-card">
          <p class="alerts-title">Recent Alerts</p>
          <p class="no-alerts">No active alerts</p>
        </div>
      </main>
    </div>
  </div>

  <script src="<?= $raiz ?>assets/js/common.js"></script>
</body>
</html>
