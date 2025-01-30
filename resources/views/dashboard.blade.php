<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link do Tailwind CSS (ou outro CSS que esteja usando) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Barra superior -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <div class="relative">
                <!-- Botão com o nome do usuário -->
                <button 
                    id="userMenuButton" 
                    class="flex items-center bg-gray-200 rounded-full px-4 py-2 hover:bg-gray-300 focus:outline-none focus:ring"
                >
                    <img 
                        src="{{ Auth::user()->photo ?? 'https://via.placeholder.com/40' }}" 
                        alt="Foto do usuário" 
                        class="w-8 h-8 rounded-full mr-2"
                    />
                    <span>{{ Auth::user()->name }}</span>
                </button>
                
                <!-- Menu suspenso -->
                <div 
                    id="userMenu" 
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border"
                >
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Editar Perfil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">Sair</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main class="flex-grow p-6">
            <h2 class="text-2xl font-semibold">Bem-vindo, {{ Auth::user()->name }}!</h2>
            <!-- Conteúdo da dashboard -->
        </main>
    </div>

    <!-- Script para o dropdown -->
    <script>
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
