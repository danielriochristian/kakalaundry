<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Cuci;
use Illuminate\Support\Facades\Auth;


class InvoiceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $customer = Cuci::paginate(4);
      return view('partial.invoice', compact('customer'));
    }

    public function customertb(){
      return DataTables::of(Cuci::query())
    ->make(true);
   }
}
