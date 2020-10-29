@extends('layouts.master')
@section('content')
<div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Tambah Data Karyawan</h3>
                  
                </div>
                <div class="panel-body">       
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
    <select class="form-control" id="exampleFormControlSelect1" name="gaji_id">
      <!-- <option value="1"{{(old('grade_id') == '1') ? ' selected' : ''}}>1</option>
      <option value="2"{{(old('grade_id') == '2') ? ' selected' : ''}}>2</option> -->
      <option disabled value>Pilih Grade</option>
      @foreach($peg as $item)
  <option value="{{ $item->id }}">{{$item->gaji}}</option>
  @endforeach
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
      </div>
  </div>
</div>

@stop