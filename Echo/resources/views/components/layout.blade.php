<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>Echo Chat</title>
</head>


<body class="min-h-screen bg-[#030712] text-white">

    {{-- Achtergrond effecten --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div
            class="absolute top-0 left-0 h-[500px] w-[500px] rounded-full bg-blue-600/20 blur-[150px]">
        </div>

        <div
            class="absolute bottom-0 right-0 h-[500px] w-[500px] rounded-full bg-cyan-500/10 blur-[150px]">
        </div>

        <div
            class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-950 to-black">
        </div>

    </div>

    <x-header />

    <main>
        {{ $slot }}
    </main>

</body>

</html>