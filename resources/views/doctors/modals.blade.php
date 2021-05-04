 <!-- doctor modals -->
 <!--Modal create new doctor-->
 <div class="modal fade createdoctor" id="createdoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('doctor.create') }}" method="POST" id="createdoctorform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="doctorusername1" >
                                        <span class="text-danger error-text username_error"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="doctorfirstname1" >
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="doctorlastname1" >
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control" name="type" id="doctortype1">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}"> {{ $type->type }} </option>
                                            @endforeach    
                                        <select>
                                        <span class="text-danger error-text type_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="doctorpassword1" >
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <label for="confirm_password">Confirm password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="doctorconfirm_password1" >
                                        <span class="text-danger error-text confirm_password_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">add new doctor</button>
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
<!--Modal edit doctor-->
<div class="modal fade editdoctor" id="editdoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('doctor.update') }}" method="PUT"  id="updatedoctorform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                          
                                    <div class="form-group"> 
                                        <label for="username">Username</label>
                                        <input type="hidden" id="doctorid" name="id" />  
                                        <input type="text" class="form-control" name="username" id="doctorusername">
                                        <span class="text-danger error-text username_error"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="doctorfirstname">
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="doctorlastname">
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control" name="type" id="doctortype">
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}"> {{ $type->type }} </option>
                                            @endforeach
                                        <select>
                                        <span class="text-danger error-text type_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Update doctor</button>
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
<div class="modal fade deletedoctor" id="deletedoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="/doctordelete" method="DELETE" id="deletedoctorform">
                @csrf  
                <input type="hidden" id="delId" value>
                <input type="hidden" id="delname" value>
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
 <!-- end doctor modals -->