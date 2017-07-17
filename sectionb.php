<?php
	echo "<script src='https://www.gstatic.com/charts/loader.js'></script>";
	echo "<script src='http://hawki111.myweb.cs.uwindsor.ca/60334/Assignments/Assignment4/js/sectionb.js'></script>";
	
    require_once 'loginb.php';
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);
	
	echo "<h1>Section B Page</h1>";
	 $index = 0;
	echo "<table>";
	foreach($conn->query('SELECT category, COUNT(*) FROM classics GROUP BY category') as $row) { 
	
	$count[$index] = $row['COUNT(*)'];
	$categories[$index] = $row['category'];
	$index = $index + 1;
	}
	echo '<script>var categories = ' . json_encode($categories) . ';</script>';
	echo '<script>var count = ' . json_encode($count) . ';</script>';
	echo "</table>";
	echo <<<_END
	 <div id="chart_div" style="width:400; height:300" onload="drawChart()"></div>
_END
	

?>