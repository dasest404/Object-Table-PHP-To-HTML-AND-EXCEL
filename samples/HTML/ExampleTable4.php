<?php
require_once '../ObjectTable/Header.php';
use ObjectTablePhp\Html\TableToHtml;

echo "<br>";
include '../ObjectTable/Table4.php';

//-->******** Print the Table in HTML ********<--//
$lobTableHtml  = new TableToHtml();
$lobTableHtml->setObjectTable($lobTable);
echo $lobTableHtml->mPrintObjectTableInHtml();

require_once '../ObjectTable/Footer.php';
?>