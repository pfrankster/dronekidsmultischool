<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <!-- Page title -->
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-users"></i><small> <?php echo $this->lang->line('manage_preenroll'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Page Contents -->
            <div class="x_content">
                    <!-- Page Contents to hide/Show -->
                    <div class="" data-example-id="togglable-tabs">
                        <!-- Page Tab Elemnts -->
                        <ul  class="nav nav-tabs bordered">
                            <!-- Preenroll List Tab -->
                            <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_preenroll_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('preenroll'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                            <!-- Preenroll Add Tab -->
                            <?php if(has_permission(ADD, 'preenroll', 'preenroll')){ ?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('preenroll/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('preenroll'); ?></a> </li>                          
                             <?php }else{ ?>
                                 <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_preenroll"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('preenroll'); ?></a> </li>                          
                             <?php } ?>
                             <!-- Show last item detail or edit -->
                             <?php if(isset($edit)){ ?>
                                <li  class="active"><a href="#tab_edit_preenroll"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('preenroll'); ?></a> </li>                          
                            <?php } ?>
                            <?php if(isset($detail)){ ?>
                                <li  class="active"><a href="#tab_view_preenroll"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('preenroll'); ?></a> </li>                          
                            <?php } ?>
                            <!-- Tab Filter come here -->
                        <?php } ?>
                        </ul>
                        <br/>
                        <!-- Tab content -->
                        <div class="tab-content">
                            <!-- Tab List elements -->
                            <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_preenroll_list" >
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <!-- Table head -->
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('guardian_name'); ?></th>
                                        <th><?php echo $this->lang->line('guardian_cpf'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th><?php echo $this->lang->line('address'); ?></th>
                                        <th><?php echo $this->lang->line('state'); ?></th>
                                        <th><?php echo $this->lang->line('city'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('guardian_relation'); ?></th>
                                        <th><?php echo $this->lang->line('student_name'); ?></th>
                                        <th><?php echo $this->lang->line('student_gender'); ?></th>
                                        <th><?php echo $this->lang->line('school'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section'); ?></th>
                                        <th><?php echo $this->lang->line('payment_type'); ?></th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count = 1; if(isset($preenrolls) && !empty($preenrolls)){ ?>
                                        <?php foreach($preenrolls as $obj){ ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $obj->guardianName; ?></td>
                                                <td><?php echo $obj->guardianCPF; ?></td>
                                                <td><?php echo $obj->guardianPhone; ?></td>
                                                <td><?php echo $obj->address; ?></td>
                                                <td><?php echo $obj->state; ?></td>
                                                <td><?php echo $obj->city; ?></td>
                                                <td><?php echo $obj->email; ?></td>
                                                <td><?php echo $obj->guardianRelation; ?></td>
                                                <td><?php echo $obj->studentName; ?></td>
                                                <td><?php echo $obj->studentGender; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $obj->sectionId; ?></td>
                                                <td><?php echo $obj->paymentType; ?></td>
                                                <td><?php echo $obj->status; ?></td>
                                                <td></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                            <!-- Tab Add elements -->
                            <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_preenroll">
                            </div>
                            <!-- Tab Edit elements -->
                            <?php if(isset($edit)){ ?>
                            <div class="tab-pane fade in active" id="tab_edit_preenroll">
                            </div> 
                            <?php } ?>
                            <!-- Tab Details elements -->
                            <?php if(isset($detail)){ ?>
                            <div class="tab-pane fade in active" id="tab_view_preenroll">
                            </div> 
                            <?php } ?>
                            
                        </div>
                        <!-- Others elements -->
                    </div>
            </div>
        </div>
    </div>
</div>

  <!-- Fix and clean [Script and Fuction]-->

  <!-- bootstrap-datetimepicker -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

 
<!-- Super admin js START  -->
 <script type="text/javascript">
     
    var edit = false;
    <?php if(isset($edit)){ ?>
        edit = true;
    <?php } ?>
         
    $("document").ready(function() {
         <?php if(isset($edit) && !empty($edit)){ ?>
            $(".fn_school_id").trigger('change');
         <?php } ?>
    });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();        
        var class_id = '';
        var guardian_id = '';       
        <?php if(isset($edit) && !empty($edit)){ ?>
            class_id =  '<?php echo $preenroll->class_id; ?>';
            guardian_id =  '<?php echo $preenroll->guardian_id; ?>';
         <?php } ?> 
        
        if(!school_id){
           alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   if(edit){
                       $('#edit_class_id').html(response);   
                   }else{
                       $('#add_class_id').html(response);   
                   }
                                    
                   get_guardian_by_school(school_id, guardian_id);
               }
            }
        });
    }); 
    
    
    function get_guardian_by_school(school_id, guardian_id){
    
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_guardian_by_school'); ?>",
            data   : { school_id:school_id, guardian_id: guardian_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(edit){
                       $('#edit_guardian_id').html(response);
                   }else{
                       $('#add_guardian_id').html(response); 
                   }
               }
            }
        });
    }
    
  </script>
<!-- Super admin js end -->

 

<!-- datatable with buttons -->
 <script type="text/javascript">
     
  $('#add_dob').datepicker();
  $('#edit_dob').datepicker();
  
  <?php if(isset($edit)){ ?>
        get_section_by_class('<?php echo $preenroll->class_id; ?>', '<?php echo $preenroll->section_id; ?>');
    <?php } ?>
    
    function get_section_by_class(class_id, section_id){       
        
        var school_id = '';
        <?php if(isset($edit)){ ?>                
            school_id = $('#edit_school_id').val();
         <?php }else{ ?> 
            school_id = $('#add_school_id').val();
         <?php } ?> 
             
       if(!school_id){
           alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : { school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   if(section_id === ''){
                    $('#add_section_id').html(response);
                   }else{
                       $('#edit_section_id').html(response);
                   }
               }
            }
        });  
                     
        
   }
  </script>
  <!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
        });
        
        function get_preenroll_by_class(url){          
            if(url){
                window.location.href = url; 
            }
        }
        
        function get_guardian_by_id(guardian_id){
            
            $.ajax({       
            type   : "POST",
            dataType: "json",
            url    : "<?php echo site_url('ajax/get_guardian_by_id'); ?>",
            data   : { guardian_id : guardian_id},               
            async  : true,
            success: function(response){ 
               if(response)
               {
                $('#add_phone').val(response.phone);  
                $('#add_present_address').val(response.present_address);  
                $('#add_permanent_address').val(response.permanent_address);  
                $('#add_religion').val(response.religion);  
               }else{
                    $('#add_phone').val('');  
                    $('#add_present_address').val('');  
                    $('#add_permanent_address').val('');  
                    $('#add_religion').val(''); 
               }
            }
        });  
        }
    $("#add").validate();     
    $("#edit").validate();      
</script>