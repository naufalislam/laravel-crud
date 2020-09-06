@extends('layouts.master')

@section('content')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> 
                        <!-- TABLE HOVER -->
                        <div class="panel">
                        <div class="col-lg-12">
                        <h2 >Data Siswa</h2>
                        <div class="top-right">
                                <form class="navbar-form navbar-left" method="GET" action="/siswa">
                                    <div class="input-group">
                                        <input name="cari" type="text" value="" class="form-control" placeholder="Search">
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Search</button></span>
                                    </div>
                                </form>
                                </div>
                            <div class="panel-heading">
                                <div class="col-lg-12">                               
                                @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                                </div>
                                @endif
                        </div>
                                </div>
                                <div class="right">
                                    <!-- Button trigger modal -->
                                    <button  type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Siswa
                                    <!-- <i class="lnr lnr-plus-circle"></i> -->
                                    </button>
                                </div>
                               
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Agama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_siswa as $siswa)
                                        <tr>
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama}}</a></td>
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->jenis_kelamin}}</a></td> 
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->agama}}</a></td> 
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->alamat}}</a></td>  
                                            <td>
                                                <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TABLE HOVER -->
                        
                    </div>
                </div>
            </div>
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
                
            <form action="/siswa/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}}">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('nama')}}">
                    @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                    @endif
                </div>
                <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleInputEmail1">
                    <option value="Laki-Laki" {{(old('jenis_kelamin') == 'Laki-Laki') ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : ''}}>Perempuan </option>
                    @if($errors->has('jenis_kelamin'))
                        <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                    @endif
                    </select>
                </div>
                <div class="form-group{{$errors->has('agama') ? 'has-error' : ''}}">
                    <label for="exampleInputPassword1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{old('agama')}}">
                    @if($errors->has('agama'))
                        <span class="help-block">{{$errors->first('agama')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleInputEmail1" rows="3" >{{old('alamat')}}</textarea>
                </div>
                <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
                    <label for="exampleFormControlTextarea1" >Avatar</label>
                    <input name="avatar" type="file" class="form-control">
                    @if($errors->has('avatar'))
                        <span class="help-block">{{$errors->first('avatar')}}</span>
                    @endif
                </div>
                </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
    <br>
    <div class="row" >
        <div class="col-6"><h1>Data Siswa</h1></div>
        <div class="col-6">
        <!-- Button trigger modal -->
        <button  type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">
        Tambah Data Siswa
        </button>

     
        </div> 
            <table class="table table-hover" >
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($data_siswa as $siswa)
                <tr>
                    <td>{{$siswa->nama}}</td> 
                    <td>{{$siswa->jenis_kelamin}}</td>
                    <td>{{$siswa->agama}}</td>
                    <td>{{$siswa->alamat}}</td>
                    <td>
                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            </table>
        
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
                
            <form action="/siswa/create" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleInputEmail1">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleInputEmail1" rows="3"></textarea>
                </div>

                </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
    </div>
  </div>
  @endsection
