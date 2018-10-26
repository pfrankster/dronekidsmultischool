$(document).ready(function(){
    //Important
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $("#peSchool").change (function(){
        // console.log("teste");
        $.post('getClasses',{schoolId : $("#peSchool").val()}, function(response){ 
            $('#peClass').children('option:not(:first)').remove();
            $('#peSection').children('option:not(:first)').remove();
            $("#peClass").val("");
            $("#peSection").val("");
            $.each(response, function(index, data){
                $('#peClass')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.nome));
            });                    
        });
    });
    $("#peClass").change (function(){
        console.log("teste");
        $("#peSection").val("");
        $.post('getSections',{schoolId : $("#peSchool").val(),classId : $("#peClass").val()}, function(response){ 
            $('#peSection').children('option:not(:first)').remove();
            $.each(response, function(index, data){
                $('#peSection')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.deschorario));
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
                sectionId : $("#peSection").val(), 
                paymantType : $("#pePaymantType").val(), 
                
            }, function(response){ 
                console.log(response);              
        });
        // return false;
    });
});