<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_chat;
use App\Models\chats;

class chatController extends Controller
{
    public function user(Request $request){

        $success_msg =  $request->session()->get('success');
        $error_msg =  $request->session()->get('error');
        
        return view ('/signup',['success_msg' => $success_msg,'error_msg' => $error_msg]);
    }
    public function addChat(Request $request){

        $this->validate($request,[

            'first_name'=>['required'],
            'last_name'=>['required'],
            'phone' => ['required','max:20'],
            'email' => ['required','max:30'],
            'password' => ['required','max:10'],
            'image' => ['required']
            
        ]);
      
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('uploads'); 
            $image->move($imagePath, $imageName);
    
          
        $user = new user_chat();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->image = $imageName;
           
        if($user->save()){

           $request->session()->flash('success','Add chat successfully');
           
        } else {
            $request->session()->flash('error','something went wrong. Please try again!');
        }

        return redirect('signup');
        
        }
        public function loginUser(Request $request){
        
            $success_msg =  $request->session()->get('success');
            $error_msg =  $request->session()->get('error');
            
            return view ('login',['success_msg' => $success_msg,'error_msg' => $error_msg]);
            
        }
        public function loginChat(Request $request){

            $this->validate($request,[

            'email' => ['required','max:30','email'],
            'password' => ['required','max:10']
                  
            ]);
            
            $email = $request->input('email');
            $password = $request->input('password');
            $user = user_chat::where(['email' => $email,'password'=> $password])->first();
            
            if($user){    
                $request->session()->put('id',$user->id);

            } else {

                $request->session()->flash('error','something went wrong. Please try again!');

                return redirect('/login');
            }
            return redirect('/chat');          
            
            }
     
           public function userChat(Request $request,$id = null){

            $loggedInId = $request->session()->get('id');
            $user = user_chat::where('id','!=',$loggedInId)->get();
    

            if($id != null){

                $parter_detail = user_chat::find($id);
                
               
            } else {
                
                $parter_detail = user_chat::first();
                
            }
            $chatInfo = chats::where(['sender_id' => $loggedInId, 'receiver_id' => $id])
                        ->orWhere(function($query) use ($id,$loggedInId) {
                                    $query->where('sender_id',$id)
                                    ->where('receiver_id',$loggedInId);
              })->get();

              $loggedInId = $request->session()->get('id');

            return view('chat',['users'=>$user,'detail' => $parter_detail,'show'=>$chatInfo,'hn' => $loggedInId]);
            
    }
     public function addMessage(Request $request){

        $this->validate($request,[

            'message' => ['required']
            
        ]);
    
        $user = new chats();
        $user->sender_id = $request->session()->get('id');
        $user->receiver_id = $request->input('receiver_id');
        $user->message = $request->input('message');
        
        if($user->save()){

           $request->session()->flash('success','Add chat successfully');
           
        } else {
            $request->session()->flash('error','something went wrong. Please try again!');
        }

        return redirect('chat/'.$user->receiver_id);
        
        }
        
}