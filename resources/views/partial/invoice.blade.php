@extends('layout')
@section('labelinvoice')

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="breadcomb-wp">
      <div class="breadcomb-icon">
          <h2>List Invoice</h2>
      </div>
    </div>
  </div>
@endsection

@section('invoice')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="data-table-list">
          <div class="card-body">
              <table id="contoh" class="table table-striped table-bordered responsive datatable" style="width:100%">
                  <thead>
                      <tr>
                          <th>Nomor Transaksi</th>
                          <th>Nama Customer</th>
                          <th>Nomor Handphone</th>
                          <th>Alamat</th>
                          <th>Berat</th>
                          <th>Jenis Pelayanan</th>
                          <th>Paket</th>
                          <th>Jenis Cucian</th>
                          <th>Jenis Pengharum</th>
                          <th>Total Harga</th>
                          <th>Tanggal Order</th>
                          <th>Tanggal Selesai</th>
                      </tr>
                  </thead>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  // DataTable
  $('.datatable').DataTable({
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian-Alternative.json"
    },
    processing: true,
    serverSide: true,
    responsive: true,
       scrollX:        true,
    ajax: '{{ route('customer/json') }}',
    columns: [
      {data: 'no_transaksi', name: 'no_transaksi'},
      {data: 'nama_customer', name: 'nama_customer'},
      {data: 'no_telp', name: 'no_telp'},
      {data: 'alamat', name: 'alamat'},
      {data: 'berat_pakaian', name: 'berat_pakaian'},
      {data: 'jenis_pelayanan', name: 'jenis_pelayanan'},
      {data: 'paket', name: 'paket'},
      {data: 'jenis_cucian', name: 'jenis_cucian'},
      {data: 'jenis_pengharum', name: 'jenis_pengharum'},
      {data: 'harga', name: 'harga'},
      {data: 'tgl_terima', name: 'tgl_terima'},
      {data: 'tgl_selesai', name: 'tgl_selesai'},
    ]
  });
});


</script>

@endsection
