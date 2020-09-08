@extends('layouts.master')

@section('content')
<div class="main">

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">

<!-- PROFILE HEADER -->
<div class="profile-header">
    <div class="overlay"></div>
    <div class="profile-main">
        <img width="100px" height="100px" src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
        <h3 class="name">{{$siswa->nama}}</h3>
        <span class="online-status status-available">Available</span>
    </div>
    <div class="profile-stat">
        <div class="row">
            <div class="col-md-4 stat-item">
            Mata Pelajaran<span>{{$siswa->mapel->count()}}</span>
            </div>
            <div class="col-md-4 stat-item">
            Kelas<span>12 D</span>
            </div>
            <div class="col-md-4 stat-item">
            Semester<span>Ganjil</span>
            </div>
           
            <!-- <div class="col-md-4 stat-item">
                2174 <span>Points</span>
            </div> -->
        </div>
    </div>
</div>
<!-- END PROFILE HEADER -->

<!-- PROFILE DETAIL -->
<div class="profile-detail">
    <div class="profile-info">
        <h4 class="heading">Data Diri</h4>
        <ul class="list-unstyled list-justify">
            <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
            <li>Agama <span>{{$siswa->agama}}</span></li>
            <li>Alamat <span>{{$siswa->alamat}}</span></li>
           
        </ul>
    </div>
    
    <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
</div>
<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->

<!-- RIGHT COLUMN -->
<div class="profile-right">


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Nilai
</button>

<!-- TABBED CONTENT -->
<div class="custom-tabs-line tabs-line-bottom left-aligned">
    <ul class="nav" role="tablist">
        <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Mata Pelajaran</a></li>
        
    </ul>
</div>
<div class="tab-content">
        <div class="panel">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr><th>Kode</th><th>Nama</th><th>Semester</th><th>Nilai</th></tr>
                                </thead>
                                <tbody>
                                @foreach($siswa->mapel as $mapel)
                                    <tr>
                                        <td>{{$mapel->kode}}</td>
                                        <td>{{$mapel->nama}}</td>
                                        <td>{{$mapel->semester}}</td>
                                        <td>{{$mapel->pivot->nilai}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
    
</div>
<!-- END TABBED CONTENT -->
</div>
<!-- END RIGHT COLUMN -->
</div>
</div>

    </div>
</div>
<!-- END MAIN CONTENT -->
</div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select class="form-control" id="mapel" name="mapel">
                           @foreach($matapelajaran as $mp)
                                <option value="{{$mp->id}}">{{$mp->nama}}</option>
                           @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nilai</label>
                            <input name="nilai" type="text" class="form-control" id="nilai">
                        
                        </div>
                    </div>
                    <div class="modal-footer">         
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
            </div>
            </div>
        </div>
        </div>
@stop

