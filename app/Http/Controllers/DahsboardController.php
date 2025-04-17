<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DahsboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentDay = Carbon::now()->format('Y-m-d');
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $dailyEarnings = Orders::whereDate('order_date', $currentDay)
                                ->sum('total_amount');

        $weeklyEarnings = Orders::whereBetween('order_date', [$startOfWeek, $endOfWeek])
                                ->sum('total_amount');

        $monthlyEarnings = Orders::whereMonth('order_date', $currentMonth)
                                ->whereYear('order_date', $currentYear)
                                ->sum('total_amount');

        $annualEarnings = Orders::whereYear('order_date', $currentYear)
                                ->sum('total_amount');

                               // Format earnings to Rupiah
        $dailyEarnings = number_format($dailyEarnings, 2, ',', '.');
        $weeklyEarnings = number_format($weeklyEarnings, 2, ',', '.');
        $monthlyEarnings = number_format($monthlyEarnings, 2, ',', '.');
        $annualEarnings = number_format($annualEarnings, 2, ',', '.');

        return view('dashboard.index', compact('dailyEarnings', 'weeklyEarnings', 'monthlyEarnings', 'annualEarnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
