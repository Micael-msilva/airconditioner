<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Criar PMOC - AC Technician</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-200 min-h-screen flex flex-col font-sans">
    <?php include __DIR__ . '/../shared/navbar.php'; ?>

    <main class="flex-1 p-8">
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-3xl mx-auto space-y-8">
            <h1 class="text-4xl font-extrabold text-blue-800 text-center">Criar PMOC</h1>

            <form action="?route=pmoc_store" method="POST" class="space-y-6">
                <!-- Nome do PMOC -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700">Nome do PMOC</label>
                    <input type="text" name="name" id="name" required 
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">
                </div>

                <!-- Descrição -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700">Descrição</label>
                    <textarea name="description" id="description" rows="4" required
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2 resize-y"></textarea>
                </div>

                <!-- Data de Criação -->
                <div>
                    <label for="creation_date" class="block text-sm font-semibold text-gray-700">Data de Criação</label>
                    <input type="date" name="creation_date" id="creation_date" required
                        class="mt-2 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">
                </div>

                <!-- Cliente -->
                <div class="space-y-4">
                    <label class="block text-sm font-semibold text-gray-700">Cliente</label>
                    <input type="text" name="client_name" id="client_name" required 
                        placeholder="Nome do Cliente"
                        class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">
                    <input type="text" name="client_phone" id="client_phone" required 
                        placeholder="Telefone do Cliente"
                        class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">
                </div>

                <!-- Ar Condicionados -->
                <div id="airconditioner-fields" class="space-y-4 mt-6">
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm space-y-3">
                        <input type="text" name="airconditioners[][model]" placeholder="Modelo"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">

                        <input type="number" name="airconditioners[][btus]" placeholder="BTUs"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">

                        <textarea name="airconditioners[][description]" placeholder="Descrição" rows="3"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 resize-y px-4 py-2"></textarea>

                        <input type="text" name="airconditioners[][location]" placeholder="Localização"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50 px-4 py-2">

                        <button type="button" onclick="removeField(this)" 
                            class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg transition shadow">
                            Remover
                        </button>
                    </div>
                </div>

                <button type="button" onclick="addAirConditionerField()"
                    class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-2xl transition shadow">
                    + Adicionar Ar Condicionado
                </button>

                <!-- Botões -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="?route=pmoc" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-2xl transition shadow">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-2xl transition shadow">
                        Criar
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php include_once __DIR__ . '/../shared/footer.php'; ?>
    <script src="../../assets/js/pmoc.js"></script>
</body>
</html>
