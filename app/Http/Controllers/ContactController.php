<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use App\Message;
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
      
        $users = User::all();

       
        if ($request->ajax()) {
            

          
            $data = Contact::latest()->get();
         

           
            foreach($data as $key=>$datae)
            {                    
                $datae->name= $datae->user->name;
                $datae->email= $datae->user->email;
                
                                     
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
        // $this->validate($request,[
        //     'user_id' => 'required',
        //     'subject' => 'required',
        //     'message' => 'required',
        // ]);
        $contact = new Contact();

      
        $contact->id= $request->create_id;
        $contact->user_id= $request->user;
        $contact->message= $request->messageH;
        $contact->subject= $request->subject;
        
        $contact->save();
        Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
   
    
    //         $contact->save();
    //    Contacts::updateOrCreate(['id' => $request->create_id],
    //      [ 'subject' =>$request->subject,'message' => $request->messageH]
    //     );   
               
    

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
       
        $product = Contact::find($id);
        return response()->json($product);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contact.show',compact('contact'));
    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
    
        
    public function sendMessage(Request $request)
    {
        
       
        $this->validate($request,[
            'subject' => 'bail|required',
            'message' => 'bail|required|alpha_num',
        ]);

        $contact = new Contact();
        
        $user = new User();
        $contact->user_id= Auth::user()->id;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
    
    
            $contact->save();
             Toastr::success('Your message successfully send.','Success',["positionClass" => "toast-top-right"]);
        
       

        return view ('download');
        
    }

    public function user()
    {
        
        
        return view('contact.user');;
    }
}
