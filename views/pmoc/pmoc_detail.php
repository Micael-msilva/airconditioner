<?php
$id = $_GET['id'] ?? null;

// Simulação de aparelhos de ar-condicionado dentro do PMOC
$airConditioners = [
    [
        'id' => 101,
        'name' => 'Split - Escritório',
        'last_clean' => '2025-05-15',
        'description' => 'Limpeza realizada no filtro e serpentina.',
    ],
    [
        'id' => 102,
        'name' => 'Cassete - Sala de Reunião',
        'last_clean' => '2025-05-10',
        'description' => 'Limpeza profunda com troca de filtros.',
    ],
    [
        'id' => 103,
        'name' => 'Duto - Corredor',
        'last_clean' => '2025-04-30',
        'description' => 'Limpeza completa e revisão do dreno.',
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PMOC Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleDetails(id) {
      const elem = document.getElementById('details-' + id);
      elem.classList.toggle('hidden');
    }
  </script>
</head>

<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include 'navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-3xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">Detalhes do PMOC - ID <?= htmlspecialchars($id); ?></h1>

      <h2 class="text-2xl font-semibold text-blue-600 mb-4">Aparelhos de Ar-Condicionado</h2>

      <div class="space-y-4">
        <?php foreach ($airConditioners as $ac): ?>
          <div class="border border-blue-200 p-4 rounded-xl bg-white shadow-sm">
            <div class="flex justify-between items-center">
              <div>
                <h3 class="text-xl font-semibold text-blue-700">
                  <?= htmlspecialchars($ac['name']); ?> (ID: <?= htmlspecialchars($ac['id']); ?>)
                </h3>
              </div>
              <button 
                onclick="toggleDetails(<?= htmlspecialchars($ac['id']); ?>)"
                class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition"
              >
                Detalhes
              </button>
            </div>

            <div id="details-<?= htmlspecialchars($ac['id']); ?>" class="mt-4 hidden">
              <p class="text-blue-700"><strong>Última limpeza:</strong> <?= htmlspecialchars($ac['last_clean']); ?></p>
              <p class="text-blue-500 mb-4"><strong>Descrição:</strong> <?= htmlspecialchars($ac['description']); ?></p>

              <div class="flex space-x-2">
                <a 
                  href="add_clean.php?ac_id=<?= urlencode($ac['id']); ?>&pmoc_id=<?= urlencode($id); ?>" 
                  class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 transition"
                >
                  + Adicionar Limpeza
                </a>
                <a 
                  href="delete_clean.php?ac_id=<?= urlencode($ac['id']); ?>&pmoc_id=<?= urlencode($id); ?>" 
                  class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition"
                >
                  Excluir Limpeza
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <footer class="bg-white p-4 text-center shadow-md">
    <p class="text-sm text-blue-700">&copy; 2025 AC Technician Platform. All rights reserved.</p>
  </footer>

</body>
</html>
