<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use DB;


class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        //dd($request->image);
        if ($request->hasFile('image')){
            //if($default != "true") return redirect()->back();
            // $avatar = $request->image->getClientOriginalName();
            // $request->image->storeAs('images',$avatar,'public');
            //$avatar = $request->image->getClientOriginalName();
            if (auth()->user()->avatar){
                Storage::delete("public/".auth()->user()->avatar);
            }
            $filename = $request->image->store('images','public');
            auth()->user()->update(['avatar' => $filename]);
            return redirect()->back()->with('message', 'Image Uploaded.'); // Success
        }
        return redirect()->back()->with('error', 'Image not Uploaded.'); // Error
    }

    public function index() 
    {
        // uploadAvatarDefault("");
        // RAW SQL
        // Create
        // DB::insert("insert into users (name,email,password) values(?,?,?)",[
        //     "Jan-Marcus",
        //     "jmarcus@hot.ee",
        //     "salajane",
        // ]);
        // Eloquent
        // $user = new User();
        // $user->name = "Sivadi";
        // $user->email = "marcus.sivadi@gmail.com";
        // $user->password = "salajane2";
        // $user->save();
        // $data = [
        //     "name"      =>  "Elon2",
        //     "email"     =>  "elon2@online.ee",
        //     "password"  =>  bcrypt("tere1234"),
        // ];
        // User::create($data);

        // Read
        // $users = DB::select("select * from users");
        // Eloquent
        // $users = User::all();

        // Update
        // DB::update("update users set name=? where id = 1",["Uuendatud Jan-Marcus"]);
        // Eloquent
        // User::where("id",3)->update(["name"=>"Eloquents"]);

        // Delete
        // DB::delete("delete from users");
        // Eloquent
        // User::where("id",2)->delete();

        //$users = DB::select("select * from users");
        $users = User::all();
        return $users;

    }
}
