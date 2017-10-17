<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
          <div class="col-md-12"> 
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
              <div class="portlet-title">
                <div class="caption font-dark"> <i class="icon-settings font-dark"></i> 
                <span class="caption-subject bold uppercase"> Sessions</span> </div>
              </div>
              <div class="portlet-body">
                <div class="table-toolbar">
                  <div class="row">
                    <div class="col-md-6">
                      <!--<div class="btn-group">
                        <button id="sample_editable_1_2_new" class="btn sbold green"> Add New <i class="fa fa-plus"></i> </button>
                      </div>-->
                    </div>
                    <div class="col-md-6">
                      <div class="btn-group pull-right">
                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i> </button>
                        <ul class="dropdown-menu pull-right">
                          <li> <a href="javascript:;"> <i class="fa fa-print"></i> Print </a> </li>
                          <li> <a href="javascript:;"> <i class="fa fa-file-pdf-o"></i> Save as PDF </a> </li>
                          <li> <a href="javascript:;"> <i class="fa fa-file-excel-o"></i> Export to Excel </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                  <thead>
                    <tr>
                              
                      <th> SNo </th>   
                      <th> Session Date </th>
                      <th> Disipline </th>
                      <th> Staff </th>
                      <th> Time </th>
                      <th> Fee </th>
                      <th> Status </th>
                      <th> Actions </th>                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;
                  foreach ($qt_session_details as $key => $value) : ?>
                      <tr class="odd gradeX">

                      <td data-no="<?=$i;?>"><?=$i;?></td>
                      <td><?=$value->session_date;?></td>
                      <td><?=$value->disipline_name;?></td>
                      <td><?=$value->employee_name;?></td>                    
                      <td><?=$value->start_time;?>-<?=$value->end_time;?></td>
                      <td><?=$value->services_fee;?></td>                                            
                      <td class="center">
                          <?php 
                          if($value->t_status == 1) {
                            echo "Cancelled 100%";
                          } elseif($value->t_status == 2) {
                            echo "Cancelled 50%";
                          } elseif($value->t_status == 3){
                            echo "No show";
                          } elseif($value->t_status == 4){
                             echo "Attended";
                          } elseif($value->t_status == 5){
                            echo "Cancelled by Therapist";
                          } elseif ($value->t_status == 6) {
                               echo "Cancelled No charge";
                          } elseif ($value->t_status == 7) {
                            echo "No show – SBS";
                          } elseif ($value->t_status == 8) {
                            echo "ELIP (General Observation)";
                          } elseif ($value->t_status == 9) {
                            echo "General Observation";
                          } elseif($value->t_status == 10){
                              echo "Re-Schedule";
                          }
                          ?>                        
                      </td>
                      <td>
                        <div class="btn-group">
                              <a href="<?= base_url('Home/view_single_session/'.$value->id); ?>" class="btn btn-xs green dropdown-toggle">View</a>
                        </div>
                      </td>                  
                      </tr>
                  <?php $i++; endforeach;  ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET--> 
          </div>
        </div>
      </div>
    <!-- END CONTENT BODY -->
</div>
<!-- responsive -->
<div id="responsive" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title ">Session<span class="session_nbr"></span></h4>
  </div>

  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">

          <div class="portlet-body form">
            <form class="form-horizontal" role="form">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-2 control-label">Name</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="st_name" value="" readonly placeholder="">
                   </div>
                  <label class="col-md-2 control-label">Quatation No</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="qt_no" value="" readonly placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">  Services/Courses*</label>
                  <div class="col-md-4">
                    <select class="form-control" id="qt_disiplines">

                    </select>
                  </div>
                  <label class="col-md-2 control-label">Status</label>
                  <div class="col-md-4">
                    <select class="form-control">
                      <option>Select Option </option>
                      <option>Cancelled 100% </option>
                      <option>Cancelled 50%</option>
                      <option>No show</option>
                      <option>Attended</option>
                      <option>Cancelled by Therapist</option>
                      <option>Cancelled No charge</option>
                      <option>No show – SBS – 100% Chargeable</option> 
                      <option>ELIP (General Observation) – No charge</option>
                      <option>General Observation – No Charge</option>                                                                                                                                   
                    </select>
                  </div>                  

                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Date</label>
                  <div class="col-md-4">
                        <input class="form-control datepicker" id="session_date" placeholder="12-07-2017" type="text" value="">
                  </div>                
                  <label class="col-md-2 control-label">Session Time</label>
                  <div class="col-md-2">
                      <input type="text" name="time" id="time" class="form-control" placeholder="10-11 AM">
                  </div>
                </div>    
                <div class="form-group">
                  <label class="col-md-2 control-label">Re-scheduled Date(If Any)</label>
                  <div class="col-md-4">
                        <input class="form-control datepicker" placeholder="12-07-2017" type="text" value="" id="single_quo__date_1">
                  </div>
                  <label class="col-md-2 control-label">Session Time</label>
                  <div class="col-md-4">
                      <input type="text" class="form-control timepicker timepicker-default" placeholder="10-11 AM">
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-md-2 control-label">Therapy Note</label>
                  <div class="col-md-10">
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile" class="col-md-2 control-label">Attachment</label>
                  <div class="col-md-10">
                    <input type="file" id="exampleInputFile">
                    <p class="help-block"> some help text here. </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">View Permission </label>
                  <div class="col-md-10">
                    <div class="mt-checkbox-inline">
                      <label class="mt-checkbox">
                        <input type="checkbox" id="inlineCheckbox21" value="option1">
                        Therapist <span></span> </label>
                      <label class="mt-checkbox">
                        <input type="checkbox" id="inlineCheckbox22" value="option2">
                        All <span></span> </label>
                      
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
    <button type="button" class="btn green">Save changes</button>
  </div>
</div>