<?php 
	session_start();
	require("config.php");
	
	if(!isset($_SESSION["login_info"])){
		header("location:index.php");
	}
	
	$users=[];
	$current_month_day=date("m-d");
	$current_year=date("Y");
	#Select today birthday users
	$sql="select * from users where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}' and WISH_YEAR<>'{$current_year}'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$users[]=$row;
		}
	}
	
	
	foreach($users as $user){
		
		/*$to = $user["EMAIL"];

		$subject = "Breminder";

		$message = "<h3>text {$user["NAME"]}</h3>";

		$header="From:user@domain.in"."\r\n";
		$header.="X-Mailer:PHP/".phpversion()."\r\n";
		$header.="Content-type:text/html; charset=iso-8859-1";  

		$response=mail($to,$subject,$message,$header);
		
		if($response==true){
			$sql="update users set WISH_YEAR='{$current_year}'  where ID='{$user["ID"]}'";
			$con->query($sql);
		}else{
			echo "Mail send Failed!!!";
		}*/
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";?>
	<body>
		<?php include "navbar.php"; ?>
		<div class='container mt-4'>
			<div class='row'>
				
				<div class='col-md-4'>
					<?php foreach($notifications as $row):?>
					  <div class="alert alert-primary mb-3 pt-4 pb-4" href="#"><?php echo $row; ?></div>
					<?php endforeach;?>
				</div>
				<div class='col-md-8'>
					<div class="jumbotron">
						<h1 class="display-4"> Reminder</h1>
						<hr class="my-4">
						<p class="lead">In this project we  create simple  reminder system and send to mail id using PHP and MySQL.</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>