<?php
	$a=1546300800;
	$b=1577836769;
	$c=1514764800;
	$d=1546300769;
	$uname=$_GET['fname'];
	if(isset($uname)){
	$url = "https://codeforces.com/api/user.status?handle=".$uname;
	$url2 ="https://codeforces.com/api/user.rating?handle=".$uname;

	$con=json_decode(file_get_contents($url2),true);
	$contest=$con['result'];
	$cnt=0;
	$position=0;
	$mx2018=1400;
	$mx2019=1400;
	foreach ($contest as $row) {
		if($row['ratingUpdateTimeSeconds']>=$a and $row['ratingUpdateTimeSeconds']<=$b){
			$cnt++;
			$position+=(int)$row['rank'];
			if($row['oldRating']<=$row['newRating']){
				$mx2019=max($mx2019,$row['newRating']);
				// echo $mx2019."1<br>";
			}
		}
		else if($row['ratingUpdateTimeSeconds']>=$c and $row['ratingUpdateTimeSeconds']<=$d){
			if($row['oldRating']<=$row['newRating']){
				$mx2018=max($mx2018,$row['newRating']);
				// echo $mx2018."2<br>";
			}
		}
	}
	

	$jsondata = file_get_contents($url);
	$obj = json_decode($jsondata,true);

	$res=$obj['result'];
	$sum=0;
	foreach ($res as $row) {
		if(((int)$row['creationTimeSeconds'])<$a) break;
		if(((int)$row['creationTimeSeconds'])>=$a && ((int)$row['creationTimeSeconds'])<=$b){
			if($row['author']['participantType']=='CONTESTANT'){
				if($row['verdict']=='OK'){
				if(isset($row['problem']['rating']))
					$sum=$sum + (int)($row['problem']['rating']);
				}
			}
		}
	}
	
	$avg=$sum/$cnt;
	$position=$position/$cnt;
	$diff=$mx2019-$mx2018;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
<style>
table {
  border-collapse: collapse;
  margin: auto;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<h2 style="margin-left:600px ;">Result</h2>

<table>
  <tr>
    <th>Handel</th>
    <th><?php echo $uname; ?></th>
  </tr>
  <tr>
    <td>Total sum of dificulty</td>
    <td><?php echo $sum; ?></td>
  </tr>
  <tr>
    <td>Total contest count in 2019</td>
    <td><?php echo $cnt; ?></td>
  </tr>
  <tr>
    <td>Avrage of sum/count</td>
    <td><?php echo $avg; ?></td>
  </tr>
  <tr>
    <td>Avrage of Position</td>
    <td><?php echo $position; ?></td>
  </tr>
  <tr>
    <td>Max Rating Difference 2019-2018</td>
    <td><?php echo $diff; ?></td>
  </tr>
</table>

</body>
</html>
