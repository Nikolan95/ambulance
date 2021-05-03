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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Ambulance</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patients</h4><br>
                    <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createpatient">add new patient</button>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">    
                        <h4 class="header-title mt-0 mb-3">Patients</h4>                                
                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Location</th>                                                    
                                    <th>Jmbg</th>                                                        
                                    <th class="text-right">Action</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                <tr id="patientrow{{ $patient->id }}">
                                    <td>{{ $patient->firstname }}</td>
                                    <td>{{ $patient->lastname }}</td>
                                    <td>{{ $patient->location->location }}</td>
                                    <td>{{ $patient->jmbg }}</td>                                                                                            
                                    <td class="text-right">                                                       
                                        <a href="javascript:void(0)" onclick="editPatient({{$patient->id}})" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a class="deletepatient" data-toggle = "modal" data-target ="#deletepatient" data-id ="{{ $patient->id }}" data-name ="{{ $patient->firstname }}"><i class="fas fa-trash-alt text-danger font-16"></i></a>
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
@include('patients.modals')
@endsection