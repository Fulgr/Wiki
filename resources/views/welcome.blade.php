<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/837e657fcc.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css'])
    <title>{{$_ENV['APP_NAME']}}</title>
</head>
<body class="welcome-page">
    <header>
        <h1>{{$_ENV['APP_NAME']}}</h1>
        <livewire:search-bar/>
    </header>
    <main>
        <p>Footer</p>
    </main>
    <footer>
    </footer>
</body>
</html>