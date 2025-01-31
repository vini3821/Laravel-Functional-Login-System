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
                <button id="userMenuButton"
                    class="flex items-center bg-gray-200 rounded-full px-4 py-2 hover:bg-gray-300 focus:outline-none focus:ring">
                    <!-- Verifica se o usuário tem uma foto e exibe a imagem -->
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto de perfil"
                            class="w-8 h-8 rounded-full mr-2" />
                    @else
                        <!-- Foto padrão caso o usuário não tenha foto -->
                        <img src="https://via.placeholder.com/40" alt="Foto padrão" class="w-8 h-8 rounded-full mr-2" />
                    @endif
                    <span>{{ Auth::user()->name }}</span>
                </button>

                <!-- Menu suspenso -->
                <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Editar
                        Perfil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">Sair</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <!-- Conteúdo principal -->
        <main class="flex-grow p-6 space-y-6">
            <h2 class="text-2xl font-semibold">Bem-vindo, {{ Auth::user()->name }}!</h2>

            <!-- Painel de métricas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-medium">Total de Usuários</h3>
                    <p class="text-4xl font-bold mt-2">128</p>
                    <p class="text-sm text-gray-500">Crescimento mensal: +12%</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-medium">Novos Cadastros</h3>
                    <p class="text-4xl font-bold mt-2">45</p>
                    <p class="text-sm text-gray-500">Esta semana</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-medium">Tickets Resolvidos</h3>
                    <p class="text-4xl font-bold mt-2">78%</p>
                    <p class="text-sm text-gray-500">Este mês</p>
                </div>
            </div>

            <!-- Tabela de atividades recentes -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Atividades Recentes</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b pb-2">Atividade</th>
                            <th class="border-b pb-2">Data</th>
                            <th class="border-b pb-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2">Usuário "João" atualizou seu perfil</td>
                            <td class="py-2">30/01/2025</td>
                            <td class="py-2 text-green-600">Concluído</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="py-2">Nova conta criada: "Maria"</td>
                            <td class="py-2">28/01/2025</td>
                            <td class="py-2 text-blue-600">Pendente</td>
                        </tr>
                        <tr>
                            <td class="py-2">Senha alterada por "Carlos"</td>
                            <td class="py-2">25/01/2025</td>
                            <td class="py-2 text-green-600">Concluído</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Gráfico simples (placeholder) -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Desempenho Semanal</h3>
                <div class="bg-gray-200 h-32 flex justify-center items-center">
                    <p class="text-gray-600">[Gráfico Placeholder]</p>
                </div>
            </div>
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