<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
			<div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">Policy Procedure Accepted Lists </div> 
									<div class="qtarea">
                            <a href="<?= base_url().'Home/policy_procedure'; ?>">Add Policy</a>
                            <a href="<?= base_url().'Home/view_policy_procedure'; ?>">View Policy</a>
                             </div>
							</div> 

							<?php if(isset($policy_procedure_accepts) && $policy_procedure_accepts != ''): ?>
							<div class="portlet-body">
								<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">							
			                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									    <thead>
									        <tr>
									            <th> SNo </th>			
									            <th> Employee Name </th>
									            <th> Updated Date </th>    
									            <th> Status </th>		
									        </tr>
									    </thead>
									    <tbody>               
											<?php
												$i=1;
												foreach($policy_procedure_accepts as $key=>$value) :
											?>
													<tr>
													    <td><?=$i?></td>
														<td><?=$value->employee_name?></td>
														<td><?=$value->timestamp?></td>	
														<td><?=$value->accept?></td>														
													</tr>
											<?php 
												$i++;
												endforeach;
											?>
								    	</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>						
							<?php endif; ?>
					<div class="clearfix"></div>
                </div>	
				<div class="clearfix"></div>
  				</div>
			<div class="clearfix"></div>
	</div>
</div>
<div class="clearfix"></div>
</div>