
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <!--content Area  statrt-->
                
                
                
                <div class="portlet light portlet-fit bordered">
                       
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <input type="hidden" id="category_id" value="">
                                <span class="caption-subject bold font-dark uppercase font-green">Electronic Link Details</span>
                            </div>
                            	<div class="qtarea">
                            <a href="<?= base_url().'Home/add_quotation/add_electronic'; ?>">Add Electronic</a>
                             </div>
                       </div>
                
                
                    <div class="portlet-body">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table array_index="0,1,2,3,4,5,6,7" class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th >Guardians Name</th>
                                             <th>Child Name</th>
                                            <th> Email</th>
                                            <th> Phone</th>
                                            <th>Status</th>
                                            <th>Quotation Amount </th>
                                            <th>Approved Date </th>
                                            <th> Edit/Delete </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($results)) {
                                            for ($i = 0; $i < count($results); $i++) {
                                                $d = $results[$i];
                                                ?>
                                                <tr>
                                                    <td><?= $i + 1; ?></td>
                                                     <?php
                                                     $guardians='';
                                                    if($d->father_name!=''){
                                                       $guardians=$d->father_name; 
                                                    }else if($d->mother_name !=''){
                                                         $guardians=$d->mother_name; 
                                                    }else{
                                                         $guardians=$d->guardians_name;  
                                                    }
                                                    ?>
                                                    <td><?= $guardians ?></td>
                                                     <td><?= $d->child_name ?></td>
                                                    <td><?= $d->father_email ?></td>
                                                    <td><?= $d->father_phone ?></td>
                                                    <td><?php
                                                        $status = '';
                                                        $edit_link = '';
                                                        $edit_link = $edit_link . '<a electronic_id="' . $d->id . '" title="Edit" child_name="' . $d->father_name . '" receopt_no="' . $d->receipt_no . '" quotation_id="' . $d->quotation_id . '" class="btn btn-xs green edit_quotation" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                                        $edit_link = $edit_link . '<a electronic_id="' . $d->id . '" receipt_no="' . $d->receipt_no . '" child_name="' . $d->father_name . '" quotation_id="' . $d->quotation_id . '" title="Delete" class="btn btn-xs red delete_quotation"><i class="icon-trash"></i></a> ';
                                                        
                                                        $edit_link1 = (isset($d->enrolment_status) && $d->enrolment_status == 1  ? '<a class="btn btn-xs green"><i class="fa fa-check-circle-o"></i></a>' : '');                                   
                                                        
                                                        if ($d->status == 0) {
                                                            $edit_link = '
                                                            <a class="btn btn-xs red" href="'.base_url().'Home/reg_add/'.$d->student_id.'" title="View Form" class="view_form">
                                                            <i class="fa fa-file-text"></i></a>&nbsp;&nbsp;'.$edit_link1;
                                                            $status = 'Approved';
                                                        } else if ($d->status == 1) {
                                                            $status = 'Inactive';
                                                        } else {
                                                            $status = 'Deactive';
                                                        }
                                                        echo $status;
                                                        ?></td>
                                                    <td><?= $d->total ?></td>
                                                    <td> <?php if ($d->status == 0) {
                                                           echo date('d/m/Y H:i:s', strtotime($d->approved_date));
                                                        } ?></td>
                                                    <td><?= $edit_link ?></td>
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

