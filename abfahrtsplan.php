<?php

require_once("simple_html_dom.php");
header('Content-Type: text/html; charset=utf-8');

$html  = file_get_html("http://m.dvb.de/de/abfahrtsmonitor/abfahrten.do?t=1&id=33000173&_=uR_0g");
$index = $_GET['i'];


$article = $html->find('div.ui-block-a', $index);
$text = '#';
$text .= html_entity_decode(str_replace(' ', '', $article->find('p', 2)->plaintext));
$text .= ' ' . html_entity_decode(str_replace(' ', '', $article->find('p', 1)->plaintext));

$text = preg_replace('/|pünktlich|Uhr|/', '', $text);
$text = str_replace('ö', 'oe', $text);
$text = str_replace('ä', 'ae', $text);
$text = str_replace('ü', 'ue', $text);
$text = str_replace('ß', 'ss', $text);


echo $text;

