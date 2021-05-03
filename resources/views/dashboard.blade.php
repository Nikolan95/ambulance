@extends('layouts.layout')
@section('content')

<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Metrica</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hospital</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
           
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="/examinations/unchecked">
                            <h4 class="mb-0 header-title">New Examinations</h4>
                            <hr class="hr-dashed"> 
                           <div class="d-flex justify-content-between">
                                <div class="icon-info align-self-center">
                                    <i class="las la-stethoscope text-pink font-40"></i>
                                </div>
                                <div>
                                    <h4 class="font-22 font-weight-semibold text-right">{{ $exm }}</h4>
                                    <h6 class="font-12 text-muted mb-0 text-uppercase font-weight-semibold"></h6>  
                                </div>
                            </div>                                                                                                                                                         
                            </a>  
                        </div><!--end card-body-->                                
                    </div><!--end card-->   
                </div><!-- end col-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="/examinations/checked"> 
                            <h4 class="mb-0 header-title">Examinations history</h4>
                            <hr class="hr-dashed"> 
                           <div class="d-flex justify-content-between">
                                <div class="icon-info align-self-center">
                                    <i class="las la-bed text-warning font-40"></i>
                                </div>
                                <div>
                                    <h4 class="font-22 font-weight-semibold text-right">{{ $allexm }}</h4>
                                    <h6 class="font-12 text-muted mb-0 text-uppercase font-weight-semibold"></h6>  
                                </div>  
                           </div>
                            </a>                                                                                                                                                         
                        </div><!--end card-body-->                                
                    </div><!--end card-->   
                </div><!-- end col-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="/patients"> 
                            <h4 class="mb-0 header-title">Patients</h4>
                            <hr class="hr-dashed"> 
                           <div class="d-flex justify-content-between">
                                <div class="icon-info align-self-center">
                                    <i class="las la-stethoscope text-success font-40"></i>
                                </div>
                                <div>
                                    <h4 class="font-22 font-weight-semibold text-right text-dark-alt">{{ $pat }}</h4>
                                </div>  
                           </div>
                            </a>                                                                                                                                                         
                        </div><!--end card-body-->                                
                    </div><!--end card-->   
                </div><!-- end col-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="/doctors"> 
                            <h4 class="mb-0 header-title">Doctors</h4>
                            <hr class="hr-dashed"> 
                           <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    <i class="las la-stethoscope text-purple font-40"></i>
                                </div>
                                <div>
                                    <h4 class="font-22 font-weight-semibold text-right">{{ $doc }}</h4> 
                                </div>  
                           </div>
                        </a>                                                                                                                                                         
                        </div><!--end card-body-->                                
                    </div><!--end card-->   
                </div><!-- end col-->           
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body dash-info-carousel mb-0">
                            <span class="text-success mb-2 d-block">Today Available</span>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($doctors as $doctor)
                                    @if ($loop->first) <div class="carousel-item active"> @else <div class="carousel-item"> @endif
                                        <div class="row">    
                                            <div class="col-12 align-self-center">
                                                <h4 class="mt-0 header-title text-left">Ambulance</h4>
                                                <div class="media mt-3">
                                                    <img src={{asset('images/dr-1.jpg')}} alt="" height="120"  class="rounded-circle">                                   
                                                    <div class="media-body align-self-center ml-3">
                                                        <h2 class="mb-1 mt-0 dr-title">Dr.{{$doctor->firstname}} {{$doctor->lastname}}</h2>
                                                        <p class="text-muted font-13 mb-2"><span class="mr-2 text-secondary">{{ $doctor->doc_type->type }}</span></p>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item m-0"><i class="mdi mdi-star text-warning font-20"></i></li>
                                                            <li class="list-inline-item m-0"><i class="mdi mdi-star text-warning font-20"></i></li>
                                                            <li class="list-inline-item m-0 m-0"><i class="mdi mdi-star text-warning font-20"></i></li>
                                                            <li class="list-inline-item m-0"><i class="mdi mdi-star text-warning font-20"></i></li>
                                                            <li class="list-inline-item m-0"><i class="mdi mdi-star-half text-warning font-20"></i></li>
                                                            <li class="list-inline-item m-0"><small class="text-muted">4.91/5 (1021 reviews)</small></li>
                                                        </ul> 
                                                    </div><!--end media-body-->
                                                </div> <!--end media--> 
                                                <hr class="hr-dashed"> 
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="text-center">
                                                            <i data-feather="phone" class="align-self-center icon-lg icon-dual-info d-block mx-auto mb-2"></i>                                 
                                                            <h5 class="mt-0 mb-1">Phone No</h5>
                                                            <p>+01 1234567890</p>
                                                        </div><!--end/div-->
                                                    </div><!--end col-->
                                                    <div class="col-6">
                                                        <div class="text-center">
                                                            <i data-feather="globe" class="align-self-center icon-lg icon-dual-info d-block mx-auto mb-2"></i>                                 
                                                            <h5 class="mt-0 mb-1">Website</h5>
                                                            <a href="#" class="text-primary mb-0 font-14">www.{{$doctor->username}}.com</a>
                                                        </div><!--end/div-->
                                                    </div><!--end col-->
                                                </div> <!--end row-->                                           
                                            </div><!--end col-->                                                        
                                        </div><!--end row-->                                                    
                                    </div><!--end carousel-item-->
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div><!--end card-body-->                                                                                                        
                    </div><!--end card-->
                </div><!-- end col-->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">    
                            <h4 class="header-title mt-0 mb-3">New Examinations assinged to you</h4>                                
                            <div class="table-responsive">
                                <table id="datatable" class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Patient First Name</th>
                                        <th>Patient Last name</th>
                                        <th>Location</th>                                                    
                                        <th>Jmbg</th>
                                        <th> Diagnosis</th>                                               
                                        <th class="text-right">Action</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                    @foreach($examinations as $examination)
                                    <tr id="examinationrow{{$examination->id}}">
                                        <td>{{$examination->patient->firstname}}</td>
                                        <td>{{$examination->patient->lastname}}</td>
                                        <td>{{$examination->patient->location->location}}</td>                                                    
                                        <td>{{$examination->patient->jmbg}}</td>
                                        <td><a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="{{$examination->id}}" data-name="{{ $examination->patient->firstname }} {{ $examination->patient->lastname }}" data-diagnosis="{{ $examination->diagnosis }}" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a></td>                                             
                                        <td class="text-right"> <a href="javascript:void(0)" onclick="performExamination({{$examination->id}})" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        </td>
                                    </tr><!--end tr-->
                                    @endforeach                                                  
                                    </tbody>
                                </table>                    
                            </div>                                         
                        </div><!--end card-body--> 
                    </div><!--end card--> 
                </div> <!--end col-->   
            </div><!--end row-->
        </div><!-- container -->
        <footer class="footer text-center text-sm-left">
            &copy; 2021 Nikola 
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
@include('examinationmodal')
@endsection
