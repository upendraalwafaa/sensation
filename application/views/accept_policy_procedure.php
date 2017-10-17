<div></div>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Policy Procedure
            <small>Acceptance Page </small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="note note-info">
            <p>Please read the below policy procedure carefuly and accept </p>
            <br/>
            <br/>            
            <p><a href="<?=base_url()?>files/images/<?=(isset($policy) && $policy != '' ? $policy[0]->ppdf : '')?>" target="_blank">Policy Prodedure </a></p>
            <br/>
            <br/>
            <div class="md-checkbox">
                <input <?=(isset($policy_procedure[0]->accept) &&  $policy_procedure[0]->accept == 'Yes' ? 'checked="checked"' : '')?> type="checkbox" id="procedure_accept" name="procedure_accept" class="md-check" value="<?=(isset($policy_procedure[0]->accept) &&  $policy_procedure[0]->accept != '' ? $policy_procedure[0]->accept : '')?>">
                <label for="procedure_accept">
                <span class="inc">Yes</span>
                <span class="check"></span>
                <span class="box"></span></label>
                Accept Sensation Station policy procedure
            </div>  
            <br/>
            <div class="form-actions noborder form-group  form-md-line-input" style="padding-top: 0;">
                <button type="button" id="procedure_accept_save" class="btn green-stripe">Submit</button>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->