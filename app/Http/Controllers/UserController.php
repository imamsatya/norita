<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\KategoriSubscriber;
// require_once '../../../vendor/autoload';
use App\Clients;
use Twilio\Rest\Client;

use Mail;

class UserController extends Controller
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
        

        $sid = getenv("TWILIO_AUTH_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");

        $twilio = new Client($sid, $token);
        
        $pluck_id = [];

        foreach ($request->kategori as $kategori => $value)
        {
            # code...
            $kategoriSubscriber = new KategoriSubscriber;
            $kategoriSubscriber = $kategoriSubscriber->where('kategori', $value['value'])->get();

            foreach ($kategoriSubscriber as $key => $value2)
            {
                # code...
                array_push($pluck_id, $value2->customer_id);

            }
        }

        foreach (array_unique($pluck_id) as $key => $value)
        {
            
            $customer = new Customer;
            $customer = $customer->where('id', $value)->first();

            try
            {
                $message = $twilio
                    ->messages
                    ->create("whatsapp:" . $customer->no_wa, // to
                ["mediaUrl" => [$request
                    ->infografis], "body" => "Telah rilis {$request->judul} \n \n 
                                        {$request->abstrak} \n \n 
                                        Untuk mengunduh publikasi tersebut silakan klik tautan berikut:
                                        {$request->link}", "from" => "whatsapp:+14155238886"]);

            }
            catch(\Throwable $th)
            {
                $a = $th;
                dd($a);
            }

            $data = array('name'=>$customer->nama, "abstrak"=>$request->abstrak, "link"=>$request->link);
            
            Mail::send(['html'=>'mail'], $data, function($message)  use ($request, $customer) {
                $message->to($customer->email, $customer->nama)->subject($request->judul);
                $message->from('dispo7200@gmail.com','Norita - BPS Prvosinsi Sulawesi Tengah');
            });

           

        }

        return redirect('/dashboard');

        // print($message->sid);
        // dd($request);
        
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

