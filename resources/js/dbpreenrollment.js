$(document).ready(function(){
    //Important
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $("#pmSchool").change (function(){
        $.post('getClasses',{schoolId : $("#pmSchool").val()}, function(response){ 
            $('#pmClass').children('option:not(:first)').remove();
            $('#pmSection').children('option:not(:first)').remove();
            $("#pmClass").val("");
            $("#pmSection").val("");
            $.each(response, function(index, data){
                $('#pmClass')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    });
    $("#pmClass").change (function(){
        $("#pmSection").val("");
        $.post('getSections',{schoolId : $("#pmSchool").val(),classId : $("#pmClass").val()}, function(response){ 
            $('#pmSection').children('option:not(:first)').remove();
            $.each(response, function(index, data){
                $('#pmSection')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    });
    $("form").submit(function(){
        $.post('submitpreenroll',{
                guardianName : $("#guardianName").val(),
                guardianCPF : $("#guardianCPF").val(), 
                guardianPhone : $("#guardianPhone").val(), 
                address : $("#address").val(), 
                state : $("#state").val(), 
                city : $("#city").val(), 
                email : $("#email").val(), 
                guardianRelation : $("#guardianRelation").val(), 
                studentName : $("#studentName").val(), 
                studentGender : $("#studentGender").val(), 
                sectionId : $("#pmSection").val(), 
                paymantType : $("#pmPaymantType").val(), 
                
            }, function(response){ 
                console.log(response);              
        });
        // return false;
    });
});