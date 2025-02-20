 {{-- Sidebar --}}
 <aside
     class="w-64 bg-gray-800 text-white min-h-screen p-4 transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0 fixed md:relative z-50"
     id="sidebar">
     <div class="flex justify-between items-center mb-6">
         <h2 class="text-xl font-bold"> PTM Dashboard</h2>
         <button id="sidebarToggle" class="md:hidden text-white">
             ✖
         </button>
     </div>
     <nav>
         <ul>
             <li class="mb-2">
                 <a href="{{ route('dashboard') }}"
                     class="flex items-center gap-x-4 px-4 py-2 rounded-lg hover:bg-gray-700">
                     <i class="fa-solid fa-house"></i>
                     <span>Home</span>
                 </a>
             </li>
             <li class="mb-2">
                 <a href="#" class="flex items-center gap-x-4 px-4 py-2 rounded-lg hover:bg-gray-700">
                     <i class="fa-solid fa-list-check"></i>
                     <span>Tasks</span>
                 </a>
             </li>
             <li class="mb-2">
                 <a href="#" class="flex items-center gap-x-4 px-4 py-2 rounded-lg hover:bg-gray-700">
                     <i class="fa-solid fa-user"></i>
                     <span>Profile</span>
                 </a>
             </li>

             {{-- Logout Button inside Sidebar --}}
             <li class="mt-10">
                 <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                     @csrf
                     <button type="button" onclick="showLogoutAlert()"
                         class="w-full flex items-center justify-center gap-x-4 bg-red-600 text-white text-base py-2 px-4 rounded-lg hover:bg-red-700 transition duration-300">
                         <i class="fa-solid fa-right-from-bracket"></i>
                         <span>Logout</span>
                     </button>
                 </form>
             </li>

         </ul>
     </nav>

 </aside>
