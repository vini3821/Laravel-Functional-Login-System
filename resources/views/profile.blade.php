<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-xl font-bold mb-4">Editar Perfil</h1>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required />
                </div>

                <div class="mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="photo" name="photo" class="mt-1 block w-full" />
                </div>
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de perfil"
                        style="width: 150px; height: 150px; border-radius: 50%;">
                @else
                    <p>Foto de perfil não disponível.</p>
                @endif

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
                    Salvar Alterações
                </button>
            </form>
        </div>
    </div>
</body>

</html>