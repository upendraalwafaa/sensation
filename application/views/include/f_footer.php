<div class="page-footer"> 
<div class="page-footer-inner"> 
<?= date('Y') ?> &copy; Alwafaa Group    </div>    
<div class="scroll-to-top">  
<i class="icon-arrow-up"></i> 
</div>
</div>
<!-- END FOOTER -->
</div>
<div class="quick-nav-overlay"></div>

<script> var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
   <script src="<?= base_url() ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/jquery-ui.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/lobibox-master/dist/js/lobibox.min.js"></script>
<script src="<?= base_url() ?>js/common.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/quotation.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/therapist.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/receipt.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/sensation_calendar.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/clild_reg.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/form_validation.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/marketing.js" type="text/javascript"></script>

</body>
<script> 
$(function () {  
    var d = new Date().getFullYear() + 1;   
                $('body').on('click', '.datepicker', function () {    
                $(this).datepicker({       
                dateFormat: 'yy-mm-dd',     
                changeMonth: true,       
                changeYear: true,        
                yearRange: '1950:"' + d + '"'     
                }).focus();      
                $(this).removeClass('datepicker');   
                });  
                });  
 </script>
<style> 
.ui-datepicker-month,.ui-datepicker-year{    
color: black;  
}</style>
</html>