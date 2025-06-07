<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detalhe do PMOC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/../../assets/js/pmoc.js"></script>
</head>

<body class="bg-gradient-to-b from-blue-100 to-blue-50 min-h-screen flex flex-col font-sans">

  <?php include __DIR__ . '/../shared/navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-5xl mx-auto space-y-10">

      <!-- PMOC Info -->
      <section>
        <h1 class="text-4xl font-extrabold text-primary mb-6 flex items-center gap-2">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a8 8 0 10-16 0 8 8 0 0016 0z" />
          </svg>
          <?= htmlspecialchars($pmoc->getName()); ?>
        </h1>

        <div class="space-y-3 text-gray-700">
          <p>
            <span class="font-semibold text-primary">Data de Criação:</span>
            <?= htmlspecialchars($pmoc->getCreation_date()) ?>
          </p>
          <p>
            <span class="font-semibold text-primary">Endereço de Serviço:</span>
            <?= htmlspecialchars($pmoc->getService_address()) ?>
          </p>
          <p>
            <span class="font-semibold text-primary">Cliente:</span>
            <?= htmlspecialchars($client->getName()) ?>
          </p>
          <p>
            <span class="font-semibold text-primary">Telefone do Cliente:</span>
            <?= htmlspecialchars($client->getPhone()) ?>
          </p>
        </div>

        <div class="flex gap-4 mt-8">
          <button onclick="togglePmocEdit()" class="bg-accent text-white font-semibold px-5 py-2 rounded-xl hover:bg-yellow-400 transition-shadow shadow-md hover:shadow-lg">
            Editar PMOC
          </button>
          <button onclick="deletePmoc(<?= $pmoc->getId(); ?>)" class="bg-danger text-white font-semibold px-5 py-2 rounded-xl hover:bg-red-700 transition-shadow shadow-md hover:shadow-lg">
            Excluir PMOC
          </button>
        </div>

        <!-- Formulário de edição PMOC e Cliente -->
        <form id="pmocEditForm" action="?route=pmoc_update" method="POST" class="mt-6 space-y-4 hidden bg-blue-50 p-6 rounded-2xl shadow-inner">
          <h3 class="text-xl font-bold text-primary">Editar PMOC</h3>
          <input type="hidden" name="id_pmoc" value="<?= $pmoc->getId(); ?>">

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Nome do PMOC</label>
            <input type="text" name="name" value="<?= htmlspecialchars($pmoc->getName()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:outline-none shadow-sm" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Endereço de Serviço</label>
            <input type="text" name="service_address" value="<?= htmlspecialchars($pmoc->getService_address()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:outline-none shadow-sm" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Data de Criação</label>
            <input type="date" name="creation_date" value="<?= htmlspecialchars($pmoc->getCreation_date()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:outline-none shadow-sm" required>
          </div>

          <h3 class="text-xl font-bold text-primary mt-6">Editar Cliente</h3>
          <input type="hidden" name="id_client" value="<?= $client->getId(); ?>">

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Nome do Cliente</label>
            <input type="text" name="client_name" value="<?= htmlspecialchars($client->getName()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:outline-none shadow-sm" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Telefone do Cliente</label>
            <input type="text" name="client_phone" value="<?= htmlspecialchars($client->getPhone()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:outline-none shadow-sm" required>
          </div>

          <button type="submit" class="bg-green-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-green-700 transition-shadow shadow-md hover:shadow-lg mt-4">
            Salvar
          </button>
        </form>
      </section>

      <!-- Air Conditioners -->
      <section>
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-3xl font-bold text-secondary flex items-center gap-2">
            <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17l-3 3L3 15.25m18 1.75L15.75 15 12 18.75m0-13.5L15.75 9 21 3.75M9.75 7L3 3.75 6.75 9M12 12h.01" />
            </svg>
            Aparelhos de Ar-Condicionado
          </h2>
          <button onclick="toggleAddForm()" class="bg-green-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-green-700 transition-shadow shadow-md">
            + Adicionar Ar-Condicionado
          </button>
        </div>

        <!-- Formulário de Adicionar Ar Condicionado -->
        <form id="addAirConditionerForm" action="?route=airconditioner_create&id_pmoc=<?= $pmoc->getId(); ?>" method="POST" class="space-y-3 hidden bg-blue-50 p-6 rounded-2xl shadow-inner mb-6">
          <input type="hidden" name="id_pmoc" value="<?= $pmoc->getId(); ?>">

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Marca</label>
            <input type="text" name="brand" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">BTUs</label>
            <input type="number" name="btus" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary" required>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Descrição</label>
            <textarea name="description" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary" required></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Localização</label>
            <input type="text" name="location" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary" required>
          </div>

          <button type="submit" class="bg-blue-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-blue-700 transition-shadow shadow-md">
            Salvar
          </button>
        </form>

        <div class="space-y-6">
          <?php if (!empty($airConditioners)): ?>
            <?php foreach ($airConditioners as $airConditioner): ?>
              <div class="border border-blue-200 rounded-2xl p-6 bg-white hover:bg-blue-50 transition duration-300 shadow-md">
                <div class="flex justify-between items-start">
                  <div>
                    <h3 class="text-xl font-bold text-primary mb-2">
                      <?= htmlspecialchars($airConditioner->getBrand()); ?> - <?= htmlspecialchars($airConditioner->getBtus()); ?> BTUs
                    </h3>
                    <p class="text-gray-600 mb-1">
                      <span class="font-semibold">Descrição:</span>
                      <?= nl2br(htmlspecialchars($airConditioner->getDescription())); ?>
                    </p>
                    <p class="text-gray-600">
                      <span class="font-semibold">Localização:</span>
                      <?= htmlspecialchars($airConditioner->getLocation()); ?>
                    </p>
                  </div>
                  <div class="flex flex-col gap-2">
                    <button onclick="toggleEditForm(<?= $airConditioner->getId(); ?>)" class="bg-accent text-white px-4 py-2 rounded-xl hover:bg-yellow-400 transition-shadow shadow-md">
                      Editar
                    </button>
                    <button onclick="deleteAirConditioner(<?= $_GET['id_pmoc'] ?>,<?= $airConditioner->getId(); ?>)" class="bg-danger text-white px-4 py-2 rounded-xl hover:bg-red-700 transition-shadow shadow-md">
                      Excluir
                    </button>
                  </div>
                </div>
                <form id="editForm-<?= $airConditioner->getId(); ?>" action="?route=airconditioner_update" method="POST" class="mt-4 space-y-3 hidden bg-blue-50 p-4 rounded-xl shadow-inner">
                  <input type="hidden" name="id_airconditioner" value="<?= $airConditioner->getId(); ?>">
                  <input type="hidden" name="id_pmoc" value="<?= $_GET['id_pmoc']; ?>">
                  <input type="text" name="brand" value="<?= htmlspecialchars($airConditioner->getBrand()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary">
                  <input type="number" name="btus" value="<?= htmlspecialchars($airConditioner->getBtus()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary">
                  <textarea name="description" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary"><?= htmlspecialchars($airConditioner->getDescription()); ?></textarea>
                  <input type="text" name="location" value="<?= htmlspecialchars($airConditioner->getLocation()); ?>" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary">
                  <button type="submit" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-xl hover:bg-green-700 transition-shadow shadow-md">
                    Salvar
                  </button>
                </form>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-gray-500">Nenhum aparelho de ar-condicionado cadastrado para este PMOC.</p>
          <?php endif; ?>
        </div>
      </section>

    </div>
  </main>

  <?php include __DIR__ . '/../shared/footer.php'; ?>

</body>
</html>
