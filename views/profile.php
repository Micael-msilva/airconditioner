<?php
// views/profile.php
// Recebe $technician e $message vindos do controller
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

  <?php include 'shared/navbar.php'; ?>

  <main class="flex-1 flex items-center justify-center p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
      <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">My Profile</h1>

      <?php if ($message): ?>
        <p class="<?= $message['type'] === 'success' ? 'text-green-500' : 'text-red-500' ?>">
          <?= htmlspecialchars($message['text']) ?>
        </p>
      <?php endif; ?>

      <form action="" method="POST" class="space-y-5">
        <!-- Campos com valores preenchidos pelo controller -->
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

  <?php include 'shared/footer.php'; ?>

</body>
</html>
