<?php

namespace App\Http\Controllers;

use App\Models\BankSaving;
use Illuminate\Http\Request;

class BankSavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.bank_details.bank_saving');
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
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function show(BankSaving $bankSaving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function edit(BankSaving $bankSaving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankSaving $bankSaving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankSaving $bankSaving)
    {
        //
    }
}
