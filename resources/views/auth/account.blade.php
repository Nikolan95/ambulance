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
                                <li class="breadcrumb-item"><a href="/dashboard">ambulance</a></li>
                                <li class="breadcrumb-item active">Dr.Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dr.Profile</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body  met-pro-bg">
                            <div class="met-profile">
                                <div class="row">
                                    <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                        <div class="met-profile-main">
                                            <div class="met-profile-main-pic">
                                                <img src={{asset('images/dr-1.jpg')}} alt="" class="rounded-circle">
                                                <span class="fro-profile_main-pic-change">
                                                    <i class="fas fa-camera"></i>
                                                </span>
                                            </div>
                                            <div class="met-profile_user-detail">
                                                <h5 class="met-user-name">Dr.{{ $doctor->username }}</h5>                                                        
                                                <p class="mb-0 met-user-name-post">Category: {{ $doctor->doc_type->type }}</p>
                                            </div>
                                        </div>                                                
                                    </div><!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                        <ul class="list-unstyled personal-detail">
                                            <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 23456 78910</li>
                                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ $doctor->username }}@gmail.com</li>
                                            <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : USA</li>
                                        </ul>
                                        <div class="button-list btn-social-icon">                                                
                                            <button type="button" class="btn btn-blue btn-circle">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
    
                                            <button type="button" class="btn btn-secondary btn-circle ml-2">
                                                <i class="fab fa-twitter"></i>
                                            </button>
    
                                            <button type="button" class="btn btn-pink btn-circle  ml-2">
                                                <i class="fab fa-dribbble"></i>
                                            </button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end f_profile-->                                                                                
                        </div><!--end card-body-->
                        <div class="card-body">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="experience_detail_tab" data-toggle="pill" href="#experience_detail">Experience</a>
                                </li>
                            </ul>        
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-12">
                    <div class="tab-content detail-list" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="general_detail">
                            <div class="row">
                                <div class="col-12">                                            
                                    <div class="card">
                                        <div class="card-body">
                                           <div class="row">
                                               <div class="col-md-2">
                                                   <img src="{{asset('images/small/dr-pro.jpg')}}" alt="" class="img-fluid">
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="met-basic-detail">
                                                        <h3>{{ $doctor->firstname }} {{ $doctor->lastname }}</h3>
                                                        <p class="text-uppercase font-14">{{ $doctor->doc_type->type }}</p>
                                                        <p class="text-muted font-14">
                                                             There are many variations of passages of Lorem Ipsum available, 
                                                             but the majority have suffered alteration in some form, by injected humour, 
                                                             or randomised words which don't look even slightly believable. 
                                                             If you are going to use a passage of Lorem Ipsum, you need to be sure there 
                                                             isn't anything embarrassing hidden in the middle of text.
                                                             All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                                                        </p>
                                                        
                                                        <div class="my-3">
                                                            <button class="btn btn-gradient-primary px-3">Contact Me</button>
                                                            <button class="btn btn-outline-primary  px-3">My Record</button>
                                                        </div> 
                                                        
                                                   </div>
                                               </div>
                                               <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6 mx-auto">
                                                            <div class="own-detail bg-blue">
                                                                <h1>8+</h1>
                                                                <h5>Year Experience</h5>
                                                            </div>
                                                            <div class="own-detail own-detail-project bg-secondary">
                                                                <h1>1550</h1>
                                                                <h5>Copmlete Operation</h5>
                                                            </div>
                                                            <div class="own-detail own-detail-happy bg-success">
                                                                <h1>98%</h1>
                                                                <h5>Result</h5>
                                                            </div>
                                                        </div>                                        
                                                    </div>                                                                                                                       
                                               </div>
                                           </div>         
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->                                             
                        </div><!--end general detail-->
                    </div><!--end tab-content--> 
                    
                </div><!--end col-->
            </div><!--end row-->

        </div><!-- container -->

        <!--  Modal content for the above example -->
      

        <footer class="footer text-center text-sm-left">
            &copy; 2019 - 2020 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>

@endsection