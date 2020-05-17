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
?>

	<table width='600' border='0' cellspacing='0' cellpadding='0'>
	<tr class='tbl'><td colspan='2'>
	<div align='center' class='style16b'>USPS GOVERNING BOARD MEMBERS </div>
	</td></tr>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
	<tr class='tbl'>
		<td colspan='2'>
			<div align='center' class='style14b'>
				District Officers
			</div>
		</td>
	</tr>
	<tr class='tbl'>
		<td colspan='2'>
			<div align='center'>
				<?php echo $commander;?> 
			</div>
		</td>
	</tr>
 	<tr class='tbl'>
 		<td colspan='2'>
 			<div align='center'>
				<?php echo $educational_officer;?>
			</div>
		</td>
	</tr>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				Squadron Commanders
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
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				Members Emeritus
			</div>
		</td>
	</tr>
<?php 
	$i=0;
	while ($i < count($members_emeritus)){
?>
		<tr>
			<td >
				<div align='center' class='tbl'>
					<?php echo $members_emeritus[$i];?>
				</div>
			</td>
			<td>
<?php 
				$i ++;
				if ($i < count($members_emeritus)){
?>
					<div align='center' class='tbl'>
						<?php echo $members_emeritus[$i]; ?>
					</div>
<?php 
				}
?>
			</td>
		</tr>
<?php 
		$i ++;
	}
?>
 	<tr class="table"><td colspan="2">&nbsp;</td></tr>
    <tr>
    	<td colspan='2' class='tbl'>
			<div align='center' class='style14b'>
				General Members
			</div>
		</td>
	</tr>
<?php 	
	$i=0;
	while ($i < count($general_members)){
?>
		<tr>
			<td >
				<div align='center' class='tbl'>
					<?php echo $general_members[$i];?>
				</div>
			</td>
			<td>
<?php 
			$i ++;
			if ($i < count($general_members)){
?>
				<div align='center' class='tbl'>
					<?php echo $general_members[$i];?>
				</div>
<?php 
			}
?>	
			</td>
		</tr>
<?php
		$i ++;
	}
?>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
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
<?php 
	if (count($BOD_members) > 0){
?>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style14' align='center'>
				USPS Board of Directors
			</div>
		</td>
	</tr>
<?php
		foreach($BOD_members as $row){
?>
		<tr class='tbl'>
			<td class='tbl'>
				<?php echo $row['name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['squadron_name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['job_name']; ?>
			</td>
		</tr>
<?php 
		}
	}
	if (count($RC_members) > 0){
?>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style14' align='center'>
				Rear Commanders
			</div>
		</td>
	</tr>
<?php
		foreach($RC_members as $row){
?>
		<tr class='tbl'>
			<td class='tbl'>
				<?php echo $row['name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['squadron_name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['job_name']; ?>
			</td>
		</tr>
<?php 
		}
	}
	if (count($SC_members) > 0){
?>
	<tr class='tbl'>
		<td class='tbl' colspan='3'>
			<div class='style14' align='center'>
				Staff Commanders
			</div>
		</td>
	</tr>
<?php 
	foreach($SC_members as $row){
?>
		<tr class='tbl'>
			<td class='tbl'>
				<?php echo $row['name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['squadron_name'];?>
			</td>
			<td class='tbl'>
				<?php echo $row['job_name']; ?>
			</td>
		</tr>	
<?php 
	}
	}
?>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
	</table>
	
<!--//   display_d5_trusts-->

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
	$i=0;
	while ($i < count($hes)){
?>
		<tr>
			<td >
				<div align='center' class='tbl'>
					<?php echo $hes[$i];?>
				</div>
			</td>
			<td>
<?php 
			$i ++;
			if ($i < count($hes)){
?>
				<div align='center' class='tbl'>
					<?php echo $hes[$i];?>
				</div>
<?php 
			}
?>	
			</td>
		</tr>
<?php
		$i ++;
	}

?>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
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
