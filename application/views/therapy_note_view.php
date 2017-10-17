<?php
//$loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_notes);
// exit;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
          <div class="col-md-12"> 
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
    			<div class="col-lg-12 col-xs-12 col-sm-12">
                	<div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                        		<i class="icon-microphone font-dark hide"></i>
                        		<span class="caption-subject bold font-dark uppercase font-green">Therapy Note</span>
                        	</div>
                        	<div class="sescunt pull-right"></div>							
                        </div>
    					  <div class="portlet-body">
    						<div class="row">
    						  <div class="col-md-12">
                                <div class="portlet-body row">
                                    <div class="">
                                        <div class="form-body row">
                                            <div class="col-md-12">
                                            <p><?=$view_notes[0]->tnote?></p>
                                            <p>Writen By :  <?=$view_notes[0]->employee_name?></p>
                                            <p>Date :  <?=$view_notes[0]->cdate?></p>
                                        <?php if($view_notes[0]->pdf != '') { ?>
                                            <p>Attachment :  <a href="<?=base_url()?>files/images/<?=$view_notes[0]->pdf?>" target="_blank">Therapy Note Pdf</a>
                                            </p>
                                            <?php } ?>
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
</div>