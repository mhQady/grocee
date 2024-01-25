<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/svg+xml" href="/icons/favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;700&display=swap" rel="stylesheet">

        <title>Grocee Dashboard</title>
        @vite('resources/apps/DashboardApp/app.js')
    </head>

    <body>
        <div id="app"></div>
    </body>

</html>