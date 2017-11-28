
<?php
$photo_rs = ['1' => 'Yes: Therapy only', '2' => 'Yes: Social Media', '3' => 'Maybe / prior permission required', '4' => 'No'];

$hear_About_us = ['1' => 'Referral from School / Nursery', '2' => 'Referral from another Mum / Friend',
    '3' => 'Referral from another Co./Others', '4' => 'Brochure / Flyer', '5' => 'Roll-up Banner / IBG',
    '6' => 'Direct Email', '7' => 'Newsletter', '8' => 'Internet / Social Media', '9' => 'Others'];

$social_media = ['1' => 'Company Website', '2' => 'Google Search', '3' => 'Facebook', '4' => 'LinkedIn',
    '5' => 'Twitter', '6' => 'Instagram', '7' => 'Afterschool.ae', '8' => 'YouTube / Video', '9' => 'Others'];

$categories = ['1' => 'Active Client', '2' => 'Waitlisted Client', '3' => 'Inquiry only / Potential Sales Lead', '4' => 'Inactive / Discharged Client', '5' => 'Others'];

$active_client = ['1' => 'Parent Consultation (PC)', '2' => 'Child Screener', '3' => 'Child Assessment', '4' => 'Therapy Report', '5' => 'Speech Language Therapy (SLT)',
    '6' => 'Occupational Therapy (OT)', '7' => 'Early Learning & Intervention Program (EILP)', '8' => 'Camps', '9' => 'Group Classes:',
    '10' => 'Workshops & Training', '11' => 'Sale of item/book', '12' => 'Others'];
$child_date = '';
$parent_date = '';
$photorelease = '';
$hear_about = '';
$social = '';
$category = '';
$active = '';
?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase">Marketing Details</span>
                        </div>
                    </div>
                    <form method="post" action="<?= base_url() . 'Home/view_marketing' ?>">  
                        <div id="tharapy_report_div">

                            <div class="panel-group accordion" id="accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="advance_filter accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1" aria-expanded="false">Advance Filter </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>From date</label>
                                                    <input value="<?= $form_data != '' ? $form_data['from_date'] : '' ?>" name="from_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>To date</label>
                                                    <input value="<?= $form_data != '' ? $form_data['to_date'] : '' ?>" name="to_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input value="<?= $form_data != '' ? $form_data['designation'] : '' ?>" name="designation" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <?php $nationality_id = $form_data != '' ? $form_data['country'] : '' ?>
                                                    <?php get_nationality_dropdow($id = '', $name = 'country', $class = '', $redirurl = '', $nationality_id, $attr = '') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <?php $selected = 'selected="selected"'; ?>
                                                <div class="form-group">
                                                    <label>Religion</label>
                                                    <select name="religion" class="form-control">
                                                        <option value="">select</option>
                                                        <option <?= $form_data == '' ? '' : $form_data['religion'] == 'Christian' ? $selected : '' ?> value="Christian">Christian</option>
                                                        <option <?= $form_data == '' ? '' : $form_data['religion'] == 'Muslim' ? $selected : '' ?> value="Muslim">Muslim</option>
                                                        <option <?= $form_data == '' ? '' : $form_data['religion'] == 'Hindu' ? $selected : '' ?> value="Hindu">Hindu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>How did you hear about us?</label>
                                                    <?php
                                                    $nature_of_data = '';
                                                    $heare_about_us_sel = '';
                                                    if ($form_data != '') {
                                                        $heare_about_us_sel = $form_data['here_about_us'];
                                                        $nature_of_data = $form_data['nature_of_business'];
                                                    }
                                                    $hear_About_us = get_hear_about_us_marketing();
                                                    ?>
                                                    <select  class="form-control" name="here_about_us">
                                                        <option value="">select</option>
                                                        <?php
                                                        if (isset($hear_About_us)) {
                                                            foreach ($hear_About_us as $key => $hear_About) {
                                                                $select = '';
                                                                if ($heare_about_us_sel == $key) {
                                                                    $select = 'selected="selected"';
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $hear_About . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Nature of Data / Nature of Business</label>
                                                    <?php $categories = categories_for_marketing_module(); ?>
                                                    <select class="form-control" name="nature_of_business">
                                                        <option value="">select</option>
                                                        <?php
                                                        if (isset($categories)) {
                                                            foreach ($categories as $key => $category) {
                                                                $select = '';
                                                                if ($nature_of_data == $key) {
                                                                    $select = 'selected="selected"';
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $category . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input value="<?= $form_data != '' ? $form_data['city'] : '' ?>" name="city" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <br>
                                                    <label>&nbsp;</label>
                                                    <button type="submit" name="search"class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="portlet-body">


                        <table id="marketing_view" class="display table table-striped table-hover table-bordered dataTable no-footer" cellspacing="0" width="100%"  >
                            <thead>
                                <tr>
                                    <th>Entry Date</th>
                                    <th>Entry Date</th>
                                    <th>Parent Name</th>
                                    <th>Designation</th>
                                    <th>Company Name</th>
                                    <th>Tel: Mobile</th>
                                    <th>Tel:Mobile Business</th>
                                    <th>Email: Private</th>
                                    <th>Email: Business</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Countries</th>
                                    <th>Child Name</th>
                                    <th>Second Child Name</th>
                                    <th>Child DOB</th>
                                    <th>Religion</th>
                                    <th>News letter</th>
                                    <th>Photo Release</th>
                                    <th>Hear about us</th>
                                    <th>Specify Refferal School</th>
                                    <th>Internet Or Social Media</th>
                                    <th>Other Internet</th>
                                    <th>Categories for Nature of Business</th>
                                    <th>active_client</th>
                                    <th>Specify Active Client</th>
                                    <th>Specify Categories Nature</th>
                                    <th>Specify Therapy</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($marketing)) {
                                    foreach ($marketing as $value) {
                                        if (!empty($value->child_dob)) {
                                            $child_date = date("d-m-Y", strtotime($value->child_dob));
                                        }
                                        if (!empty($value->parent_dob)) {
                                            $parent_date = date("d-m-Y", strtotime($value->parent_dob));
                                        }
                                        if ($value->photo_release) {
                                            $photorelease = $photo_rs[$value->photo_release];
                                        }
                                        if ($value->hear_about_us) {
                                            $hear_about = $hear_About_us[$value->hear_about_us];
                                        }
                                        if ($value->about_us_internet_socialmedia) {
                                            $social = $social_media[$value->about_us_internet_socialmedia];
                                        }
                                        if ($value->categories_nature) {
                                            $category = $categories[$value->categories_nature];
                                        }
                                        if ($value->active_client) {
                                            $active = $active_client[$value->active_client];
                                        }
                                        echo '<tr>
                                                        <td>' . $value->entry_date . '</td>
                                                        <td>' . date("d-m-Y", strtotime($value->entry_date)) . '</td>
                                                        <td>' . $value->fname . '</td>
                                                        <td>' . $value->designation . '</td>
                                                        <td>' . $value->company_name . '</td>
                                                        <td>' . $value->tel_mobile . '</td>
                                                        <td>' . $value->tel_mobile_business . '</td>
                                                        <td>' . $value->email_private . '</td>
                                                        <td>' . $value->email_business . '</td>
                                                        <td>' . $value->address . '</td>
                                                        <td>' . $value->city . '</td>
                                                        <td>' . $value->country . '</td>
                                                        <td>' . $value->child_name . '</td>
                                                        <td>' . $value->child_name_sec . '</td>
                                                        <td>' . $child_date . '</td>
                                                        <td>' . $value->religion . '</td>
                                                        <td>' . $value->news_letter . '</td>
                                                        <td>' . $photorelease . '</td>
                                                        <td>' . $hear_about . '</td>
                                                        <td>' . $value->about_us_specify . '</td>
                                                        <td>' . $social . '</td>
                                                        <td>' . $value->internet_other . '</td>
                                                        <td>' . $category . '</td>
                                                        <td>' . $active . '</td>
                                                        <td>' . $value->active_client_specify . '</td>
                                                        <td>' . $value->categories_nature_specify . '</td>
                                                        <td>' . $value->therapy_specify . '</td>
                                                        <td  style="text-align: center;">
                                                            <a class="btn btn-xs green" href=' . base_url("Home/view_full_marketing/$value->id") . '><i class="fa fa-eye" aria-hidden="true" title="view"></i></a>
                                                            <a class ="btn btn-xs green" href=' . base_url("Home/edit_marketing/$value->id") . '><i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i> </a> 
                                                            <a class="btn btn-xs red delete_marketing"  marketing_id=' . $value->id . ' ><i class="icon-trash " title="delete"></i></a>
                                                           
                                                        </td>
                                                    </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>                     
                    </div>
                    <!--content Area  End-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<script>

</script>

