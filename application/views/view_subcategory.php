
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
		
		<div class=" col-lg-12 col-xs-12 col-sm-12">
          	<div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
							<div class="caption font-green">
								<span class="caption-subject bold uppercase">All Subcategory</span>
							</div>
							<div class="qtarea">
                            <a href="<?= base_url().'Home/add_subcategory'; ?>">Add Subcategory</a>
                             </div>
                    </div>
					
                    <div class="portlet-body">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table array_index="0,1,2" class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> Category</th>
                                            <th> Sub Category</th>
                                            <th style="text-align: center;">Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											<?php
												if(isset($result))
												{
											 
												foreach($result as $subcategory){
												echo"<tr>  
												        <td>".$subcategory->id."</td>
														<td>".$subcategory->category_name."</td>
														<td>".$subcategory->sub_category_name ."</td>
														<td width='100' style='text-align: center;'>
														<a class='btn btn-xs green' href='add_subcategory/".$subcategory->id."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>  
												       	<a subcategory_id='".$subcategory->id."' subcategory_name='".$subcategory->sub_category_name."' class='btn btn-xs red main_delete_subcategory'><i class='icon-trash'></i></a> </td>
													</tr>";
											   }
												}
											?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--content Area  End-->
					
					
					<div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>




</div>

