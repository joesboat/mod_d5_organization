<?php
//defined('_JEXEC') or die('Restricted access');
include($_SERVER['CONTEXT_DOCUMENT_ROOT']."/applications/setupJoomlaAccess.php");
$WebSites = JoeFactory::getLibrary("USPSd5dbWebSites","local");
jimport('USPSaccess/dbUSPS');
jimport("usps/includes/routines");
	$path=explode("/",$_SERVER['PHP_SELF']);
	$me = $path[count($path)-1];
	$blob = $WebSites->getBlobsObject();
// 	Extracts picture from MySql database 
// 	Calling html passes member certificate value in request
//			?p_exec=E112233
	$cert = $_REQUEST['certificate'] ;
	if (isset($_REQUEST['width'])){
		$ary = $blob->get_mbr_picture($cert,$_REQUEST['width']);
	} else {
		$ary = $blob->get_mbr_picture($cert);
	}
	$picture = imagecreatefromstring($ary['image']);
	header("Content-Type:image/jpg") ;
	echo imagejpeg($picture) ;
?>