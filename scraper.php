<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('2000');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$x = 1; 
	$linkabc	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$x.'&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	$checking		=	$htmlcheck->find("h5[plaintext^=Diary No]",0)->plaintext;
	while($checking != "")
	{
		$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$x.'&d_yr='.$years[$mainpage];
		$html	=	file_get_html($link);
		if(!$html)
		{
		$check	=	$html->find("h5[plaintext^=Diary No]",0)->plaintext;
		$record = array('no' => $x ,'link' => $link ,  'check' =>$check);
		scraperwiki::save(array('no','link','check'), $record);
		echo "$check\n";
		$x++;
		}
		
		
	}
}
?>
