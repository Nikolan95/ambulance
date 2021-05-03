<!-- create examination -->
<div class="modal fade createexamination" id="createexamination" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('examinations.store') }}" method="POST" id="createexaminationform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="username">Patient</label>
                                        <select class="form-control" name="patient" id="patient1">
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}"> {{ $patient->firstname }} {{ $patient->lastname }}</option>
                                            @endforeach    
                                        <select>
                                        @error('patient')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Doctor</label>
                                        <select class="form-control" name="doctor" id="doctor1">
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}"> {{ $doctor->firstname }} {{ $doctor->lastname }}</option>
                                            @endforeach    
                                        <select>
                                        @error('doctor')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="diagnosis">Diagnosis</label>
                                        <textarea class="form-control" rows="5" name="diagnosis" id="diagnosis1" required=""></textarea>
                                        @error('diagnosis')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="performed_at">Performed at</label>
                                        <input type="date" class="form-control" name="performed_at" id="performed_at1" max="">
                                        @error('performed_at')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">add new diagnosis</button>
                                </div>
                            </div>      
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- end create examination -->
<!--Modal edit doctor-->
<div class="modal fade editexamination" id="editexamination" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('examinations.update') }}" method="PUT"  id="updateexaminationform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="username">Patient</label>
                                        <input type="hidden" id="examinationid" name="id" />
                                        <select class="form-control" name="patient" id="patient">
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}"> {{ $patient->firstname }} {{ $patient->lastname }}</option>
                                            @endforeach    
                                        <select>
                                        @error('patient')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Doctor</label>
                                        <select class="form-control" name="doctor" id="doctor">
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}"> {{ $doctor->firstname }} {{ $doctor->lastname }}</option>
                                            @endforeach    
                                        <select>
                                        @error('doctor')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="diagnosis">Diagnosis</label>
                                        <textarea class="form-control" rows="5" name="diagnosis" id="diagnosis" required=""></textarea>
                                        @error('diagnosis')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="performed_at">Performed at</label>
                                        <input type="date" class="form-control" name="performed_at" id="performed_at" max="">
                                        @error('performed_at')
                                        <div class="color"> {{ $message }} </div>
                                        @enderror()
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Update diagnosis</button>
                                </div>
                            </div>      
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- endmodal -->
<!--Modal delete doctor-->
<div class="modal fade deleteexamination" id="deleteexamination" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="/examinationdelete" method="DELETE" id="deleteexaminationform">
                @csrf  
                <input type="hidden" id="exid" value>
                <div class="modal-body">
                </div>
                <div class="modal-footer">    
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Delete examination</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- endmodal -->