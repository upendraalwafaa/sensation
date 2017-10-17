<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <!--content Area  statrt-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
							<span class="caption-subject bold uppercase">Students Quotation Details</span>
						</div>
							<div class="qtarea">
                            <a href="<?= base_url().'Home/create_receipt'; ?>">Create Receipt</a>
                             </div>
					</div>
 
					<div class="wrap_alldrop">
						<div class="ui-widget">
							<input id="input_student_name" type="text" class="form-control" placeholder="Search for student..."> 
							    <div class="alldropdown" style="display:none;">
									<div class="childs_names">
										<ul class="droplist dd-list dd-list-na">
										</ul>
									</div>
								</div>
						</div>
					</div>
				  
					<div class="col-lg-12 col-xs-12">
						<hr style="margin:0 0 5px 0;"/>
					</div>
					<?php 
				if($main_arr!=''){
					if (count($main_arr) > 0) { ?>
					<div class="col-lg-3 col-xs-12">
						<h4><b>
							<a class="title_header" title="Click To View More Details" href="<?= base_url() . 'Home/reg_add/' . count($main_arr> 0) ? $main_arr[0]['quotation_details']->student_id : ''; ?>"><?php echo count($main_arr> 0) ? $main_arr[0]['quotation_details']->child_name : ''; ?></a>
						</b></h4>
					</div>
			  		<?php }
			  		}?>
					<div class="col-lg-12 col-xs-12">
						<hr style="margin:0 0 15px 0;"/>
					</div>
					
					
					<center> 
								<span class="caption-subject bold uppercase">
									
								</span>
								</center>
								
								
					
							
					<div class="col-lg-12 col-xs-12 col-sm-12">
						<!--content Area  statrt-->
						<?php
						if ($main_arr != '') {
							for ($i = 0; $i < count($main_arr); $i++) {
								$receipt_no = $main_arr[$i]['quotation_details']->receipt_no;
								$quotation_id=$main_arr[$i]['quotation_details']->quotation_id;

								$ses_det = $main_arr[$i]['ses_details'];
								//  echo '<pre>';
								//  print_r($receipt_no);
								// print_r($ses_det);
								//    echo '</pre>';
								?>
								<table style="display: none;"  id="session_details_<?= $quotation_id  ?>" class="table table-striped table-hover table-bordered dataTable  " role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr>
											<th>Sl No</th>
											<th> Receipt No</th>
											<th> Discipline Name</th>
											<th> Staff Name</th>
											<th> Session Date</th>
											<th> Start/End Time</th>
											<th>Amount</th>
											<th> Date<span style="color:red;cursor: pointer;" quotation_id="<?= $quotation_id  ?>" class="fa fa-remove pull-right close_tbl session_histody_rmv"></span></th>
										</tr>
									</thead>
									
									<tbody >
										<?php
										for ($dd = 0; $dd < count($ses_det); $dd++) {
											$category = $ses_det[$dd]['discipline_tbl'];

											$ses_ar = $ses_det[$dd]['session'];
											$category_id = $category->category_id;
											?>
											<tr>
												<td colspan="4"><center><b>Category : </b><?= $category->category_name ?></center></td>
										<td colspan="4"><center><b>Services : </b><?= $category->sub_category_name ?></center></td>
										</tr>
										<?php
										if ($category_id == '5' || $category_id == '6' || $category_id == '7' || $category_id == '8' || $category_id == '9' || $category_id == '10') {
											?> <tr>
												<td >1</td>
												<td ><?= $receipt_no ?></td>

												<td > </td>
												<td ></td>
												<td ><?= date('d/m/Y', strtotime($category->start_date)) . ' - ' . date('d/m/Y', strtotime($category->end_date)); ?></td>
												<td ></td>
												<td ><?= $category->total_price ?></td>
												<td ><?= date('d/m/Y', strtotime($category->timestamp)) ?></td>


											</tr> <?php
										} else {
											for ($ses = 0; $ses < count($ses_ar); $ses++) {
												$tmp = $ses_ar[$ses];
												?> <tr>
													<td ><?= $ses + 1; ?></td>
													<td ><?= $receipt_no ?></td>

													<td ><?= $tmp->disipline_name ?></td>
													<td ><?= $tmp->employee_name ?></td>
													<td >
														<?php
														if ($category_id != 4) {
															echo date('d/m/Y', strtotime($tmp->session_date));
														}
														?></td>
													<td ><?php
														if ($category_id != 4) {
															echo date('H:i', strtotime($tmp->start_time)) . ' - ' . date('H:i', strtotime($tmp->end_time));
														}
														?></td>
													<td ><?= $tmp->services_fee ?></td>
													<td ><?= date('d/m/Y', strtotime($tmp->timestamp)) ?></td>
												</tr><?php
											}
										}
									}
									?>
									</tbody>
								</table>
								<?php
							}
							for ($i = 0; $i < count($main_arr); $i++) {
								$d = $main_arr[$i]['quotation_details'];
								$payment = $main_arr[$i]['payment_history'];
								?>
								<table style="display: none;" id="smaple_1_<?= $d->quotation_id ?>" class="table table-striped table-hover table-bordered dataTable " role="grid" aria-describedby="sample_1_info">
									<thead>
										<tr>
											<th>Sl No</th>
											<th > Receipt No</th>
											<th > Paid Amount</th>
											<th > Last Update</th>
											<th > Date<span style="color:red;cursor: pointer;" quotation_id="<?= $d->quotation_id ?>" class="fa fa-remove pull-right close_tbl"></span></th>
										</tr>
									</thead>
									<tbody >
										<?php
										for ($kl = 0; $kl < count($payment); $kl++) {
											?>
											<tr>
												<td><?= $kl + 1 ?></td>
												<td><?= $payment[$kl]->receipt_no ?></td>
												<td><?= $payment[$kl]->pay_amount ?></td>
												<td><?= date('d/m/Y', strtotime($payment[$kl]->update_time)) ?></td>
												<td><?= date('d/m/Y', strtotime($payment[$kl]->timestamp)) ?></td>
											</tr>
											<?php
										}
										?>

									</tbody>
								</table>
								<!--content Area  End-->
							<?php } ?>
							
							<div class="portlet-body">
								 
								<div class="">
									<table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
										<thead>
											<tr>
												<th style="width: 22px;">Sl No</th>
												<th > Receipt No</th>
												<th > Total Session</th>
												<th > Total </th>
												<th > Paid </th>
												<th >  Due / Excess</th>
												<th ></th>

											</tr>
										</thead>
										<tbody>
											<?php
											for ($i = 0; $i < count($main_arr); $i++) {
												$d = $main_arr[$i]['quotation_details'];
												$tot_ses = $main_arr[$i]['quotation_total_session'];
												$paid_amt = $main_arr[$i]['paid_total'];
												?>
												<tr>
													<td><?= $i + 1; ?></td>
													<td > <?= $d->receipt_no ?> </td>
													<td ><?= '2/' . $tot_ses[0]->total_session ?> </td>
													<td > <?= $d->total ?> </td>
													<td><?= $paid_amt[0]->total_paid ?></td>
													<td>
														<?php
														$calculate = $d->total - $paid_amt[0]->total_paid;
														$cla_html = '';
														if ($calculate < 0) {
															$cla_html = 'Excess : ' . $calculate;
														} else {
															$cla_html = 'Due : ' . $calculate;
														}
														echo '<a class="view_payment_histody" quotation_id="' . $d->quotation_id . '">' . $cla_html . '</a>';
														?>
													</td>
													<td style="text-align: center;"><a class="view_session_histody btn btn-xs green" quotation_id="<?= $d->quotation_id ?>" title="View More Details"><i class="fa fa-eye" aria-hidden="true"></i></a> </td>
												</tr> 
											<?php } ?>
										</tbody>
									</table>
								</div>
	 
								<!--content Area  End-->
							</div>
							<?php } ?>
						</div>
					
					<div class="clearfix"></div>
				</div>
				
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>




</div>

