//ajax crud for doctor
//create doctor
$('#createdoctorform').on('submit', function(event) {
event.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },              
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $("#datatable tbody").append('<tr id ="row'+data[0].id+'"><td>'+ data[0].firstname +'</td><td>'+ data[0].lastname +'</td><td>'+ data[0].doc_type.type +'</td><td>'+ data[0].username +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editDoctors('+data[0].id+')" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;'+
                '<a class="deletedoctor" data-toggle="modal" data-target="#deletedoctor" data-id="'+data[0].id+'" data-name="'+data[0].username+'"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
                '</td></tr>');
                $('#createdoctor').modal('hide');
                Swal.fire(
                'Success!',
                'Doctor has been added',
                'success'
                )
            }
        }
    })
});

//edit doctor

function editDoctors(id){
    $.get('/doctor/'+id,function(doctor){
        $('#doctorid').val(doctor.id);
        $('#doctorusername').val(doctor.username);
        $('#doctorfirstname').val(doctor.firstname);
        $('#doctorlastname').val(doctor.lastname);
        $('#doctortype').val(doctor.doc_types_id);
        $('#editdoctor').modal('toggle');
    })
}
$('#updatedoctorform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#doctorid').val();
    let firstname = $('#doctorfirstname').val();
    let lastname = $('#doctorlastname').val();
    let type = $('#doctortype').val();
    let username = $('#doctorusername').val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:{
            id:id,
            firstname:firstname,
            lastname:lastname,
            type:type,
            username:username
        },
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },  
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }
            else{
                $('#row'+ data[0].id + ' td:nth-child(1)').text(data[0].firstname);
                $('#row'+ data[0].id + ' td:nth-child(2)').text(data[0].lastname);
                $('#row'+ data[0].id + ' td:nth-child(3)').text(data[0].doc_type.type);
                $('#row'+ data[0].id + ' td:nth-child(4)').text(data[0].username);
                $('#editdoctor').modal('hide');
                Swal.fire(
                'Success!',
                'Doctor has been updated',
                'success'
                )
            }
        }
    })
});

//delete doctor

$('.deletedoctor').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delId = button.data('id')
    var name = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #delId').val(delId);
    modal.find('.modal-body').html('<h1>You are about to delete doctor '+name+'<br> Are you sure?</h1>');
})
$('#deletedoctorform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#delId').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/doctordelete/'+id,
        type:'DELETE',
        data:{
            id:id,
             _token:_token
        },
        success:function(response){
            $('#row'+id).remove();
            $('#deletedoctor').modal('hide');
            Swal.fire(
                'Success!',
                'Doctor has been deleted',
                'success'
                )
        }
    });
});

//js ajx crud for patients
    //create patient
$('#createpatientform').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },               
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $("#datatable tbody").append('<tr id="patientrow'+data[0].id+'"><td>'+ data[0].firstname +'</td><td>'+ data[0].lastname +'</td><td>'+ data[0].location.location+'</td><td>'+ data[0].jmbg +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editPatient('+ data[0].id +')" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;'+
                '<a class="deletepatient" data-toggle="modal" data-target="#deletepatient" data-id="'+data[0].id+'" data-name="'+data[0].firstname+'" href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
                '</td></tr>');
                $('#createpatient').modal('hide');
                Swal.fire(
                'Success!',
                'Patient has been added',
                'success'
                )
            }
        }
    })
});
//edit patient
function editPatient(id){
    $.get('/patient/'+id,function(patient){
        $('#patientid').val(patient.id);
        $('#patientfirstname').val(patient.firstname);
        $('#patientlastname').val(patient.lastname);
        $('#patientlocation').val(patient.location_id);
        $('#patientjmbg').val(patient.jmbg);
        $('#patientnote').val(patient.note);
        $('#editpatient').modal('toggle');
    })
}
$('#editpatientform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#patientid').val();
   
    let firstname = $('#patientfirstname').val();
    let lastname = $('#patientlastname').val();
    let location = $('#patientlocation').val();
    let jmbg = $('#patientjmbg').val();
    let note = $('#patientnote').val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),             
        data:{
            id:id,
            firstname:firstname,
            lastname:lastname,
            location:location,
            jmbg:jmbg,
            note:note,       
        },  
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },    
        success: function(data){
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $('#patientrow'+ data[0].id + ' td:nth-child(1)').text(data[0].firstname);
                $('#patientrow'+ data[0].id + ' td:nth-child(2)').text(data[0].lastname);
                $('#patientrow'+ data[0].id + ' td:nth-child(3)').text(data[0].location.location);
                $('#patientrow'+ data[0].id + ' td:nth-child(4)').text(data[0].jmbg);
                $('#editpatient').modal('hide');
                Swal.fire(
                'Success!',
                'Doctor has been updated',
                'success'
                )
            }
        }
    })
});
//delete patient

$('.deletepatient').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delpatientId = button.data('id')
    var delpatientname = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #delpatientId').val(delpatientId);
    modal.find('.modal-body').html('<h1>You are about to delete patient '+delpatientname+'<br> Are you sure?</h1>');
})
$('#deletepatientform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#delpatientId').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/patientdelete/'+id,
        type:'DELETE',
        data:{
            id:id,
                _token:_token
        },
        success:function(response){
            $('#patientrow'+id).remove();
            $('#deletepatient').modal('hide');
            Swal.fire(
                'Success!',
                'Patient has been deleted',
                'success'
                )
        }
    });
});
//end ajax crud for patients

//view diagnosis

$('.viewdiagnosis').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var id = button.data('id')
    var diagnosis = button.data('diagnosis')
    var name = button.data('name')
    var modal = $(this)

    //modal.find('.modal-content #delpatientId').val(delpatientId);
    modal.find('#patient').html('<p>'+ name +'</p>');
    modal.find('#diagnosis').html('<div class = "row"><div class = "col-sm-4"><p>'+ diagnosis +'</p></div></div>');
})

//input date for performed at block future dates

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#performed_at1').attr('max', maxDate);
});

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#performed_at').attr('max', maxDate);
});

// ajax crud for examinations
 
//create diagnosis
$('#createexaminationform').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        }, 
        success: function(data)
        {
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                function formatDate(date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();
                
                    if (month.length < 2) 
                        month = '0' + month;
                    if (day.length < 2) 
                        day = '0' + day;
                
                    return [day, month, year].join('-');
                }
                if(data[0].performed_at == null){data[0].performed_at = 'not performed'}else{data[0].performed_at =  formatDate(data[0].performed_at)}
                $("#datatable tbody").append('<tr id="examinationrow'+data[0].id+'"><td>'+ data[0].patient.firstname+' '+data[0].patient.lastname +'</td><td>'+ data[0].doctor.firstname+' '+data[0].doctor.lastname +'</td><td> <a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="'+data[0].id+'" data-name="'+data[0].patient.firstname+' '+data[0].patient.lastname+'" data-diagnosis="'+data[0].diagnosis+'" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a> </td><td>'+ data[0].performed_at +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editExaminations('+ data[0].id +')" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;'+
                '<a class="deleteexamination" data-toggle="modal" data-target="#deleteexamination" data-id="'+data[0].id+'" data-name="'+data[0].patient.firstname+' '+data[0].patient.lastname+'" href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
                '</td></tr>');
                $('#createexamination').modal('hide');
                Swal.fire(
                'Success!',
                'Examination has been added',
                'success'
                )
            }
        }
    })
});
//edit diagnosis
function editExaminations(id){
    $.get('/examinationedit/'+id,function(examination){
        $('#examinationid').val(examination.id);
        $('#patient').val(examination.patient_id);
        $('#doctor').val(examination.doctor_id);
        $('#diagnosis').val(examination.diagnosis);
        $('#performed_at').val(examination.performed_at);
        $('#editexamination').modal('toggle');
    })
}
$('#updateexaminationform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#examinationid').val();
    let patient = $('#patient').val();
    let doctor = $('#doctor').val();
    let diagnosis = $('#diagnosis').val();
    let performed_at = $('#performed_at').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "/updateexamination",
        type: 'PUT',              
        data:{
            id:id,
            patient:patient,
            doctor:doctor,
            diagnosis:diagnosis,
            performed_at:performed_at,
            _token:_token
        },
        success: function(data)
        {
            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
            
                if (month.length < 2) 
                    month = '0' + month;
                if (day.length < 2) 
                    day = '0' + day;
            
                return [day, month, year].join('-');
            }
            if(data[0].performed_at == null){data[0].performed_at = 'not performed'}else{data[0].performed_at =  formatDate(data[0].performed_at)}
            $('#examinationrow'+data[0].id + ' td:nth-child(1)').text(data[0].patient.firstname+' '+data[0].patient.lastname);
            $('#examinationrow'+data[0].id + ' td:nth-child(2)').text(data[0].doctor.firstname+' '+data[0].doctor.lastname);
            $('#examinationrow'+data[0].id + ' td:nth-child(3)').html('<a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="'+data[0].id+'" data-name="'+data[0].patient.firstname+' '+data[0].patient.lastname+'" data-diagnosis="'+data[0].diagnosis+'" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a>');
            $('#examinationrow'+data[0].id + ' td:nth-child(4)').text(data[0].performed_at);
            $('#editexamination').modal('hide');
            Swal.fire(
            'Success!',
            'Examination has been updated',
            'success'
            )
        }
    })
});
// delete examination
$('.deleteexamination').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var exId = button.data('id')
    var exName = button.data('name')
    var modal = $(this)

    modal.find('.modal-content #exid').val(exId);
    modal.find('.modal-body').html('<h3>You are about to delete patient <strong>'+exName+'</strong> records<br> Are you sure?</h3>');
})
$('#deleteexaminationform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#exid').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: '/examinationdelete/'+id,
        type:'DELETE',
        data:{
            id:id,
            _token:_token
        },
        success:function(response){
            $('#examinationrow'+id).remove();
            $('#deleteexamination').modal('hide');
            Swal.fire(
                'Success!',
                'Examination has been deleted',
                'success'
                )
        }
    });
});

//examination

function performExamination(id){
    $.get('examinationedit/'+id,function(examination){
        $('#examinationid').val(examination.id);
        $('#patient').val(examination.patient_id);
        $('#doctor').val(examination.doctor_id);
        $('#diagnosis').val(examination.diagnosis);
        $('#performed_at').val(examination.performed_at);
        $('#examination').modal('toggle');
    })
}

//perform examination

$('#examinationform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#examinationid').val();
    let patient = $('#patient').val();
    let doctor = $('#doctor').val();
    let diagnosis = $('#diagnosis').val();
    let performed_at = $('#performed_at').val();
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "/updateexamination",
        type: 'PUT',              
        data:{
            id:id,
            patient:patient,
            doctor:doctor,
            diagnosis:diagnosis,
            performed_at:performed_at,
            _token:_token
        },
        success: function(response)
        {
            $('#examinationrow'+id).remove();
            $('#examination').modal('hide');
            Swal.fire(
            'Success!',
            'Examination has been updated',
            'success'
            )
        }
    })
});