<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Setando valores sections para serem puxadas em alguma view -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LARAVEL 1</title>
</head>
<body>
    <header>
        <h1>Cabeçalho</h1>
    </header>
    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        Rodapé
    </footer>
</body>
</html>