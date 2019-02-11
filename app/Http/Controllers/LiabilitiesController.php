<?php

namespace App\Http\Controllers;

use App\Liabilities;
use Illuminate\Http\Request;
use Log;


class LiabilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $liabilities = Liabilities::get()->sum('amount');
      $capital = Liabilities::get()->where('type', 'Capital Account')->sum('amount');
      $Loan = Liabilities::get()->where('type', 'Loan')->sum('amount');
      $Current = Liabilities::get()->where('type', 'Current Liabilities')->sum('amount');

      return response()->json([
        'Liabilities'    => $liabilities,
        'capital'    => $capital,
        'Loan'    => $Loan,
        'Current'    => $Current,
      ], 200);
    }

    public function getliab()
    {
      $capital = Liabilities::get()->where('type', 'Capital Account');
      $Loan = Liabilities::get()->where('type', 'Loan');
      $Current = Liabilities::get()->where('type', 'Current Liabilities');
      return response()->json([
        'capital'    => $capital,
        'Loan'    => $Loan,
        'Current'    => $Current,
      ], 200);
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
      $liabilities = Liabilities::create([
        'name'        => request('name'),
        'amount'      => request('amount'),
        'type'        => request('type'),
      ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liabilities  $liabilities
     * @return \Illuminate\Http\Response
     */
    public function show(Liabilities $liabilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liabilities  $liabilities
     * @return \Illuminate\Http\Response
     */
    public function edit(Liabilities $liabilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liabilities  $liabilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liabilities $liabilities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liabilities  $liabilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liabilities $liabilities)
    {
        //
    }
}
