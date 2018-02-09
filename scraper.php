<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('2000');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	 
	$linkabc		=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no=1&d_yr='.$years[$mainpage];
	echo $htmlcheck	=	file_get_contents($linkabc);
	$checking		=	$htmlcheck->find("h5[plaintext^=Diary No]",0);
	$not			=	$htmlcheck->find("h5[plaintext^=Case Not Found]",0);
	$loop			=	1;
	
	while($checking	==	'Diary No.- '.1. '-' .$years[$mainpage]) 
	{
  		$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$loop.'&d_yr='.$years[$mainpage];
		$html	=	file_get_contents($link);
		$check	=	$html->find("h5[plaintext^=Diary No]",0);
		$record = array('link' => $link ,  'check' =>$check);
		scraperwiki::save(array('link','check'), $record);
		echo "$check\n";
		$loop++;
	} 

	
}
?>
