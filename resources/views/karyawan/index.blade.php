@extends('layouts.master')
@section('content')
<div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
          <form class="navbar-form navbar-right" action="/" method="GET">
          <div class="input-group">
            <input name="cari" type="text" class="form-control" placeholder="Search data...">
            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
          </div>
        </form>

            </div>

            <div class="col-md-12">


              <!-- BASIC TABLE -->

              <div class="panel">
                <a href="#" class="btn btn-primary btn-filter"><i class="lnr lnr-plus-circle" style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif"> Filter By Tanggal</i></a>
                <div class="panel-heading">
                  <h3 class="panel-title">Data Karyawan</h3>
                  
                  <div class="right">
                  <a href="/karyawan/input" class="btn btn-primary">Tambah Data</a>
                </div>
              </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                     <tr>
                      
                      <th>NIP</th>
                      <th>NAMA</th>
                      <th>GENDER</th>
                      <th>TANGGAL LAHIR</th>
                      <th>TANGGAL MASUK</th>
                      <th>GRADE</th>
                      <th>GAJI</th>
                      <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                     @foreach($karyawan as $karyawan1)
                      <tr>
                     
                      <td>{{$karyawan1->nip}}</td>
                      <td>{{$karyawan1->nama}}</td>
                      <td>{{$karyawan1->gender}}</td>
                      <td>{{$karyawan1->tanggal_lahir}}</td>
                      <td>{{$karyawan1->tanggal_masuk}}</td>
                      <td>{{$karyawan1->gaji->gaji}}</td>
                      <td>{{$karyawan1->gaji->besaran_gaji}}</td>
                   
    <td>
      <a href="/karyawan/{{$karyawan1->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
      <a href="/karyawan/{{$karyawan1->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>

    </td>
  </tr>
  @endforeach
                    </tbody>
                  </table>
                  <div class="card-footer">
                   
                  </div>
                </div>
              </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h3 class="text-center">Tambah Data Karyawan</h3></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/karyawan/create" method="POST">
       	{{csrf_field()}}
  <div class="form-group">
    <div class="form-group{{$errors->has('nip') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Nip</label>
    <input type="text" name="nip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan nip" value="{{old('nip')}}">
    @if($errors->has('nip'))
        <span class="help-block">{{$errors->first('nip')}}</span>
    @endif
  </div>
   <div class="form-group">
    <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan nama" value="{{old('nama')}}">
    @if($errors->has('nama'))
        <span class="help-block">{{$errors->first('nama')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('gender') ? ' has-error' : ''}}">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender">
      <option value="M"{{(old('gender') == 'M') ? ' selected' : ''}}>Male</option>
      <option value="F"{{(old('gender') == 'F') ? ' selected' : ''}}>Female</option>
    </select>
    @if($errors->has('gender'))
        <span class="help-block">{{$errors->first('gender')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('tanggal_lahir')}}">
    @if($errors->has('tanggal_lahir'))
        <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('tanggal_masuk') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Tanggal Masuk</label>
    <input type="date" name="tanggal_masuk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('tanggal_masuk')}}">
    @if($errors->has('tanggal_masuk'))
        <span class="help-block">{{$errors->first('tanggal_masuk')}}</span>
    @endif
  </div>

    <div class="form-group">
      <div class="form-group{{$errors->has('grade_id') ? ' has-error' : ''}}">
    <label for="exampleFormControlSelect1">Grade</label>
    <select class="form-control" id="exampleFormControlSelect1" name="grade_id">
      <!-- <option value="1"{{(old('grade_id') == '1') ? ' selected' : ''}}>1</option>
      <option value="2"{{(old('grade_id') == '2') ? ' selected' : ''}}>2</option> -->
      <option>Pilih Grade</option>
    </select>
    @if($errors->has('grade_id'))
        <span class="help-block">{{$errors->first('grade_id')}}</span>
    @endif
  </div>

  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

</form>
      
      </div>
    </div>
  </div>


@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('.btn-filter').click(function(e){
      e.preventDefault();
      
      $('#modal-filter').modal();

   })
})
</script>

<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Filter Berdasarkan Tanggal Data Dibuat</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <form role="form" action="{{ url('karyawan/periode') }}" method="get">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dari Tanggal</label>
                  <input type="date" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" autocomplete="off" >
                </div>
 
                <div class="form-group">
                  <label for="exampleInputPassword1">dari tanggal</label>
                  <input type="date" class="form-control datepicker" name="sampai" id="exampleInputPassword1" placeholder="dari tanggal" autocomplete="off">
                </div>
               
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
 
          </div>
 
         
 
        </div>
      </div>
    </div>



