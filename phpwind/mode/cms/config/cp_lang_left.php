<?php
!defined('P_W') && exit('Forbidden');
if (isset($db_modes['area'])) {
	$nav_left['cms'] = array('name' => 'ндубдёй╫', 
		'items' => array(
				'cms_article',
				'cms_column',
				'cms_purview',
		)
	);
}
?>