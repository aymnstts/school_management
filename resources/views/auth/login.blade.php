<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-purple-500 to-blue-600">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-3xl mb-6 text-center text-gray-800 font-semibold">Bienvenue sur EasySC</h2>
            <p class="text-center text-gray-600 mb-6">Connectez-vous pour accéder à votre compte</p>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Connexion</button>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600 mt-2">Créer un compte</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
