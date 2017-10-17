<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
			<div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">Policy Procedure Lists </div> 
								<div class="qtarea">
                            <a href="<?= base_url().'Home/policy_procedure'; ?>">Add Policy</a>
                            <a href="<?= base_url().'Home/view_policy_accepted_list'; ?>">Accepted Policy</a>
                             </div>
							</div> 

							<?php if(isset($policy_procedure) && $policy_procedure != ''): ?>
							<div class="portlet-body">
								<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">							
			                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									    <thead>
									        <tr>
									            <th> SNo </th>			
									            <th> Name </th>		
									            <th> Policy Procedure </th>		
									            <th> Updated Date </th>    
									            <th> Status </th>					            
									        </tr>
									    </thead>
									    <tbody>               
											<?php
												$i=1;
												foreach($policy_procedure as $key=>$value) :
											?>
													<tr>
													    <td><?=$i?></td>
														<td><?=$value->pname?></td>
														<td><a href="<?=base_url()?>files/images/<?=$value->ppdf?>" target="_blank"><?=$value->ppdf?></td>	
														<td><?=$value->timestamp?></td>								
														<td><?=($value->status == 1 ? 'Active' : 'Inactive')?></td>									
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