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
class ManageAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){

        return view('partial.admin');
    }

    public function addPost(Request $request){
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

}
