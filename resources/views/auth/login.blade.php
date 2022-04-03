
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>San Fierro RolePlay </title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

	<style>
		.bg-black-alt  {
			background:#191919;
		}
		.text-black-alt  {
			color:#191919;
		}
		.border-black-alt {
			border-color: #191919;
		}
		
	</style>

</head>
<body class="bg-gray-700 ">
    <div class="flex min-h-screen items-center justify-center">
        <div class="min-h-1/2 bg-gray-900  border border-gray-900 rounded-2xl">
            <form action="{{ route("login") }}" method="POST">
            @csrf
                <div class="mx-4 sm:mx-24 md:mx-34 lg:mx-56 mx-auto  flex items-center space-y-4 py-16 font-semibold text-gray-500 flex-col">
                    <img src="{{ asset("img/sub_logo.png") }}">

                    <h1 class="text-white text-2xl">Connexion</h1>
                    <input class="w-full p-2 bg-gray-900 rounded-md border border-gray-700 " placeholder="Email*"
                        type="email" name="cEmail" value="{{ old('cEmail')}}">
                    <input class="w-full p-2 bg-gray-900 rounded-md border border-gray-700 " placeholder="Mot de passe*"
                        type="password" name="password">
                    <input class="w-full p-2 bg-gray-50 rounded-full font-bold text-gray-900 border border-gray-700 "
                        type="submit" value="Envoyer">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Se rappeler de moi</span>
                        <p>Pas encore inscrit ?
                            <a class="font-semibold text-sky-700" href="{{ route('register') }}">Connectez-vous</a> </p>
                            @if(count($errors) > 0 )
                            <div class="flex items-center justify-center mb-4">
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        Erreur
                                    </div>
                                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                        @foreach($errors->all() as $error)
                                        <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>
  