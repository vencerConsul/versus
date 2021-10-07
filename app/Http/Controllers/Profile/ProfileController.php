<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Auth;
use DB;
use Image;
use App\Post;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.profile');
    }

    public function ShowPosts()
    {
        $data = Post::orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    public function getUser()
    {
        $data = Auth::user();
        return response()->json($data);
    }
    public function storePost(Request $request)
    {
        $this->validate($request, [
            'caption' => 'required',
            'game_type' => 'required',
            'team_name' => 'required',
            'team_photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $image = request()->file('team_photo');
        $imageName = $image->getClientOriginalName();
        $imageName = time() . '_' . $imageName;

        $image->move(public_path('team_photo'), $imageName);

        $data = new Post;
        $data->user_id = Auth::user()->id;
        $data->caption = $request->caption;
        $data->game_type = $request->game_type;
        $data->team_name = $request->team_name;
        $data->team_photo = $imageName;
        $data->save();
    }
}
