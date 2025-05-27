<?php
require_once __DIR__ . '/models/Technician.php';

// Example: In a real app, fetch these from DB or session
$technician = new Technician(
    "John Doe",
    "AC123456",
    "(123) 456-7890",
    "123 Main St",
    "AC123456"
);
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
  <?php include 'navbar.php'; ?>

  <!-- Main content -->
  <main class="flex-1 flex items-center justify-center p-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
      <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">My Profile</h1>
      
      <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="space-y-5">
        <div>
          <label for="name" class="block text-blue-700 font-semibold">Full Name</label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            value="<?php echo htmlspecialchars($technician->getName()); ?>" 
            required 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>
        
        <div>
          <label for="email" class="block text-blue-700 font-semibold">Email</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="john.doe@example.com" 
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
            value="<?php echo htmlspecialchars($technician->getPhone()); ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>

        <div>
          <label for="license" class="block text-blue-700 font-semibold">License Number</label>
          <input 
            type="text" 
            id="license" 
            name="license" 
            value="<?php echo htmlspecialchars($technician->getCrea()); ?>" 
            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
        </div>

        <div>
          <label for="logo" class="block text-blue-700 font-semibold">Upload Logo/Profile Picture</label>
          <input 
            type="file" 
            id="logo" 
            name="logo"
            accept="image/*"
            class="w-full mt-2"
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
  <footer class="bg-white p-4 text-center shadow-md">
    <p class="text-sm text-blue-700">&copy; 2025 AC Technician Platform. All rights reserved.</p>
  </footer>

</body>
</html>
