@extends('layouts.master')

@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
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
        <img width="100px" height="100px" src="/images/default.jpg" class="img-circle" alt="Avatar">
        <h3 class="name">{{$guru->nama}}</h3>
        <span class="online-status status-available">Available</span>
    </div>
  
</div>
<!-- END PROFILE HEADER -->

<!-- PROFILE DETAIL -->


<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->

<!-- RIGHT COLUMN -->
<div class="profile-right">
@if(session('sukses'))
                   <div class="alert alert-success" role="alert">
                   {{session('sukses')}}
                   </div>
                   @endif
                   @if(session('error'))
                   <div class="alert alert-danger" role="alert">
                   {{session('error')}}
                   </div>
                   @endif

<!-- Button trigger modal -->


<!-- TABBED CONTENT -->
<div class="custom-tabs-line tabs-line-bottom left-aligned">
    <ul class="nav" role="tablist">
        <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Mata Pelajaran yang di ajar oleh guru {{$guru->nama}}</a></li>
        
    </ul>
</div>
<div class="tab-content">
        <div class="panel">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Semester</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guru->mapel as $mapel)
                                    <tr>
                                       <td>{{$mapel->nama}}</td>
                                       <td>{{$mapel->semester}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                           
                            </table>
                        </div>
                    </div>
    <div class="panel">
        <div id="chartNilai"></div>
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


       
@stop

@section('footer')

@stop

