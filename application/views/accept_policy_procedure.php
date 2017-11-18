<?php
// $loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_session_details);
// exit;
?>
<style>
    .has-warning .md-radio label, .has-warning.md-radio label {
        color: #327ad5;
    }
    .has-warning .md-radio label>.box, .has-warning.md-radio label>.box {
        border-color: #327ad5;
    }
    .has-warning .md-radio label>.check, .has-warning.md-radio label>.check {
        background: #327ad5;
    }

</style>
<?php
$session_arr = get_session_array_value();
$url_id = $this->uri->segment(3);
$disabled = "disabled";
$staff_id = $session_arr[0]->id;
if ($url_id == $session_arr[0]->id) {
    $disabled = '';
}
?>
<div  class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12"> 
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <i class="icon-microphone font-dark hide"></i>
                                <span class="caption-subject bold font-dark uppercase font-green">Upload Policy Procedure</span>
                            </div>	
                            <div class="qtarea">
                                <?php if ($session_arr[0]->id == 17) { ?>
                                    <a href="<?= base_url() . 'Home/policy_procedure'; ?>">Add Policy</a>
                                <?php } ?>
                            </div>
                        </div>						
                        <div class="portlet-body">
                            <div class="view_qt_search adnewsbox col-sm-3">
                                <?= get_dropdown_employee_searchbox($id = '', $name = '', $redirurl = 'Home/accept_policy_procedure', $class = ''); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body row">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN PORTLET-->
                                                <div class="portlet light form-fit ">
                                                    <div class="portlet-title">

                                                    </div>
                                                    <div class="portlet-body form portlet-title">
                                                        <!-- BEGIN FORM-->
                                                        <form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"> Policy Procedure Type </label>
                                                                    <div class="col-md-6">
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="1" type="radio" id="centre_related" name="policy_type_view" class="md-radiobtn policy_type_view">
                                                                                <label for="centre_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Centre Related</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="2" type="radio" id="client_related" name="policy_type_view" class="md-radiobtn policy_type_view">
                                                                                <label for="client_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Client Related</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="3" type="radio" id="staff_related" name="policy_type_view" class="md-radiobtn policy_type_view">
                                                                                <label for="staff_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Staff Related</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer centre_related_div" style="display: none;">
                                                                        <table class="table table-striped table-hover table-bordered dataTable no-footer dataTable_class"  role="grid" aria-describedby="sample_1_info">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th >Status</th>
                                                                                    <th >POLICY</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                for ($i = 0; $i < count($centre_related); $i++) {
                                                                                    $d = $centre_related[$i];
                                                                                    $status = get_accept_status_by_staf_id($staff_id, $d->id);
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?= $i + 1; ?></td>
                                                                                        <td > 
                                                                                            <div class="md-checkbox has-success">
                                                                                                <?php
                                                                                                $checked = '';
                                                                                                if ($status == 1) {
                                                                                                    $checked = 'checked=""';
                                                                                                }
                                                                                                ?>
                                                                                                <input <?= $checked . ' ' . $disabled ?>   policy_id="<?= $d->id ?>" type="checkbox" id="centre_related_<?= $i ?>" class="md-check policy_procedure">
                                                                                                <label for="centre_related_<?= $i ?>">
                                                                                                    <span class="inc"></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>Accept</label>

                                                                                            </div>  </td>
                                                                                        <td > <a href="<?= base_url() . 'files/policy_procedure' . $d->file_name ?>"><?= $d->file_name ?></a></td>

                                                                                    </tr> 
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer client_related_div" style="display: none;">
                                                                        <table class="table table-striped table-hover table-bordered dataTable no-footer dataTable_class" role="grid" aria-describedby="sample_1_info">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th >Status</th>
                                                                                    <th >POLICY</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                for ($i = 0; $i < count($client_related); $i++) {
                                                                                    $d = $client_related[$i];
                                                                                    $status = get_accept_status_by_staf_id($staff_id, $d->id);
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?= $i + 1; ?></td>
                                                                                        <td >
                                                                                            <div class="md-checkbox has-success">
                                                                                                <?php
                                                                                                $checked = '';
                                                                                                if ($status == 1) {
                                                                                                    $checked = 'checked=""';
                                                                                                }
                                                                                                ?>
                                                                                                <input <?= $checked . ' ' . $disabled ?> policy_id="<?= $d->id ?>" type="checkbox" id="client_related_<?= $i ?>" class="md-check policy_procedure">
                                                                                                <label  for="client_related_<?= $i ?>">
                                                                                                    <span class="inc"></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>Accept</label>

                                                                                            </div> </td>
                                                                                        <td > <a href="<?= base_url() . 'files/policy_procedure' . $d->file_name ?>"><?= $d->file_name ?></a></td>

                                                                                    </tr> 
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer staff_related_div" style="display: none;">
                                                                        <table class="table table-striped table-hover table-bordered dataTable no-footer dataTable_class" role="grid" aria-describedby="sample_1_info">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th >Status</th>
                                                                                    <th >POLICY</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                for ($i = 0; $i < count($staff_related); $i++) {
                                                                                    $d = $staff_related[$i];
                                                                                    $status = get_accept_status_by_staf_id($staff_id, $d->id);
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?= $i + 1; ?></td>
                                                                                        <td ><div class="md-checkbox has-success">
                                                                                                <?php
                                                                                                $checked = '';
                                                                                                if ($status == 1) {
                                                                                                    $checked = 'checked=""';
                                                                                                }
                                                                                                ?>
                                                                                                <input <?= $checked . ' ' . $disabled ?> policy_id="<?= $d->id ?>" type="checkbox" id="staff_related<?= $i ?>" class="md-check policy_procedure">
                                                                                                <label for="staff_related<?= $i ?>">
                                                                                                    <span class="inc"></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>Accept</label>

                                                                                            </div> </td>
                                                                                        <td > <a href="<?= base_url() . 'files/policy_procedure' . $d->file_name ?>"><?= $d->file_name ?></a></td>

                                                                                    </tr> 
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="accepted_msg_div" style="display: none;">
                                                                    <label class="control-label col-md-3">Message</label>
                                                                    <div class="col-md-4">
                                                                        <b style="color: green;">Successfully accepted</b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button type="button" id="submit_policy" class="btn blue">
                                                                            <i class="fa fa-check"></i> Submit</button>
                                                                        <button type="button" class="btn default">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- END FORM-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
