<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeTable;
use App\Models\UserProfile;
use App\Models\VenueBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   public function loadHomePage(){
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $venues = TimeTable::count();

        $recent_users = User::where('id','!=',$logged_user->id)->orderBy('created_at','desc')->get();
        return view('admin.home-page',compact('logged_user','user_image','recent_users','venues'));
    }

    public function allUsers(Request $request){
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $all_users = User::orderBy('created_at','desc')->get();
        return view('admin.users',compact('all_users','logged_user','user_image',));
    }

    public function bookedVenue(){
        $dayOfWeek = Carbon::now()->format('l');

        $logged_user = Auth::user();
       return $booked_venues = VenueBooked::where('day_of_week',$dayOfWeek)->with('venue','user')->get();
    }
    public function loadProfile(){
     $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $user_data = User::join('user_profiles','user_profiles.user_id','=','users.id')
        ->where('user_profiles.user_id',auth()->user()->id)
        ->first();
        return view('admin.user-profile',compact('logged_user','user_image','user_data'));
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

    public function edit($id)
    {
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user','logged_user'));
    }

    // Handle update request
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        flash('User updated successfully.');

        return redirect()->route('admin.users');
    }

    // Handle delete request
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash('User updated successfully.');
        return redirect()->route('admin.users');
    }
}
