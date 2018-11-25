<?php

namespace App\Http\Controllers\Calendars;

use App\Calendar;
use App\Http\Controllers\Controller;
use App\Notifications\CalendarOfCompanyNotifications;
use Illuminate\Support\Facades\Notification;

class CompanyCalendarController extends Controller
{
    public function index()
    {
        return view('calendars.CompanyCalendar');
    }

    public function getEvents()
    {

        $events = Calendar::where("company_id",auth()->user()->member->company->id)->get();
        return response()->json($events);
    }

    public function addEvent()
    {

        $data = $this->validate(request(),[
            'title' => 'required|max:100',
            'start' => 'required|before_or_equal:end',
            'end' => 'required|after_or_equal:start',
            'color' => 'max:191'
        ]);

        $data['company_id'] = auth()->user()->member->company->id;
        $data['user_id'] = null;
        $calendar = Calendar::create($data);
        //Notification::send(3,new CalendarOfCompanyNotifications($calendar));
        return response()->json($calendar);
    }

    public function updateEvent()
    {
        $data = $this->validate(request(),[
            'start' => 'required|date|before_or_equal:end',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $calendar = Calendar::where('id',request()->id)
            ->where('company_id',auth()->user()->member->company->id)
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
