<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Pakaian;
use App\Cuci;
use Auth;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        return view('partial.order');
    }


    public function postorder(Request $request)
    {
        $jenis = $request->jenis;
        $paket = $request->paket;
        $datenow = date('Y-m-d H:i:s');
        if($jenis == 'Cuci' && $paket == 'Reguler'){
            $jenis = 6000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 3 days'));
        }else if($jenis == 'Cuci' && $paket == 'Kilat'){
            $jenis = 8000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 2 days'));
        }elseif($jenis == 'Cuci' && $paket == 'Express'){
            $jenis = 10000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 1 days'));
        }elseif($jenis == 'Cuci + Setrika'  && $paket == 'Reguler'){
            $jenis = 8000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 3 days'));
        }elseif($jenis == 'Cuci + Setrika' && $paket == 'Kilat'){
            $jenis = 10000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 2 days'));
        }else{
            $jenis = 15000;
            $date = date('Y-m-d H:i:s', strtotime($datenow. ' + 1 days'));
        }
          $berat = $request->berat;
           $total = $berat * $jenis;
           // dd($jenis);

    date_default_timezone_set('Asia/Jakarta');
    $my_img = imagecreate( 405, 400 );
    $background = imagecolorallocate( $my_img, 255, 255, 255 );
    $text_colour = imagecolorallocate( $my_img, 0, 0, 0 );


    $konsumen = $request->nama;
    $kasir = Auth::User()->name;
    $jenis = $request->jenis;
    $berat = $request->berat;

    DB::table('customers')->insert([
    'nama_customer' => $request->nama,
    'alamat' => $request->alamat,
    'no_telp' => $request->hp
    ]);

    DB::table('pakaian')->insert([
    'jenis_cucian' => $request->pakaian,
    'berat_pakaian' => $request->berat,
    'jenis_pengharum' => $request->pengharum,
    'jenis_pelayanan' => $request->jenis,
    'paket' => $request->paket,
    'harga' => $total,
    ]);

    $id_cus = DB::table('customers')->orderBy('id_customer', 'desc')->first()->id_customer;
    $kd_pakaian = DB::table('pakaian')->orderBy('kd_pakaian', 'desc')->first()->kd_pakaian;
    // $concat = 'C'.$id_cus;
    // dd($concat);
    DB::table('cuci')->insert([
    'id_customer' => $id_cus,
    'kd_pakaian' => $request->berat,
    'nama_customer' => $request->nama,
    'no_telp' => $request->hp,
    'alamat' => $request->alamat,
    'jenis_cucian' => $request->pakaian,
    'berat_pakaian' => $request->berat,
    'jenis_pengharum' => $request->pengharum,
    'jenis_pelayanan' => $request->jenis,
    'paket' => $request->paket,
    'harga' => $total,
    'tgl_terima' => date('Y-m-d H:i:s'),
    'tgl_selesai' => $date
    ]);

    // $c = new Cuci;
    // $c->nama = $request->nama;
    // $c->hp = $request->hp;
    // $c->alamat = $request->alamat;
    // $c->berat = $request->berat;
    // $c->jenis_pelayanan = $request->jenis;
    // $c->paket = $request->paket;
    // $c->jenis_ = $request->paket;
    // $c->paket = $request->paket;
    // $c->total = $total;
    // $c->tgl_terima = date('Y-m-d H:i:s');
    // $c->tgl_selesai = $date;
    // // var_dump($c);die();
    // $c->save();

    //Text :
    imagestring( $my_img, 4, 150, 17, "Kaka Laundry", $text_colour );
    imagestring( $my_img, 4, 140, 32, "Bukti Transaksi", $text_colour );
    imagestring( $my_img, 4, 30, 100, "Konsumen : ".$konsumen."", $text_colour );
    imagestring( $my_img, 4, 30, 120, "Kasir : ".$kasir."", $text_colour );
    imagestring( $my_img, 4, 30, 140, "Tanggal Order : " .$datenow."", $text_colour );
    imagestring( $my_img, 4, 30, 160, "Estimasi Selesai : ".$date."", $text_colour );
    imagestring( $my_img, 4, 30, 220, "Items : ".$jenis.", Paket ".$paket." ", $text_colour );
    imagestring( $my_img, 4, 30, 240, "Berat : ".$berat." Kg", $text_colour );
    imagestring( $my_img, 4, 30, 260, "Total : Rp ".$total."", $text_colour );
    imagestring( $my_img, 4, 30, 340, "Jl. Margonda Raya No.100, Pondok Cina, Beji,", $text_colour );
    imagestring( $my_img, 4, 80, 360, "Kota Depok, Jawa Barat 16424", $text_colour );

    imagesetthickness ( $my_img, 5 );
    header( "Content-type: image/png" );
    imagepng( $my_img );
    imagecolordeallocate( $line_color );
    imagecolordeallocate( $text_color );
    imagecolordeallocate( $background );
    imagedestroy( $my_img );
    }

}
