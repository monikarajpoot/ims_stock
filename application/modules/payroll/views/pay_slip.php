<?php //pre($payslip);?>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>

<table border="1" cellpadding="0" cellspacing="0" bordercolor="#666">
<?php foreach ($payslip as $key => $pay) {
  //pre($pay_bill);
	# code...?>

  <tr height="27">
    <td colspan="20" height="27"><div align="center"><strong>Govt of M.P Law and Legislative Affairs Department, Vindhyachal Bhawan, Bhopal</strong><br />
    </div></td>
  </tr>
  <tr height="28">
    <td colspan="20" height="28"><div align="center"><strong>Salary Slip for the  month of <?php echo $pay->pay_month .",". $pay->pay_year  ;?> </strong></div></td>
  </tr>
    <tr height="60" style="
    font-size: 18px;
    font-weight: bold;
    text-align: center;
"> <td width="405" height="60">Name of employee :<?php echo $pay->emp_full_name?> </td>
    <td width="266" height="60">Post of employee :<?php echo getemployeeRole($pay->designation_id);?> </td>
    <td width="508" colspan="5">Unique code of employee :<?php echo $_POST['uid'];?> </td>
  </tr>
    <tr align="center" style="font-size: 14px;" height="60">
      <td height="60" colspan="20"><table width="100%" height="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
        <tr>
          <td width="11%"><strong>Gross Amount</strong></td>
          <td width="10%"><strong>Net Amount</strong></td>
          <td width="13%"><strong>Computer Bill</strong></td>
          <td width="8%"><strong>Office Bill</strong></td>
          <td width="8%"><strong>Voucher No</strong></td>
          <td width="7%"><strong>Voucher  Date</strong></td>
          <td width="10%"><strong>PAN Number</strong></td>
          <td width="12%"><strong>SGS / DPF Number</strong></td>
          <td width="11%"><strong>Aadhaar card Number</strong></td>
          <td width="10%"><strong>Govt Quarter Number</strong></td>
        </tr>
        <tr>
          <td><?php echo  @$pay_bill[0]->pbill_gross_amount  ; ?></td>
          <td><?php echo  @$pay_bill[0]->pbill_net_amont  ; ?></td>
          <td><?php echo @$pay_bill[0]->pbill_computer_no; ?></td>
          <td><?php echo @$pay_bill[0]->pbill_office_no; ?></td>
          <td><?php echo @$pay_bill[0]->pbill_vocher_no; ?></td>
          <td><?php echo @$pay_bill[0]->pbill_vocher_date;?></td>
          <td><?php echo $pay->emp_pen_no?></td>
          <td><?php echo $pay->emp_gpf_dpf_code?></td>
          <td><?php echo $pay->emp_adhar_card_no?></td>
          <td><?php echo $pay->emp_house_no?></td>
        </tr>
      </table></td>
    </tr>
    <tr height="30">
      <td colspan="20" align="center"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666">
        <tr>
          <td colspan="10" align="center"><span class="style1">Details of pay</span></td>
          <td colspan="17" align="center"><span class="style1">Deduction Amount</span></td>
        </tr>
        <tr>
          <td align="center"><?php echo $this->lang->line('basic_pay'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_gradepay'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_special'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_da'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_others')  ?></td>
          <td align="center"><?php echo $this->lang->line('pay_sa')  ?></td>
          <td align="center"><?php echo $this->lang->line('pay_ma'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_sp')  ?></td>
          <td align="center"><?php echo $this->lang->line('pay_ca')  ?></td>
          <td align="center"><?php echo $this->lang->line('pay_sum'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_gpf'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_gpf_adv'); ?></td>
          <td width="6%" align="center"><?php echo $this->lang->line('pay_dpf')  ?></td>
          <td width="6%" align="center"><?php echo $this->lang->line('pay_dpf_adv')  ?></td>
          <td width="6%" align="center"><?php echo $this->lang->line('pay_gis'); ?></td>
          <td width="2%" align="center"><?php echo $this->lang->line('pay_define'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_home_loan'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_house_rent'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_car_loan'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_fule_charge'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_grain_adv'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_festival_adv'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_professional_tax')  ?></td>
          <td align="center"><?php echo $this->lang->line('pay_income_tax'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_other_adv'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_total_cut'); ?></td>
          <td align="center"><?php echo $this->lang->line('pay_amount'); ?></td>
        </tr>
        <tr>
          <td width="2%" align="center"><?php echo $pay->pay_basic;  ?></td>
          <td width="3%" align="center"><?php echo  $pay->pay_grp;  ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_special;   ?></td>
          <td width="5%" align="center"><?php  echo  $pay->pay_da;  ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_others ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_sa;  ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_madical; ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_sp; ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_ca ?></td>
          <td width="4%" align="center"><?php echo $pay->pay_total_sum; ?></td>
          <td width="7%" align="center"><?php echo $pay->pay_gpf; ?></td>
          <td width="2%" align="center"><?php echo  $pay->pay_gpf_adv; ?></td>
          <td width="6%" align="center"><?php echo   $pay->pay_dpf ?></td>
          <td width="6%" align="center"><?php echo   $pay->pay_dpf_adv ?></td>
          <td width="6%" align="center"><?php echo   $pay->pay_gias ?></td>
          <td width="2%" align="center"><?php echo $pay->pay_defined_contribution ?></td>
          <td width="3%" align="center"><?php echo $pay->pay_house_loan ?></td>
          <td width="1%" align="center"><?php echo $pay->pay_house_rent ?></td>
          <td width="1%" align="center"><?php echo $pay->pay_car_loan ?></td>
          <td width="0%" align="center"><?php echo $pay->pay_fuel_charge; ?></td>
          <td width="2%" align="center"><?php echo $pay->pay_grain_adv ?></td>
          <td width="2%" align="center"><?php echo $pay->pay_festival_adv; ?></td>
          <td width="3%" align="center"><?php echo $pay->pay_professional_tax; ?></td>
          <td width="2%" align="center"><?php echo $pay->pay_income_tax ?></td>
          <td width="3%" align="center"><?php echo $pay->pay_other_adv ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_total_cut; ?></td>
          <td width="5%" align="center"><?php echo $pay->pay_total; ?></td>
        </tr>
      </table>        </td>
    </tr>
  
	<?php }?> 
</table>
  <input  type="button" onclick="window.print();" style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" name="Submit" class="no-print"  value="print" /> <input style="background-color: #052B02;border: solid 1px #36730F;margin: 10px auto;
    color: #ffffff;
    padding: 10px;" class="no-print"  type="button" onclick="window.history.back();" name="Submit" value="Go Back" >

  <style type="text/css" media="print">
  
  @page { size: landscape; }

  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}

</style>