<?php

use Carbon\Carbon;
use App\Models\VenueSession;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $currentDayOfWeek = Carbon::now()->dayOfWeekIso;

    $sessions = VenueSession::where('is_skipped', true)->get();

    foreach ($sessions as $session) {
        $sessionDayOfWeek = Carbon::parse($session->day_of_week)->dayOfWeekIso;

        if ($currentDayOfWeek > $sessionDayOfWeek) {
            $session->is_skipped = false;
            $session->save();
        }
    }

    Log::info('Skipped venue sessions have been reset successfully.');
})->everyFiveSeconds()
->timezone('Africa/Dar_es_Salaam');
