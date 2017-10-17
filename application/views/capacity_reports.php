
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <form method="post" action="<?= base_url() . 'Home/capacity_reports' ?>">
            <div class="row">
                <div class=" col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
                            <div class="caption font-green">
                                 <input type="hidden" id="disipline_id" value="">
                                 <span class="caption-subject bold uppercase">Capacity Report</span>
							</div>
						</div>
 
								<div class="col-sm-4">
									<div class="form-group">
										<label >Staff Name </label>
										<select required="" class="form-control" id="employee_id" name="employee_id">
											<option value="">Select</option>
											<?php
											$emp_id = '';
											if ($form_data != '') {
												$emp_id = $form_data['employee_id'];
											}
											for ($c = 0; $c < count($employee_details); $c++) {
												$cd = $employee_details[$c];
												$select = '';
												if ($emp_id == $cd->id) {
													$select = 'selected="selected"';
												}
												?><option <?= $select ?>  value="<?= $cd->id ?>"><?= $cd->employee_name ?></option><?php
											}
											?>
										</select>
									</div>
									
								</div>
								
								<div class="col-sm-4">
									<div class="form-group">
										<label >Start Date</label>
										<input value="<?= $form_data == '' ? '' : $form_data['start_date'] ?>" id="start_date" required="" name=	"start_date" type="text" class="form-control datepicker_dbbafter">
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group">
										<label >End Date</label>
										<input value="<?= $form_data == '' ? '' : $form_data['end_date'] ?>" id="end_date" name="end_date" required="" type="text" class="form-control datepicker_dbbafter">
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group pull-right">
									 	<button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue">Search</button>
									</div>
								</div>
								
								
							
                             
                            <?php if ($form_data != '') {
                                ?>
								
								<div class="col-sm-12 total_amount">
									<table cellspacing="0" cellpadding="0" style="float:right;">
									  <tr>
										<td><label class="caption-subject  bold uppercase">Total Hours</label></td>
										<td>:</td>
										<td><label class="caption-subject  bold uppercase"><?= $total_h ?></label></td>
									  </tr>
									</table>
								</div>
								
                            <?php } ?>
							
							<div class="clearfix"></div>
						</div>	
							
                        </div>
                

                <!-- END CONTENT BODY -->
            </div>
        </form >
        <?php if ($view_data) { ?>
            <div class="portlet-body div-span-main-cont">
                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class=" ">
                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Services</th>
                                    <th>Attended</th>
                                    <th>Cancelled 100%</th>
                                      <th>Cancelled 50%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $group = $view_data['group'];
                                $status = $view_data['status'];
                                for ($ql = 0; $ql < count($group); $ql++) {
                                    $d = $group[$ql];
                                    $st = $status[$ql];
                                    ?>
                                    <tr>
                                        <td><?= $ql + 1; ?></td>
                                        <td><?= $d->category_name ?></td>
                                        <td><?= $d->services_time . ' ' . $d->services_time_type . ' ' . $d->description ?></td>
                                        <td><?= $st['aatent'] ?></td>
                                        <td><?= $st['cancel_100'] ?></td>
                                        <td><?= $st['cancel_50'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>



