<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\BookingRequest;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bookings = booking::all();

        return view('admin.bookings.index', compact('bookings'));
    }

     /**
     * Show the form for creating new Booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // make dropdown to show role  2 = dosen
        $users = User::where('role', 2)->get();
        $nama = $request->get('nama');
        $dosen = $request->get('dosen');
        $timeFrom = $request->get('time_from');
        $timeTo = $request->get('time_to');

    return view('admin.bookings.create', compact('nama', 'dosen', 'timeFrom', 'timeTo', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {


        Booking::create($request->validated());

        return redirect()->route('admin.bookings.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

     /**
     * Display Booking.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {


        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {

        $users = User::where('role', 2)->get();

        return view('admin.bookings.edit', compact('booking','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {


        $booking->update($request->validated());

        return redirect()->route('admin.bookings.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {


        $booking->delete();

        return redirect()->route('admin.bookings.index')->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

        /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        Booking::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
