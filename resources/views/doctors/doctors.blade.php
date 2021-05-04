@extends('layouts.layout')
@section('content')
<div class="page-content-tab">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Ambulance</a></li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Doctors</h4><br>
                    <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createdoctor">add new doctor</button>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">    
                        <h4 class="header-title mt-0 mb-3">Doctors</h4>                                
                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Type</th>                                                    
                                    <th>Username</th>                                                        
                                    <th class="text-right">Action</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                <tr id="row{{ $doctor->id }}">
                                    <td>{{ $doctor->firstname }}</td>
                                    <td>{{ $doctor->lastname }}</td>
                                    <td>{{ $doctor->doc_type->type }}</td>
                                    <td>{{ $doctor->username }}</td>                                                                                            
                                    <td class="text-right">                                                       
                                        <a href="javascript:void(0)" onclick="editDoctors({{$doctor->id}})" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a class="deletedoctor" data-toggle = "modal" data-target ="#deletedoctor" data-id ="{{ $doctor->id }}" data-name ="{{ $doctor->username }}"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr><!--end tr-->
                                @endforeach                        
                                </tbody>
                            </table>                    
                        </div>                                         
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->
        </div>
    </div>
</div>
@include('doctors.modals')
@endsection