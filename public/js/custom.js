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
                console.log(data);
                $("#datatable tbody").append('<tr><td>'+ data.firstname +'</td><td>'+ data.lastname +'</td><td>'+ data.doc_types_id +'</td><td>'+ data.username +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editDoctors({{$doctor->id}}) class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;&nbsp;&nbsp;'+
                '<a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
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
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "/updatedoctor",
        type: 'PUT',              
        data:{
            id:id,
            firstname:firstname,
            lastname:lastname,
            type:type,
            username:username,
            _token:_token
        },
        success: function(response)
        {
            $('#row'+ response.id + ' td:nth-child(1)').text(response.firstname);
            $('#row'+ response.id + ' td:nth-child(2)').text(response.lastname);
            $('#row'+ response.id + ' td:nth-child(3)').text(response.type);
            $('#row'+ response.id + ' td:nth-child(4)').text(response.username);
            $('#editdoctor').modal('hide');
            Swal.fire(
            'Success!',
            'Doctor has been updated',
            'success'
            )
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
                $("#datatable tbody").append('<tr><td>'+ data.firstname +'</td><td>'+ data.lastname +'</td><td>'+ data.location_id +'</td><td>'+ data.jmbg +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editPatient({{'+ data.id +'}}) class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;&nbsp;&nbsp;'+
                '<a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
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
    let _token = $("input[name=_token]").val();
    $.ajax({
        url: "/updatepatient",
        type: 'PUT',              
        data:{
            id:id,
            firstname:firstname,
            lastname:lastname,
            location:location,
            jmbg:jmbg,
            note:note,
            _token:_token
        },
        success: function(response)
        {
            $('#patientrow'+ response.id + ' td:nth-child(1)').text(response.firstname);
            $('#patientrow'+ response.id + ' td:nth-child(2)').text(response.lastname);
            $('#patientrow'+ response.id + ' td:nth-child(3)').text(response.location);
            $('#patientrow'+ response.id + ' td:nth-child(4)').text(response.jmbg);
            $('#editpatient').modal('hide');
            Swal.fire(
            'Success!',
            'Doctor has been updated',
            'success'
            )
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
    modal.find('.modal-body').html('<h1>You are about to delete doctor '+delpatientname+'<br> Are you sure?</h1>');
})
$('#deletepatientform').on('submit', function(event) {
    event.preventDefault();
    let id = $('#delpatientId').val();
    let _token = $("input[name=_token]").val();
    console.log(id);
    console.log(_token);
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
                $("#datatable tbody").append('<tr><td>'+ data.patient_id +'</td><td>'+ data.doctor_id +'</td><td> <a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="" data-name="" data-diagnosis="" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a> </td><td>'+ data.performed_at +'</td><td class="text-right">'+                                                       
                '<a href="javascript:void(0)" onclick="editPatient({{'+ data.id +'}}) class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>&nbsp;&nbsp;&nbsp;'+
                '<a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>'+
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
        success: function(response)
        {
            $('#examinationrow'+response.id + ' td:nth-child(1)').text(response.patient_id);
            $('#examinationrow'+response.id + ' td:nth-child(2)').text(response.doctor_id);
            $('#examinationrow'+response.id + ' td:nth-child(3)').html('<a class="viewdiagnosis" data-toggle="modal" data-target="#viewdiagnosis" data-id="" data-name="" data-diagnosis="" class="mr-2"><i class="fas fa-file-medical-alt text-info font-24"></i></a>');
            $('#examinationrow'+response.id + ' td:nth-child(4)').text(response.performed_at);
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