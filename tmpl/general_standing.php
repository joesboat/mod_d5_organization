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
	<p></p>
	<table width="600" border="0" cellspacing="0" cellpadding="1">
		<colgroup>
			<col id='depts_col_1'>
			<col id='depts_col_2'>
		</colgroup>

			<tr class='tbl'>
				<td class='tbl' colspan='2'>
					<div class='style16b' align='center'>
						DISTRICT 5 GENERAL COMMITTEES
					</div>
				</td>
			</tr>
<?php 
			foreach($general as $job){
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
?>		
			<tr class='tbl'>
				<td class='tbl' colspan='2'>
					<div class='style16b' align='center'>
						DISTRICT 5 STANDING COMMITTEES
					</div>
				</td>
			</tr>
<?php 	
			foreach($standing as $job){
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
?>
	</table>
<?php 