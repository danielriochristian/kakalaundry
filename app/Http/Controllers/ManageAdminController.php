<?php
namespace App\Http\Controllers;
use App\Admin;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Cuci;
use Maatwebsite\Excel\Facades\Excel;


class ManageAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){

        return view('partial.admin');
    }

    public function tambah(){
    $rules = array(
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      else {
        $manage = new Admin;
        $manage->name = $request->name;
        $manage->email = $request->email;
        $manage->password = bcrypt($request['password']);
        // var_dump($manage);die();
        $manage->save();
        return response()->json($manage);
      }
}
    public function editPost(request $request){
    $manage = Admin::find ($request->id);
    $manage->name = $request->name;
    $manage->email = $request->email;

    // $manage->password = bcrypt($request['password']);
    $manage->save();
    return response()->json($manage);
    }
    public function deletePost(request $request){
    $manage = Admin::find ($request->id)->delete();
    return response()->json();
    }

    public function admintb(){
      return DataTables::of(User::query())

              ->addColumn('action', function ($datatb) {
                  return
                   '<button data-id="'.$datatb->id.'" data-name="'.$datatb->name.'"  data-email="'.$datatb->email.'"   class="edit-modal btn btn-xs btn-info" type="submit"><i class="fa fa-edit"></i> Edit</button>'
                   .'<div style="padding-top:10px"></div>'
                  .'<button data-id="'.$datatb->id.'" data-name="'.$datatb->name.'" data-email="'.$datatb->email.'"  class="delete-modal btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>';
              })


              ->make(true);
    }

    public function export()
    {
      $cuci = DB::table('cuci')->get();
      $cuci_array[] = array('No Transaksi','Nama Customer','No Handphone','Alamat','Berat Pakaian','Jenis Pelayanan','Paket','Jenis Cucian','Jenis Pengharum','Total Harga','Tanggal Order','Tanggal Selesai');
      foreach($cuci as $c){
        $cuci_array[]=array(
          'No Transaksi' => $c->no_transaksi,
          'Nama Customer' => $c->nama_customer,
          'No Handphone' => $c->no_telp,
          'Alamat' => $c->alamat,
          'Berat Pakaian' => $c->berat_pakaian,
          'Jenis Pelayanan' => $c->jenis_cucian,
          'Paket' => $c->paket,
          'Jenis Cucian' => $c->jenis_cucian,
          'Jenis Pengharum' => $c->jenis_pengharum,
          'Total Harga' => $c->harga,
          'Tanggal Order' => $c->tgl_terima,
          'Tanggal Selesai'  => $c->tgl_selesai
        );
      }
      Excel::create('Invoice', function($excel) use ($cuci_array){
      $excel->setTitle('Invoice');
      $excel->sheet('Invoice', function($sheet) use ($cuci_array){
       $sheet->fromArray($cuci_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }


}
