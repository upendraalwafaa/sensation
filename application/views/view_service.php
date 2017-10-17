
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="  col-lg-12 col-xs-12 col-sm-12">
				<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
								<div class="caption font-green">
								<i class="icon-wrench font-green"></i>
								<span class="caption-subject bold uppercase">All Services</span>
                        </div>
                        	<div class="qtarea">
                            <a href="<?= base_url().'Home/add_service'; ?>">Add Services</a>
                             </div>

                    </div>
                    <div class="portlet-body  ">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table array_index="0,1,2,3,4,5" class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th> Category</th>
                                            <th> Sub Category</th>
                                            <th> Disipline</th>
                                            <th> Services Time</th>
                                            <th> Fees </th>
                                            <th width="100" style="text-align: center;"> Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($result)) {
                                            for ($i = 0; $i < count($result); $i++) {
                                                ?><tr>
                                                    <td><?= $i+1; ?></td>
                                                    <td><?= $result[$i]->category_name ?></td>
                                                    <td><?= $result[$i]->sub_category_name ?></td>
                                                    <td><?= $result[$i]->disipline_name ?></td>
                                                    <td><?= $result[$i]->services_time . '&nbsp;' . $result[$i]->services_time_type ?></td>
                                                    <td><?= $result[$i]->fees ?></td>
                                                    <td style="text-align: center;">
														<a class="btn btn-xs green" href="add_service/<?= $result[$i]->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
														<a services_id="<?= $result[$i]->id ?>" disipline_name="<?= $result[$i]->disipline_name ?>" sub_category_name="<?= $result[$i]->sub_category_name ?>"  category_name="<?= $result[$i]->category_name ?>" class="btn btn-xs red main_delete_services"><i class="icon-trash"></i></a>
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

