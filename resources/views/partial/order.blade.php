@extends('layout')
@section('order')
<p class="card-title">Create Order</p>

      <form action="/postorder" method="post" id="myForm" enctype="multipart/form-data" target="_blank" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="floating-numner">
              <p>Nama</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
              <input type="text" name="nama" class="form-control" placeholder="Keanu Melviano" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="floating-numner">
              <p>No. Handphone</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
              <input type="text" name="hp" class="form-control" placeholder="0878423424xxx" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="floating-numner">
              <p>Alamat</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
              <input type="text" class="form-control" name="alamat" class="alamat" placeholder="Jl. Ikan Salem RT 02/RW 12" required></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="floating-numner">
              <p>Berat Pakaian</p>
            </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
                <input type="text" name="berat" class="form-control" placeholder="2" required>
            </div>
          </div>
        </div>
      </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="floating-numner">
              <p>Jenis Pelayanan</p>
            </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
              <select name="jenis" id="jenis" class="form-control">
                <option value="Cuci"> Cuci </option>
                <option value="Cuci + Setrika"> Cuci + Setrika </option>
              </select>
            </div>
          </div>
        </div>
      </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="floating-numner">
              <p>Paket</p>
            </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <div class="nk-int-st">
              <select name="paket" id="paket" class="form-control">
                <option value="Reguler"> Reguler </option>
                <option value="Kilat"> Kilat </option>
                <option value="Express"> Express </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="floating-numner">
              <p>Pengharum</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <div class="nk-int-st">
                  <select name="pengharum" id="pengharum" class="form-control">
                    <option value="Lavender"> Lavender </option>
                    <option value="Rose"> Rose </option>
                    <option value="Mint"> Mint </option>
                    <option value="Mint"> Lemon </option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="floating-numner">
              <p>Jenis Pakaian</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
            <div class="nk-int-st">
                <select name="pakaian" id="pakaian" class="form-control">
                <option value="Baju">Baju</option>
                <option value="Celana">Celana</option>
                <option value="Jas">Jas</option>
                <option value="Karpet">Karpet</option>
                <option value="Sepatu">Sepatu</option>
              </select>
            </div>
          </div>
        </div>
        </div>
        </div>

          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
          </button>
          <button type="reset" class="btn btn-danger btn-sm" onclick="myFunction()">
            <i class="fa fa-ban"></i> Reset
          </button>


    </form>

<script>
function myFunction() {
  document.getElementById("myForm").reset();
}
</script>
@endsection
