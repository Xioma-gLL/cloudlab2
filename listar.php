<!doctype html>
<html lang="es">
<head>
  <title>Listar Personas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    :root {
      --bg: #0a0a0f;
      --surface: #13131a;
      --border: #2a2a3d;
      --accent: #7c3aed;
      --accent2: #06b6d4;
      --text: #e2e8f0;
      --muted: #64748b;
      --danger: #ef4444;
    }
    * { box-sizing: border-box; }
    body { background: var(--bg); color: var(--text); font-family: 'Syne', sans-serif; min-height: 100vh; }
    .topbar { display: flex; align-items: center; justify-content: space-between; padding: 1rem 2rem; border-bottom: 1px solid var(--border); background: var(--surface); position: sticky; top: 0; z-index: 100; }
    .topbar-brand { display: flex; align-items: center; gap: 10px; font-weight: 800; font-size: 1.1rem; color: var(--text); text-decoration: none; }
    .topbar-brand .dot { width: 10px; height: 10px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 10px var(--accent); animation: pulse 2s infinite; }
    @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.4; } }
    .topbar nav a { color: var(--muted); text-decoration: none; font-size: 0.85rem; margin-left: 1.5rem; font-weight: 600; transition: color 0.2s; }
    .topbar nav a:hover, .topbar nav a.active { color: var(--accent2); }
    .page-hero { padding: 3rem 2rem 2rem; max-width: 1200px; margin: 0 auto; }
    .page-hero h1 { font-size: 2.8rem; font-weight: 800; line-height: 1.1; background: linear-gradient(135deg, #fff 30%, var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .page-hero p { color: var(--muted); font-family: 'Space Mono', monospace; font-size: 0.8rem; margin-top: 0.5rem; }
    .stats-row { display: flex; gap: 1rem; max-width: 1200px; margin: 0 auto 2rem; padding: 0 2rem; flex-wrap: wrap; }
    .stat-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 1rem 1.5rem; flex: 1; min-width: 140px; }
    .stat-card .label { font-size: 0.7rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Space Mono', monospace; }
    .stat-card .value { font-size: 2rem; font-weight: 800; color: var(--accent2); line-height: 1.2; }
    .controls { max-width: 1200px; margin: 0 auto 1.5rem; padding: 0 2rem; display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
    .search-box { flex: 1; min-width: 200px; position: relative; }
    .search-box input { width: 100%; background: var(--surface); border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: 0.6rem 1rem 0.6rem 2.5rem; font-family: 'Space Mono', monospace; font-size: 0.85rem; outline: none; transition: border-color 0.2s; }
    .search-box input:focus { border-color: var(--accent); }
    .search-box input::placeholder { color: var(--muted); }
    .search-box .icon { position: absolute; left: 0.8rem; top: 50%; transform: translateY(-50%); color: var(--muted); }
    .btn-add { background: var(--accent); color: #fff; border: none; border-radius: 8px; padding: 0.6rem 1.2rem; font-family: 'Syne', sans-serif; font-weight: 700; font-size: 0.85rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: opacity 0.2s; }
    .btn-add:hover { opacity: 0.85; color: #fff; }
    .table-wrapper { max-width: 1200px; margin: 0 auto 3rem; padding: 0 2rem; }
    .table-card { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    .table-card table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
    .table-card thead tr { background: rgba(124,58,237,0.12); border-bottom: 1px solid var(--border); }
    .table-card thead th { padding: 1rem 1.25rem; text-align: left; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--muted); font-family: 'Space Mono', monospace; font-weight: 400; }
    .table-card tbody tr { border-bottom: 1px solid rgba(42,42,61,0.7); transition: background 0.15s; }
    .table-card tbody tr:last-child { border-bottom: none; }
    .table-card tbody tr:hover { background: rgba(124,58,237,0.06); }
    .table-card tbody td { padding: 0.9rem 1.25rem; vertical-align: middle; }
    .avatar { width: 34px; height: 34px; border-radius: 8px; background: linear-gradient(135deg, var(--accent), var(--accent2)); display: inline-flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.75rem; color: #fff; margin-right: 0.6rem; flex-shrink: 0; }
    .name-cell { display: flex; align-items: center; }
    .badge-doc { background: rgba(6,182,212,0.12); color: var(--accent2); border-radius: 6px; padding: 2px 8px; font-family: 'Space Mono', monospace; font-size: 0.78rem; }
    .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: 7px; border: 1px solid var(--border); background: transparent; color: var(--muted); font-size: 0.8rem; cursor: pointer; text-decoration: none; transition: all 0.15s; margin-right: 4px; }
    .action-btn:hover { border-color: var(--accent2); color: var(--accent2); }
    .action-btn.del:hover { border-color: var(--danger); color: var(--danger); }
    .empty-state { padding: 4rem 2rem; text-align: center; color: var(--muted); }
    .empty-state .icon-big { font-size: 3rem; margin-bottom: 1rem; opacity: 0.3; }
    #no-results { display: none; padding: 2rem; text-align: center; color: var(--muted); font-family: 'Space Mono', monospace; font-size: 0.8rem; }
    footer { border-top: 1px solid var(--border); padding: 2rem; text-align: center; color: var(--muted); font-family: 'Space Mono', monospace; font-size: 0.75rem; max-width: 1200px; margin: 0 auto; }
  </style>
</head>
<body>

<?php
include("conexion.php");
$con = conexion();

$sql    = "SELECT * FROM persona ORDER BY idpersona ASC";
$result = pg_query($con, $sql);

if (!$result) {
    die("<div style='color:red;padding:2rem;font-family:monospace;'>Error: " . pg_last_error($con) . "</div>");
}

$total = pg_num_rows($result);
?>

<div class="topbar">
  <a class="topbar-brand" href="index.php">
    <span class="dot"></span>
    <img src="index2.png" style="width:22px;border-radius:4px;" alt="logo">
    Index
  </a>
  <nav>
    <a href="index.php">Registrar</a>
    <a href="actualizar.php">Actualizar</a>
    <a href="eliminar.php">Eliminar</a>
    <a href="listar.php" class="active">Listar</a>
  </nav>
</div>

<div class="page-hero">
  <h1>Registros<br>en Base de Datos</h1>
  <p>PostgreSQL · Render · PHP &nbsp;|&nbsp; tabla: persona</p>
</div>

<div class="stats-row">
  <div class="stat-card">
    <div class="label">Total registros</div>
    <div class="value"><?= $total ?></div>
  </div>
  <div class="stat-card">
    <div class="label">Base de datos</div>
    <div class="value" style="font-size:1rem;padding-top:6px;font-family:'Space Mono',monospace;">test_d05m</div>
  </div>
  <div class="stat-card">
    <div class="label">Estado</div>
    <div class="value" style="font-size:1rem;padding-top:6px;color:#22c55e;">
      <?= $con ? '● Online' : '<span style="color:var(--danger)">● Offline</span>' ?>
    </div>
  </div>
</div>

<div class="controls">
  <div class="search-box">
    <span class="icon">🔍</span>
    <input type="text" id="searchInput" placeholder="Buscar por nombre, documento, celular...">
  </div>
  <a href="index.php" class="btn-add">＋ Nuevo registro</a>
</div>

<div class="table-wrapper">
  <div class="table-card">
    <?php if ($total === 0): ?>
      <div class="empty-state">
        <div class="icon-big">📭</div>
        <p>No hay registros en la base de datos.</p>
        <a href="index.php" class="btn-add" style="display:inline-flex;margin-top:1rem;">＋ Agregar el primero</a>
      </div>
    <?php else: ?>
    <table id="personaTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Documento</th>
          <th>Nombre completo</th>
          <th>Dirección</th>
          <th>Celular</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = pg_fetch_assoc($result)):
          $iniciales = strtoupper(substr($row['nombre'], 0, 1) . substr($row['apellido'], 0, 1));
        ?>
        <tr>
          <td style="color:var(--muted);font-family:'Space Mono',monospace;font-size:0.75rem;"><?= $row['idpersona'] ?></td>
          <td><span class="badge-doc"><?= htmlspecialchars($row['documento']) ?></span></td>
          <td>
            <div class="name-cell">
              <div class="avatar"><?= $iniciales ?></div>
              <div style="font-weight:600;"><?= htmlspecialchars($row['nombre']) ?> <?= htmlspecialchars($row['apellido']) ?></div>
            </div>
          </td>
          <td style="color:var(--muted);"><?= htmlspecialchars($row['direccion']) ?></td>
          <td style="font-family:'Space Mono',monospace;font-size:0.8rem;"><?= htmlspecialchars($row['celular']) ?></td>
          <td>
            <a href="actualizar.php?id=<?= $row['idpersona'] ?>" class="action-btn" title="Editar">✏️</a>
            <a href="eliminar.php?id=<?= $row['idpersona'] ?>" class="action-btn del" title="Eliminar"
               onclick="return confirm('¿Eliminar a <?= htmlspecialchars($row['nombre']) ?>?')">🗑️</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <div id="no-results">No se encontraron resultados.</div>
    <?php endif; ?>
  </div>
</div>

<footer>
  <img src="https://www.svgrepo.com/show/508391/uncle.svg" width="18" height="18" style="opacity:.4;vertical-align:middle;margin-right:6px;">
  &copy; 2023-1 &nbsp;·&nbsp; PostgreSQL + PHP + Render
</footer>

<script>
  const input = document.getElementById('searchInput');
  if (input) {
    input.addEventListener('input', function () {
      const q = this.value.toLowerCase();
      const rows = document.querySelectorAll('#personaTable tbody tr');
      let visible = 0;
      rows.forEach(row => {
        const match = row.innerText.toLowerCase().includes(q);
        row.style.display = match ? '' : 'none';
        if (match) visible++;
      });
      document.getElementById('no-results').style.display = visible === 0 ? 'block' : 'none';
    });
  }
</script>

</body>
</html>