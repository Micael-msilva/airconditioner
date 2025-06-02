<?php
// views/home.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AC Technician Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex flex-col">

  <?php include 'shared/navbar.php'; ?>

  <!-- Main content -->
  <main class="flex-1 flex items-center justify-center p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-2xl text-center">
      <h1 class="text-4xl font-bold text-blue-700 mb-6">Welcome, Technician!</h1>
      <p class="text-blue-700 mb-6">
        Manage your air conditioning service tasks, update your profile, and view job details from your dashboard.
      </p>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php foreach ($actions as $action): ?>
          <a 
            href="<?= htmlspecialchars($action['href']); ?>" 
            class="block bg-blue-600 text-white py-4 px-6 rounded-xl hover:bg-blue-700 transition"
          >
            <?= htmlspecialchars($action['label']); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include 'shared/footer.php'; ?>

</body>
</html>
