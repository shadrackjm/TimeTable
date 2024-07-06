<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeTable;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function loadHomePage(Request $request){
         $dayOfWeek = Carbon::now()->format('l');
        $query = TimeTable::where('day', $dayOfWeek);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($query) use ($search) {
                $query->where('venue_data', 'LIKE', "%{$search}%")
                      ->orWhere('time_slot', 'LIKE', "%{$search}%");
            });
        }

        // Fetch paginated data
        $timetables = $query->orderBy('time_slot')->paginate(10);

        // Group the paginated data
        $groupedTimetables = $timetables->groupBy('time_slot');
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        return view('student.home-page',compact('groupedTimetables','logged_user','user_image','timetables','dayOfWeek'));
    }

    public function loadProfile(){
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $user_data = User::join('user_profiles','user_profiles.user_id','=','users.id')
        ->where('user_profiles.user_id',auth()->user()->id)
        ->first();
        return view('student.user-profile',compact('logged_user','user_image','user_data'));
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
