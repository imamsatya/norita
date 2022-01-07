<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\KategoriSubscriber;
use App\Models\Feedback;
// require_once '../../../vendor/autoload';
use Inertia\Inertia;
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
        

        
        $pluck_id = [];
      
        // foreach ($request->kategori as $kategori => $value)
        // {
        //     # code...
        //     // dd($value);
        //     $kategoriSubscriber = new KategoriSubscriber;
        //     $kategoriSubscriber = $kategoriSubscriber->where('kategori', $value['value'])->get();

        //     foreach ($kategoriSubscriber as $key => $value2)
        //     {
        //         # code...
        //         array_push($pluck_id, $value2->customer_id);

        //     }
        // }
        
            $kategoriSubscriber = new KategoriSubscriber;
            $kategoriSubscriber = $kategoriSubscriber->where('kategori', $request->kategori)->get();
            foreach ($kategoriSubscriber as $key => $value2)
            {
                # code...
                array_push($pluck_id, $value2->customer_id);

            }
            // dd($pluck_id);

        foreach (array_unique($pluck_id) as $key => $value)
        {
            
            $customer = new Customer;
            $customer = $customer->where('id', $value)->first();

            // try
            // {
            //     $message = $twilio
            //         ->messages
            //         ->create("whatsapp:" . $customer->no_wa, // to
            //     ["mediaUrl" => [$request
            //         ->infografis], "body" => "Telah rilis {$request->judul} \n \n 
            //                             {$request->abstrak} \n \n 
            //                             Untuk mengunduh publikasi tersebut silakan klik tautan berikut:
            //                             {$request->link}", "from" => "whatsapp:+14155238886"]);

            // }
            // catch(\Throwable $th)
            // {
            //     $a = $th;
            //     dd($a);
            // }
            // twilio trial
           

            $data = array('name'=>$customer->nama, "abstrak"=>$request->abstrak, "link"=>$request->link);
            
            Mail::send(['html'=>'mail'], $data, function($message)  use ($request, $customer) {
                $message->to($customer->email, $customer->nama)->subject($request->judul);
                $message->from('dispo7200@gmail.com','Norita - BPS Prvosinsi Sulawesi Tengah');
            });

           

        }
        // dd($request->judul);
        $sid = getenv("TWILIO_AUTH_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");

        $twilio = new Client($sid, $token);
        // 628114554557
        $message = $twilio
        ->messages
        ->create("whatsapp:" . '+628114554557', // to
    ["mediaUrl" => [$request
        ->infografis], "body" => "Telah rilis {$request->judul} \n \n 
                            {$request->abstrak} \n \n 
                            Untuk mengunduh publikasi tersebut silakan klik tautan berikut:
                            {$request->link}", "from" => "whatsapp:+14155238886"]);



        return redirect('/dashboard');

        // print($message->sid);
        // dd($request);
        
    }
    public function storeEditedUser(Request $request){
        
        $customer = New Customer;
        $customer = $customer->where('id', $request->editedId)->first();
        $customer->nama = $request->editedNama;
        $customer->instansi = $request->editedInstansi;
        $customer->email = $request->editedEmail;
        $customer->no_wa = $request->editedNoWa;
        $customer->save();
        return redirect('/manajemen');
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
    public function deleteCustomer(Request $id){
        $feedbacks = new Feedback;
        $feedbacks = $feedbacks->where('customer_id', $id->id)->first();
        // dd($feedbacks->customer_id);
        if ($feedbacks !== NULL) {
            $feedbacks->customer_id = NULL;
        $feedbacks->save();
        
        }
       
  
        $kategoriSubscriber = KategoriSubscriber::where('customer_id', $id->id)->get();
        
        if ($kategoriSubscriber !== NULL) {
            $kategoriSubscriber->each->delete();
        }
       
      
        $customer = Customer::find($id->id);
        
        $customer->delete();

        $customers = new Customer;
        $customers = $customers
        ->get();
        
      
        return Inertia::render('Manajemen', [
            'customers' => $customers,
        ]);
        

    }
}

