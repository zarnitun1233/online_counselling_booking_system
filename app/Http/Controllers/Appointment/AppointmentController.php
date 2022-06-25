<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * To view appointment 
     */
    public function index()
    {
        if (auth()->user()->role === 0) {
            $appointments = DB::table('appointments')
            ->select("appointments.*")
            ->where('appointments.patient_id', '=', auth()->user()->id)
            ->orderBy("appointments.id")
            ->get();
        }
        elseif (auth()->user()->role === 1) {
            $appointments = DB::table('appointments')
            ->select("appointments.*")
            ->where('appointments.counsellor_id', '=', auth()->user()->id)
            ->orderBy("appointments.id")
            ->get();
        }
        return view('appointment.index')->with('appointments', $appointments);
    }

    /**
     * Appointments View by admin
     */
    public function indexByAdmin()
    {
    }

    /**
     * Decision make by counsellors or admin
     * @param $id
     */
    public function decision($id)
    {
        //$status = $id;
        //$appointment = new Appointment();
        //$appointment->date = $appointment->date;
        //$appointment->time = $appointment->time;
        //$appointment->patient_id = $appointment->patient_id;
        //$appointment->counsellor_id = $appointment->counsellor_id;
        //$appointment->status = $status;
        //$appointment->save();
        //if ($status === 1) {
        //    return view('appointment.index')->with('message', 'Accept Successful');
        //}
        //else {
        //    return view('appointment.index')->with('message', 'Deny Successful');
        //}
            //$appointments = DB::table('appointments')
            //->select("appointments.*")
            //->where('appointments.counsellor_id', '=', auth()->user()->id)
            //->orderBy("appointments.id")
            //->get();
            //foreach($appointments as $appointment) {
            //    $status = $appointment->status;
            //}
            $appointments = Appointment::where('counsellor_id', auth()->user()->id)->get();
            foreach($appointments as $appointment) {
                $appointment->status = $id;
                if ($appointment->save()) {
                    if ($id === 1) {
                        return view('appointment.decision')->with('message', 'Accept Successful');
                    }
                    else {
                        return view('appointment.decision')->with('message', 'Deny Successful');
                    }
                }
            }
    }

    /**
     * Create Appointment
     * @param $id
     */
    public function create($id)
    {
        return view('appointment.createAppointment')->with('id', $id);
    }

    /**
     * Store Appointment
     * @param $id
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
        ]);
        $counsellor_id = $id;
        $patient_id = auth()->user()->id;
        $appointment = new Appointment();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patient_id = $patient_id;
        $appointment->counsellor_id = $counsellor_id;
        $appointment->status = "0";
        if ($appointment->save()) {
            return redirect()->route('counsellors-detail', $id)->with('message', 'Appointment successful');
        }
    }
}
