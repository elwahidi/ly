<?php

namespace App\Http\Controllers\Calendars;

use App\Calendar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCalendarController extends Controller
{
    public function index()
    {
        return view('calendars.UserCalendar');
    }

    public function getEvents()
    {
        $events = Calendar::where("user_id",auth()->user()->id)->get();
        return response()->json($events);
    }

    public function addEvent()
    {
        $data = $this->validate(request(),[
            'title' => 'required|max:100',
            'start' => 'required|date|before_or_equal:end',
            'end' => 'required|date|after_or_equal:start',
            'color' => 'max:191'
        ]);
        $data['user_id'] = Auth::user()->id;
        $data['company_id'] = null;
        $calendar = Calendar::create($data);
        return response()->json($calendar);
    }

    public function updateEvent()
    {
        $data = $this->validate(request(),[
            'start' => 'required|date|before_or_equal:end',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $calendar = Calendar::where('id',request()->id)
            ->where('user_id',Auth::user()->id)
            ->first();
        $calendar->update($data);
        return response()->json($calendar);
    }

    public function deleteEvent()
    {
        $data = $this->validate(request(),[
            'id'=>'required|numeric'
        ]);
        Calendar::find(request()->id)->delete();
    }
}
