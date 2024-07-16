<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeTable;
use App\Models\UserProfile;
use App\Models\VenueSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function loadHomePage(Request $request){
        $dayOfWeek = Carbon::now()->format('l'); // Get current day of the week
        $availableSessions = VenueSession::with(['venue', 'teacher'])
            ->where('day_of_week', $dayOfWeek)
            ->where('is_skipped', true)
            ->get();

        $logged_user = Auth::user();
        return view('student.home-page',compact('availableSessions','logged_user','dayOfWeek'));
    }

    public function loadProfile(){
        $logged_user = Auth::user();
        $user_data = User::join('user_profiles','user_profiles.user_id','=','users.id')
        ->where('user_profiles.user_id',auth()->user()->id)
        ->first();
        return view('student.user-profile',compact('logged_user','user_data'));
    }

    public function UpdateProfile(Request $request){

        try {
                if ($request->file('image')) {
                    $path = $request->file('image')->store('/public/images');
                    $user = User::find(auth()->user()->id);
                    $old_image = $user->image;
                    if (!empty($old_image)) {
                        Storage::delete($old_image);
                    }
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $path,
                    ]);
                    $path = $request->file('image')->store('/public/images');
                    $url = Storage::url($path);
                    return back()->with('success', 'Profile updated successfully')->with('path', $url);
                }else{
                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);
                    return back()->with('success', 'Profile updated successfully');

                }
        } catch (\Exception $th) {
                    return back()->with('fail', $th->getMessage());
        }

    }
    public function UpdatePassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        try {

                    $user = User::find(auth()->user()->id);
                    $user->update([
                        'password' => Hash::make($request->password),
                    ]);
                    return back()->with('success', 'Password updated successfully');
        } catch (\Exception $th) {
                    return back()->with('fail', $th->getMessage());
        }

    }
}
