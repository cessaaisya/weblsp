<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customers;
use PDF;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("orders.index", [
            "orders" => Orders::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orders.create", [
            'customer' => Customers::all()
        ]);
        
    }

    public function insertorders(Request $request)
    {
        Orders::create($request->all());
        return redirect('/orders')->with('success', 'New Order Data Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $period)
    {
        $salesData = [];

        switch ($period) {
            case 'daily':
                $salesData['period'] = 'Today';
                $salesData['details'] = Orders::whereDate('order_date', today())->get();
                break;
            case 'weekly':
                $salesData['period'] = 'This Week';
                $salesData['details'] = Orders::whereBetween('order_date', [now()->startOfWeek(), now()->endOfWeek()])->get();
                break;
            case 'monthly':
                $salesData['period'] = 'This Month';
                $salesData['details'] = Orders::whereYear('order_date', now()->year)
                    ->whereMonth('order_date', now()->month)
                    ->get();
                break;
            case 'annual':
                    $salesData['period'] = 'This Year';
                    $salesData['details'] = Orders::whereYear('order_date', now()->year)
                        ->get();
                    break;
            default:
                return redirect()->back()->with('error', 'Invalid period selected.');
        }

        return view('orders.detail', compact('salesData'));
}

public function downloadReport($period)
    {
        // Fetch sales data based on the period
        $salesData = $this->getSalesData($period);

        // Load view and pass sales data
        $pdf = PDF::loadView('orders.detail_pdf', compact('salesData'));

        // Download the PDF file
        return $pdf->download($period.'_sales_report.pdf');
    }

    private function getSalesData($period)
    {
        // Logic to fetch sales data based on the period
        $salesData = [
            'period' => ucfirst($period),
            'details' => Orders::whereBetween('order_date', $this->getDateRange($period))->get()
        ];

        return $salesData;
    }

    private function getDateRange($period)
    {
        // Logic to calculate date range based on the period (daily, weekly, monthly, annual)
        switch ($period) {
            case 'daily':
                return [now()->startOfDay(), now()->endOfDay()];
            case 'weekly':
                return [now()->startOfWeek(), now()->endOfWeek()];
            case 'monthly':
                return [now()->startOfMonth(), now()->endOfMonth()];
            case 'annual':
                return [now()->startOfYear(), now()->endOfYear()];
            default:
                return [now()->startOfDay(), now()->endOfDay()];
        }
    }
    
    public function getEarningsData()
    {
        $earnings = Orders::selectRaw('YEAR(order_date) as year, MONTH(order_date) as month, SUM(total_amount) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $formattedEarnings = [];
        foreach ($earnings as $earning) {
            $formattedEarnings[$earning->year][] = [
                'month' => $earning->month,
                'total' => $earning->total
            ];
        }

        return response()->json($formattedEarnings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Orders::find($id);
        if (!$orders) return redirect()->route('orders.edit');
        return view('orders.edit', [
            'orders' => $orders,
            'customer' => Customers::all()
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = Orders::find($id);
        $orders->customer_id = $request->customer_id;
        $orders->order_date = $request->order_date;
        $orders->total_amount = $request->total_amount;
        $orders->status = $request->status;
        $orders->save();
        return redirect('/orders')->with('success', 'orders Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusorders($id) 
    { 
        $orders = Orders::find($id);
        $orders->delete();
        return redirect('/orders')->with('success', 'The orders Data Successfully Delete!');
    }
}
