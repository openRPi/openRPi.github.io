<?php
!defined('PW_UPLOAD') && exit('Forbidden');

$smileService = L::loadClass('smile', 'smile'); /* @var $smileService PW_Smile */

$view = 1;
$smiles = array(
    '1.gif' => array('path' => '1.gif', 'name' => 'Î¢Ğ¦', 'order' => $view++),
    '3.gif' => array('path' => '3.gif', 'name' => '¹Ô', 'order' => $view++),
    '4.gif' => array('path' => '4.gif', 'name' => '»¨³Õ', 'order' => $view++),
    '5.gif' => array('path' => '5.gif', 'name' => '¹ş¹ş', 'order' => $view++),
    '6.gif' => array('path' => '6.gif', 'name' => 'ºô½Ğ', 'order' => $view++),
    '7.gif' => array('path' => '7.gif', 'name' => 'ÌìÊ¹', 'order' => $view++),
    '8.gif' => array('path' => '8.gif', 'name' => 'Ò¡Í·', 'order' => $view++),
    '9.gif' => array('path' => '9.gif', 'name' => '²»»á°É', 'order' => $view++),
    '10.gif' => array('path' => '10.gif', 'name' => 'ÓÇÉË', 'order' => $view++),
    '11.gif' => array('path' => '11.gif', 'name' => '±¯Æü', 'order' => $view++),
    '12.gif' => array('path' => '12.gif', 'name' => 'I·şÁËU', 'order' => $view++),
    '13.gif' => array('path' => '13.gif', 'name' => '±³', 'order' => $view++),
    '14.gif' => array('path' => '14.gif', 'name' => '±ÉÊÓ', 'order' => $view++),
    '15.gif' => array('path' => '15.gif', 'name' => '´óÅ­', 'order' => $view++),
    '16.gif' => array('path' => '16.gif', 'name' => 'ºÃµÄ', 'order' => $view++),
    '17.gif' => array('path' => '17.gif', 'name' => '¹ÄÕÆ', 'order' => $view++),
    '18.gif' => array('path' => '18.gif', 'name' => 'ÎÕÊÖ', 'order' => $view++),
    '19.gif' => array('path' => '19.gif', 'name' => 'Ãµ¹å', 'order' => $view++),
    '20.gif' => array('path' => '20.gif', 'name' => 'ĞÄËé', 'order' => $view++),
    '21.gif' => array('path' => '21.gif', 'name' => 'Î¯Çü', 'order' => $view++),
    '22.gif' => array('path' => '22.gif', 'name' => 'ÀÏ´ó', 'order' => $view++),
    '23.gif' => array('path' => '23.gif', 'name' => 'Õ¨µ¯', 'order' => $view++),
);
$smileService->adds(0, $smiles);
