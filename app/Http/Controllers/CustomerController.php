<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\KategoriSubscriber;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // dd($request);
        // // dd($request[1]['nama']);
        // dd($request[1]['kategori'] );

        

        if ($request[0]['updateInfo'] == 'Iya') {
            # code...
            $customer = new Customer;
            $customer->nama = $request[1]['nama'];
            $customer->instansi = $request[1]['instansi'];
            $customer->email = $request[1]['email'];
            $customer->no_wa = $request[1]['noWa'];
            $customer->save();

            foreach ($request[1]['kategori'] as $kategori => $value) {
            # code...
                $kategoriSubscriber = new KategoriSubscriber;
                $kategoriSubscriber->kategori = $value['value'];
                $kategoriSubscriber->customer_id = $customer->id;
                $kategoriSubscriber->save();
            }

            $feedback = new Feedback;
            $feedback->kualitas_data = $request[0]['kualitasData'];
            $feedback->pelayanan_data = $request[0]['pelayananData'];
            $feedback->akses_data =  $request[0]['aksesData'];
            $feedback->sarana_prasarana =  $request[0]['saranaPrasarana'];
            $feedback->rujukan = $request[0]['rujukan'];
            $feedback->customer_id = $customer->id;
            $feedback->save();
        }
            $feedback = new Feedback;
            $feedback->kualitas_data = $request[0]['kualitasData'];
            $feedback->pelayanan_data = $request[0]['pelayananData'];
            $feedback->akses_data =  $request[0]['aksesData'];
            $feedback->sarana_prasarana =  $request[0]['saranaPrasarana'];
            $feedback->rujukan = $request[0]['rujukan'];
            $feedback->save();
        
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
