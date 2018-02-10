<?php

namespace Travel\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Order\Models\User;

class TransactionController extends AdminController
{
    public function export(Request $request, $handlename)
    {
        $data = User::whereUsername($handlename)->firstOrFail();

        $pdf = PDF::loadView('Travel::pdf.transaction', ['data' => $data])
                  ->setPaper('a4', 'landscape');
        // $pdf = PDF::loadHTML('<h1>TEST</h1>');

        return $pdf->stream();
    }
}
