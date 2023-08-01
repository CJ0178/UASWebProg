@extends('layout.master')
@section('content')

<div class="inline-flex items-center justify-center gap-2 w-fit">
    <p class="font-bold text-black ">Filter:</p>
    <select name="gender" id="gender" onchange="filterData()"
        class="bg-[#FFF6C3] border-[#FFDB89] text-[#850000] font-bold text-sm rounded-[10px] border-2 focus:border-[#850000] block w-fit px-4 py-2 max-md:p-2">
        <option selected value="ASC">Gender</option>
        <option value="L">Male</option>
        <option value="P">Female</option>
    </select>
</div>


<div class="flex grid grid-cols-6 gap-5 w-full m-auto overflow-hidden">
    @foreach ($users as $user)
        <div class="w-full rounded overflow-hidden shadow-lg" id="user">
            <img src="{{ asset('storage/'.$user->image) }}" alt="" class="object-cover w-[30vw] h-[30vh]">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">{{ $user->username }}</div>
            </div>
            <div class="mb-4 flex justify-around">
                <form action="/wishlist/{user_id}" method="POST">
                    @csrf
                    <input type="text" name="user_2" id="user_2" value="{{ $user->generated_id }}" hidden>
                    <button class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57l.03-.32c0-.41-.17-.79-.44-1.06L14.17 1L7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"/></svg></button>
                </form>
                {{-- <button class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="next" onclick="next({{ $user->id }})">Next</button> --}}
            </div>
            <div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $user->hobby1 }}</span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $user->hobby2 }}</span>
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $user->hobby3 }}</span>
            </div>
          </div>
    @endforeach
</div>
<script>
    function next(id){
        document.getElementById(id).style.display = 'none';
    }

    function filterData() {
            var selectedGender = document.getElementById("gender").value;

            $.ajax({
                type: "GET",
                url: '/home',
                data: {
                    Gender: selectedGender
                },
                success: function(data) {
                    $('#user').html(data);
                }
            })
        }
</script>
@endsection
