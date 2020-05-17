<?php
$logging = false;
include($_SERVER['CONTEXT_DOCUMENT_ROOT']."/applications/setupJoomlaAccess.php");
	$vhqab = JoeFactory::getLibrary("USPSd5tableVHQAB");
	$WebSites = JoeFactory::getLibrary("USPSd5dbWebSites","local");
$blobs = $WebSites->getBlobsObject(); 
$sqds = $vhqab->getSquadronObject();
$year = $vhqab->getSquadronDisplayYear('6243');
$dd = __DIR__;
$ff = __FILE__;



if ($logging) log_it("Entering ".__FILE__,__LINE__);

if ($logging) log_it("event_id = $event_id",__LINE__);
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name=Generator content="Microsoft Word 11 (filtered)">
	<title>Event Details</title>
</head>
<body onload='setsize(900,880);'>
<div id="Layer2">
  <table width="664" border="1" cellpadding="1" cellspacing="0" >
    <tr>
      <th class="style14b" scope="col">Squadron</th>
      <th class="style14" scope="col"><span class="style14b">Commander </span></th>
      <th class="style14" scope="col"><strong>Phone</strong></th>
    </tr>
<?php
	$sqs = $vhqab->get_all_squadron_jobs('31000',$year);
	foreach ($sqs as $sq){
		if ($sq['status']=='T') continue;
		echo "<tr>";
		if ($sq['web_site']!=""){
			$name = "<a href='".$sq['web_site']."'>".$sq['squad_name']."</a>";
		} else
			$name = $sq['squad_name'];
      	echo "<td class='style14'>$name</td>";
		echo "<td class='style14'>".$vhqab->getMemberNameAndGrade($sq[31000],TRUE)."</td>";
		echo "<td class='style14'>".$vhqab->getMemberPhone($sq[31000])."</td>";
    	echo "</tr>";
	}
?>
  </table>
</div>
</body>
</html>
