@extends('layout.master')
@section('content')
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-md mx-auto flex-1 flex flex-col items-center justify-center">
            <div class="bg-white py-5 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Register</h1>
                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="font-semibold">Instagram Username</h1>
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="username"
                        placeholder="Instagram Username" required />

                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="Email" required>

                    <h1 class="font-semibold">Password</h1>
                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        placeholder="Password" required />

                    {{-- make input for hobbies (min. 3 hobbies)--}}
                    <h1 class="font-semibold">Hobbies</h1>
                    <div class="block border border-black w-full p-3 rounded mb-4 grid grid-cols-1">
                        <input type="text w-full" name="hobby1"
                            placeholder="Hobby 1" required />
                        <input type="text w-full" name="hobby2"
                            placeholder="Hobby 2" required />
                        <input type="text w-full" name="hobby3"
                            placeholder="Hobby 3" required />
                    </div>

                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Mobile Phone</label>
                    <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone"
                        placeholder="Mobile Phone" required />

                    <div class="my-4"><span class="font-semibold mr-5">Gender</span>
                        <input type="radio" name="gender" id="L" value="L" required>
                        <label for="L">Male</label>
                        <input type="radio" name="gender" id="P" value="P" required>
                        <label for="P">Female</label>
                    </div>

                    <h1 class="font-semibold">Photo Profile</h1>
                    <input class="block my-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="image" type="file" name="image">

                    <h1 class="mb-5">Registration Price: <span class="font-semibold">Rp. {{ $random }}</span></h1>
                    <button type="submit"
                        class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">Register</button>
                </form>
                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="no-underline border-b border-blue text-blue hover:text-blue-400" href="../login/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    @endsection
