<div class="modal fade examination" id="examination" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('patient.update') }}" method="PUT"  id="examinationform">
                @csrf  
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">                            
                                    <div class="form-group"> 
                                        <input type="hidden" id="examinationid" name="id" />
                                        <input type="hidden" name="patient" id="patient">
                                        <input type="hidden" name="doctor" id="doctor"> 
                                        <input type="hidden" name="doctor" id="doctor">    
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