<!DOCTYPE html>
<html>
<head>
<title>DateTime</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top:20px">	
			<div class="page-header">
			  <h1><small>Date Time</small></h1>
			</div>
			
			<form class="form-horizontal" action="" method="get">
				<div class="form-group">
					<label for="d" class="col-sm-2 control-label">Day :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control col-xs-3" id="d" name="d" placeholder="Enter Day" >
					</div>
				</div>
				<div class="form-group">
					<label for="m" class="col-sm-2 control-label">Month :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control col-xs-3" id="m" name="m" placeholder="Enter Month" >
					</div>
				</div>
				   <div class="form-group">
					<label for="y" class="col-sm-2 control-label">Year :</label>
					<div class="col-sm-3">
						<input type="text" class="form-control col-xs-3" id="y" name="y" placeholder="Enter Year" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
		</form>
		<hr/>
	<?php  
		$d = false;
		$m = false;
		$y = false;
		if(isset($_GET['d'])){
		   $d = $_GET['d'];
		}
		if(isset($_GET['m'])){
		   $m = $_GET['m'];
		}
		if(isset($_GET['y'])){
			$y = $_GET['y'];
		}
			
			
			function getDay($day){
				$today = array("Mon"=>"วันจันทร์","Tue"=>"วันอังคาร","Wed"=>"วันพุธ","Thu"=>"'วันพฤหัสบดี","Fri"=>"วันศุกร์","Sat"=>"วันเสาร์","Sun"=>"วันอาทิตย์");
				$day = $day;
				$days ="";
				foreach($today as $key => $value){
					if(!empty($day) && $day == $key){
						$days = $value;
					}
				}
				return $days;
			}
			
			if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($d) && !empty($m) && !empty($y) && $d <= '31' && $m <= '12' ){
				
					$start =  $y.'-'.$m.'-'.$d;
					$end = date("Y-m-d");
					$days =  date('D', strtotime($start));
					$date1 = new DateTime($start);
					$date2 = new DateTime($end);
					$diff = $date2->diff($date1)->format("%a");
						
					$week = $diff/7;
					$wane = (floor($week)*7);
					$day = ($diff-$wane);

				echo '<h3><div  class="alert alert-success" role="alert">'.'คุณเกิด'.getDay($days).' ปัจจุบันมีอายุ '.floor($week).' สัปดาห์ '.$day.' วัน '.'</div ></h3><br/><hr/>';
			}
	?>
		
	</div>
	 
</body>
</html>