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
                            <li class="breadcrumb-item active">Examinations</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Examinations</h4><br>
                    <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createexamination">add new examination</button>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">    
                        <h4 class="header-title mt-0 mb-3">Examinations</h4>                                
                        <div class="table-responsive">
                            <table id="datatable" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Diagnosis</th>                                                    
                                    <th>Performed</th>                                                        
                                    <th class="text-right">Action</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                @foreach($examinations as $examination)
                                <tr id="examinationrow{{$examination->id}}">
                                    <td>{{ $examination->patient->firstname }} {{ $examination->patient->lastname }}</td>
                                    <td>{{ $examination->doctor->firstname }} {{ $examination->doctor->lastname }}</td>
                                    <td><a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="{{$examination->id}}" data-name="{{ $examination->patient->firstname }} {{ $examination->patient->lastname }}" data-diagnosis="{{ $examination->diagnosis }}" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a></td>
                                    @if($examination->performed_at)
                                        <td >{{Carbon\Carbon::parse($examination->performed_at)->format('d.m.Y.')}}</td>
                                        @else
                                        <td >not performed</td>
                                    @endif
                                    <td class="text-right">                                                       
                                        <a href="javascript:void(0)" onclick="editExaminations({{$examination->id}})"  class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a class="deleteexamination" data-toggle = "modal" data-target ="#deleteexamination" data-id ="{{ $examination->id }}" data-name ="{{ $examination->patient->firstname }} {{ $examination->patient->lastname }}"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
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
@include('examinations.modals')
@endsection