
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                
                
                
	            <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                                <div class="caption font-green">
                             <span class="caption-subject bold uppercase font-green">All Category</span>
                          </div>
                          <div class="qtarea">
                            <a href="<?= base_url().'Home/add_category' ?>">Add Category</a>
                        </div>
                       </div>
                   
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="  col-sm-12">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Category Name</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
                                        <?php
                                        if (count($category_details) > 0) {
                                            for ($i = 0; $i < count($category_details); $i++) {
                                                ?>
                                                <tr>
                                                    <td><?= $i+1; ?></td>
												    <td> <?= $category_details[$i]->category_name ?> </td>
                                                    <td width="100" style="text-align: center;">
                                                        <a class="btn btn-xs green" href="add_category/<?= $category_details[$i]->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                                        <a category_id="<?= $category_details[$i]->id ?>" category_name="<?= $category_details[$i]->category_name ?>"  class="btn btn-xs red main_delete_category"><i class="icon-trash"></i></a>

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
          </div>
        <!-- END CONTENT BODY -->
    </div>




</div>

