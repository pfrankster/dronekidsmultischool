<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-mobile-phone"></i><small> <?php echo $this->lang->line('mark_send_by_sms'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'exam', 'mark')){ ?>
                    <a href="<?php echo site_url('exam/mark'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'marksheet')){ ?>
                   | <a href="<?php echo site_url('exam/marksheet'); ?>"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('mark_sheet'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'result')){ ?>
                   | <a href="<?php echo site_url('exam/result'); ?>"><?php echo $this->lang->line('exam_final_result'); ?></a>                 
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'text')){ ?>
                   | <a href="<?php echo site_url('exam/text'); ?>"><?php echo $this->lang->line('mark_send_by_sms'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'mail')){ ?>
                   | <a href="<?php echo site_url('exam/mail'); ?>"><?php echo $this->lang->line('mark_send_by_email'); ?></a>                    
                <?php } ?>
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_send_sms_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('sms'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <li class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_send_sms"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-location-arrow"></i> <?php echo $this->lang->line('send'); ?> <?php echo $this->lang->line('sms'); ?></a> </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content"> 
                        
                        
                            <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_send_sms_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>                                        
                                        <th><?php echo $this->lang->line('session_year'); ?></th>
                                        <th><?php echo $this->lang->line('exam'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('receiver_type'); ?></th>
                                        <th><?php echo $this->lang->line('gateway'); ?></th>
                                        <th><?php echo $this->lang->line('send'); ?> <?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($mark_smses) && !empty($mark_smses)){ ?>
                                        <?php foreach($mark_smses as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                            <?php } ?>
                                            <td><?php echo $obj->session_year; ?></td>
                                            <td><?php echo $obj->exam_name; ?></td>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->receiver_type; ?></td>
                                            <td><?php echo $obj->sms_gateway; ?></td>
                                            <td><?php echo get_nice_time($obj->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo site_url('exam/text/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                        
                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_send_sms">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('exam/text/send'), array('name' => 'sms', 'id' => 'sms', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?> 
                                
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exam_id"><?php echo $this->lang->line('exam'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="exam_id"  id="exam_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php if(isset($exams) && !empty($exams)){ ?>
                                                <?php foreach($exams as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" ><?php echo $obj->title; ?></option>
                                                <?php } ?> 
                                            <?php } ?> 
                                        </select>
                                        <div class="help-block"><?php echo form_error('exam_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="class_id"  id="class_id" required="required" onchange="get_user('', this.value,'');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php if(isset($classes) && !empty($classes)){ ?>
                                                <?php foreach($classes as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                                <?php } ?> 
                                            <?php } ?> 
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="receiver_role_id"><?php echo $this->lang->line('receiver_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="receiver_role_id"  id="receiver_role_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($roles as $obj ){ ?>
                                                <?php if(in_array($obj->id, array(GUARDIAN, STUDENT))){ ?>
                                                <option value="<?php echo $obj->id; ?>"  ><?php echo $obj->name; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('receiver_role_id'); ?></div>
                                    </div>
                                </div>                              
                                           
                                <div class="item form-group">  
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sms_gateway"><?php echo $this->lang->line('gateway'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">                                       
                                        <select  class="form-control col-md-12 col-xs-12"  name="sms_gateway"  id="sms_gateway" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                              
                                        </select>
                                        <div class="help-block"><?php echo form_error('sms_gateway'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('exam/sms'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Super admin js START  -->
 <script type="text/javascript">
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();  
        
        if(!school_id){
           alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_exam_by_school'); ?>",
            data   : { school_id:school_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   $('#exam_id').html(response); 
                   get_class_by_school(school_id); 
                   get_sms_gateways(school_id); 
               }
            }
        });
    }); 

   function get_class_by_school(school_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   $('#class_id').html(response);                                  
               }
            }
        });                  
        
   }
   
   function get_sms_gateways(school_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_sms_gateways'); ?>",
            data   : { school_id:school_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   $('#sms_gateway').html(response);                                  
               }
            }
        });                  
        
   }
  
   
  </script>
<!-- Super admin js end -->

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
    $("#sms").validate();
</script>

