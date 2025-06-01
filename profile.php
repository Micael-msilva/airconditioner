<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/model/Technician.php";
require_once __DIR__ . "/dao/TechnicianDao.php";

// Verifica se o formulário foi enviado e se a chave "name" existe em $_POST
if (isset($_POST['name']) && !empty($_POST['name'])) {
  // Cria Technician
  $technician = new Technician(
    $_POST['cpfCnpj'],
    $_POST['name'],
    $_POST['adress'] ?? null,
    $_POST['phone'],
    $_POST['crea'] ?? null,
    $_POST['email'],
  );

  // Usa chamada estática para o DAO
  $insertSuccess = TechnicianDAO::addTechnician($technician);

  // Verifica a inserção
  if ($insertSuccess) {
    echo "<p class='text-green-500'>Técnico inserido com sucesso!</p>";
  } else {
    echo "<p class='text-red-500'>Erro ao inserir o técnico.</p>";
  }
}
$_POST = array("");

$technician = TechnicianDAO::getTechnicianById('80204294924');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Technician Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">

  <!-- Navbar -->
  <?php include 'views/shared/navbar.php'; ?>

  <!-- Main content -->
  <main class="flex-1 flex items-center justify-center p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
      <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">My Profile</h1>
      <form action="" method="POST" class="space-y-5">
        <div>
          <label for="name" class="block text-blue-700 font-semibold">Full Name</label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            value="<?= htmlspecialchars($technician ? $technician->getName() : '') ?>" 
            required 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label for="email" class="block text-blue-700 font-semibold">Email</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="<?= htmlspecialchars($technician ? $technician->getEmail() : '') ?>" 
            required 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        <div>
          <label for="phone" class="block text-blue-700 font-semibold">Phone</label>
          <input 
            type="text" 
            id="phone" 
            name="phone" 
            value="<?= htmlspecialchars($technician ? $technician->getPhone() : '') ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        <div>
          <label for="cpfCnpj" class="block text-blue-700 font-semibold">CPF ou CNPJ</label>
          <input 
            type="text" 
            id="cpfCnpj" 
            name="cpfCnpj" 
            value="<?= htmlspecialchars($technician ? $technician->getCpf_cnpj() : '') ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        <div>
          <label for="crea" class="block text-blue-700 font-semibold">CREA Register</label>
          <input 
            type="text" 
            id="crea" 
            name="crea" 
            value="<?= htmlspecialchars($technician ? $technician->getCrea() : '') ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        <div>
          <label for="adress" class="block text-blue-700 font-semibold">Address</label>
          <input 
            type="text" 
            id="adress" 
            name="adress" 
            value="<?= htmlspecialchars($technician ? $technician->getAddress() : '') ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        <button 
          type="submit" 
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg transition duration-200"
        >
          Update Profile
        </button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <?php include 'views/shared/footer.php'; ?>

</body>
</html>
