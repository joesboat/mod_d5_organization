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
require_once(JPATH_LIBRARIES."/usps/tableD5VHQAB.php");
require_once(JPATH_LIBRARIES."/usps/dbUSPSd5WebSites.php");
require_once(JPATH_LIBRARIES."/usps/tableAccess.php");
require_once(JPATH_LIBRARIES."/usps/dbUSPSjoomla.php");
require_once(dirname(__FILE__).'/helper.php');

$debug = $params->get('siteDump');
$loging = $params->get('siteLog');
$vhqab = JoeFactory::getLibrary("USPSd5tableVHQAB");
$WebSites = JoeFactory::getLibrary("USPSd5dbWebSites");
$path=explode("/",$_SERVER['PHP_SELF']);
$me = $path[count($path)-1];
$mbr = $vhqab->getD5MembersObject();
$exc = $vhqab->getExcomObject();
$jobs = $vhqab->getJobsObject();
$codes = $vhqab->getJobcodesObject();
$sqds = $vhqab->getSquadronObject(); 
$mod_folder = explode('.',basename(__FILE__))[0];
$blob = $WebSites->getBlobsObject();
	$x = $_GET;
	//write_log_array($_GET,"The _GET Array Is");
	//write_log_array($_POST,"The _POST Array Is");
	$year = modD5_OrganizationHelper::get_display_year();
	if (isset($_GET['dept'])){
		$dept = $_GET['dept'];	
	} else {
		$dept = $params->get('deptcode');
	}
	$dept_jobs = $vhqab->getCommitteesAndJobAssignments($dept, $year, true );
	$cert = $dept_jobs[$dept]['certificate'];
	$pic_url = get_absolute_url(JURI::base()."modules/$mod_folder/assets/get_mbr_pic.php?certificate=$cert&width=80");  
	$pic_avail = $blob->get_mbr_picture($cert,80);
	if ($dept == 21000){
		$commander = $vhqab->getExcomMemberName(21000, $year, true );	
		$educational_officer = $vhqab->getExcomMemberName(23000, $year, true );
		$members_emeritus = $vhqab->getJobAssignmentNames('10002', $year, true );
		$general_members = $vhqab->getJobAssignmentNames('10001', $year, true );
		$alternate_general_members = $vhqab->getJobAssignmentNames('10009', $year, true  );
		$BOD_members = $vhqab->getUSPSJobAssignmentData(10007, $year, true );
		$RC_members = $vhqab->getUSPSJobAssignmentData(10004, $year, true );
		$SC_members = $vhqab->getUSPSJobAssignmentData(10005, $year, true );
		$hes = $vhqab->getJobAssignmentNames(28020, $year , true );
		$hes_mbr = $vhqab->getJobAssignmentNames(28022, $year , true );
		$hes = array_merge($hes,$hes_mbr);
		$cdrs_url = get_absolute_url(JURI::base()."modules/$mod_folder/assets/cdr_list.php");
		$general = $vhqab->getCommitteesAndJobAssignments(20400,$year,TRUE);
		$standing = $vhqab->getCommitteesAndJobAssignments(20300,$year,TRUE);
	}
	//$excom = $exc->search_for_record("jobcode='$dept' and year='$year'");
	//$asst_excom = $exc->search_for_record("jobcode='". ($dept+1) ."' and year='$year'");
	//$title = "DISTRICT 5 ".$excom['excom_position']; 

	require(JModuleHelper::getLayoutPath('mod_d5_organization','dept_jobs'));


