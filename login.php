<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Technician Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">AC Technician Login</h2>
        
        <form action="#" method="POST" class="space-y-5">
            <div>
                <label for="email" class="block text-blue-700 font-semibold">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
            
            <div>
                <label for="password" class="block text-blue-700 font-semibold">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
            
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-blue-700">
                    <input type="checkbox" class="mr-2">
                    Remember me
                </label>
                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg transition duration-200"
            >
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-blue-700">
            Don't have an account? 
            <a href="singup.php" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </div>

</body>
</html>
