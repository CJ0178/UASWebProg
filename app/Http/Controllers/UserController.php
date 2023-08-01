<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $user_id = auth()->user()->id;
        $auth = auth()->user();
        $users = User::where('id', '!=', $user_id)->get();
        return view('home', compact('users', 'auth'));
    }

    public function wishlist(Request $request, $user_id) {
        $auth_user_id = auth()->user()->id;
        if ($user_id !== $auth_user_id) {
            Wishlist::create([
                'user_id' => $auth_user_id,
                'wishlist_user_id' => $user_id,
            ]);

            // $authUser = User::find($auth_user_id);
            // $authUser->wishlists()->create(['wishlist_user_id' => $user_id]);
        }
        return redirect()->back()->with('success', 'User added to wishlist!');
    }

    public function filter(Request $request)
    {
        $gender = $request->input('gender');

        $users = User::when($gender, function ($query) use ($gender) {
            return $query->where('gender', $gender);
        })->get();

        $users = User::where('id', '!=', auth()->user()->id)->get();

        // return view('filter_result', compact('users'));
        $view = view("home",['users' => $users]);
        $html = $view->render();
        return $html;
    }

}
