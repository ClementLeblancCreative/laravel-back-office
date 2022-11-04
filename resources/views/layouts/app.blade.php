<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Blog Créative</title>
</head>
<body>
    <header class="container d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Blog Créative</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('index')}}" class="nav-link active">Accueil</a></li>
        </ul>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer class="container">
        <p>© 2022 Créative - Tous droits réservés</p>
    </footer>
    
</body>
</html>