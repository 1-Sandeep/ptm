@extends('app')

@section('title', 'Login | Personal Task Management')

@section('content')
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-4 rounded-lg shadow-sm">
            <h1 class="text-2xl font-black text-gray-800 text-center mb-2">Create an Account</h1>
            <p class="text-sm font-black mb-6 text-center">It’s Simple and Easy!!</p>

            <form action="{{ route('register.store') }}" method="post" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="block text-xs font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 w-full px-4 py-2 border
                        border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#3754DB]
                        focus:border-[#3754DB] @error('name') border-red-500  @enderror">

                    {{-- Display error message for name --}}
                    @error('name')
                        <div class="text-sm font-bold text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-xs font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 w-full px-4 py-2 border
                        border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#3754DB]
                        focus:border-[#3754DB] @error('email') border-red-500 @enderror">

                    {{-- Display error message for email --}}
                    @error('email')
                        <div class="text-sm font-bold text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-xs font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#3754DB] focus:border-[#3754DB]
                        @error('password') border-red-500 @enderror">

                    {{-- Display error message for password --}}
                    @error('password')
                        <div class="text-sm font-bold text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-xs font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#3754DB] focus:border-[#3754DB]
                        @error('password_confirmation') border-red-500 @enderror">

                    {{-- Display error message for password confirmation --}}
                    @error('password_confirmation')
                        <div class="text-sm font-bold text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#3754DB] text-white font-semibold text-base py-2 rounded-lg hover:bg-[#2e44b8] transition duration-300">
                    Create Account
                </button>

                <p class="text-sm px-2 text-center">Already have an account?
                    <span><a href="{{ route('login') }}"
                            class="text-[#3754DB] hover:underline hover:font-bold">Login</a></span>
                </p>
            </form>
        </div>
    </div>
@endsection
