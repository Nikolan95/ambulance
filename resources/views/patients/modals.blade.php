<!--Modal create new patient-->
<div class="modal fade createpatient" id="createpatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('patient.create') }}" method="POST" id="createpatientform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="patientfirstname1">
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="patientlastname1">
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <select class="form-control" name="location" id="patientlocation1">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}"> {{ $location->location }} </option>
                                            @endforeach    
                                        <select>
                                        <span class="text-danger error-text location_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="jmbg">jmbg</label>
                                        <input type="number" class="form-control" name="jmbg" id="patientjmbg1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13">
                                        <span class="text-danger error-text jmbg_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="note">Note</label>
                                        <textarea class="form-control" rows="5" name="note" id="patientnote1"></textarea>
                                        <span class="text-danger error-text note_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">add new patient</button>
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
<!--Modal edit patient-->
<div class="modal fade editpatient" id="editpatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('patient.update') }}" method="PUT"  id="editpatientform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="hidden" id="patientid" name="id" />
                                        <input type="text" class="form-control" name="firstname" id="patientfirstname" >
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="patientlastname" >
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <select class="form-control" name="location" id="patientlocation">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}"> {{ $location->location }} </option>
                                            @endforeach    
                                        <select>
                                        <span class="text-danger error-text location_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="jmbg">jmbg</label>
                                        <input type="number" class="form-control" name="jmbg" id="patientjmbg" >
                                        <span class="text-danger error-text jmbg_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="note">Note</label>
                                        <textarea class="form-control" rows="5" name="note" id="patientnote" ></textarea>
                                        <span class="text-danger error-text note_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Update patient</button>
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
<div class="modal fade deletepatient" id="deletepatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="/patientdelete" method="DELETE" id="deletepatientform">
                @csrf  
                <input type="hidden" id="delpatientId" value>
                <input type="hidden" id="delpatientname" value>
                <div class="modal-body">
                </div>
                <div class="modal-footer">    
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Delete doctor</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- endmodal -->