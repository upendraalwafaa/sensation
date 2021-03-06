
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
                        <div class="qtarea">
                            <a href="<?= base_url('Home/reg_add'); ?>">Add New</a>
                        </div>
                    </div>

                    <div class="portlet-body ">
                        <div class="view_qt_search adnewsbox col-sm-3">
                            <?= get_dropdown_child_searchbox($id = '', $name = '', $redirurl = 'Home/reg_add', $class = ''); ?>
                        </div>
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th> Child Name</th>
                                            <th> Date Of Birth</th>
                                            <th> Gender</th>
                                            <th> Father Name</th>
                                            <th> Contact Number </th>
                                            <th> Active Status </th>
                                            <th>Registration Date</th>
                                            <th width="100"  style="text-align: center;"> Edit/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($child_Arr)) {
                                            for ($i = 0; $i < count($child_Arr); $i++) {
                                                ?><tr>
                                                    <td><?= $i + 1; ?></td>
                                                    <td><?= $child_Arr[$i]->child_name ?></td>
                                                    <td><?= $child_Arr[$i]->date_of_birth ?></td>
                                                    <td><?= $child_Arr[$i]->gender ?></td>
                                                    <td><?= $child_Arr[$i]->father_name ?></td>
                                                    <td><?= $child_Arr[$i]->father_mobile ?></td>
                                                    <td><?php
                                                        if ($child_Arr[$i]->archive == 0) {
                                                            ?><a child_id="<?= $child_Arr[$i]->child_tbl_id ?>" class="child_make_inactive" update_val="1" title="Doubel Click Make Inactive">Active</a><?php
                                                        } else {
                                                            ?><a child_id="<?= $child_Arr[$i]->child_tbl_id ?>" class="child_make_inactive" update_val="0" title="Doubel Click Make Active">Inactive</a><?php
                                                        }
                                                        ?></td>
                                                    <td><?= date('Y-m-d', strtotime($child_Arr[$i]->timestamp)) ?></td>
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
<div class="modal fade emypopupmain in"  id="inactive_note_detals" tabindex="-1" role="basic" aria-hidden="true" style="display: block; padding-right: 17px;display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close inactive_model_hide"  aria-hidden="true"></button>
                <h4 class="modal-title"><center><b metting_id="2017_11_02" class="select_close_area">Why <span id="chnage_inactive"></span></b></center></h4>
            </div>
            <div class="modal-body">  
                <div class="form-group">
                    <label>Notes</label>
                    <textarea id="note_inactive" class="form-control" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button child_id="" update_val="" id="submit_inactive_btn" type="button" class="btn green save_events">Save Events</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>