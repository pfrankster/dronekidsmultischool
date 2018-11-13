$(document).ready(function(){
    //Important
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ===============================
    // =========== Events ============
    // ===============================
    // ---------- Re-populate city selector ----------
    $("#state").change (function(){
        get_cities_by_state($("#state").val());
    });
    // ---------- Re-populate school selector ----------
    $("#city").change (function(){
        get_schools_by_city($("#city").val());
    });
    // ---------- Re-populate classes selector ----------
    $("#school").change (function(){
        // console.log("teste");
        get_classes_by_school($("#school").val());
    });
    // ---------- Re-populate section selector ----------
    $("#class").change (function(){
        get_sections_by_school_and_class($("#school").val(),$("#class").val());
    });
    

    // ===============================
    // ========== Functions ==========
    // ===============================
    // ========== Get Cities ==========
    function get_cities_by_state(state_id){
        $.post('index.php/getcity',{uf_id : state_id}, function(response){
            clean_cities();
            $.each(response, function(index, data){
                $('#city')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    }
    // ========== Get Schools ==========
    function get_schools_by_city(city_id){
        $.post('index.php/getschool',{city_id : city_id}, function(response){ 
            clean_schools();
            $.each(response, function(index, data){
                $('#school')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.school_name));
            });            
        });
    }
    // ========== Get Classes ==========
    function get_classes_by_school(school_id){
        $.post('index.php/getclass',{school_id : school_id}, function(response){ 
            clean_classes();
            $.each(response, function(index, data){
                $('#class')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    }
    // ========== Get Sections ==========
    function get_sections_by_school_and_class(school_id,class_id){
        $.post('index.php/getsections',{school_id : school_id,class_id : class_id}, function(response){ 
            clean_sections();
            $.each(response, function(index, data){
                $('#section')
                .append($("<option></option>")
                .attr("value",data.id)
                .text(data.name));
            });                    
        });
    }


    // ========== Clean City ==========
    function clean_cities(){
        $('#city').children('option:not(:first)').remove();
        $("#city").val("");
        clean_schools();
    }
    // ========== Clean Schools ==========
    function clean_schools(){
        $('#school').children('option:not(:first)').remove();
        $("#school").val("");
        clean_classes();
    }
    // ========== Clean Classes ==========
    function clean_classes(){
            $('#class').children('option:not(:first)').remove();
            $("#class").val("");
            clean_sections();
    }
    // ========== Clean Sections ==========
    function clean_sections(){
        $('#section').children('option:not(:first)').remove();
        $("#section").val("");
    }

});