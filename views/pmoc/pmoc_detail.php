<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PMOC Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include __DIR__ . '/../shared/navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">
        Detalhes do PMOC - ID <?= htmlspecialchars($id); ?>
      </h1>

      <h2 class="text-2xl font-semibold text-blue-600 mb-4">
        Aparelhos de Ar-Condicionado
      </h2>

      <div class="space-y-6">
        <?php if (!empty($airConditioners)): ?>
          <?php foreach ($airConditioners as $airConditioner): ?>
            <div class="border border-blue-200 rounded-xl p-6 bg-blue-100 hover:bg-blue-200 transition duration-300 shadow-sm">
              <h3 class="text-xl font-semibold text-blue-800 mb-2">
                <?= htmlspecialchars($airConditioner->getBrand()); ?> - <?= htmlspecialchars($airConditioner->getBtus()); ?> BTUs
              </h3>

              <p class="text-gray-700 mb-2">
                <span class="font-semibold">Descrição:</span> 
                <?= nl2br(htmlspecialchars($airConditioner->getDescription())); ?>
              </p>

              <p class="text-gray-700">
                <span class="font-semibold">Localização:</span> 
                <?= htmlspecialchars($airConditioner->getLocation()); ?>
              </p>

            <button>Editar</button>

            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-500">Nenhum aparelho de ar-condicionado cadastrado para este PMOC.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/../shared/footer.php'; ?>

  <script src="../../assets/js/pmoc.js"></script>
</body>
</html>
