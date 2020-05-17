<?php
/**
* @package D5 Organization -
* @author Joseph P. Gibson
* @website www.joesboat.org
* @email joe@joesboat.org
* @copyright Copyright (C) 2018 Joseph P. Gibson. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE.txt
**/

// no direct access
defined('_JEXEC') or die('Restricted access');
// Governing Board 
$cdrs_url = get_absolute_url(JURI::base()."modules/$mod_folder/assets/cdr_list.php");
?>
</style>
	<table width='600' border='0' cellspacing='0' cellpadding='0'>
	<tr class='tbl'><td colspan='2'>
	<div align='center' class='style16b'>USPS GOVERNING BOARD MEMBERS </div>
	</td></tr>
<?php 
	show_blank_rows(1);
?>
	<tr class='tbl'>
		<td colspan='2'>
			<div align='center' class='style14b'>
				District Officers
			</div>
		</td>
	</tr>
<?php 
 	$member = $vhqab->getExcomMember('21000',$year);
?>
	<tr class='tbl'>
		<td colspan='2'>
			<div align='center'>
				<?php echo $vhqab->getMemberName($member['certificate'],true);?> 
			</div>
		</td>
	</tr>
<?php 
	$member = $vhqab->getExcomMember('23000',$year);
?>
 	<tr class='tbl'>
 		<td colspan='2'>
 			<div align='center'>
				<?php echo $vhqab->getMemberName($member['certificate'],true);?>
			</div>
		</td>
	</tr>
<?php
	show_blank_rows(1);
?>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				Squadron Officers
			</div>
		</td>
	</tr>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center'>
				{modal  
<?php
					echo $cdrs_url ;
?>
				}
					All Squadron Commanders
				{/modal} 		
			</div>
		</td>
	</tr>
<?php
	show_blank_rows(1);
?>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				Members Emeritus
			</div>
		</td>
	</tr>
<?php 
	$rows = $vhqab->getJobAssignments(10002,$year);
	$i=0;
	while ($i < count($rows)){
?>
		<tr>
			<td >
				<div align='center' class='tbl'>
					<?php echo $vhqab->getMemberName($rows[$i]['certificate'],TRUE);?>
				</div>
			</td>
			<td>
<?php 
				$i ++;
				if ($i < count($rows)){
?>
					<div align='center' class='tbl'>
						<?php echo $vhqab->getMemberName($rows[$i]['certificate'],TRUE); ?>
					</div>
<?php 
				}
?>
			</td>
		</tr>
<?php 
		$i ++;
	}
	show_blank_rows(1);
?>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				General Members
			</div>
		</td>
	</tr>
<?php 	
	$rows = $vhqab->getJobAssignments(10001,$year);
	$i=0;
	while ($i < count($rows)){
?>
		<tr>
			<td >
				<div align='center' class='tbl'>
					<?php echo $vhqab->getMemberName($rows[$i]['certificate'],TRUE);?>
				</div>
			</td>
			<td>
<?php 
			$i ++;
			if ($i < count($rows)){
?>
				<div align='center' class='tbl'>
					<?php echo $vhqab->getMemberName($rows[$i]['certificate'],TRUE);?>
				</div>
<?php 
			}
?>	
			</td>
		</tr>
<?php
		$i ++;
	}
	show_blank_rows(1);
	
?>
	</table>
	
<!--// display_national_jobs-->
	<table width='650' border='0' cellspacing='0' cellpadding='0'>
		<colgroup>
			<col style='width:200px;'>
			<col style='width:150px;'>
			<col style='width:300px;'>
	</colgroup>
	<tr class='tbl'>
		<td class='tbl'>&nbsp;</td>
		<td class='tbl'>&nbsp;</td>
		<td class='tbl'>&nbsp;</td>
	</tr>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style16b' align='center'>
				NATIONAL OFFICERS FROM DISTRICT 5
			</div>
		</td>
	</tr>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style14' align='center'>
				Rear Commanders
			</div>
		</td>
	</tr>
<?php
	$rows = $vhqab->getJobAssignments(10004,$year);
	foreach($rows as $row){
		display_national_job_assignment_row($row, $year);
	}
?>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style14' align='center'>
				Staff Commanders
			</div>
		</td>
	</tr>
<?php 
	$rows = $vhqab->getJobAssignments(10005,$year);
	foreach($rows as $row){
		display_national_job_assignment_row($row, $year);
	}
	show_blank_rows(1);
?>
	</table>
	
<!--//   display_d5_trusts-->
	<!--// Obtain mbr data for Henry E Sweet Trust 
	// Obtain mbr data for Seavester Trust 
	// Display two columns listing 
	//		HES Trust Members in left Colunm
	//		Seaverster Trust Members in Right Column-->
	<table width='650' border='0' cellspacing='0' cellpadding='0'>
	<colgroup>
		<col style='width:325px;'>
		<col style='width:325px;'>
	</colgroup>
	<tr>
		<td colspan='2'>
			<div class='style16b' align='center'>
				DISTRICT 5 TRUSTS
			</div>
		</td>
	</tr>
<?php	
	$hes = $vhqab->getJobAssignments(28020,$year);
	$hes_mbr = $vhqab->getJobAssignments(28022,$year);	
	$hes = array_merge($hes,$hes_mbr);
	$sea = $vhqab->getJobAssignments(28030,$year);
	$sea_mbr = $vhqab->getJobAssignments(28032,$year);
	$sea = array_merge($sea,$sea_mbr);	
?>
	<tr>
		<td class='tbl'>
			<div align='center'>
				<div class='style14b' align='center'>
					HENRY E. SWEET TRUST, TRUSTEES*
				</div>
			</div>
		</td>
	</tr>
<?php 
	display_two_sets_in_two_columns($hes,$sea);
	show_blank_rows(1);
?>
	<tr>
		<td colspan='4' class='tbl'>
			<div align='center'>
				*To make a contribution to these trusts, contact District 5 
				<a href='mailto:mcloud@yahoo.com'>Treasurer </a>
			</div>
		</td>
	</tr>
	<tr class='tbl'>
		<td colspan="2">&nbsp;
		</td>
	</tr>
	</table>
<?php 
//*************************************************************
function display_national_job_assignment_row($r, $year){
	$name = $GLOBALS['vhqab']->getMemberName($r['certificate'],TRUE); 
	$squadron = abreviate_sqd_name($GLOBALS['vhqab']->getSquadronName($r['squad_no']));
	$cert = $r['certificate']; 
	$query = "certificate='$cert' ";
	$query .= "and (jobcode like '1___0' or jobcode like '1___1') ";
	$query .= "and year='$year' ";
	$jbs = $GLOBALS['jobs']->search_records_in_order($query,"");
	foreach($jbs as $j){
		$jd = $GLOBALS['codes']->get_record('jobcode',$j['jobcode']); 
		$job = $jd['jdesc'];
		$job = str_replace('Chairman','Ch.',$job);
		$job = str_replace('Committee','',$job);
		$job = str_replace('Assistant','Asst.',$job);
?>
		<tr class='tbl'>
			<td class='tbl'>
				<?php echo $name;?>
			</td>
			<td class='tbl'>
				<?php echo $squadron;?>
			</td>
			<td class='tbl'>
				<?php echo $job; ?>
			</td>
		</tr>
<?php 
	}
}
//*********************************************************
function display_two_sets_in_two_columns($col1,$col2){
	$i=0;
	$limit=max(count($col1),count($col2));
	while ($i < $limit){
		echo "<tr><td class='tbl'>";
		if ($i < count($col1))
			echo "<div class='style14' align='center'>".$GLOBALS['vhqab']->getMemberName($col1[$i]['certificate'],true)."</div>";
		echo "</td><td>";
		if ($i < count($col2))
			echo "<div class='style14' align='center'>".$GLOBALS['vhqab']->getMemberName($col2[$i]['certificate'],true)."</div>";
		echo "</td></tr>";
		$i ++;
	}
}