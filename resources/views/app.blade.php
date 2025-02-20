<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Home | Personal Task Management')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    @endif
</head>

<body class="font-sans antialiased">
    @if (session('success'))
        <div class="bg-[#DFF6E3] border-[#008C45] border text-white p-4 rounded-lg mb-4 fixed top-5 right-5 z-50 opacity-0 transform translate-y-4 transition-all duration-300 ease-out"
            id="notification">
            <div class="flex justify-between">
                <span class="text-[#008C45] font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    @elseif (session('error'))
        <div class="bg-[#FFD6D9] border-[#C70039] border text-white p-4 rounded-lg mb-4 fixed top-5 right-5 z-50 opacity-0 transform translate-y-4 transition-all duration-300 ease-out"
            id="notification">
            <div class="flex justify-between">
                <span class="text-[#C70039] font-semibold">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.classList.remove('opacity-0', 'translate-y-4');
                notification.classList.add('opacity-100', 'translate-y-0');
            }

            // Optionally, close the notification after a few seconds
            setTimeout(() => {
                if (notification) {
                    notification.classList.add('opacity-0');
                    notification.classList.remove('opacity-100', 'translate-y-0');
                }
            }, 4000); // Hide notification after 5 seconds
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
