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
                  <h3 class="panel-title">Edit Data Karyawan</h3>
                  
                </div>
                <div class="panel-body">
                   <form action="/karyawan/{{$karyawan->id}}/update" method="POST">
        {{csrf_field()}}
  <div class="form-group">
    <div class="form-group{{$errors->has('nip') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Nip</label>
    <input type="text" name="nip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan nip" value="{{$karyawan->nip}}">
     @if($errors->has('nip'))
        <span class="help-block">{{$errors->first('nip')}}</span>
    @endif
  </div>
   <div class="form-group">
    <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukan nama" value="{{$karyawan->nama}}" >
    @if($errors->has('nama'))
        <span class="help-block">{{$errors->first('nama')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('gender') ? ' has-error' : ''}}">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender" value="{{$karyawan->gender}}">
      <option value="M" @if($karyawan->gender == 'M') selected @endif>Male</option>
      <option value="F" @if($karyawan->gender == 'F') selected @endif>Female</option>
    </select>
    @if($errors->has('gender'))
        <span class="help-block">{{$errors->first('gender')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$karyawan->tanggal_lahir}}">
    @if($errors->has('tanggal_lahir'))
        <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
    @endif
  </div>
  <div class="form-group">
    <div class="form-group{{$errors->has('tanggal_masuk') ? ' has-error' : ''}}">
    <label for="exampleInputEmail1">Tanggal Masuk</label>
    <input type="date" name="tanggal_masuk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$karyawan->tanggal_masuk}}">
    @if($errors->has('tanggal_masuk'))
        <span class="help-block">{{$errors->first('tanggal_masuk')}}</span>
    @endif
  </div>
  <div class="form-group">
      <div class="form-group{{$errors->has('grade_id') ? ' has-error' : ''}}">
    <label for="exampleFormControlSelect1">Grade</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gaji_id" value="{{$karyawan->gaji_id}}">
      <!-- <option value="1"{{(old('grade_id') == '1') ? ' selected' : ''}}>1</option>
      <option value="2"{{(old('grade_id') == '2') ? ' selected' : ''}}>2</option> -->
      <option value="{{$karyawan->gaji_id}}">{{$karyawan->gaji->gaji}}</option>
      @foreach($peg as $item)
  <option value="{{ $item->id }}">{{$item->gaji}}</option>
  @endforeach
    </select>
    @if($errors->has('grade_id'))
        <span class="help-block">{{$errors->first('grade_id')}}</span>
    @endif
  </div>

   <!--  <div class="form-group">
      <div class="form-group{{$errors->has('grade_id') ? ' has-error' : ''}}">
    <label for="exampleFormControlSelect1">Grade</label>
    <select class="form-control" id="exampleFormControlSelect1" name="grade_id" value="{{$karyawan->grade_id}}">
      <option value="1" @if($karyawan->grade_id == '1') selected @endif>1</option>
      <option value="2" @if($karyawan->grade_id == '2') selected @endif>2</option>
    </select>
    @if($errors->has('grade_id'))
        <span class="help-block">{{$errors->first('grade_id')}}</span>
    @endif
  </div> -->
  </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-warning">Update</button>

</form>
              </div>

            </div>
          </div>
      </div>
  </div>
</div>

@stop
@section('content1')
      <h1>Edit Data Karyawan</h1>
			@if(session('sukses'))
			<div class="alert alert-primary" role="alert">
  				{{session('sukses')}}
			</div>
			@endif
			<div class="row">
        <div class="col-lg-12">

     
      
      </div>
    </div>
</div>
@endsection


