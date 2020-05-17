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

class modD5_OrganizationHelper
{
//**************************************************************************
static function get_display_year($dbSource='local'){
	require(JPATH_LIBRARIES."/USPSaccess/dbUSPS.php");
	$vhqab = JoeFactory::getLibrary("USPSd5tableVHQAB");
	$year = $vhqab->getSquadronDisplayYear('6243');
	//$blob->close();
	return $year;
}
}
//*********************************************************
function show_d5_dept_row($fun,$name,$class){
	echo "<tr>";
	if ($name == ""){
	    echo "<td class='$class' colspan='2'>$fun</td>";
	} else {
	    echo "<td class='$class'>$fun</td>";
	    echo "<td class='$class'>$name</td>";
	}
    echo "</tr>";
}
