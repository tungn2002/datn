<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Hospital;
use App\Models\Prescription;
use App\Models\MedicalResult;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Consult;
use Illuminate\Support\Facades\App;


use Auth;
use DB;

use App\Models\PrescriptionMedicine;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB as FacadesDB;

class PdfController extends Controller
{
    public function pdf($id){
        $pdf = App::make('dompdf.wrapper');//tạo pdf
        
        //thong tin bv
        $h = Hospital::first();
        //thong tin bacsi
        $user = FacadesAuth::user();

        // thong tin don thuoc
        $p = Prescription::where('id_pre', $id)->first();

        $date = new \DateTime($p->day);
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');
        //chu ky
        $imagePath= public_path('image/'.$user->signature);

        //thuoc
        $donthuoc='Không có';
        $stt=1;

        $pm = FacadesDB::table('prescription_medicines')
        ->join('medicines', 'prescription_medicines.id_medicine', '=', 'medicines.id_medicine')
        ->where('prescription_medicines.id_prescription', $id)
        ->select('prescription_medicines.*', 'medicines.*')
        ->get();

      if($pm){
        $donthuoc='';
        foreach ($pm as $record) {
              // Xử lý từng bản ghi
              $donthuoc=$donthuoc. 
              '<div style="margin-left: 100px">
          <b>'.$stt.'. '.$record->medicinename.'</b>
          </div>
                <div style="margin-left: 100px">
          <i>'.$record->information.'<i>
        </div>';
        $stt++;

          }
      }
        //
        $pdf->loadHTML('<style>body {
        font-family:DejaVu Sans; 
        }</style><div>
        <div style="  text-align: center; ">
      <h3>'.$h->hospitalname.'</h3>
      </div>
       <div style="  text-align: right; ">
      <p>Địa chỉ: '.$h->address.'</p>
      </div>
        </div>
        <h1><center>ĐƠN THUỐC</center></h1>
       <div>
        <p style="display: inline-block; vertical-align: middle; margin-left: 100px">Họ và tên: '.$p->name.' </p>
    </div>
    <div>  <p style="margin-left: 100px"> Chẩn đoán: '.$p->diagnostic.'
    </div> 
    
      '.$donthuoc.'

                <div>

        <p style="text-align: right"> Ngày '.$day.' tháng '.$month.' năm '.$year.'</p>
                   <p style="text-align: right; margin-right:80px ">(Bác sĩ)</p>
                    <img style=" margin-right:80px; float: right; height: 80px;width: 80px" src="data:image/png;base64,'.base64_encode(file_get_contents($imagePath)).'" alt="">
    </div>

             <p style="text-align: right; margin-right: 50px; margin-top: 100px; ">'.$user->name.'</p>

        ');
        return $pdf->stream();//hiển thị pdf
    }

    //user
    public function pdff($id){
     $pdf = App::make('dompdf.wrapper');
      

      //thong tin bv
      $h = Hospital::first();
      //thong tin bác sĩ
      $user = FacadesAuth::user();
      $ps = MedicalResult::where('id_result', $id)->first();
      $pss = Appointment::where('id_appointment',$ps->id_sch )->first();

      $psss = Clinic::where('id_clinic',$pss->id_clinic )->first();
      $bacsi=User::where('id_user',$psss->id_user )->first();

      // thong tin don thuoc
      $p = Prescription::where('id_pre', $ps->id_prescription)->first();

      $date = new \DateTime($p->day);
      $day = $date->format('d');
      $month = $date->format('m');
      $year = $date->format('Y');
      //chu ky
      $imagePath= public_path('image/'.$bacsi->signature);

      //thuoc
      $donthuoc='Không có';
      $stt=1;

      $pm = FacadesDB::table('prescription_medicines')
      ->join('medicines', 'prescription_medicines.id_medicine', '=', 'medicines.id_medicine')
      ->where('prescription_medicines.id_prescription', $ps->id_prescription)
      ->select('prescription_medicines.*', 'medicines.*')
      ->get();

    if($pm){
      $donthuoc='';
      foreach ($pm as $record) {
            // Xử lý từng bản ghi
            $donthuoc=$donthuoc. 
            '<div style="margin-left: 100px">
        <b>'.$stt.'. '.$record->medicinename.'</b>
        </div>
              <div style="margin-left: 100px">
        <i>'.$record->information.'<i>
      </div>';
      $stt++;

        }
    }
      //
      $pdf->loadHTML('<style>body {
      font-family:DejaVu Sans; 
      }</style><div>
      <div style="  text-align: center; ">
      <h3>'.$h->hospitalname.'</h3>
      </div>
       <div style="  text-align: right; ">
      <p>Địa chỉ: '.$h->address.'</p>
      </div>
  </div>
      <h1><center>ĐƠN THUỐC</center></h1>
     <div>
      <p style="display: inline-block; vertical-align: middle; margin-left: 100px">Họ và tên: '.$p->name.' </p>
  </div>
  <div>  <p style="margin-left: 100px"> Chẩn đoán: '.$p->diagnostic.'
  </div> 
  
    '.$donthuoc.'

              <div>

      <p style="text-align: right"> Ngày '.$day.' tháng '.$month.' năm '.$year.'</p>
                 <p style="text-align: right; margin-right:80px ">(Bác sĩ)</p>
                  <img style=" margin-right:80px; float: right; height: 80px;width: 80px" src="data:image/png;base64,'.base64_encode(file_get_contents($imagePath)).'" alt="">
  </div>

           <p style="text-align: right; margin-right: 50px; margin-top: 100px; ">'.$bacsi->name.'</p>

      ');
      return $pdf->stream();
  }

  public function pdff2($id){
    $pdf = App::make('dompdf.wrapper');
     
     $ps = Consult::where('id_cons', $id)->first();

     //thong tin bv
     $h = Hospital::first();
     //thong tin bác sĩ


     $bacsi=User::where('id_user',$ps->user2_id )->first();

     // thong tin don thuoc
     $p = Prescription::where('id_pre', $ps->id_prescription)->first();

     $date = new \DateTime($p->day);
     $day = $date->format('d');
     $month = $date->format('m');
     $year = $date->format('Y');
     //chu ky
     $imagePath= public_path('image/'.$bacsi->signature);

     //thuoc
     $donthuoc='Không có';
     $stt=1;

     $pm = FacadesDB::table('prescription_medicines')
     ->join('medicines', 'prescription_medicines.id_medicine', '=', 'medicines.id_medicine')
     ->where('prescription_medicines.id_prescription', $ps->id_prescription)
     ->select('prescription_medicines.*', 'medicines.*')
     ->get();

   if($pm){
     $donthuoc='';
     foreach ($pm as $record) {
           // Xử lý từng bản ghi
           $donthuoc=$donthuoc. 
           '<div style="margin-left: 100px">
       <b>'.$stt.'. '.$record->medicinename.'</b>
       </div>
             <div style="margin-left: 100px">
       <i>'.$record->information.'<i>
     </div>';
     $stt++;

       }
   }
     //
     $pdf->loadHTML('<style>body {
     font-family:DejaVu Sans; 
     }</style><div>
    <div style="  text-align: center; ">
      <h3>'.$h->hospitalname.'</h3>
      </div>
       <div style="  text-align: right; ">
      <p>Địa chỉ: '.$h->address.'</p>
      </div>
     </div>
     <h1><center>ĐƠN THUỐC</center></h1>
    <div>
     <p style="display: inline-block; vertical-align: middle; margin-left: 100px">Họ và tên: '.$p->name.' </p>
 </div>
 <div>  <p style="margin-left: 100px"> Chẩn đoán: '.$p->diagnostic.'
 </div> 
 
   '.$donthuoc.'

             <div>

     <p style="text-align: right"> Ngày '.$day.' tháng '.$month.' năm '.$year.'</p>
                <p style="text-align: right; margin-right:80px ">(Bác sĩ)</p>
                 <img style=" margin-right:80px; float: right; height: 80px;width: 80px" src="data:image/png;base64,'.base64_encode(file_get_contents($imagePath)).'" alt="">
 </div>

          <p style="text-align: right; margin-right: 50px; margin-top: 100px; ">'.$bacsi->name.'</p>

     ');
     return $pdf->stream();
 }
}
