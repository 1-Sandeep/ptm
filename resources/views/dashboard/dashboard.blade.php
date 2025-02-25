@extends('app')

@section('title', 'Dashboard | Personal Task Management')

@section('content')

    <div class="flex">
        @include('components.sidebar')
        {{-- Main Content --}}
        <main class="flex-1 p-6 ml-0 transition-all duration-300 ease-in-out relative">
            <button id="menuButton" class="absolute right-4 top-4 md:hidden bg-gray-800 text-white px-4 py-2 rounded-lg">
                <i class="fa-solid fa-bars"></i>
            </button>
            Hello world
        </main>

    </div>

    {{-- Custom Logout Alert --}}
    <div id="customAlert" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Are you sure you want to log out?</h2>
            <div class="flex justify-center space-x-4">
                <button onclick="confirmLogout()"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Yes</button>
                <button onclick="closeAlert()"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">Cancel</button>
            </div>
        </div>
    </div>

    {{-- Sidebar & Logout Scripts --}}
    <script>
        // Sidebar Toggle Functionality
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.getElementById('menuButton');
        const sidebarToggle = document.getElementById('sidebarToggle');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // Custom Logout Alert Box
        function showLogoutAlert() {
            document.getElementById('customAlert').classList.remove('hidden');
        }

        function closeAlert() {
            document.getElementById('customAlert').classList.add('hidden');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }
    </script>

@endsection
