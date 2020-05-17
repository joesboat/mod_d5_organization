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
jimport('USPSaccess/dbUSPS');
//require_once(JPATH_LIBRARIES."/USPSaccess/dbUSPS.php");
jimport("usps/includes/routines");
jimport("usps/tableD5VHQAB");
jimport("usps/tableD5VHQAB");
jimport("usps/dbUSPSd5WebSites");
jimport("usps/dbUSPSSquadrons");
jimport("usps/tableAccess");
jimport("usps/dbUSPSjoomla");
?>

	<div id='Layer2'>
<?php 
	if ($dept == 21000){
		require(JModuleHelper::getLayoutPath('mod_d5_organization','showforcdr'));
	}
?>
	<p></p>
	<table width="600" border="0" cellspacing="0" cellpadding="1">
		<colgroup>
			<col id='depts_col_1'>
			<col id='depts_col_2'>
		</colgroup>
<?php 
	if ($dept == 21000){
?>
			<tr class='tbl'>
				<td class='tbl' colspan='2'>
					<div class='style16b' align='center'>
						DISTRICT 5 GENERAL COMMITTEES
					</div>
				</td>
			</tr>
<?php 
			displayCommitteeAndJobAssignments(20400,'tbl'	,$year);
?>		
			<tr class='tbl'>
				<td class='tbl' colspan='2'>
					<div class='style16b' align='center'>
						DISTRICT 5 STANDING COMMITTEES
					</div>
				</td>
			</tr>
<?php 	
			displayCommitteeAndJobAssignments(20300,'tbl',$year);
		}
		show_blank_rows(1);
		$officer = $mbr->get_mbr_record($excom['certificate']);
?>
		<tr class='tbl'>
			<td class='tbl' colspan='2'>
				<div class='style16b' align='center'>
					<?PHP echo $title; ?> 
				</div>
			</td>
		</tr>
<?php
	show_blank_rows(1);
	show_d5_hdr_row(strtoupper($excom['excom_position']),
			$GLOBALS['vhqab']->getMemberName($officer['certificate'],TRUE),
			"tbl");
	show_blank_rows(1);
	
	show_blank_rows(1);
	if ($asst_excom){
		//$asst_officer = $GLOBALS['exc']->get_excom_member_data($dept+1,$year);
		show_d5_hdr_row('DISTRICT 5 '. strtoupper($asst_excom['excom_position']),
					$GLOBALS['vhqab']->getMemberName($asst_excom['certificate'],TRUE),
					"tbl");
		show_blank_rows(1);
	}
	if 	($dept == 21000){
		$pos = $codes->get_record('jobcode',28070);	// 28070 Flag Leutenant
		$m = $GLOBALS['vhqab']->getJobAssignments(28070,$year);
		if (count($m) > 0)
		show_d5_hdr_row(
			strtoupper($pos['jdesc']),
			$GLOBALS['vhqab']->getMemberName($m[0]['certificate'],TRUE),
			'tbl');
		show_blank_rows(1);
		$pos = $codes->get_record('jobcode',21090);	// Chief Aide
		$m = $GLOBALS['vhqab']->getJobAssignments($pos['jobcode'],$year);
		if (count($m) > 0) show_d5_hdr_row(
			strtoupper($pos['jdesc']),
			$GLOBALS['vhqab']->getMemberName($m[0]['certificate'],TRUE),
			'tbl');
		show_blank_rows(1);
	}
	displayCommitteeAndJobAssignments($dept,'tbl',$year);
	displayCommitteeAndJobAssignments($dept+1,"tbl",$year);
?>
	</table>
	</div>
<?php 
	$cert = $officer['certificate'];
	$picture = "/php/get_mbr_pic.php?certificate=$cert&width=80";
?>
	<div id='dept_officer_pic'>
		<img src='<?php echo $picture;?>' 
				alt='photo' width='80' height='80'>
	</div>
<?php 
//*************************************************************
function displayCommittee($c,$class,$email,$year){
// $c is jobdesc array or committee code 
// if $email true display email links 
	$codes = $GLOBALS['vhqab']->getJobcodesObject();
	if (is_array($c))
		$ary = $c; 
	else{
		// $c parameter is a jobcode.  We must get committee record
		$ary = $codes->get_record('jobcode',$c);	
	}
	if ($ary['web_page'] != ''){
		$display_name = "<a href='".$ary['web_page']."'>";
		$display_name .= strtoupper(abreviate_job($ary['jdesc']));
		$display_name .= "</a>";
	} else {
		$display_name = strtoupper(abreviate_job($ary['jdesc']));
	}
	show_d5_hdr_row($display_name,'',$class);
	$j = $GLOBALS['jobs']->get_records('jobcode',$ary['jobcode']);
	if ($ary['committee']==2)
		foreach($j as $i => $pos){
			$m = $mbr->get_mbr_record($pos['certificate']);
			show_d5_dept_row('',$GLOBALS['vhqab']->getMemberName($m['certificate'],$email),$class);
		}
	else{
		// Show committee chairs
		$ms = $GLOBALS['vhqab']->getJobAssignments($ary['jobcode'],$year,'',TRUE);
		foreach ($ms as $m){
			if (substr($m['jobcode'],4,1)==0)	
				show_d5_dept_row('Chair',$GLOBALS['vhqab']->getMemberName($m['certificate'],$email),$class);
			else 
				show_d5_dept_row('Chair Emeritus',$GLOBALS['vhqab']->getMemberName($m['certificate'],$email),$class);
		}
		// Show committee assistant
		$ms = $GLOBALS['vhqab']->getJobAssignments($ary['jobcode']+1,$year);
		foreach ($ms as $m)
			show_d5_dept_row('Asst.',$GLOBALS['vhqab']->getMemberName($m['certificate'],$email),$class);
		// Show members 
		$ms = $GLOBALS['vhqab']->getJobAssignments($ary['jobcode']+2,$year);
		foreach ($ms as $m){
			show_d5_dept_row('',$GLOBALS['vhqab']->getMemberName($m['certificate'],$email),$class);
		}
		// Show Named Jobs
		$named=$GLOBALS['vhqab']->get_named_job_assignments($ary['jobcode'],$email,$year);
		foreach($named as $n){
			show_d5_dept_row($n[0],$n[1],$class);
		}
	}
}
//*************************************************************
function displayCommitteeAndJobAssignments($dept,$class,$year){
	$s ="department = '$dept'"; 
	$cmtes = $GLOBALS['codes']->search_records_in_order($s,'jdesc');
	foreach($cmtes as $c){
		switch($c['committee']){

		case 3:
			continue;
			break;
		case 0:
			if ($c['committee_code']!=0)
				continue;
			if ($c['skip'] == 1)
				continue;
			$GLOBALS['jobs']->display_named_job($c,$class,$year);
			//show_blank_rows(1);
			break;
		case 2:
			$pos = $GLOBALS['codes']->get_record('jobcode',$c['committee_code']);	// 21100 Cdr Aides
			show_d5_hdr_row(strtoupper($pos['jdesc']),"",$class);
			$m = $GLOBALS['vhqab']->getJobAssignments($pos['jobcode'],$year);
			
			$i=0;
			while ($i < count($m)){
				echo "<tr><td >";
				echo "<div align='left' class='tbl'>".$GLOBALS['vhqab']->getMemberName($m[$i]['certificate'],true)."</div>";
				echo "</td><td>";
				$i ++;
				if ($i < count($m))
					echo "<div align='left' class='tbl'>".$GLOBALS['vhqab']->getMemberName($m[$i]['certificate'],true)."</div>";
				echo "</td></tr>";
				$i ++;
			}			
			
			
			//show_blank_rows(1);
			break;
		default:
			displayCommittee($c,$class,true,$year);
			//show_blank_rows(1);
		}
	}
}
