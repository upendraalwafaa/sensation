<?php
$user_array      = $this->session->userdata('logged_in');
$user_id         = $user_array[0]->id;
$user_name       = $user_array[0]->employee_name;
$user_disipline  = $user_array[0]->disipline_id;
// echo "<pre>";
// print_r($therapy);
// exit;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
			<div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
								<div class="portlet-title">
									<div class="caption font-green">Therapy Note Lists </div> 
								</div> 
							<div class="portlet-body">
								<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
			                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									    <thead>
									        <tr>
									            <th> SNo </th>			
									            <th> Date </th>		
									            <th> Staff </th>    
									            <th> Therapy Notes </th>
									            <th >Attachment </th>
									        </tr>
									    </thead>
									    <tbody>               
										<?php
										$i=1;
										foreach($therapy as $key=>$value){ ?>
											<tr>
											    <td><?=$i?></td>
												<td><?=$value->t_created_date?></td>
												<td><?=$value->employee_name?></td>
												<td style="<?=($value->strike_note == 'Yes' ? 'text-decoration: line-through' : '' )?>"><?=$value->therapy_note?></td>
												<td><a target="_blank" href="<?=base_url()?>files/images/<?=$value->therapy_note_pdf?>"><?=$value->therapy_note_pdf?></a></td>
											
											</tr>
										<?php 
										$i++;
										}
										?>
								    	</tbody>
								</table>
										<div class="clearfix"></div>
								</div>
									<div class="clearfix"></div>
							</div>						
					
					<div class="clearfix"></div>
                </div>	
					<div class="clearfix"></div>
			
				<br/>
				<br/>
				</div>
				<div class="clearfix"></div>
  		</div>
			<div class="clearfix"></div>
	</div>
</div><div class="clearfix"></div>
</div>