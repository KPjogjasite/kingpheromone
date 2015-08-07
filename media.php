<?php
//start session
ob_start();
session_start();
//error_reporting(0);
//require system files

require "josys/koneksi.php";
require "josys/library.php";
include "josys/class_paging.php";
//include template
include "template.php";
?>
