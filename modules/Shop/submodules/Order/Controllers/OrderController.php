<?php

namespace Order\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Order\Models\Order;
use Order\Requests\OrderRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        return view("Theme::orders.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

        return view("Theme::orders.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("Theme::orders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        //

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //

        return view("Theme::orders.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        return redirect()->route('orders.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //

        return view("Theme::orders.trash");
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(OrderRequest $request, $id)
    {
        //

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  \Order\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(OrderRequest $request, $id)
    {
        //

        return redirect()->route('orders.trash');
    }

    public function export(Request $request)
    {
        $orders = Order::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "Customer");
        $sheet->setCellValue("B1", "Experience");
        $sheet->setCellValue("C1", "Payment ID");
        $sheet->setCellValue("D1", "Payer ID");
        $sheet->setCellValue("E1", "Quantity");
        $sheet->setCellValue("F1", "Price");
        $sheet->setCellValue("G1", "Total");
        $y = 2;
        foreach ($orders as $order) {
            $sheet->setCellValue("A{$y}", $order->customer->fullname);
            $sheet->setCellValue("B{$y}", $order->experience->name);
            $sheet->setCellValue("C{$y}", $order->payment_id);
            $sheet->setCellValue("D{$y}", $order->payer_id);
            $sheet->setCellValue("E{$y}", $order->quantity);
            $sheet->setCellValue("F{$y}", $order->price);
            $sheet->setCellValue("G{$y}", $order->total);
            $y++;
        }
        $sheet->setCellValue("F".($y+1), "TOTAL");
        $sheet->setCellValue("G".($y+1), "=SUM(G2:G{$y})");


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="orders.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        return back();
    }
}
