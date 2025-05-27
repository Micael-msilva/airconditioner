<?php
$id = $_GET['id'] ?? null;

// Simulação de busca no banco ou array
session_start();
$budgets = $_SESSION['budgets'] ?? [];
$budget = null;

foreach ($budgets as $b) {
    if ($b['id'] == $id) {
        $budget = $b;
        break;
    }
}

if (!$budget) {
    die("Orçamento não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Orçamento</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include 'navbar.php'; ?>

  <main class="flex-1 p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-3xl mx-auto">
      <h1 class="text-3xl font-bold text-blue-700 mb-6">Detalhes do Orçamento - ID <?= htmlspecialchars($id); ?></h1>

      <p class="mb-2"><strong>Cliente:</strong> <?= htmlspecialchars($budget['client']); ?></p>
      <p class="mb-2"><strong>Data:</strong> <?= htmlspecialchars($budget['date']); ?></p>

      <!-- Botões de ação -->
      <div class="mt-6 space-x-4">
        <a href="update_budget.php?id=<?= urlencode($id); ?>" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition">
          ✎ Atualizar Orçamento
        </a>
        <a href="delete_budget.php?id=<?= urlencode($id); ?>" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">
          🗑️ Deletar Orçamento
        </a>
      </div>

      <div class="mt-8">
        <a href="budget.php" class="text-blue-600 hover:underline">← Voltar para lista de orçamentos</a>
      </div>
    </div>
  </main>

  <footer class="bg-white p-4 text-center shadow-md">
    <p class="text-sm text-blue-700">&copy; 2025 AC Technician Platform. All rights reserved.</p>
  </footer>

</body>
</html>
