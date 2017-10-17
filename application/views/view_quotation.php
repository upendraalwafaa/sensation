
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
 
				<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
						
							<div class="caption font-green">
                                <span class="caption-subject bold uppercase">All Quotation Details</span>
                           </div>
                           
                           	<div class="qtarea">
                            <a href="<?= base_url().'Home/add_quotation'; ?>">Add Quotation</a>
                             </div>
                           
						</div>
                    <div class="portlet-body ">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th > Quotation No</th>
                                            <th > Student Name</th>
                                            <th > Sub Total</th>
                                            <th > Discount</th>
                                            <th > Total</th>
                                            <th > Status</th>
                                            <th > Added Date </th>
                                            <th >  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($quotation_details); $i++) {
                                            $reg_no='';
                                            if($quotation_details[$i]->erp_register_no!=''){
                                                $reg_no='&nbsp; / &nbsp;' .$quotation_details[$i]->erp_register_no;
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td > <?= $quotation_details[$i]->receipt_no .$reg_no  ?></td>
                                                <td > <?= $quotation_details[$i]->child_name ?></td>
                                                <td > <?= $quotation_details[$i]->sub_total ?></td>
                                                <td > <?= $quotation_details[$i]->discount ?></td>
                                                <td > <?= $quotation_details[$i]->total ?></td>
                                                <td > <?= $quotation_details[$i]->accept_status=='' ? 'Not Accepted' : $quotation_details[$i]->accept_status  ?></td>

                                                <td > <?= date('d-m-Y H:i', strtotime($quotation_details[$i]->date_time)) ?> </td>
                                                <td style=" vertical-align: middle;    text-align: center;">
           
                                                    <?php if ($quotation_details[$i]->accept_status == '') { ?>
                                                    <a electronic_id="0" title="Edit" quotation_id="<?= $quotation_details[$i]->quotation_id ?>" child_name="<?= $quotation_details[$i]->child_name ?>" receopt_no="<?= $quotation_details[$i]->receipt_no ?>" class="btn btn-xs green edit_quotation" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
												   <a electronic_id="0" receipt_no="<?= $quotation_details[$i]->receipt_no ?>" child_name="<?= $quotation_details[$i]->child_name ?>" quotation_id="<?= $quotation_details[$i]->quotation_id ?>" title="Delete"  class="btn btn-xs red delete_quotation"><i class="icon-trash"></i></a>
                                                 
                                                    
                                                     <a class="btn btn-xs green" ><i  receipt_no="<?= $quotation_details[$i]->receipt_no ?>" child_name="<?= $quotation_details[$i]->child_name ?>" quotation_id="<?= $quotation_details[$i]->quotation_id ?>" title="Click Here To Accept"   class="fa fa-check-circle quotation_accept" style="color: red" aria-hidden="true"></i></a>
                                                     <?php } ?>
                                                     <a class="btn btn-xs yellow" target="_blank" href="<?= base_url().'Home/view_pdf_quotation/'.$quotation_details[$i]->quotation_id?>" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> 
                                                
                                               
                                               
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


