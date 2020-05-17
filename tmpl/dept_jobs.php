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
?>
<style>
#Layer2 {
	height:500px;
	width:800px;
	overflow:scroll;
	z-index:4;
}
</style>
	<div id='Layer2'>
<?php 
?>
	<p></p>
<?php 
	$dept_name = $dept_jobs[0]['title'];
	$dept = $dept_jobs[0]['jobcode'];
	if ($dept == 21000){
		require(JModuleHelper::getLayoutPath('mod_d5_organization','governing_board'));
		require(JModuleHelper::getLayoutPath('mod_d5_organization','general_standing'));
	}
	unset($dept_jobs[0]);
?>
	<table width="600" border="0" cellspacing="0" cellpadding="1">
		<colgroup>
			<col id='depts_col_1'>
			<col id='depts_col_2'>
		</colgroup>
		<tr class="table"><td colspan="2">&nbsp;</td></tr>
		<tr class='tbl'>
			<td class='tbl' colspan='2'>
				<div class='style16b' align='center'>
					<?php echo $dept_name; ?> 
				</div>
			</td>
		</tr>
		<tr class="table"><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td class='tbl' style='font-weight: bold;'><?php echo 'DISTRICT 5 '.$dept_jobs[$dept]['title'];?></td>
			<td class='tbl' style='font-weight: bold;'>
<?php 
				if ($pic_avail){
?>
					<div id='dept_officer_pic'>
						<img src='<?php echo $pic_url;?>' 
							alt='photo' width='80' height='80'>
					</div><br>
<?php
				}
?>
				<?php echo $dept_jobs[$dept]['name'];?>
			</td>
		</tr>
<?php
	$officer = $dept_jobs[$dept]['certificate'];
	unset($dept_jobs[$dept]);
?>
	<tr class="table"><td colspan="2">&nbsp;</td></tr>
<?php
	if (isset($dept_jobs[$dept+1])){
?>
		<td class='tbl'><?php echo 'DISTRICT 5 '.$dept_jobs[$dept+1]['title'];?></td>
		<td class='tbl'><?php echo $dept_jobs[$dept+1]['name'];?></td>
		<tr class="table"><td colspan="2">&nbsp;</td></tr>
<?php 
		unset($dept_jobs[$dept+1]);
	}
	foreach($dept_jobs as $job){
		if ($job['type'] == 2 and isset($job['mbrs'])){		// It's a Group
?>			
			<tr class="table"><td colspan="2">&nbsp;</td></tr>
		    <tr>
		    	<td colspan='2' class='tbl'>
					<div align='left' class='style14b'>
						<?php echo $job['title']; ?>
					</div>
				</td>
			</tr>
<?php 
	$i=0;
	while ($i < count($job['mbrs'])){
?>
			<tr>
				<td >
					<div align='left' class='tbl'>
						<?php echo $job['mbrs'][$i]; ?>
					</div>
				</td>
				<td>
<?php 
				$i ++;
				if ($i < count($job['mbrs'])){
?>
					<div align='left' class='tbl'>
						<?php echo $job['mbrs'][$i]; ?>
					</div>
<?php 
				}
?>
				</td>
			</tr>
<?php 
			$i ++;
			}
		}
		elseif ($job['type'] == 0){  // It's a Named Job
			if (isset($job['named'])){
?>
			<tr class="table"><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td class='tbl' colspan='2'><?php echo $job['title'];?></td>
			</tr>
<?php
				foreach($job['named'] as $name){
					
?>
			<tr>
				<td></td>
				<td class='tbl'><?php echo $name;?></td>
			</tr>
<?php 					
				}
			}			
		}
		elseif ($job['type'] == 1){
			show_blank_rows(1);			
			show_d5_dept_row($job['title'],'','tbl');
			if (isset($job['Chair']))
				foreach($job['Chair'] as $m)
					show_d5_dept_row('Chair',$m,'tbl');
			if (isset($job['Chair Emeritus']))
				foreach($job['Chair Emeritus'] as $m)
					show_d5_dept_row('Chair Emeritus',$m,'tbl');
			if (isset($job['mbrs']))
				foreach($job['mbrs'] as $m)
					show_d5_dept_row('',$m,'tbl');
			if (isset($job['named']))
				foreach($job['named'] as $m)
					show_d5_dept_row($m[0],$m[1],'tbl');				
		} 
	}

?>
	</table>
	</div>
<?php 


?>
