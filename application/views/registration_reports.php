
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <form method="post" action="<?= base_url() . 'Home/registration_reports' ?>">
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                   <div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption font-green">
                                <span class="caption-subject bold uppercase"></span>
											Registraction  Report
										</span>
									</div>
								</div>
							   
					 
                                <div class="col-sm-4">
									<div class="form-group">
										<label>Start Date</label>
										<input id="start_date" name="start_date" type="text" class="form-control datepicker">
									</div>
                                </div>
								
								<div class="col-sm-4">
									<div class="form-group">
                                        <label>End Date</label>
									    <input id="end_date" name="end_date" type="text" class="form-control datepicker">
                                    </div>
                                </div>
                             	
								<div class="col-sm-4">
									<div class="form-group">
										<label>Discipline</label>
										<select class="form-control" id="discipline" name="discipline">
											<option value="">Select</option>
											<?php
											for ($i = 0; $i < count($disipline_details); $i++) {
												$d = $disipline_details[$i];
												?><option value="<?= $d->id ?>"><?= $d->disipline_name ?></option><?php
											}
											?>
										</select>
									</div>
								</div>
					 			 
					 			<div class="col-sm-12">
									<div class="form-group">
										<div class="pull-right">
											<button id="registraction_genrate_report" name="registraction_genrate_report" type="submit" class="btn blue">Search</button>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
					 	
								<div class="clearfix"></div>
					    </div>
                  
                	<div class="clearfix"></div>
                	
                <!-- END CONTENT BODY -->
            </div>
              	<div class="clearfix"></div>
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
                                    <th>Created Date</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Father Name</th>
                                    <th>Father Number</th>
                                    <th>Father Email</th>
                                    <th>Mother Name</th>
                                    <th>Mother Number</th>
                                    <th>Mother Email</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                for ($i = 0; $i < count($view_data); $i++) {
                                    $d = $view_data[$i];
                                    ?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td><?= date('d/m/Y', strtotime($d->timestamp)) ?></td>
                                        <td><?= $d->child_name ?></td>
                                        <td><?= $d->gender ?></td>
                                        <td><?= date('d/m/Y', strtotime($d->date_of_birth)) ?></td>
                                        <td><?= $d->father_name ?></td>
                                        <td><?= $d->father_mobile ?></td>  
                                        <td><?= $d->father_personal_email ?></td> 
                                        <td><?= $d->mother_name ?></td>
                                        <td><?= $d->mother_mobile ?></td>  
                                        <td><?= $d->mother_personal_email ?></td> 
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

