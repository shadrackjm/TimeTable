<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeTable;
use App\Models\UserProfile;
use App\Models\VenueBooked;
use App\Models\VenueSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

    public function markSkipped($id)
    {
        $session = VenueSession::findOrFail($id);

        if ($session->teacher_id != auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to mark this session as skipped.');
        }

        $session->is_skipped = true;
        $session->save();

        return redirect()->back()->with('success', 'Session marked as skipped.');
    }

    public function bookSession($id)
    {
        $session = VenueSession::findOrFail($id);

        if ($session->teacher_id == auth()->id()) {
            return redirect()->back()->with('error', 'You cannot book your own session.');
        }

        $session->teacher_id = auth()->id();
        $session->save();

        return redirect()->back()->with('success', 'Session booked successfully.');
    }
    public function loadHomePage(Request $request){
        $teacherId = auth()->user()->id;
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timetables = [];

        foreach ($daysOfWeek as $day) {
            $timetables[$day] = VenueSession::with(['venue', 'teacher'])
                ->where('day_of_week', $day)
                ->get();
        }

        $logged_user = Auth::user();
        return view('teacher_lecturer.home-page',compact('timetables','logged_user','timetables','daysOfWeek'));
    }

    public function loadProfile(){
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $user_data = User::join('user_profiles','user_profiles.user_id','=','users.id')
        ->where('user_profiles.user_id',auth()->user()->id)
        ->first();
        return view('teacher_lecturer.user-profile',compact('logged_user','user_image','user_data'));
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
