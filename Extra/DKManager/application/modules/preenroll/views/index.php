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
                    <!-- ============================================== -->
                    <!-- Tab content -->
                    <div class="tab-content">
                        <!-- ============================================== -->
                        <!-- Tab List elements -->
                        <!-- ============================================== -->
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_preenroll_list" >
                            <div class="x_content">
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
                                                    <td><?php echo $obj->guardian_name; ?></td>
                                                    <td><?php echo $obj->guardian_cpf; ?></td>
                                                    <td><?php echo $obj->guardian_phone; ?></td>
                                                    <td><?php echo $obj->address; ?></td>
                                                    <td><?php echo $obj->state_name; ?></td>
                                                    <td><?php echo $obj->city_name; ?></td>
                                                    <td><?php echo $obj->email; ?></td>
                                                    <td><?php echo $obj->guardian_relation; ?></td>
                                                    <td><?php echo $obj->student_name; ?></td>
                                                    <td><?php echo $obj->student_gender; ?></td>
                                                    <td><?php echo $obj->school_name; ?></td>
                                                    <td><?php echo $obj->class_name; ?></td>
                                                    <td><?php echo $obj->section_name; ?></td>
                                                    <td><?php echo $obj->payment_type; ?></td>
                                                    <td><?php echo $this->lang->line($obj->status); ?></td>
                                                    <td>
                                                        <!-- Approval btn -->
                                                        <?php if(has_permission(EDIT, 'preenroll', 'preenroll') && $obj->status_id == 1){ ?>
                                                            <a href="<?php echo site_url('preenroll/approval/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_approval'); ?>');" class="btn btn-success btn-xs"><i class="fa fa-check-circle-o"></i> <?php echo $this->lang->line('approval'); ?> </a>
                                                        <?php } ?>
                                                        <!-- Edit btn -->
                                                        <?php if(has_permission(EDIT, 'preenroll', 'preenroll')){ ?>
                                                            <a href="<?php echo site_url('preenroll/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                        <?php } ?>
                                                        <!-- View btn -->
                                                        <?php if(has_permission(VIEW, 'preenroll', 'preenroll')){ ?>
                                                            <a href="<?php echo site_url('preenroll/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                        <?php } ?>
                                                        <!-- Delete btn -->
                                                        <?php if(has_permission(DELETE, 'preenroll', 'preenroll')){ ?>
                                                            <a href="<?php echo site_url('preenroll/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?>
                                                    </td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ============================================== -->
                        <!-- Tab Add elements -->
                        <!-- ============================================== -->
                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_preenroll">
                            <div class="x_content">
                                <?php echo form_open_multipart(site_url('preenroll/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                    <!-- ======= Guardian Name ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_name"><?php echo $this->lang->line('guardian_name'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="guardian_name"  id="guardian_name" value="<?php echo isset($post['guardian_name']) ?  $post['guardian_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('guardian_name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('guardian_name'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Guardian CPF ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_cpf"><?php echo $this->lang->line('guardian_cpf'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="guardian_cpf"  id="guardian_cpf" value="<?php echo isset($post['guardian_cpf']) ?  $post['guardian_cpf'] : ''; ?>" placeholder="<?php echo $this->lang->line('guardian_cpf'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('guardian_cpf'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Guardian Phone ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="guardian_phone"  id="guardian_phone" value="<?php echo isset($post['guardian_phone']) ?  $post['guardian_phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('guardian_phone'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Address ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($post['address']) ?  $post['address'] : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('address'); ?></div>
                                        </div>
                                    </div>

                                    <!-- ======= State ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state_id"><?php echo $this->lang->line('state'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="state_id" id="add_state_id" onchange="get_city_by_state('');" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $states = get_states_list(); ?>
                                                <?php foreach($states as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php echo isset($post['state_id']) && $post['state_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('state_id'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= City ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id"><?php echo $this->lang->line('city'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="city_id" id="add_city_id" onchange="get_schools_by_city();" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('city_id'); ?></div>
                                        </div>
                                    </div>     
                                    <!-- ======= Email ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ?  $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Relation  ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_relation"><?php echo $this->lang->line('guardian_relation'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="guardian_relation" id="guardian_relation" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $relations = get_relation_types(); ?>
                                                <?php foreach($relations as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['guardian_relation']) && $post['guardian_relation'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('guardian_relation'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Student Name ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_name"><?php echo $this->lang->line('student_name'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="form-control col-md-7 col-xs-12"  name="student_name"  id="student_name" value="<?php echo isset($post['student_name']) ?  $post['student_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('student_name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('student_name'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Student Gender ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_gender"><?php echo $this->lang->line('student_gender'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="student_gender" id="add_student_gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach($genders as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($post['student_gender']) && $post['student_gender'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('student_gender'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= School ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"><?php echo $this->lang->line('school'); ?>  <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="school_id" id="add_school_id" onchange="get_class_by_school(this.value,'');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('school_id'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Class ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="class_id" id="add_class_id" onchange="get_section_by_class(this.value,'')" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                        </div>
                                    </div>     
                                    <!-- ======= Section ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="section_id" id="add_section_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                        </div>
                                    </div>   
                                    <!-- ======= Payment Type ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_type_id"><?php echo $this->lang->line('payment_type'); ?>  <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="payment_type_id" id="add_payment_type_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($payment_types as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('payment_type_id'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Status ======= -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_id"><?php echo $this->lang->line('status'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select  class="form-control col-md-7 col-xs-12" name="status_id" id="add_status_id" >
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($status_types as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" ><?php echo $this->lang->line($obj->name); ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('status_id'); ?></div>
                                        </div>
                                    </div>
                                    <!-- ======= Buttons ======= -->
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a  href="<?php echo site_url('preenroll'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                                <!-- ======= Instructions ======= -->
                                <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_preenroll_instruction'); ?></div>
                            </div>
                        </div>
                        <!-- ============================================== -->
                        <!-- Tab Edit elements -->
                        <!-- ============================================== -->
                        <?php if(isset($edit)){ ?>
                            <div class="tab-pane fade in active" id="tab_edit_preenroll">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url('preenroll/edit/'. $preenroll->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
            
                                        <!-- ======= Guardian Name ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_name"><?php echo $this->lang->line('guardian_name'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="guardian_name"  id="guardian_name" value="<?php echo isset($preenroll->guardian_name) ?  $preenroll->guardian_name : $post['guardian_name']; ?>" placeholder="<?php echo $this->lang->line('guardian_name'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('guardian_name'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Guardian CPF ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_cpf"><?php echo $this->lang->line('guardian_cpf'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="guardian_cpf"  id="guardian_cpf" value="<?php echo isset($preenroll->guardian_cpf) ?  $preenroll->guardian_cpf : $post['guardian_cpf']; ?>" placeholder="<?php echo $this->lang->line('guardian_cpf'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('guardian_cpf'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Guardian Phone ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="guardian_phone"  id="guardian_phone" value="<?php echo isset($preenroll->guardian_phone) ?  $preenroll->guardian_phone : $post['guardian_phone']; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('guardian_phone'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Address ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="address"  id="address" value="<?php echo isset($preenroll->address) ?  $preenroll->address : $post['address']; ?>" placeholder="<?php echo $this->lang->line('address'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('address'); ?></div>
                                            </div>
                                        </div>
                                        
                                         <!-- ======= State ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state_id"><?php echo $this->lang->line('state'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="state_id" id="edit_state_id" onchange="get_city_by_state('');" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php $states = get_states_list(); ?>
                                                    <?php foreach($states as $obj){ ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php if($preenroll->state_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('state_id'); ?></div>
                                            </div>
                                        </div>

                                        <!-- ======= City ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id"><?php echo $this->lang->line('city'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="city_id" id="edit_city_id" onchange="get_schools_by_city();"  required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('city_id'); ?></div>
                                            </div>
                                        </div> 
                                        <!-- ======= Email ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($preenroll->email) ?  $preenroll->email : $post['email']; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('email'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Relation ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian_relation"><?php echo $this->lang->line('guardian_relation'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="guardian_relation" id="guardian_relation" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php $relations = get_relation_types(); ?>
                                                    <?php foreach($relations as $key=>$value){ ?>
                                                        <option value="<?php echo $key; ?>" <?php if($preenroll->guardian_relation == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('guardian_relation'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Student Name ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_name"><?php echo $this->lang->line('student_name'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="student_name"  id="student_name" value="<?php echo isset($preenroll->student_name) ?  $preenroll->student_name : $post['student_name']; ?>" placeholder="<?php echo $this->lang->line('student_name'); ?>" required="required" type="text">
                                                <div class="help-block"><?php echo form_error('student_name'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Student Gender ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_gender"><?php echo $this->lang->line('student_gender'); ?> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="student_gender" id="edit_student_gender" required="required">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php $genders = get_genders(); ?>
                                                    <?php foreach($genders as $key=>$value){ ?>
                                                        <option value="<?php echo $key; ?>" <?php if($preenroll->student_gender == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('student_gender'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= School ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"><?php echo $this->lang->line('school'); ?> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="school_id" id="edit_school_id" onchange="get_class_by_school(this.value,'');">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('school_id'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Class ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="class_id" id="edit_class_id" onchange="get_section_by_class(this.value,'');">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                            </div>
                                        </div>   
                                        <!-- ======= Section ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="section_id" id="edit_section_id">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                </select>
                                                <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                            </div>
                                        </div> 
                                        <!-- ======= Payment Type ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_type_id"><?php echo $this->lang->line('payment_type'); ?> 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="payment_type_id" id="edit_payment_type_id"  disabled="disabled">
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    <?php foreach($payment_types as $obj){ ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php if($preenroll->payment_type_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('payment_type_id'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Status ======= -->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_id"><?php echo $this->lang->line('status'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select  class="form-control col-md-7 col-xs-12" name="status_id" id="edit_status_id" >
                                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                    
                                                    <?php foreach($status_types as $obj){ ?>
                                                        <option value="<?php echo $obj->id; ?>" <?php if($preenroll->status_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $this->lang->line($obj->name); ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="help-block"><?php echo form_error('status_id'); ?></div>
                                            </div>
                                        </div>
                                        <!-- ======= Button ======= -->
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">    
                                                <input type="hidden" name="section_id" id="section_id" value="<?php echo $preenroll->section_id; ?>" />                                        
                                                <input type="hidden" name="class_id" id="class_id" value="<?php echo $preenroll->class_id; ?>" />                                        
                                                <input type="hidden" name="school_id" id="school_id" value="<?php echo $preenroll->school_id; ?>" />                                        
                                                <input type="hidden" name="payment_type_id" id="payment_type_id" value="<?php echo $preenroll->payment_type_id; ?>" />
                                                <input type="hidden" name="id" id="id" value="<?php echo $preenroll->id; ?>" />
                                                <a href="<?php echo site_url('preenroll'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                                <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                            </div>
                                        </div>
                                        
                                    <?php echo form_close(); ?>
                                </div> 
                            </div> 
                        <?php } ?>
                        <!-- ============================================== -->
                        <!-- Tab View elements -->
                        <!-- ============================================== -->
                        <?php if(isset($detail)){ ?>
                            <div class="tab-pane fade in active" id="tab_view_preenroll">
                                <div class="x_content"> 
                                    <?php echo form_open_multipart(site_url(), array('name' => 'detail', 'id' => 'detail', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('guardian_name'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->guardian_name; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('guardian_cpf'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->guardian_cpf; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('phone'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->guardian_phone; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('address'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->address; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('state'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->state; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('city'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->city; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('email'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->email; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('guardian_relation'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->guardian_relation; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('student_name'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->student_name; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('student_gender'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->student_gender; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('school'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <td><?php echo $preenroll->school_name; ?></td>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('class'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            :   <td><?php echo $preenroll->class_name; ?></td>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('section'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->section_name; ?>
                                            </div>
                                        </div>
                                        <!-- =======  ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('payment_type'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $preenroll->payment_type; ?>
                                            </div>
                                        </div>
                                        <!-- ======= Status ======= -->
                                        <div class="item form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('status'); ?></label>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                            : <?php echo $this->lang->line($preenroll->status); ?>
                                            </div>
                                        </div>
                                        <!-- ======= Buttoms ======= -->
                                        <?php if(has_permission(EDIT, 'preenroll', 'preenroll')){ ?>                         
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <a href="<?php echo site_url('preenroll/edit/'.$preenroll->id); ?>" class="btn btn-info"><?php echo $this->lang->line('update'); ?></a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php echo form_close(); ?>
                                </div> 
                            </div> 
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ============================================== -->
<!-- Scripts -->
<!-- ============================================== -->
                        
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
     
     
     
     
   </script>
 <!-- Super admin js end -->

<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 
 
<!-- datatable with buttons -->
<script type="text/javascript">
     
    //  $('#add_dob').datepicker();
    //  $('#edit_dob').datepicker();
     <?php if(isset($edit)){ ?>
            get_city_by_state('<?php echo $preenroll->city_id; ?>')
           get_class_and_section('<?php echo $preenroll->school_id; ?>', '<?php echo $preenroll->class_id; ?>','<?php echo $preenroll->section_id; ?>')  ; 
    <?php } ?>   

    function get_class_and_section(school_id,class_id, section_id){
        if(!school_id){
            alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
            return false;
        }
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id : class_id},               
            async  : false,
            success: function(response){     
                if(response)
                {
                    if(class_id === ''){                                               
                        $('#add_class_id').html(response);
                    }else{
                        $('#edit_class_id').html(response);
                    }
                }
            }
        });
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

    function get_schools_by_city(){
        var city_id = '';
        <?php if(isset($edit)){ ?>                
            city_id = $('#edit_city_id').val();
        <?php }else{ ?> 
            city_id = $('#add_city_id').val();
        <?php } ?> 
        if(!city_id){
            alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('city'); ?>');
            return false;
        }
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_schools_by_city'); ?>",
            data   : { city_id:city_id},               
            async  : false,
            success: function(response){     
                if(response)
                {
                    <?php if(!isset($edit)){ ?>                                             
                        $('#add_school_id').html(response);
                    <?php }else{ ?> 
                        $('#edit_school_id').html(response);
                    <?php } ?> 
                }
            }
        });
    }

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

    function get_class_by_school(school_id,class_id){
        if(!school_id){
            alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
            return false;
        }
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id : class_id},               
            async  : false,
            success: function(response){     
                if(response)
                {
                    if(class_id === ''){                                               
                        $('#add_class_id').html(response);
                    }else{
                        $('#edit_class_id').html(response);
                    }
                    get_section_by_class(class_id,'');
                }
            }
        });
    }
    function get_city_by_state(city_id){
        // var isEditMode = isset($edit);
        var state_id = '';
        <?php if(isset($edit)){ ?>                
            state_id = $('#edit_state_id').val();
        <?php }else{ ?> 
            state_id = $('#add_state_id').val();
        <?php } ?> 
        if(!state_id){
            alert('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('state'); ?>');
            return false;
        }
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_city_by_state'); ?>",
            data   : { state_id:state_id},               
            async  : false,
            success: function(response){     
                if(response)
                {
                    <?php if(!isset($edit)){ ?>                                             
                        $('#add_city_id').html(response);
                    <?php }else{ ?> 
                        $('#edit_city_id').html(response);
                    <?php } ?> 
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

    $("#add").validate();     
    $("#edit").validate();   
 </script>