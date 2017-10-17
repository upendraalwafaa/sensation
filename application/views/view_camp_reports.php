
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">

                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase">All Out Side Student Details</span>
                        </div>

                        <div class="qtarea">
                            <a href="<?= base_url() . 'Home/reg_outsidestudent'; ?>">Add New Student</a>
                        </div>

                    </div>
                    <div class="portlet-body ">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th > Father Name</th>
                                            <th > Student Name</th>
                                            <th > Sub Total</th>
                                            <th > Discount</th>
                                            <th > Total</th>
                                            <th > Paid Amount</th>
                                            <th > Added Date </th>
                                            <th >  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($quotation_details); $i++) {
                                            $d = $quotation_details[$i]['quotation'];
                                            ?>
                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td > <?= $d->father_name ?></td>
                                                <td > <?= $d->child_name ?></td>
                                                <td > <?= $d->sub_total ?></td>
                                                <td > <?= $d->discount ?></td>
                                                <td > <?= $d->total ?></td>
                                                <td > <?= $quotation_details[$i]['total_pay'] ?></td>
                                                <td > <?= date('d-m-Y H:i', strtotime($d->date_time)) ?> </td>
                                                <td style=" vertical-align: middle; text-align: center;">
                                                    <a title="Edit" class="btn btn-xs green" href="add_campreports/<?= $d->quotation_id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                                    <a title="Delete" father_name="<?= $d->father_name ?>" child_name="<?= $d->child_name ?>" quotation_id="<?= $d->quotation_id ?>" child_id="<?= $d->student_id ?>"  class="btn btn-xs red delete_outside_student"><i class="icon-trash"></i></a>
                                                </td>
                                            </tr> <?php
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


