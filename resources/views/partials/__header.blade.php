<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traffic Management System</title>
    @vite('resources/css/app.css')

    {{-- {{ $title !== '' ? $title : "Traffic Management System"}} --}}


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blink-animation {
            animation: blink 1s infinite;
        }
    </style>
</head>
<body class="bg-gray-300 min-h-screen overflow-x-hidden">
    <x-messages/>