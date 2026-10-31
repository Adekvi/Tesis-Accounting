<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <x-user.include.css />
    @stack('css')

</head>

<body>
    <div class="layout">
        <aside>
            <div class="brand">Resepta</div>
            <div id="navRoot"></div>
        </aside>
        <main>

            <x-user.topbar.topbar />

            <div id="contentArea"></div>
        </main>
    </div>
    <div class="nav-backdrop" id="navBackdrop"></div>

    <x-user.include.js />
    @stack('js')

</body>

</html>
