    <?php
$qdel = $quotation_details[0];
if ($child_arr != '') {
$chld = $child_arr[0];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sensation-sation</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style>
    .paiddiv_class{
        position:absolute;
        width:  200px;
        height:  200px;
        left: 0;
        right: 0;
        margin: 0 auto;
        color: #fff;
        bottom: 40%;
    }
    .image_classes{
        position:absolute;
        width: 200px;
        height:  200px;
    }
</style>
</head>

<body style="font-family:Arial;">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td>

</td>
<td style="text-align:right">

</td>
</tr>
</table>
<table  width="100%" style="  margin-top:10px;font-size:13px;">
<tr>
<td style="text-align:center">
<img src="http://dev.granddubai.com/sensation//files/images/logo-big.png" style="margin-top:10px;"> 
<br />
<span style="font-family:Arial, Helvetica, sans-serif; font-size:20px; text-align:center; padding:15px 0px 0px; margin:0 auto;"><strong><?= $payment_his == '' ? 'QUOTATION' : 'RECEIPT'; ?></strong></span></td>
</tr>
</table>
<table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px">
<tr>
<td width="40%" rowspan="9" align="left" valign="top" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000"> Sensation Station<br>
  Ibn Batutta Gate, Office Building<br>
  Ground Floor, No. G-03 and G-05<br>
  PO Box 29264<br>
  Dubai, UAE<br>
  T: +9714 – 2776769<br>
  <a href="mailto:info@sensationstation.ae" style="color:#000; text-decoration:none;" >info@sensationstation.ae</a> <br>
  <a href="http://www.sensationstation.ae" style="color:#000; text-decoration:none;" >www.sensationstation.ae</a></td>
<td width="30%" align="left" valign="top" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?= $payment_his == '' ? 'Quotation No :' : 'Receipt No :'; ?> </td>
<td width="30%" align="left" valign="top" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;"><?= $qdel->receipt_no ?> </td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?= $payment_his == '' ? 'Quotation' : 'Receipt'; ?> Date: 	</td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?= date('d/m/Y', strtotime($qdel->date_time)) ?> </td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Child Name: </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?php
    if ($electronic_link_arr == '') {
        echo $chld->child_name;
    } else {
            echo $electronic_link_arr[0]->child_name; 
    }
    ?></td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Parent Name: </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?php
    if ($electronic_link_arr == '') {
        echo $chld->father_name;
    } else {
        if($electronic_link_arr[0]->father_name!=''){
        echo $electronic_link_arr[0]->father_name;
        }else if($electronic_link_arr[0]->mother_name!=''){
            echo $electronic_link_arr[0]->mother_name;
        }else{
            echo $electronic_link_arr[0]->guardians_name; 
        }
    }
    ?></td>
</tr>
<!--<tr>-->
<!--  <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Client Name: </td>-->
<!--  <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">Zaina Diria </td>-->
<!--</tr>-->
<!--<tr>-->
<!--  <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Staff Name: </td>-->
<!--  <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">Leah Bourke </td>-->
<!--</tr>-->
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Phone: </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?php
                                                                    if ($electronic_link_arr == '') {
                                                                        echo $chld->father_mobile;
                                                                    } else {
                                                                        echo $electronic_link_arr[0]->father_phone;
                                                                    }
                                                                    ?> </td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Therapist Name: </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?= $qdel->therapy_name ?></td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Email: </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><a href="mailto:naomi.diria@jumeirah.com" style="color:#000; text-decoration:none;" ><?php
                                                                        if ($electronic_link_arr == '') {
                                                                            echo $chld->father_personal_email;
                                                                        } else {
                                                                            echo $electronic_link_arr[0]->father_email;
                                                                        }
                                                                        ?></a></td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Genrated By : </td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?= $qdel->genrated_by; ?></td>
</tr>
</table>


<table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px">
<tr>
<th width="40%"   align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000">Description of Service</th>
<th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"> No of Sessions</th>
<th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;">Cost per <br />
Session in AED </th>
<th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;"> Sub-Total / <br />
Amount in AED </th>
</tr>


<?php
$grand = 0;
for ($m = 0; $m < count($all_details); $m++) {
    $tmp_d = $all_details[$m]['descipline_details'];
    $q_d_d = $all_details[$m]['quotation_descipline_details'];
    $category_id = $q_d_d->category_id;
    if ($category_id == '4' || $category_id == '5' || $category_id == '6' || $category_id == '7' || $category_id == '8' || $category_id == '9' || $category_id == '10') {
        ?> <tr>
<td   align="left" valign="top" style="border-left:1px solid #000;border-bottom:1px solid #000"><?= $q_d_d->category_name ?></td>
<td align="right" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"><?= $q_d_d->total_price ?></td>
</tr><?php
    }else {
        for ($d = 0; $d < count($tmp_d); $d++) {
            $td = $tmp_d[$d];
            $total = $td->services_fee * $td->total_session;
            $grand = $grand + $total;
            ?>
             <tr>
<td   align="left" valign="top" style="border-left:1px solid #000;border-bottom:1px solid #000"><?= $td->description ?> </td>
<td align="right" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?= $td->total_session ?></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"><?= $td->services_fee ?></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"><?= $total ?></td>
</tr>
            <?php
        }
    }
}
        ?>










<tr>
<td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
<td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
<td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
</tr>

<tr>
<td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
<td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
<td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
<td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td rowspan="4"   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">Note:   <?= $payment_his == '' ? $qdel->note : $payment_his[0]->notes; ?> </td>
<td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong>Sub-Total in AED</strong></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"><?= $qdel->sub_total ?></td>
</tr>
<tr>
<td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong> &nbsp;<?php if ($qdel->discount != 0) { ?> Discount in AED<?php } ?></strong></td>
<td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;<?php if ($qdel->discount != 0) { ?>  <?= $qdel->discount ?><?php } ?></td>
</tr>
<tr>
<td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong>TOTAL</strong></td>
<td align="right" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><strong><?= $qdel->total ?></strong></td>
</tr>
<?php
 if ($payment_his != '') {
     ?>
<tr>
<td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong>Paid Amount</strong></td>
<td align="right" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><strong><?= isset($payment_his[0]->pay_amount) ? $payment_his[0]->pay_amount : '' ?></strong></td>
</tr>
<?php } ?>
</table>


<table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px; padding:3px">
<tr>
<th align="left" valign="middle" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-right:1px solid #000; border-top:1px solid #000;" >Schedule </th>
</tr>
<tr>
<td align="left" valign="middle" style="border:1px solid #000;" >
<?php
for ($sh = 0; $sh < count($sheduling); $sh++) {
    $category_id = $sheduling[$sh]->category_id;
    $d=$sheduling[$sh];
    if ($category_id == '4' || $category_id == '5' || $category_id == '6' || $category_id == '7' || $category_id == '8' || $category_id == '9' || $category_id == '10') {
        continue;
    }
        $start_end_time=date('H:i',strtotime($d->start_time)).' - '.date('H:i',strtotime($d->end_time));
    echo date('d M', strtotime($d->session_date)) . '&nbsp; '.$start_end_time.' ,&nbsp;&nbsp;  ';
}
?>
    
   </td>
</tr>
</table>

<?php
if ($payment_his != '') {
?>
<table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px; padding:3px">
<tr>
<th align="center" valign="middle" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-right:1px solid #000; border-top:1px solid #000;" ><strong style="color:#F00;" >CANCELLATION POLICY:</strong></th>
</tr>
<tr>
<td style=" border:1px solid #000; " align="left" valign="middle" bgcolor="#f2f2f2"> <ul>
    <li>More than 24 hours prior notice    no charge</li>
    <li>Less than 24 hours prior notice    50%</li>
    <li>No Show 100%</li>
  </ul></td>
</tr>
</table>
<?php }else { ?>
<br /> 
<table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px; padding:3px">
<tr>
<th colspan="4" align="center" valign="middle" bgcolor="#f2f2f2"
 style="
 border-top:1px solid #000;
 border-right:1px solid #000;
 border-bottom:1px solid #000;
 border-left:1px solid #000;" >Payment Options</th>
</tr>
<tr>
<td width="15%" align="left" valign="top" bgcolor="#f2f2f2" style="
border-left:1px solid #000;

border-bottom:1px solid #000; 
 " >Cash</td>
<td colspan="2" align="left" valign="top" style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Payable to the  Reception at Sensation Station</td>
<td width="25%" rowspan="8" align="left" valign="top" style="    border-left:1px solid #000;
border-right:1px solid #000; 
border-bottom:1px solid #000; ">

<strong style="color:#F00;" >CANCELLATION POLICY:</strong><br />
Prior notice must be given for cancellation. Please see below the charges:
<ul>
    <li>More than 24 hours prior notice    no charge</li>
    <li>Less than 24 hours prior notice    50%</li>
    <li>No Show 100%</li>
  </ul>
</td>

</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Cheque</td>
<td colspan="2" align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Issued in the name  of: <strong><em>Sensation Station Center</em></strong></td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Credit / Debit Card</td>
<td colspan="2" align="left" valign="top" style="    border-left:1px solid #000;

border-bottom:1px solid #000;">Payable to the  Reception at Sensation Station.</td>
</tr>
<tr>
<td rowspan="5" align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Bank Transfer</td>
<td width="10%" align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

border-bottom:1px solid #000;">A/C Name</td>
<td width="50%"   align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;"><strong><em>Sensation Station Center</em></strong></td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

border-bottom:1px solid #000;">A/C No.</td>
<td align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">00110552660012</td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">IBAN</td>
<td align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">AE970520000110552660012</td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">SWIFT</td>
<td align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">NISLAEAD</td>
</tr>
<tr>
<td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;" >Address</td>
<td align="left" valign="top"  style="    border-left:1px solid #000;

border-bottom:1px solid #000;">Noor Bank, Zayed Rd, Dubai, UAE</td>
</tr>
</table>
<?php }   if($payment_his!=''){ ?>

<div class="paiddiv_class">
<img class="image_classes" style=""  src="<?= base_url().'files/images/paid-icopn.png' ?>" />
</div>
<?php } ?>

<h3 style="font-size:16px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#000; padding:5px 0; font-style:italic; "> 
“One Child At A Time”</h3> 
