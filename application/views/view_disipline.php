
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
 
                	<div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                            <div class="caption font-green">
								<span class="caption-subject bold uppercase">All discipline</span>
							</div>
							<div class="qtarea">
                            <a href="<?= base_url().'Home/disipline'; ?>">Add Discipline</a>
                             </div>
						</div>
					
					
                    <div class="portlet-body">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                              
							  <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th > Disipline Name </th>
                                            <th > Description Name </th>
                                            <th width="100" style="text-align: center;"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($desipline_details) > 0) {
                                            for ($i = 0; $i < count($desipline_details); $i++) {
                                                ?>
                                                <tr>
                                                    <td><?= $i+1; ?></td>
                                                    <td> <?= $desipline_details[$i]->disipline_name ?> </td>
                                                    <td> <?= $desipline_details[$i]->description ?> </td>
                                                    <td style="text-align: center;">
                                                         <a href="disipline/<?= $desipline_details[$i]->id ?>"><label class="btn btn-xs green"><i class="fa fa-edit"></i> </label></a> 
                                                         <a disipline_id="<?= $desipline_details[$i]->id ?>" disipline_name="<?= $desipline_details[$i]->disipline_name ?>" class="btn btn-xs red main_delete_disipline"><i class="icon-trash"></i></a>
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
                    <!--content Area  End-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>




</div>

