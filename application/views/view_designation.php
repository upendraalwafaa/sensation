
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <!--content Area  statrt-->
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption font-green">
					 			<span class="caption-subject bold uppercase">All Designation</span>
							</div>
							<div class="qtarea">
                            <a href="<?= base_url().'Home/designation'; ?>">Add Designation</a>
                             </div>
						</div>
						
                    
					  <div class="col-lg-12 col-xs-12 col-sm-12">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th > Designation Name </th>
                                            <th > Description </th>
                                            <th style="text-align: center;"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($designation_details) > 0) {
                                            for ($i = 0; $i < count($designation_details); $i++) {
                                                ?>
                                                <tr>
                                                    <td><?= $i+1; ?></td>
                                                    <td> <?= $designation_details[$i]->designation_name ?> </td>
                                                    <td> <?= $designation_details[$i]->description ?> </td>
                                                    <td width="100"  style="text-align: center;">
                                                         <a href="designation/<?= $designation_details[$i]->id ?>"><label class="btn btn-xs green"><i class="fa fa-pencil-square-o"></i></label></a> 
                                                         <a designation_id="<?= $designation_details[$i]->id ?>" designation_name="<?= $designation_details[$i]->designation_name ?>" class="btn btn-xs red main_designation_disipline"><i class="icon-trash"></i></a>
                                                         </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
 
                                    </tbody>
                                </table>
                            </div>
                 <div class="clearfix"></div>
                        </div>
                 <div class="clearfix"></div>
                    </div>
                    <!--content Area  End-->
                 <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

 
</div>

