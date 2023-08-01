@extends('layout.master')
@section('content')
<div class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($users as $user)
        <div class="bg-white shadow-lg rounded-lg p-4">
            <img src="{{ asset('storage/'.$user->image) }}" alt="" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-lg font-bold">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->id }}</p>
            <p class="text-gray-600">{{ $user->gender }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
