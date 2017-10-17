<?php 

    if(!empty($status))
    {
        
        if($status=='add_new_input_text')
        {
            echo    '<div class="form-group form-md-line-input has-success">
                        <div class="input-icon">
                        <label>'.$label.'</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="'.$text_id.'" id="'.$text_id.'">
                            <span class="input-group-btn remove_additional_field" data-id="'.$div_id.'">
                                <button class="btn green" type="button">
                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                </button>
                            </span>
                        </div>
                        </div>
                    </div>';
        }
        
        if($status=='referral')
        {
            echo    '<div class="form-group form-md-line-input has-success">
                            <div class="input-icon">
                                <label>'.$label.'</label>
                                <input value="" type="text" id="'.$text_id.'" class="form-control" name ="'.$text_id.'">
                            </div>
                        </div> ';
        }
    }

?>