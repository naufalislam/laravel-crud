@extends('layouts.master')

<!-- @section('header')

<link rel="pingback" href="http://www.themeineed.com/xmlrpc.php">
<link rel="shortcut icon" href="//themeineed.com/wp-content/uploads/2015/02/favicon.png">
@stop -->
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> 
                        <!-- MAIN CONTENT -->
                        <div class="main-content">
                            <div class="container-fluid">
                                <!-- OVERVIEW -->
                                <div class="panel panel-headline">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Weekly Overview</h3>
                                        <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="metric">
                                                    <span class="icon"><i class="fa fa-user"></i></span>
                                                    <p>
                                                        <span class="number">{{totalSiswa()}}</span>
                                                        <span class="title">Total Siswa</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="metric">
                                                    <span class="icon"><i class="fa fa-user"></i></span>
                                                    <p>
                                                        <span class="number">{{totalGuru()}}</span>
                                                        <span class="title">Total Guru</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="metric">
                                                    <span class="icon"><i class="fa fa-eye"></i></span>
                                                    <p>
                                                        <span class="number">274,678</span>
                                                        <span class="title">Visits</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="metric">
                                                    <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                                    <p>
                                                        <span class="number">35%</span>
                                                        <span class="title">Conversions</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    
                                    </div>
                                </div>
                                <!-- END OVERVIEW -->
                            </div>
                        </div>
                        <!-- END MAIN CONTENT -->
                        </div>

                        <!-- rangking -->
                    <div class="col-md-12"> 
                    <div class="panel">
                        <div class="panel-body">
                            <h2 class="panel-title">Rangking 5 Besar</h2>
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rangking = 1;
                                    @endphp
                                    @foreach(rangking5Besar() as $s)
                                    <tr>
                                        <td>{{$rangking}}</td>
                                        <td>{{$s->nama}}</td>
                                        <td>{{$s->rataRataNilai}}</td>
                                    </tr>
                                    @php
                                        $rangking++;
                                    @endphp 
                                    @endforeach
                                </tbody>
                          
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop