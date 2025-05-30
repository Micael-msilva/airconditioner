<?php
session_start();

require_once __DIR__ . '/../../models/Client.php';
require_once __DIR__ . '/../../models/Technician.php';
require_once __DIR__ . '/../../models/Budget.php';


// Mock AirConditioner class if not present
if (!class_exists('AirConditioner')) {
    class AirConditioner {
        // Minimal stub for demonstration
    }
}

// Simulação: lista de orçamentos pré-existentes
if (!isset($_SESSION['budgets'])) {
    $client1 = new Client('Empresa XYZ', '(11) 99999-1111', 'Rua A, 123');
    $client2 = new Client('Residencial ABC', '(22) 88888-2222', 'Rua B, 456');
    $technician = new Technician('João Técnico', '12345678900', '(33) 77777-3333', 'Rua C, 789', 'CREA1234');
    $airConditioner = new AirConditioner();

    $_SESSION['budgets'] = [
        new Budget(1, $client1, $technician, $airConditioner, $client1->getServiceAddress(), '2025-05-25', 'Pendente'),
        new Budget(2, $client2, $technician, $airConditioner, $client2->getServiceAddress(), '2025-05-20', 'Pendente'),
    ];
}

// Tratamento de envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client = new Client($_POST['client_name'], '', $_POST['service_address']);
    $technician = new Technician('João Técnico', '12345678900', '(33) 77777-3333', 'Rua C, 789', 'CREA1234');
    $airConditioner = new AirConditioner();

    $newBudget = new Budget(
        count($_SESSION['budgets']) + 1,
        $client,
        $technician,
        $airConditioner,
        $_POST['service_address'],
        $_POST['budget_date'],
        'Pendente'
    );
    $newBudget->setDescription($_POST['description']);
    $newBudget->setValue($_POST['value']);
    $_SESSION['budgets'][] = $newBudget;
}

// Recupera lista
$budgets = $_SESSION['budgets'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orçamentos - AC Technician</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleForm() {
      const form = document.getElementById('createBudgetForm');
      form.classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include 'navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">Orçamentos</h1>

      <div class="mb-6 space-x-4">
        <button onclick="toggleForm()" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">+ Criar Orçamento</button>
      </div>

      <!-- Formulário escondido -->
      <div id="createBudgetForm" class="hidden mb-6 p-4 bg-blue-100 rounded-lg">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Novo Orçamento</h2>
        <form method="POST" class="space-y-4">

          <div>
            <label class="block text-blue-700 font-semibold">Nome do Cliente</label>
            <input type="text" name="client_name" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="block text-blue-700 font-semibold">Endereço do Serviço</label>
            <input type="text" name="service_address" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="block text-blue-700 font-semibold">Descrição</label>
            <input type="text" name="description" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="block text-blue-700 font-semibold">Valor</label>
            <input type="number" step="0.01" name="value" required class="w-full p-2 border rounded">
          </div>

          <div>
            <label class="block text-blue-700 font-semibold">Data do Orçamento</label>
            <input type="date" name="budget_date" required class="w-full p-2 border rounded">
          </div>



          <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
            Salvar Orçamento
          </button>
        </form>
      </div>

      <h2 class="text-2xl font-semibold text-blue-600 mb-4">Lista de Orçamentos</h2>

      <div class="space-y-4">
        <?php foreach ($budgets as $budget): ?>
          <a href="budget_detail.php?id=<?= urlencode($budget->getId()); ?>" class="block border border-blue-200 p-4 rounded-xl bg-white shadow-sm hover:bg-blue-100 transition">
            <h3 class="text-xl font-semibold text-blue-700">Cliente: <?= htmlspecialchars($budget->getClient()->getName()); ?></h3>
            <p class="text-sm text-blue-500">Data: <?= htmlspecialchars($budget->getInstallationDate()); ?></p>
            <p class="text-sm text-blue-400">Status: <?= htmlspecialchars($budget->getStatus()); ?></p>
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
