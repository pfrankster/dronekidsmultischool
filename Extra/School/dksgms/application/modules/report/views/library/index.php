<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> <?php echo $this->lang->line('library'); ?> <?php echo $this->lang->line('report'); ?></small></h3>                
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <?php $this->load->view('quick_report'); ?>   
            
             <div class="x_content filter-box"> 
                <?php echo form_open_multipart(site_url('report/library'), array('name' => 'library', 'id' => 'library', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">                    
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <?php $this->load->view('layout/school_list_filter'); ?>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="item form-group"> 
                                <?php echo $this->lang->line('academic_year'); ?>
                                <select  class="form-control col-md-7 col-xs-12" name="academic_year_id" id="academic_year_id">
                                    <option value=""><?php echo $this->lang->line('all'); ?></option>
                                    <?php foreach ($academic_years as $obj) { ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($academic_year_id) && $academic_year_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->session_year; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group"> 
                                <?php echo $this->lang->line('group_by_data'); ?> <span class="required">*</span>
                                <select  class="form-control col-md-7 col-xs-12" name="group_by" id="group_by" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php $groups = get_group_by_type(); ?>
                                    <?php foreach ($groups as $key=>$value) { ?>
                                    <option value="<?php echo $key; ?>" <?php if(isset($group_by) && $group_by == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                    <?php } ?>
                                    <option value="class" <?php if(isset($group_by) && $group_by == 'class'){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('class'); ?></option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="item form-group"> 
                                <?php echo $this->lang->line('from_date'); ?>
                                <input  class="form-control col-md-7 col-xs-12"  name="date_from"  id="date_from" value="<?php echo isset($date_from) && $date_from != '' ?  date('d-m-Y', strtotime($date_from)) : ''; ?>" placeholder="<?php echo $this->lang->line('from_date'); ?>" type="text">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="item form-group"> 
                                <?php echo $this->lang->line('to_date'); ?>
                                <input  class="form-control col-md-7 col-xs-12"  name="date_to"  id="date_to" value="<?php echo isset($date_to) && $date_to != '' ?  date('d-m-Y', strtotime($date_to)) : ''; ?>" placeholder="<?php echo $this->lang->line('to_date'); ?>" type="text">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class=""><a href="#tab_tabular"   role="tab" data-toggle="tab"   aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('tabular'); ?> <?php echo $this->lang->line('report'); ?></a> </li>
                        <li  class="active"><a href="#tab_graphical"   role="tab" data-toggle="tab"  aria-expanded="false"><i class="fa fa-line-chart"></i> <?php echo $this->lang->line('graphical'); ?> <?php echo $this->lang->line('report'); ?></a> </li>                          
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in" id="tab_tabular" >
                            <div class="x_content">
                            <table id="datatable-keytable" class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('academic_year'); ?></th>
                                        <th><?php echo $this->lang->line('group_by_data'); ?></th>
                                        <th><?php echo $this->lang->line('issue'); ?> <?php echo $this->lang->line('total'); ?></th>
                                        <th><?php echo $this->lang->line('return'); ?> <?php echo $this->lang->line('total'); ?></th>
                                        <th><?php echo $this->lang->line('remain'); ?> <?php echo $this->lang->line('total'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php 
                                    $total_issue = 0;
                                    $total_returned = 0;
                                    $remain_total = 0;
                                    
                                    $issue_arr = array();
                                    $return_arr = array();
                                    $remain_arr = array();
                                    
                                    $count = 1; if(isset($library) && !empty($library)){ ?>
                                        <?php foreach($library as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>                                            
                                            <td><?php echo $obj->session_year; ?></td>
                                            <td><?php echo $obj->group_by_field; ?></td>
                                            <td><?php echo $obj->total_issue; $total_issue +=$obj->total_issue; $issue_arr[] = $obj->total_issue;  ?></td>                                           
                                            <td><?php echo $obj->total_returned; $total_returned +=$obj->total_returned; $return_arr[] = $obj->total_returned; ?></td>                                           
                                            <td><?php echo $remain = $obj->total_issue-$obj->total_returned; $remain_total += $remain; $remain_arr[] = $remain; ?></td>                                           
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="3"><strong><?php echo $this->lang->line('group_by_data'); ?></strong></td>
                                            <td><strong><?php echo $total_issue; ?></strong></td>                                           
                                            <td><strong><?php echo $total_returned; ?></strong></td>                                           
                                            <td><strong><?php echo $remain_total; ?></strong></td>                                           
                                        </tr>
                                    <?php }else{ ?>
                                        <tr><td colspan="5" class="text-center"><?php echo $this->lang->line('no_data_found'); ?></td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div  class="tab-pane fade in active" id="tab_graphical" >
                            <div class="x_content">
                                <?php if(isset($library) && !empty($library)){ ?>
                                 <script type="text/javascript">

                                    $(function () {
                                        $('#library-report').highcharts({
                                            chart: {
                                                type: 'bar'
                                            },
                                            title: {
                                                text: '<?php echo $this->lang->line('book'); ?> <?php echo $this->lang->line('issue_and_return'); ?> <?php echo $this->lang->line('report'); ?>'
                                            },
                                            xAxis: {
                                                categories: [
                                                   <?php foreach($library as $obj){ ?> 
                                                    '<?php echo $obj->group_by_field; ?>',
                                                    <?php } ?>         
                                                ]
                                            },
                                            yAxis: {
                                                min: 0,
                                                title: {
                                                    text: ''
                                                }
                                            },
                                            legend: {
                                                reversed: true
                                            },
                                            plotOptions: {
                                                series: {
                                                    stacking: 'normal'
                                                }
                                            },
                                            series: [
                                            
                                            {
                                                name: '<?php echo $this->lang->line('remain'); ?>',
                                                data: [<?php echo implode(',', $remain_arr); ?>]
                                            }
                                            , {
                                                name: '<?php echo $this->lang->line('return'); ?>',
                                                data: [<?php echo implode(',', $return_arr); ?>]
                                            }, {
                                                name: '<?php echo $this->lang->line('issue'); ?>',
                                                data: [<?php echo implode(',', $issue_arr); ?>]
                                            }
                                            
                                            ],
                                            credits: {
                                            enabled: false
                                            }
                                        });
                                     });
                                </script>
                                <div id="library-report" style="width: 99%; height: 500px; margin: 0 auto"></div>
                                 <?php }else{ ?>
                                <p class="text-center"><?php echo $this->lang->line('no_data_found'); ?></p>
                                 <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
    $('#date_from').datepicker();
    $('#date_to').datepicker();
    $("#library").validate();  
       
</script>