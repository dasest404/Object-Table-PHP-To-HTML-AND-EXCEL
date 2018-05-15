<?php
require_once '../ObjectTable/Header.php';
use ObjectTablePhp\Html\TableToHtml;

echo "<br>";
include '../ObjectTable/Table1.php';

//-->******** Print the Table in HTML ********<--//
$lobTableHtml  = new TableToHtml();
$lobTableHtml->setObjectTable($lobTable);
echo $lobTableHtml->mPrintObjectTableInHtml();
/*Note: see the generated HTML code for a May reference.*/

require_once '../ObjectTable/Footer.php';
?>