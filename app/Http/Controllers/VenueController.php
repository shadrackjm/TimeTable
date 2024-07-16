<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venue;
use App\Mail\VenueMail;
use App\Models\TimeTable;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VenueController extends Controller
{
    public function index(Request $request)
    {

        $logged_user = Auth::user();
        $venuesQuery = Venue::orderBy('created_at', 'desc');

        // Handle search query
        if ($request->has('search')) {
            $venuesQuery->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $venues = $venuesQuery->paginate(10);
        return view('admin.index', compact('venues','logged_user'));
    }

    public function create()
    {
        $logged_user = Auth::user();
        return view('admin.create',compact('logged_user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venue_data' => 'required',
        ]);

        $new_venue = new Venue();
        $new_venue->name = $request->venue_data;
        $new_venue->save();

        // $users = User::whereIn('role', [0, 1, 2])->get();
        // foreach ($users as $user) {
        //     Mail::to($user->email)->send(new VenueMail($new_venue, 'new'));
        // }
        flash('Venue added successfully.');
        return redirect()->route('venues.index')
            ->with('success', 'Venue added successfully.');
    }

    public function edit($id)
    {
        $logged_user = Auth::user();
        $venue = Venue::findOrFail($id);
        return view('admin.edit', compact('venue','logged_user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'venue_data' => 'required',
        ]);

        $venue = Venue::findOrFail($id);
        $venue->update([
            'name' => $request->venue_data,
        ]);
        // $users = User::whereIn('role', [1, 2, 0])->get();
        // foreach ($users as $user) {
        //     Mail::to($user->email)->send(new VenueMail($venue, 'update'));
        // }
        flash('Venue updated successfully.');
        return redirect()->route('venues.index')
            ->with('success', 'Venue updated successfully.');
    }

    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();
        flash('Venue deleted successfully.');
        return redirect()->route('venues.index')
            ->with('success', 'Venue deleted successfully.');
    }
}
