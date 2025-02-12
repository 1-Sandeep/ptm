@extends('app')

@section('title', 'Dashboard | Personal Task Management ')

@section('content')

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="bg-[#B80020] text-white font-semibold text-base py-2 px-4 rounded-lg hover:bg-[#92001a] transition duration-300">
            Logout
        </button>
    </form>


@endsection
