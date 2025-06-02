<?php
// views/pmoc.php
// Espera $pmocs vindo do controller
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PMOC - AC Technician</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include __DIR__ . '/../shared/navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">PMOC - Planos de Manutenção</h1>

      <div class="mb-6 space-x-4">
        <a href="?route=pmoc_create" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition inline-block">+ Criar PMOC</a>
      </div>

      <div class="space-y-4">
        <?php foreach ($pmocs as $pmoc): ?>
          <div class="border border-blue-200 p-4 rounded-xl bg-white shadow-sm">
            <div class="flex justify-between items-center">
              <div>
                <h2 class="text-xl font-semibold text-blue-700">
                  <?= htmlspecialchars($pmoc->getName()); ?>
                </h2>
                <p class="text-blue-500">Criado em: <?= htmlspecialchars($pmoc->getCreation_date()); ?></p>
              </div>
              <a href="?route=pmoc_detail&id=<?= urlencode($pmoc->getId()); ?>" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition">
                Detalhes
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/../shared/footer.php'; ?>
</body>
</html>
