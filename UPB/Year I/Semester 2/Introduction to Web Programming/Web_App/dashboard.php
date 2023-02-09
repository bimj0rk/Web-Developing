<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel = "stylesheet"  href = "css/main.css">
		<link rel = "stylesheet" href = "css/dashboard.css"> 
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist/css/bootstrap.css">
        <link rel = "stylesheet"  href = "bootstrap-3.4.1-dist/css/bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/heartrate.ico">
		<meta charset = "8">
		<title>Health300 - Dashboard</title>
	</head>
	<body>
		<div class="navbar">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a href = "index.html">Home </a>
							<a href="quiz.html">Quiz </a>
							<a href="preDashboard.html">Dashboard </a>
							<a href="calculator.html">Calculator</a>
						</div>
					</div>    
				</div>
			</div>
		</div>	
		<?php
			require("php/connect.php"); 
			$arr = unserialize($_COOKIE['search']);
		
			$user = $arr[0];
			$query = "SELECT * FROM heart_rate WHERE user = '$user'";
			$result = mysqli_query($dbcon, $query);
			$query2 = "SELECT bmi, kcal FROM user WHERE name = '$user'";
			$result2 = mysqli_query($dbcon, $query2);
			$sysArr = [];
			$diaArr = [];
			$dateArr = [];

			while($row = mysqli_fetch_array($result2)){
				$bmi = $row['bmi'];
				$kcal = $row['kcal'];
			}
		?>
		<div class = "flex-center icon">
			<h1>Showing data for user <?php echo $user; ?></h1>
		</div>
		<div class="icon flex-center">
            <div class="container">
                <div class="row">
                	<div class="col-md-4">
						<div class = "title">
                    		<h4>Your BMI is:</h4><br>
							<br>
							<?php
								echo "<h2>$bmi</h2>";
                        	?>
						</div>    
                    </div>
					<div class="col-md-4">
						<div class = "title">
                    		<table align = "center">
								<tr>
									<th class = "flex-center">Date</th>
									<th id = sys>SYS</th>
									<th id = dia>DIA</th>
									<th id = bpm>BPM</th>
								</tr>
								<?php
									while($row = mysqli_fetch_array($result)){
										$date = $row['date'];
										$sys = $row['sys'];
										$dia = $row['dia'];
										$bpm = $row['bpm'];
										print "<tr><td>$date</td><td>$sys</td><td>$dia</td><td>$bpm</td></tr>";

										array_push($sysArr, $row['sys']);
										array_push($diaArr, $row['dia']);
										array_push($dateArr, $row['date']);
									}
									mysqli_close($dbcon);
								?>
							</table>
						</div>    
                    </div>
                	<div class="col-md-4">
                        <div class = "title">
							<h4>The amount of calories you need to consume in a day is:</h4><br>
							<?php
								echo "<h2>$kcal</h2>";
							?>
						</div>	
					</div>
                </div>
			</div>
		</div>	
		<div class = "flex-center icon">	
			<h4 id = "standardSYS"></h4>
			<h4 id = "standardDIA"></h4>
			<h4 id = "standatdBPM"></h4>
			<h4 id = "warningSYS"></h4>
			<h4 id = "warningDIA"></h4>
			<h4 id = "warningBPM"></h4>
			<h4 id = "recommandation"></h4>
			<script>
				var sys = <?php echo json_encode($sysArr); ?>,
					dia = <?php echo json_encode($diaArr); ?>,
					date = <?php echo json_encode($dateArr); ?>,
					j = 0,
					k = 0,
					l,
					warningSys = 0,
					normalSys = 0,
					warningDia = 0,
					normalDia = 0;

				let warningSYS = document.getElementById('warningSYS'),
					warningDIA = document.getElementById('warningDIA'),
					standardSYS = document.getElementById('standardSYS'),
					standardDIA = document.getElementById('standardDIA'),
					recommandation = document.getElementById('recommandation');

				for(let i = 0; i < sys.length; i++){
					if(sys[i] < 90){
						warningSYS.innerHTML += "Low systolic pressure on " + date[j] + "<br>";
						warningSys++;
					} else if(sys[i] > 121 && sys[i] <= 129){
						warningSYS.innerHTML += "Elevated systolic pressure on " + date[j] + "<br>";
						warningSys++;
					}  else if(sys[i] > 130 && sys[i] <= 139){
						warningSYS.innerHTML += "Potential Stage 1 hypertension. Recorded on " + date[j] + "<br>";
						warningSys++;
					} else if(sys[i] > 140){
						warningSYS.innerHTML += "Potential Stage 2 hypertension. Recorded on " + date[j] + "<br>";
					} else {
						standardSYS.innerHTML = "Normal systolic pressure";
						normalSys++;
					}
					j++;
				}

				for(let i = 0; i < dia.length; i++){
					if(dia[i] < 60){
						warningDIA.innerHTML += "Low diastolic pressure on " + date[k] + "<br>";
						warningDia++;
					}
					else if(dia[i] >= 60){
						warningDIA.innerHTML += "Elevated diastolic pressure on " + date[k] + "<br>";
						warningDia++;
					} 
					else if(dia[i] > 130 && dia[i] <= 139){
						warningDIA.innerHTML += "Potential Stage 1 hypertension. Recorded on " + date[k] + "<br>";
						warningDia++;
					}
					else if(dia[i] > 140){
						warningDIA.innerHTML += "Potential Stage 2 hypertension. Recorded on " + date[k] + "<br>";
					}
					else {
						standardDIA.innerHTML = "Normal diastolic pressure";
						normalDia++;
					}
					k++;
				}

				var warning = warningSys + warningDia,
					normal = normalSys + normalDia;

				if(warning <= normal) recommandation.innerHTML = "No recommendations at this moment";
				else recommandaion.innerHTML = "We recommend you to check in with your doctor";
			</script>	
			<a href = "preDashboard.html" class = "button">Go back</a>
		</div>
	</body>
</html>

	
