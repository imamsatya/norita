<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\KategoriSubscriber;

use Mail;

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
            // $customer->konfirmasi = 0;
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

            // $data = array('name'=>$customer->nama, 'id'=>$customer->id);

            // Mail::send(['html'=>'mailkonfirm'], $data, function($message)  use ($request, $customer) {
            //     $message->to($customer->email, $customer->nama)->subject($request->judul);
            //     $message->from('dispo7200@gmail.com','Norita - BPS Prvosinsi Sulawesi Tengah');
            // });

            // dd($customer);
        }else{
            $feedback = new Feedback;
            $feedback->kualitas_data = $request[0]['kualitasData'];
            $feedback->pelayanan_data = $request[0]['pelayananData'];
            $feedback->akses_data =  $request[0]['aksesData'];
            $feedback->sarana_prasarana =  $request[0]['saranaPrasarana'];
            $feedback->rujukan = $request[0]['rujukan'];
            $feedback->save();
        }
        // return Inertia::render('Feedback2');
        return redirect('/feedback');
    }

    public function storeForm(Request $request)
    {
        // dd($request[0]['nama']);
        $customer = new Customer;
        $customer->nama = $request[0]['nama'];
        $customer->instansi = $request[0]['instansi'];
        $customer->email = $request[0]['email'];
        $customer->no_wa = $request[0]['noWa'];
        // $customer->konfirmasi = 0;
        $customer->save();

        foreach ($request[0]['kategori'] as $kategori => $value) {
        # code...
            $kategoriSubscriber = new KategoriSubscriber;
            $kategoriSubscriber->kategori = $value['value'];
            $kategoriSubscriber->customer_id = $customer->id;
            $kategoriSubscriber->save();
        }
        return redirect('/formregister');
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
