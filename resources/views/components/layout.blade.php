<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>{{ $title ?? " " }}{{ config('app.name') }}</title>

</head>
<body>
{{ $slot }}


<x-footer/>
</body>
</html>