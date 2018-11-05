$(document).ready(function(){
    //Important
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ---------- Re-populate classes selector ----------
    $("#school").change (function(){
        // console.log("teste");
        $.post('index.php/getclass',{school_id : $("#school").val()}, function(response){ 
            $('#class').children('option:not(:first)').remove();
            $('#section').children('option:not(:first)').remove();
            $("#class").val("");
            $("#section").val("");
            $.each(response, function(index, data){
                $('#class')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    });
    // ---------- Re-populate section selector ----------
    $("#class").change (function(){
        console.log("1");
        $.post('index.php/getsections',{school_id : $("#school").val(),class_id : $("#class").val()}, function(response){ 
            $('#section').children('option:not(:first)').remove();
            $("#section").val("");
            $.each(response, function(index, data){
                $('#section')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
        console.log("3");
    });
    // $("form").submit(function(){
    //     console.log("send submit");
    //     $.post('submitpreenroll',{
    //             guardianName : $("#guardian_name").val(),
    //             guardianCPF : $("#cpf").val(), 
    //             guardianPhone : $("#phone").val(), 
    //             address : $("#address").val(), 
    //             state : $("#state").val(), 
    //             city : $("#city").val(), 
    //             email : $("#email").val(), 
    //             guardianRelation : $("#relation").val(), 
    //             studentName : $("#student_name").val(), 
    //             studentGender : $("#gender").val(), 
    //             sectionId : $("#section").val(), 
    //             paymantType : $("#payment_type").val(), 
                
    //         }, function(response){ 
    //             console.log(response);              
    //     });
    //     // return false;
    // });
});