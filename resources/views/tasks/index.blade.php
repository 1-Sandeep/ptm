@extends('app')

@section('title', 'Dashboard | Personal Task Management')

@section('content')

    <div class="flex min-h-screen">
        @include('components.sidebar')
        {{-- Main Content --}}
        <main class="flex-1 p-6 ml-0 transition-all duration-300 ease-in-out relative">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-800">Tasks</h1>
                    <p class="text-lg text-gray-600">Your tasks in your space</p>
                </div>

                {{-- Check if there are tasks and show the create button --}}
                @unless ($tasks->isEmpty())
                    <button
                        class="bg-[#3754DB] text-white text-sm font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-[#2e44b8] transition duration-200"
                        id="create-task-btn">
                        Create New Task
                    </button>
                @endunless

            </div>

            <div>
                {{-- Display tasks or message if no tasks --}}
                @if ($tasks->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($tasks as $task)
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <h2 class="font-semibold text-xl text-gray-800">{{ $task->title }}</h2>
                                <p class="text-gray-600 mt-2">{{ $task->description }}</p>
                                {{-- You can add buttons like Edit or Delete here --}}
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="flex flex-col justify-center items-center text-center text-gray-500 mt-24 space-y-[50px] h-full">
                        <img src="{{ asset('assets/clipboard.png') }}" alt="No Tasks" class="mx-auto mb-6">
                        <div class="flex flex-col items-center gap-4">
                            <div>
                                <p class="text-[28px] font-semibold text-gray-800">No Tasks Yet</p>
                                <p class="text-sm text-gray-600">You have no task created in your workspace yet.</p>
                                <p class="text-sm text-gray-600">Get productive.</p>
                            </div>
                            <button
                                class="w-[215px] bg-[#3754DB] text-white text-sm font-semibold  py-3 rounded-lg shadow-md hover:bg-[#2e44b8] transition duration-200"
                                id="create-task-btn">
                                Create New Task
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <div id="task-modal"
        class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden">

        <div class="bg-white p-6 rounded-lg w-[550px]">
            <h2 class="text-xl font-semibold mb-4">Create New Task</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="task-title" class="block text-sm font-medium text-gray-700">Task Title</label>
                    <input type="text" id="task-title" name="title"
                        class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- Task Priority and Due Date side by side -->
                <div class="mb-4 flex space-x-4">
                    <!-- Task Priority Select -->
                    <div class="flex-1">
                        <label for="task-priority" class="block text-sm font-medium text-gray-700">Task Priority</label>
                        <select id="task-priority" name="priority" class="mt-2 p-2 w-full border border-gray-300 rounded-md"
                            required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <!-- Due Date Input -->
                    <div class="flex-1">
                        <label for="task-due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="date" id="task-due-date" name="due_date"
                            class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>
                </div>

                <!-- Task Description Textarea -->
                <div class="mb-4">
                    <label for="task-description" class="block text-sm font-medium text-gray-700">Task Description</label>
                    <textarea id="task-description" name="description" rows="6"
                        class="mt-2 p-2 w-full border border-gray-300 rounded-md" required></textarea>
                </div>

                <div class="flex justify-between">
                    <button type="button" id="close-modal-btn"
                        class="bg-gray-500 text-white px-6 py-2 rounded-lg">Cancel</button>
                    <button type="submit" class="bg-[#3754DB] text-white px-6 py-2 rounded-lg">Create Task</button>
                </div>
            </form>
        </div>
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

    <script>
        // Get modal and button references
        const modal = document.getElementById('task-modal');
        const createTaskBtn = document.getElementById('create-task-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');

        // Show the modal
        createTaskBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Hide the modal
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

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
