<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="container">


<h1>{{ $title }}</h1>

{{ $slot }}

</div>

    
</body>
</html>