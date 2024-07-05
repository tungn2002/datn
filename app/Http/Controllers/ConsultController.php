<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Consult;
use App\Models\Prescription;
use App\Models\Message;

use Carbon\Carbon;
use DB;
use Auth;

use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function trochuyenuser(){
     
        $nv = User::where('id_role', 4)->paginate(5);

        //nguoi chua tro chuyen

        $u1 = DB::table('consults')
        ->select('consults.user2_id')
        ->join('users', 'consults.user2_id', '=', 'users.id_user')
        ->where('consults.user1_id', Auth::User()->id_user)
        ->where('users.id_role', 3)
        ->distinct()
        ->pluck('consult.user2_id')
        ->toArray();

        $chuachat = User::where('id_role', 3)
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->whereNotIn('id_user', $u1)
        ->paginate(5);

        //nguoi da tro chuyen
        
        $dachat = User::where('id_role', 3)
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->whereIn('id_user', $u1)
        ->paginate(5);

        return view('trochuyenuser', ['nv' => $nv,'chuachat' => $chuachat,'dachat' => $dachat]);
    }
    public function finddoctorchat(Request $request){
     
        $nv = User::where('id_role', 4)->paginate(5);

        //nguoi chua tro chuyen

        $u1 = DB::table('consults')
        ->select('consults.user2_id')
        ->join('users', 'consults.user2_id', '=', 'users.id_user')
        ->where('consults.user1_id', Auth::User()->id_user)
        ->where('users.id_role', 3)
        ->distinct()
        ->pluck('consult.user2_id')
        ->toArray();

        $chuachat = User::where('id_role', 3)
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->whereNotIn('id_user', $u1)
        ->where('name','like','%'.$request->dl.'%')
        ->paginate(5);

        //nguoi da tro chuyen
        
        $dachat = User::where('id_role', 3)
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->whereIn('id_user', $u1)
        ->paginate(5);

        return view('trochuyenuser', ['nv' => $nv,'chuachat' => $chuachat,'dachat' => $dachat]);
    }

    public function xacnhanchat(Request $request){
        $user=Auth::User();


        //
        $pre=new Prescription;
        $pre->name="Chưa có";
        $pre->diagnostic="Chưa có";
        $pre->day= Carbon::now()->format('Y-m-d');
        $pre->save();
        //
        $c=new Consult;
        $c->user1_id=$user->id_user;
        $c->user2_id=$request->query('id');
        $c->id_prescription=$pre->id_pre;
        $c->save();
        return redirect()->route('trangchu')->with('message', 'Thanh toán thành công');

    }
    public function chatuser($id){

//chua có phòng thì tạo phòng
        $consult = Consult::where('user1_id', Auth::User()->id_user)->where('user2_id', $id)->first();

        if(!$consult){
            $c=new Consult;
            $c->user1_id= Auth::User()->id_user;
            $c->user2_id=$id;
            $c->save();
        }
//có phòng thì load tin nhắn

        $con=Consult::where('user1_id', Auth::User()->id_user)->where('user2_id', $id)->first();
        
        $message = Message::where('id_cons', $con->id_cons)->get();
//thong tin người muốn chat
        $u = User::where('id_user',$id)->first();

        return view('chatuser', ['u' => $u,'message' => $message,'idcon'=>$con->id_cons]);
    }


    public function getMessages($conversation_id)
    {
        $messages = Message::where('id_cons', $conversation_id)->get();
        return response()->json($messages);
    }


    public function addmessage(Request $request)
    {
      
        $m=new Message;
        $m->content=$request->message;
        $m->sender_id=Auth::User()->id_user;
        $m->id_cons=$request->idcon;
        $m->status='chưa xem';
        $m->save();
        return response()->json([]);
    }
    //nhanvien
    public function trochuyenempl(){
     

       // Lấy danh sách các id_consult chưa xem
       $idConsults = DB::table('messages')
       ->select('id_cons')
       ->distinct()
       ->where('status', 'chưa xem')
       ->pluck('id_cons')
       ->toArray();

// Lấy danh sách các id_consult đã xem
$otherIdConsults = DB::table('messages')
           ->select('id_cons')
           ->distinct()
           ->whereNotIn('id_cons', $idConsults)
           ->pluck('id_cons')
           ->toArray();

           //người chưa đọc
           $results1 = Consult::select('consults.*', 'users.name as name')
           ->join('users', 'consults.user1_id', '=', 'users.id_user')
           ->where('consults.user2_id',Auth::User()->id_user )
           ->whereIn('consults.id_cons',$idConsults )
            ->get();
                //người đã đọc
           $results2 = Consult::select('consults.*', 'users.name as name')
           ->join('users', 'consults.user1_id', '=', 'users.id_user')
           ->where('consults.user2_id',Auth::User()->id_user )
           ->whereIn('consults.id_cons',$otherIdConsults )
            ->get();
/*  
            
*/
        return view('trochuyenempl',['results1' => $results1,'results2' => $results2]);
        
    }

    public function trochuyenemplAjax() {
          // Lấy danh sách các id_consult chưa xem
          $idConsults = DB::table('messages')
          ->select('id_cons')
          ->distinct()
          ->where('status', 'chưa xem')
          ->pluck('id_cons')
          ->toArray();
   
   // Lấy danh sách các id_consult đã xem
   $otherIdConsults = DB::table('messages')
              ->select('id_cons')
              ->distinct()
              ->whereNotIn('id_cons', $idConsults)
              ->pluck('id_cons')
              ->toArray();
   
              //người chưa đọc
              $results1 = Consult::select('consults.*', 'users.name as name')
              ->join('users', 'consults.user1_id', '=', 'users.id_user')
              ->where('consults.user2_id',Auth::User()->id_user )
              ->whereIn('consults.id_cons',$idConsults )
               ->get();
                   //người đã đọc
              $results2 = Consult::select('consults.*', 'users.name as name')
              ->join('users', 'consults.user1_id', '=', 'users.id_user')
              ->where('consults.user2_id',Auth::User()->id_user )
              ->whereIn('consults.id_cons',$otherIdConsults )
               ->get();
        // Trả về JSON chứa dữ liệu của hai biến
        return response()->json(['results1' => $results1, 'results2' => $results2]);
    }
    public function chatempl($id){

        //
        $con=Consult::where('id_cons',$id)->first();


        $message = Message::where('id_cons', $con->$id)->get();
        //thong tin người muốn chat
                $u = User::where('id_user', $con->user1_id)->first();
        
                return view('chatempl', ['u' => $u,'message' => $message,'idcon'=>$id]);
    }


    public function getMessages2($conversation_id)
    {
        $messages = Message::where('id_cons', $conversation_id)->get();

        $affected = DB::table('messages')
        ->where('id_cons', $conversation_id)
        ->update(['status' => 'đã xem']);

        return response()->json($messages);
    }

    public function addmessage2(Request $request)
    {
      
        $m=new Message;
        $m->content=$request->message;
        $m->sender_id=Auth::User()->id_user;
        $m->id_cons=$request->idcon;
        $m->status='đã xem';
        $m->save();
        return response()->json([]);
    }

    //bacsi
    public function chatuser2($id){
      
                $con=Consult::where('user1_id', Auth::User()->id_user)->where('user2_id', $id)->first();
                
                $message = Message::where('id_cons', $con->id_cons)->get();
        //thong tin người muốn chat

                $u = User::where('id_user',$id)->first();
        
                return view('chatuser2', ['u' => $u,'message' => $message,'idcon'=>$con->id_cons]);
            }

            public function trochuyendoctor(){
     

                // Lấy danh sách các id_consult chưa xem
                $idConsults = DB::table('messages')
                ->select('id_cons')
                ->distinct()
                ->where('status', 'chưa xem')
                ->pluck('id_cons')
                ->toArray();
         
         // Lấy danh sách các id_consult đã xem
         $otherIdConsults = DB::table('messages')
                    ->select('id_cons')
                    ->distinct()
                    ->whereNotIn('id_cons', $idConsults)
                    ->pluck('id_cons')
                    ->toArray();
         
                    //người chưa đọc
                    $results1 = Consult::select('consults.*', 'users.name as name')
                    ->join('users', 'consults.user1_id', '=', 'users.id_user')
                    ->where('consults.user2_id',Auth::User()->id_user )
                    ->whereIn('consults.id_cons',$idConsults )
                     ->get();
                         //người đã đọc
                    $results2 = Consult::select('consults.*', 'users.name as name')
                    ->join('users', 'consults.user1_id', '=', 'users.id_user')
                    ->where('consults.user2_id',Auth::User()->id_user )
                    ->whereIn('consults.id_cons',$otherIdConsults )
                     ->get();
         /*  
                     
         */
                 return view('trochuyendoctor',['results1' => $results1,'results2' => $results2]);
                 
             }
             public function chatdoctor($id){
                //
                $con=Consult::where('id_cons',$id)->first();
        
        
                $message = Message::where('id_cons', $con->$id)->get();
                //thong tin người muốn chat
                        $u = User::where('id_user', $con->user1_id)->first();
                
                        return view('chatdoctor', ['u' => $u,'message' => $message,'idcon'=>$id]);
            }

            public function index(){

        
                $consult = Consult::paginate(5); 
                if (!$consult) {
                    return view('consult', ['message' => 'không có phòng tư vấn nào']);
                }
                return view('consult', ['consult' => $consult]);
            }
        
           
            public function destroy(Request $request)
            {
                $request->validate([
                    'id_cons'=>'required',
                ],[
                'id_cons.required'=>'Hãy chọn phòng tư vấn cần xóa',
                ]);
                
                $consult = Consult::find($request->id_cons);

                $u = Prescription::where('id_pre', $consult->id_prescription)->delete();

                $consult->delete();
                return redirect()->back()->with('message', 'Xóa thành công');
            
            }
            
            public function findconsult(Request $request){

        
                $consult = Consult::where('user1_id', $request->dl)
                ->paginate(5); 
                if (!$consult) {
                    return view('consult', ['message' => 'không tìm thấy phòng có người dùng tư vấn nào']);
                }
                return view('consult', ['consult' => $consult]);
            }
          
}
