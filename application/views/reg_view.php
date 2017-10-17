
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
           <div class="col-lg-12 col-xs-12 col-sm-12">
 					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<span class="caption-subject bold uppercase">All Registration</span>
							</div>
                    </div>
					
                    <div class="portlet-body ">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th> Child Name</th>
                                            <th> Date Of Birth</th>
                                            <th> Gender</th>
                                            <th> Father Name</th>
                                            <th> Contact Number </th>
                                            <th> Active Status </th>
                                            <th width="100"  style="text-align: center;"> Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($child_Arr)) {
                                            for ($i = 0; $i < count($child_Arr); $i++) {
                                                ?><tr>
                                                    <td><?= $child_Arr[$i]->child_name ?></td>
                                                    <td><?= $child_Arr[$i]->date_of_birth ?></td>
                                                    <td><?= $child_Arr[$i]->gender ?></td>
                                                    <td><?= $child_Arr[$i]->father_name ?></td>
                                                    <td><?= $child_Arr[$i]->father_home_number ?></td>
                                                    <td><?php
                                                    if( $child_Arr[$i]->archive==0){
                                                        ?><a child_id="<?= $child_Arr[$i]->child_tbl_id ?>" class="child_make_inactive" update_val="1" title="Doubel Click Make Inactive">Active</a><?php 
                                                    }else{
                                                           ?><a child_id="<?= $child_Arr[$i]->child_tbl_id ?>" class="child_make_inactive" update_val="0" title="Doubel Click Make Active">Inactive</a><?php 
                                                    }
                                                    ?></td>
                                                    <td  style="text-align: center;">
													<a class="btn btn-xs green" href="reg_add/<?= $child_Arr[$i]->child_tbl_id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
													<a class="btn btn-xs blue" href="reg_add/<?= $child_Arr[$i]->child_tbl_id ?>"><i class="fa fa-file-text" aria-hidden="true"></i></a>  
													

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
