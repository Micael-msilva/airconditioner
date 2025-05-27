<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PMOC - AC Technician</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include 'navbar.php'; ?>

  <?php
    // Simulando PMOCs cadastrados
    $pmocs = [
      ['id' => 1, 'name' => 'PMOC - Shopping Center', 'date' => '2025-05-25'],
      ['id' => 2, 'name' => 'PMOC - Hospital São José', 'date' => '2025-05-20'],
      ['id' => 3, 'name' => 'PMOC - Escola Técnica', 'date' => '2025-05-18'],
    ];
  ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">PMOC - Planos de Manutenção</h1>

      <!-- Botão de criar PMOC -->
      <div class="mb-6">
        <a 
          href="create_pmoc.php" 
          class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition"
        >
          + Criar Novo PMOC
        </a>
      </div>

      <!-- Lista de PMOCs -->
      <div class="space-y-4">
        <?php foreach ($pmocs as $pmoc): ?>
          <a 
            href="pmoc_detail.php?id=<?= urlencode($pmoc['id']); ?>"
            class="block border border-blue-200 p-4 rounded-xl bg-white shadow-sm hover:bg-blue-100 transition"
          >
            <h2 class="text-xl font-semibold text-blue-700"><?= htmlspecialchars($pmoc['name']); ?></h2>
            <p class="text-sm text-blue-500">Data: <?= htmlspecialchars($pmoc['date']); ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <footer class="bg-white p-4 text-center shadow-md">
    <p class="text-sm text-blue-700">&copy; 2025 AC Technician Platform. All rights reserved.</p>
  </footer>

</body>
</html>
