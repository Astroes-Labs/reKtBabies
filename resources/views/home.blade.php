@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-[80vh] text-center">
        <h1 class="text-7xl font-extrabold mb-6 animate-pulse">
            Welcome to the Matrix
        </h1>

        <p class="text-xl max-w-xl mb-8">
            Rekt Babies: Because rugs shouldn't only happen to adults.
        </p>

        <a href="{{ route('details') }}" class="inline-block px-8 py-3 font-bold text-black bg-green-600 rounded-lg shadow-lg glitch 
              hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
            Get REKTD
        </a>
    </div>
@endsection