<div class="page-footer"> 
    <div class="page-footer-inner"> 
        <a style="color:white" target="_blank" href="https://www.alwafaagroup.com/"><?= date('Y') ?> &copy; Alwafaa Group</a>    </div>    
    <div class="scroll-to-top">  
        <i class="icon-arrow-up"></i> 
    </div>
</div>
<!-- END FOOTER -->
</div>
<div class="quick-nav-overlay"></div>
<?php
$current_method = $this->uri->segment(2);
$datatable_arr = ['view_category', 'view_disipline', 'view_subcategory', 'view_service', 'view_employee', 'view_policy_procedure', 'view_policy_accepted_list', 'reg_view','quotation_reports',
    'view_quotation', 'electronic_quotation_details', 'view_child_details', 'therapy_note_lists', 'view_marketing','view_outsidestudent','list_therapy_notes','create_receipt','registration_reports','create_reports','receipt_reports','capacity_reports'
];
?>
<script> var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/jquery-ui.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<?php if ($current_method == '') { ?>
    <script src="<?= base_url() ?>assets/amcharts/amcharts.js"></script>
    <script src="<?= base_url() ?>assets/amcharts/serial.js"></script>
    <script src="<?= base_url() ?>assets/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="<?= base_url() ?>assets/amcharts/themes/light.js"></script>
    <script src="<?= base_url() ?>js/chart.js" type="text/javascript"></script>
<?php } ?>
<?php if (in_array($current_method, $datatable_arr)) { ?>
    <script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
<?php } ?>
<script src="<?= base_url() ?>assets/lobibox-master/dist/js/lobibox.min.js"></script>
<script src="<?= base_url() ?>js/common.js" type="text/javascript"></script>
<script src="<?= base_url() ?>js/notification.js" type="text/javascript"></script>
<?php
if ($current_method == 'add_quotation' || $current_method == 'view_quotation' || $current_method == 'electronic_quotation_details') {
    ?><script src="<?= base_url() ?>js/quotation.js" type="text/javascript"></script><?php
}
if ($current_method == 'reg_add' || $current_method == 'reg_view' || $current_method == 'terms_condition_center' || $current_method == 'therapy_history' || $current_method == 'cancellation_form' || $current_method == 'view_consent_form') {
    ?><script src="<?= base_url() ?>js/clild_reg.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>js/form_validation.js" type="text/javascript"></script>
    <?php
}
if ($current_method == 'calendar_view') {
    ?><script src="<?= base_url() ?>js/sensation_calendar.js" type="text/javascript"></script><?php
}
if ($current_method == 'create_receipt' || $current_method == 'view_child_details') {
    ?><script src="<?= base_url() ?>js/receipt.js" type="text/javascript"></script><?php
}
if ($current_method == 'child_details' || $current_method == 'list_therapy_notes' || $current_method == 'accept_policy_procedure' || $current_method == 'view_single_session' || $current_method== 'therapy_note_lists') {
    ?><script src="<?= base_url() ?>js/therapist.js" type="text/javascript"></script><?php
    }
    if ($current_method == 'marketing' || $current_method == 'view_marketing' || $current_method == 'edit_marketing') {
        ?><script src="<?= base_url() ?>js/marketing.js" type="text/javascript"></script><?php
    }
    if ($current_method == 'reg_outsidestudent' || $current_method=='view_outsidestudent') {
        ?><script src="<?= base_url() ?>js/reg_outsidestudent.js" type="text/javascript"></script><?php
    }
           if ($current_method == 'add_campreports' || $current_method == 'view_camp_reports') {
        ?><script src="<?= base_url() ?>js/registred_camp_report.js" type="text/javascript"></script><?php
    }
     if ($current_method == 'create_reports' || $current_method=='receipt_reports') {
        ?><script src="<?= base_url() ?>js/report_js_file.js" type="text/javascript"></script><?php
    }
    ?>
</body>
<script>

    $(function () {
        var d = new Date().getFullYear() + 2;
        var date_pic_obg_dsb = {dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, minDate: +0, yearRange: '1950:' + d};
        var date_pic_obg = {dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '1950:' + d};
        $('body').on('click', '.datepicker_dsb', function () {
            $(this).datepicker(date_pic_obg_dsb).focus();
            $(this).removeClass('datepicker');
        });

        $('body').on('click', '.datepicker', function () {
            $(this).datepicker(date_pic_obg).focus();
            $(this).removeClass('datepicker');
        });
    });
</script>
<style> 
    .ui-datepicker-month,.ui-datepicker-year{    
        color: black;  
    }</style>
</html>