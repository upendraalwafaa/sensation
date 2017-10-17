<?php
//echo '<pre>';
//print_r($employee_Arr);
//echo '</pre>';
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <!--content Area  statrt-->
				<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">All Employee</span>
                        </div>
                        	<div class="qtarea">
                            <a href="<?= base_url().'Home/add_employee'; ?>">Add Employee</a>
                             </div>
                    </div>
                 
                         <div class="portlet-body">
                              <table array_index="0,1,2,3,4" class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> Employee Name</th>
                                            <th> Designation</th>
                                            <th> Disipline</th>
                                            <th> Email</th>
                                            <th style="text-align: center;"> Edit/Delete </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($employee_Arr)) {
                                            for ($i = 0; $i < count($employee_Arr); $i++) {
                                                ?><tr>
                                                      <td><?= $i+1; ?></td>
                                                    <td><?= $employee_Arr[$i]['emp_details']->employee_name ?></td>
                                                    <td><?= $employee_Arr[$i]['emp_details']->designation_name ?></td>
                                                    <td><?php
                                                        $string = '';
                                                        for ($j = 0; $j < count($employee_Arr[$i]['desciplin']); $j++) {
                                                            $string = $string . $employee_Arr[$i]['desciplin'][$j]->disipline_name . ',';
                                                        }
                                                        echo substr($string, 0, -1);
                                                        ?></td>
                                                    <td><?= $employee_Arr[$i]['emp_details']->email ?></td>
												    <td style="text-align: center;">
													<a class="btn btn-xs green" href="add_employee/<?= $employee_Arr[$i]['emp_details']->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                                                    <a class="btn btn-xs blue" onclick="javascript: return confirm('Do You Want To Send For Reset Password');" title="Send Link To Reset Password" id="send_reset_password" emp_id=" <?= $employee_Arr[$i]['emp_details']->id ?>"><i class="fa fa-key" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--content Area  End-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>




</div>

