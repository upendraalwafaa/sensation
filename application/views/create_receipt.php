<?php
// echo '<pre>';
// print_r($quotation_details);
// echo '</pre>';
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase font-green">Create New Receipt</span>
                        </div>
                        <div class="qtarea">
                            <a href="<?= base_url() . 'Home/view_child_details'; ?>">View Receipt</a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-xs-12 col-sm-3"></div>-->
                    <div class="wrap_alldrop">
                        <div class="ui-widget" >
                            <select id="receipt_by_name" class="selectpicker form-control" data-live-search="true">
                                <option value="">searching for child..</option>
                                <?php
                                for ($cch = 0; $cch < count($child_details_all); $cch++) {
                                    $d = $child_details_all[$cch];
                                    ?><option value="<?= $d->id ?>"><?= $d->child_name ?></option><?php
                                }
                                ?>
                            </select>
                          <!--  <input id="receipt_by_name" type="text" class="form-control" placeholder="Search for student..."/> 
                            <div class="alldropdown" style="display:none;">
                                <div class="childs_names">
                                    <ul class="droplist dd-list dd-list-3"></ul>
                                </div>
                            </div>-->
                        </div>
                    </div>




                    <div class="col-lg-12 col-xs-12">
                        <hr style="margin: 0 0 5px 0;"/>
                    </div>

                    <div class="col-lg-12 col-xs-12 col-sm-12 ">
                        <!--content Area  statrt-->
                        <?php
                        if ($child_id_quotation != '') {
                            ?>
                            <div class="col-lg-3 col-xs-12 row">
                                <h4 style="margin-top: 5px; margin-bottom: 13px;"><b><?= $child_name ?></b></h4>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12">
                                <div class="due_bnt"><?= amount_formate_details($excess_amount); ?></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-xs-12">
                            <hr style="margin:0 0 15px 0;"/>
                        </div>

                        <div class="col-lg-12 col-xs-12">
                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                <thead>
                                    <tr>
                                        <th> Sl No</th>
                                        <th>Date</th>
                                        <th> Quotation No</th>
                                        <th> Sub Total</th>
                                        <th> Deduction</th>
                                        <th> Total</th>
                                        <th> Paid</th>
                                        <th>Cancelled</th>
                                        <th>Refund</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($child_id_quotation); $i++) {
                                        $d = $child_id_quotation[$i]['quotation'];
                                        $erp_register_no = '';
                                        if ($d->erp_register_no) {
                                            $erp_register_no = ' &nbsp;/ &nbsp;' . $d->erp_register_no;
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>

                                            <td > <?= date('d/m/Y', strtotime($d->timestamp)) ?> </td>
                                            <td > <a href="<?= base_url() . 'Home/create_receipt/NA/' . $d->quotation_id ?>" title="Make Payment"><?= $d->receipt_no . $erp_register_no ?></a></td>
                                            <td > <?= $d->sub_total ?></td>
                                            <td > <?= $d->discount ?></td>
                                            <td ><?= $d->total ?></td>
                                            <td > <?= $child_id_quotation[$i]['payed_amt'] ?></td>
                                            <td> <?= $child_id_quotation[$i]['cancelled_ses'] == 0 ? '' : $child_id_quotation[$i]['cancelled_ses'] ?></td>
                                            <td> <?php
                                                if ($child_id_quotation[$i]['cash_refund'] > 0) {
                                                    echo '<a><small>Cash Refund ' . $child_id_quotation[$i]['cash_refund'] . '</small></a>';
                                                }
                                                if ($child_id_quotation[$i]['refund_excess_amt'] > 0) {
                                                    echo $child_id_quotation[$i]['cash_refund'] > 0 ? ' / ' : '';
                                                    echo '<a><small>Credit Excess ' . $child_id_quotation[$i]['refund_excess_amt'] . '</small></a>';
                                                }
                                                ?>
                                            </td>

                                        </tr>
    <?php } ?>
                                </tbody>
                            </table>
                            <!--content Area  End-->
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                    if ($receipt_details != '') {
//                    echo '<pre>';
//                    print_r($receipt_details);
//                    echo '<pre>';
                        ?>
                        <div class=" ">
                            <div class="panel panel-primary" id="primary_pannel_id">
                                <input type="hidden" value="<?= $receipt_details[0]->quotation_id ?>" id="quotation_id">
                                <input type="hidden" value="<?= $receipt_details[0]->receipt_no ?>" id="receipt_no">
                                <input type="hidden" value="<?= $excess_amount ?>" id="excess_amount">
                                <div class="panel-heading">  

                                    <h3 class="panel-title"><b>Child Name : <?= $receipt_details[0]->child_name ?></b><b id="student_details"></b><b class="pull-right"><?= amount_formate_details($excess_amount); ?></b></h3> 
                                </div>  
                                <div class="panel-body">
                                    <div class="portlet-body form">

                                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="" role="grid" aria-describedby="sample_1_info">
                                            <thead>
                                                <tr><th>Refund</th>
                                                    <th>Sl No</th>
                                                    <th > Discipline</th>
                                                    <th > Status</th>
                                                    <th > Staff Name</th>
                                                    <th > Session Date</th>
                                                    <th > Time</th>
                                                    <th > Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($receipt_details); $i++) {
                                                    $d = $receipt_details[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                                <?php if ($d->completion_status == 0) { ?>
                                                                <div class="md-checkbox">
            <?php $edit_attr = "staff_id='" . $d->staff_id . "' start_time='" . date('H:i', strtotime($d->start_time)) . "' end_time='" . date('H:i', strtotime($d->end_time)) . "' date='" . $d->session_date . "'"; ?>
                                                                    <input <?php echo $edit_attr; ?> session_tbl_id="<?= $d->id ?>" amount="<?= $d->services_fee ?>"  type="checkbox" id="quotation_cancel_<?= $i ?>" class="md-check selected_checkbox">
                                                                    <label for="quotation_cancel_<?= $i ?>">
                                                                        <span class="inc"></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span> </label>
                                                                </div>
        <?php } ?>
                                                        </td>
                                                        <td><?= $i + 1; ?></td>
                                                        <td > <?= $d->disipline_name; ?></td>
                                                        <td></td>
                                                        <td > <?= $d->employee_name ?></td>
                                                        <td > <?= $d->session_date ?></td>
                                                        <td ><?= date('H:i', strtotime($d->start_time)) . ' / ' . date('H:i', strtotime($d->end_time)) ?></td>
                                                        <td ><?= $d->services_fee ?> </td>
                                                    </tr>
    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="portlet-body form" id="form_area" style="display: none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit bordered">
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal form-bordered">
                                                <div class="form-body ">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quotation Amount</label>
                                                        <div class="col-md-4">
                                                            <input disabled="" value="<?= $quotation_details[0]->sub_total ?>"  class="form-control quotation_amount" type="text">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div id="refund_mode_div" style="display: none;">
                                                    <div class="form-body ">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Refundable Amount</label>
                                                            <div class="col-md-4">
                                                                <input disabled="" id="refound_amount" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body" >
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Refund Mode</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" id="refund_mode">
                                                                    <option value="0">Add To Excess</option>
                                                                    <option value="1">Refund By Cash</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($previous_pay != '') {
                                                    ?>
                                                    <div class="form-body ">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Already Paid</label>
                                                            <div class="col-md-4">
                                                                <input disabled="" value="<?= $previous_pay ?>"  class="form-control alredy_paid" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
    <?php } ?>
                                                <div class="form-body ">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Note</label>
                                                        <div class="col-md-4">
                                                            <textarea id="messages" class="form-control autosizeme" rows="6" placeholder="Note..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 128px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions ">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button id="quotation_cancel_btn" type="button" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                            <button id="edit_session_details" type="button" class="btn red">
                                                                <i class="fa fa-check"></i> Edit</button>
                                                            <button onclick="window.location = base_url + 'Home/create_receipt';" type="button" class="btn default">Cancel</button>
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






                        <div class="portlet-body form" id="edit_box_div" style="display: none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit bordered">
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal form-bordered">
                                                <table class="table table-striped table-hover table-bordered dataTable no-footer" id="" role="grid" aria-describedby="sample_1_info">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th > Staff Name</th>
                                                            <th > Session Date</th>
                                                            <th > Start Time</th>
                                                            <th > End Time</th>
                                                            <th > Reallocate Staff </th>
                                                            <th > </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="edit_box_tbody">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <select class="form-control">
                                                                    <option>--Select--</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="datepicker_dsb form-control"></td>
                                                            <td>
                                                                <select class="form-control">
                                                                    <option>--Select--</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control">
                                                                    <option>--Select--</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tr>
                                                        <td colspan="6" align="center"><button id="submit_edit_session" type="button" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>













                        <div class="portlet-body form" id="form_payment">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet light form-fit bordered">
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quotation Amount</label>
                                                        <div class="col-md-4">
                                                            <input disabled="" value="<?= $quotation_details[0]->sub_total ?>"  class="form-control quotation_amount" type="text">
                                                        </div>
    <?php if (count($payment_mode) > 0) { ?>
                                                            <div class="col-md-4">
                                                                <b>Payment Mode : </b>&nbsp;<?php
                                                                $payment_mode_string = '';
                                                                for ($pm = 0; $pm < count($payment_mode); $pm++) {
                                                                    $pmd = $payment_mode[$pm];
                                                                    if ($pmd->paid_by == 0) {
                                                                        $payment_mode_string = $payment_mode_string . 'Cash, ';
                                                                    }
                                                                    if ($pmd->paid_by == 1) {
                                                                        $payment_mode_string = $payment_mode_string . 'Cheque, ';
                                                                    }
                                                                    if ($pmd->paid_by == 2) {
                                                                        $payment_mode_string = $payment_mode_string . 'Card, ';
                                                                    }
                                                                    if ($pmd->paid_by == 3) {
                                                                        $payment_mode_string = $payment_mode_string . 'Bank Transfer, ';
                                                                    }
                                                                }
                                                                echo substr($payment_mode_string, 0, -2);
                                                                ?>
                                                            </div>
    <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Discount</label>
                                                        <div class="col-md-4">
                                                            <input value="<?= $quotation_details[0]->discount ?>" id="discount"  class="form-control only_number" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-body" id="why_discount_div" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Discount Note</label>
                                                        <div class="col-md-4">
                                                            <textarea id="why_discount" class="form-control autosizeme" rows="6" placeholder="Note..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
    <?php if ($previous_pay != '') { ?>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Already Paid</label>
                                                            <div class="col-md-4">
                                                                <input disabled="" value="<?= $previous_pay ?>"  class="form-control alredy_paid" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
    <?php } if ($quotation_details[0]->total > $previous_pay) { ?>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Payable Amount</label>
                                                            <div class="col-md-4">
                                                                <input  class="form-control" id="payable_amount" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Paid by</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" id="paid_by">
                                                                    <option value="0">Cash</option>
                                                                    <option value="1">Cheque</option>
                                                                    <option value="2">Card</option>
                                                                    <option value="3">Bank Transfer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } else {
                                                    ?><div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"></label>
                                                            <div class="col-md-4">
                                                                <label>This Receipt Is Closed</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                ?>
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Note</label>
                                                        <div class="col-md-4">
                                                            <textarea id="notes" class="form-control autosizeme" rows="6" placeholder="Note..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button id="submit_payment" type="button" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                            <button onclick="window.location = base_url + 'Home/create_receipt';" type="button" class="btn default">Cancel</button>
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
<?php } ?>
                    <!--content Area  End-->
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<?php

function amount_formate_details($excess_amount) {
    if ($excess_amount < 0) {
        $msg = 'Excess : ' . substr($excess_amount, 1) . ' AED';
    } else {
        $msg = 'Due : ' . $excess_amount . ' AED';
    }
    return $msg;
}
?>