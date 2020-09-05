@extends('layouts.master')
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Inputs</h3>
				</div>
				<div class="panel-body">
                <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$siswa->nama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleInputEmail1" >
                    <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif >Laki-Laki</option>
                    <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif >Perempuan </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" >Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$siswa->agama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" >Alamat</label>
                    <textarea name="alamat" class="form-control " id="exampleInputEmail1" rows="3"  >{{$siswa->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" >Avatar</label>
                    <input name="avatar" type="file" class="form-control">
                    
                </div>
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
    </div>
@stop
@section('content1')
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
    @endif
    <div class="row" >
        
        
     
        </div> 
        <div class="col-lg-12">
        <h1>Edit Data Siswa</h1>
        <br>
        <form action="/siswa/{{$siswa->id}}/update" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$siswa->nama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleInputEmail1" >
                    <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif >Laki-Laki</option>
                    <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif >Perempuan </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" >Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$siswa->agama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" >Alamat</label>
                    <textarea name="alamat" class="form-control " id="exampleInputEmail1" rows="3"  >{{$siswa->alamat}}</textarea>
                </div>

                </div>
                    <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
            </div>
     </div>


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
           
      </div>
    </div>
  </div>
</div>
@endsection