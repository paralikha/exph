<?php

namespace Booking\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Booking\Models\Booking;

class BookingManyController extends AdminController
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach ($request->input('bookings') as $id) {
            $booking = Booking::findOrFail($id);
            $booking->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        foreach ($request->input('bookings') as $id) {
            $booking = Booking::onlyTrashed()->findOrFail($id);
            $booking->restore();
        }

        return back();
    }
}
