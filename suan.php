<html>
<body>

	<?php

	echo "tang yi xuan";
	echo "<br>";
	$score = array("math"=>"80","physical"=>"82","chinese"=>"90","PE"=>"83");
	foreach($score as $key => $value){
		echo "$key 's score is $value";
		echo "<br>";
	}
	
	echo "<br>";
	if(isset($_GET['subject']))
		echo $_GET['subject']." score is ".$_GET['score'];
	
	?>
	<a href="suan.php?subject=math&score=80">获取成绩</a> 

</body>
</html>
