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

	echo "<div id='Layer2'>";
	if ($dept == 21000){
		$jobs->display_governing_board_rows($year);
		$jobs->display_national_jobs($year);
		$jobs->display_d5_trusts($year);
	}
		echo "<p></p>";
		echo '<table width="600" border="0" cellspacing="0" cellpadding="1">';
		echo "<colgroup><col id='depts_col_1'><col id='depts_col_2'></colgroup>";
	if ($dept == 21000){
		echo "<tr class='table'><td class='table' colspan='2'><div class='style16b' align='center'>DISTRICT 5 GENERAL COMMITTEES</div></td></tr>";	
		$jobs->display_committee_and_job_assignments(20400,'table',$year);
		echo "<tr class='table'><td class='table' colspan='2'><div class='style16b' align='center'>DISTRICT 5 STANDING COMMITTEES</div></td></tr>";	
		$jobs->display_committee_and_job_assignments(20300,'table',$year);
	}
	show_blank_rows(1);
	$officer = $mbr->get_mbr_record($excom['certificate']);
	echo "<tr class='table'><td class='table' colspan='2'><div class='style16b' align='center'> $title </div></td></tr>";
	show_blank_rows(1);
	show_d5_hdr_row(strtoupper($excom['excom_position']),
			$exc->get_d5_member_name(true,$officer),
			"table");
	show_blank_rows(1);
	
	show_blank_rows(1);
	if ($asst_excom){
		$asst_officer = $exc->get_excom_member_data($dept+1,$year);
		show_d5_hdr_row('DISTRICT 5 '. strtoupper($asst_excom['excom_position']),
					$exc->get_d5_member_name(true,$asst_officer),
					"table");
		show_blank_rows(1);
	}
	if 	($dept == 21000){
		$pos = $codes->get_record('jobcode',28070);	// 28070 Flag Leutenant
		$m = $jobs->get_job_assignments($pos['jobcode'],$year);
		show_d5_hdr_row(
			strtoupper($pos['jdesc']),
			$exc->get_d5_member_name(true,$m[0]),
			'table');
		show_blank_rows(1);
		$pos = $codes->get_record('jobcode',21090);	// Chief Aide
		$m = $jobs->get_job_assignments($pos['jobcode'],$year);
		show_d5_hdr_row(
			strtoupper($pos['jdesc']),
			$exc->get_d5_member_name(true,$m[0]),
			'table');
		show_blank_rows(1);
	}
	$jobs->display_committee_and_job_assignments($dept,'table',$year);
	$jobs->display_committee_and_job_assignments($dept+1,"table",$year);
	echo "</table>";
	echo "</div>";
	$cert = $officer['certificate'];
	echo "<div id='dept_officer_pic'><img src='php/get_mbr_pic.php?certificate=$cert&width=80' alt='photo' width='80' height='80'></div>";
?>
</body>
</html>

