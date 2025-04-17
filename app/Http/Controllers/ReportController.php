<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $earnings = Orders::select('order_date', 'product_name', 'total_amount')
            ->get();

        return view('earnings_report', compact('earnings'));
    }

    public function downloadPDF()
    {
        $earnings = Orders::select('order_date', 'product_name', 'total_amount')
            ->get();

        $pdf = PDF::loadView('earnings_report_pdf', compact('earnings'));

        return $pdf->download('earnings_report.pdf');
    }
}

