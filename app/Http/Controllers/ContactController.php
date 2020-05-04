<?php

namespace App\Http\Controllers;


use App\User;
use App\Message;
use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Auth;
use DataTables;
 
class ContactController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index(Request $request)
    {
      
                
        $users = User::where([
            ['id','!=', Auth::user()->id]
        ])->get();

    
       
        if ($request->ajax()) {
            

          
          
            $data = Message::where([
                ['user_id_r','=',Auth::user()->id]
              
             
                ])->get();

         
                 
      
         
            $user = User::get();
           
            foreach($data as $key=>$datae)
            {  
            foreach($user as $key=>$usere)
                if   ( $usere->id == $datae->user_id_e )  
                {           
                $datae->name=  $usere->name ;
                $datae->email= $usere->email;
                }
                                     
            }
            
          
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Show</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        
      return view('contact.index', compact('users'));
    }



    
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
        
        
      $contact = new Message();

      


           $contact->id= $request->create_id;
           $contact->user_id_e=  Auth::user()->id;
           $contact->user_id_r= $request->user;
           $contact->subject= $request->subject;
           $contact->message= $request->messageH;
        
        
         $contact->save();
        
          
             
  
        //  Message::updateOrCreate(['id' => $request->create_id],
        //     [ 'user_id_e'=> Auth::user()->id,'user_id_r'=>$request->user, 'subject' =>$request->subject,'message' => $request->messageH]
        //    );   
               
           Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        

       return response()->json(['success'=>'Product saved successfully.']);
    }


    
    public function store2(Request $request)
    {
       

      
  

      $product = Message::find($request->userR);

      
      
      
      $contact = new Message();

      $contact->id= $request->response_id;
      $contact->user_id_e=  Auth::user()->id;
      $contact->user_id_r= $product->user_id_e;
      $contact->subject= 'RE:'.$product->subject;
      $contact->message= $request->messageR;
   
   
    $contact->save();
        // $product = Message::find($request->userR);
        // Message::updateOrCreate(['id' => $request->response_id],
        // [ 'user_id_e'=>$Auth::user()->id,'user_id_r'=>$request->userR, 'subject' =>'RE:'.$product->subject,'message' => $request->messageR]
        // );   
      //  Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
          


    return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $product = Message::find($id);
        return response()->json($product);
    }






  public function show(Request  $request)
    { 
           
        $users = User::where([
            ['id','!=', Auth::user()->id]
        ])->get();

    
       
    if ($request->ajax()) {
        

      
      
        $data = Message::where([
            ['user_id_e','=',Auth::user()->id]
          
         
            ])->get();

     
             
  
     
        $user = User::get();
       
        foreach($data as $key=>$datae)
        {  
        foreach($user as $key=>$usere)
            if   ( $usere->id == $datae->user_id_r )  
            {           
            $datae->name=  $usere->name ;
            $datae->email= $usere->email;
            }
                                 
        }
        
      
       
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Show</a>';

                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
  
    
  return view('contact.show', compact('users'));
}






    
    // public function show($id)
    // {
    //     $contact = Message::find($id);
    //     return view('message.show',compact('contact'));
    // }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
    
        
    public function sendMessage(Request $request)
    {
        
        
       
    
       
        $this->validate($request,[
            'subject' => 'bail|required',
            'message' => 'bail|required',
        ]);

        $contact = new Message();
        
        $user = new User();
        $contact->user_id_e= Auth::user()->id;
        $contact->user_id_r=$request->user;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
    
    
            $contact->save();
             Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        
       

        return view ('download');
        
    }

    public function user()
    {
        
          
        

       
        
        $users = User::where([
            ['id','!=', Auth::user()->id]
        ])->get();
        
        return view('contact.user',compact('users'));;
    }
}
