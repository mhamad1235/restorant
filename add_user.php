<?php

	include 'auth/database.php';

	session_start();

	$message = "";
    $email = $_SESSION['email'];

    if(!isset($email))
    {
    	header('Location: login.php');
    }




    $query_groups = "SELECT * FROM make_group WHERE status = 'active'";
    $result_groups = mysqli_query($connect, $query_groups);
    $count_groups = mysqli_num_rows($result_groups);

    $query_store = "SELECT * FROM store WHERE status = 'active'";
    $result_store = mysqli_query($connect, $query_store);
    $count_store = mysqli_num_rows($result_store);

	if(isset($_POST['cancel'])){
		header('Location: manage_user.php');
	}

    if(isset($_POST['save']))
    {
    	$select_group = $_POST['groups'];
    	$select_store = $_POST['store'];
    	$firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
	
		
    	$lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
    	$username = mysqli_real_escape_string($connect, $_POST['username']);
    	$email = mysqli_real_escape_string($connect, $_POST['email']);
    	$password = $_POST['password'];	
		// echo $firstName, $lastName, $username, $password;
    	$confirmPassword = $_POST['confirmPassword'];
    	$option = $_POST['option'];

    	$result_username = mysqli_query($connect, "SELECT id FROM add_user WHERE username = '$username'");
    	$count_username = mysqli_num_rows($result_username); 

    	$result_email = mysqli_query($connect, "SELECT id FROM add_user WHERE email = '$email'");
    	$count_email = mysqli_num_rows($result_email);
    	if(!empty($firstName))
    	{
    		if(!empty($lastName))
    		{
    			if(!empty($username))
				{
					if(!empty($email))
					{
						if(!empty($password))
						{
							if(!empty($confirmPassword))
							{
								if(!$count_username > 0)
								{
									if(!$count_email > 0)
									{
										if($password === $confirmPassword)
										{
											$hashedpassword =sha1(md5($password));
											mysqli_query($connect,"INSERT INTO add_user(firstName, lastName, username, email, passwordd, gender, groups, store) VALUES ('$firstName', '$lastName', '$username', '$email', '$hashedpassword', '$option', '$select_group', '$select_store')");
											
											$message = "بەکارهێنەرەکە بەسەرکەوتوویی زیادکرا";
										}
										else
										{
											$message = "هەردوو بۆشایی وشەی نهێنیەکە پێویستە وەکو یەک بن";
										}
									}
									else
									{
										$message = "ئیمەیڵەکە بوونی هەیە";
									}
								}
								else
								{
									$message = "نازناوەکە بوونی هەیە";
								}
							}
							else
							{
								$message = "تکایە دووبارە وشەی نهێنیەکە بنووسەوە";
							}
						}
						else
						{
							$message = "تکایە وشەی نهێنیەکەت بنووسە";
						}
					}
					else
					{
						$message = "تکایە ئیمەیڵەکەت بنووسە";
					}
				}
				else
				{
					$message = "تکایە نازناوەکەت بنووسە";
				}
    		}
    		else
			{
				$message = "تکایە ناوی دووەمت بنووسە";
			}
    	}
    	else
		{
			$message = "تکایە ناوی یەکەمت بنووسە";
		}
    }

?>

<!DOCTYPE html >
<html dir="rtl" lang="ar">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Restaurant - add user</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/add_user.css">
</head>
<body>
	<div class="wrapper">

		<!-- Sidebar -->

		<?php include("admin_navigation.php"); ?>
		<!-- Content -->

		<div class="content-wrapper text-right">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<nav class="text-right">
							<a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
						</nav>
						<div class="below-toggle-content">
							<div class="col-md-12">
								<div class="top-part mb-3">
									<a href="dashboard.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: left; font-weight: 500;">داشبۆڕد <i class="fas fa-tachometer-alt"></i> </a>
									<h2 class="d-inline">زیادکردنی بەکارهێنەران</h2>
							
									
								</div>
								<div class="row">
									<a href="manage_user.php" class="btn btn-primary ml-3 mb-2">بەڕێوەبردنی بەکارهێنەران</a>
								</div>
								<h5 class="text-danger ml-10">
								<?php 
		                          	if($message != "") 
		                          	{
		                              echo '*' . $message . '<br><br>';
		                          	} 
		                      	?></h5>
								<div class="row">
									<form method="POST" action="" class="w-100 p-3">
										<div class="form-group">
											<label for="groups" style="font-weight: 600;">گروپەکان</label>
											<select name="groups" class="form-control shadow-none" id="groups">
											<?php
												if($count_groups > 0)
												{
													while($data = mysqli_fetch_assoc($result_groups))
													{	
											?>			
														<option value="<?php echo $data['group_name']; ?>"><?php echo $data['group_name']; ?></option>
											<?php
													}
												}
												else
												{	
											?>	
													<label for="groups" style="font-weight: 600;">گروپەکان</label>
												    <select class="form-control shadow-none" id="groups">
												    	<option>هیچ گروپێک نیە</option>
												    </select>	 
											<?php
												}
											?>	
											</select>	       
										</div>
										<div class="form-group">
										    <label for="store" style="font-weight: 600;">کۆگا</label>
										    <select name="store" class="form-control shadow-none" id="store">
										    <?php
												if($count_store > 0)
												{
													while($data = mysqli_fetch_assoc($result_store))
													{	
											?>		
										    			<option value="<?php echo $data['store_name']; ?>"><?php echo $data['store_name']; ?></option>
										    <?php
													}
												}
												else
												{	
											?>	
													<label for="store" style="font-weight: 600;">کۆگا</label>
												    <select class="form-control shadow-none" id="store">
												    	<option>هیچ کۆگایەك نیە</option>
												    </select>	 
											<?php
												}
											?>				
										    </select>
										</div>
										<div class="form-group">
									    	<label for="first-name" style="font-weight: 600;">ناوی یەکەم</label>
									    	<input type="text" name="firstName" class="form-control shadow-none" id="first-name" placeholder="ناوی یەکەمت بنووسە">
									  	</div>
									  	<div class="form-group">
									    	<label for="last-name" style="font-weight: 600;">ناوی دوایین</label>
									    	<input type="text" name="lastName" class="form-control shadow-none" id="last-name" placeholder="Enter Last Name">
									  	</div>
										<div class="form-group">
									    	<label for="username" style="font-weight: 600;">نازناو</label>
									    	<input type="text" name="username" class="form-control shadow-none" id="username" placeholder="نازناوت بنووسە">
									  	</div>
									  	<div class="form-group">
									    	<label for="email" style="font-weight: 600;">ئیمەیڵ</label>
									    	<input type="email" name="email" class="form-control shadow-none" id="email" placeholder="ئیمەیڵکەکەت بنووسە">
									  	</div>
									  	<div class="form-group">
									    	<label for="password" style="font-weight: 600;">وشەی نهێنی</label>
									    	<input type="password" name="password" class="form-control shadow-none" id="password" placeholder="وشەی نهێنیت بنووسە">
									  	</div>
									  	<div class="form-group">
									    	<label for="confirm-password" style="font-weight: 600;">دووپاتکردنەوەی وشەی نهێنی</label>
									    	<input type="password" name="confirmPassword" class="form-control shadow-none" id="confirm-password" placeholder="وشەی نهێنیت دووپات بکەرەوە">
									  	</div>
									  	<label style="font-weight: 600;">ڕەگەز</label>
									  	<div class="form-group">
									  		<div class="form-check form-check-inline">
											  	<input class="form-check-input" type="radio" name="option" id="male" value="male" checked>
											  	<label class="form-check-label" for="male">نێر</label>
											</div>
											<div class="form-check form-check-inline">
											  	<input class="form-check-input" type="radio" name="option" id="female" value="female">
											  	<label class="form-check-label" for="female">مێ</label>
											</div>
									  	</div>
									  	<button type="submit" name="cancel" class="btn btn-danger" onclick="toManageUser()">پاشگەزبوونەوە</button>
									  	<button type="submit" name="save" class="btn btn-primary" id="save">خەزنکردن</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>	

	<script type="text/javascript">
		$('#toggle').click(function(e){
			e.preventDefault();
			$('.wrapper').toggleClass('menuDisplayed');
		});
         
		function toManageUser() {
			window.location.href = "manage_user.php";
		}

	</script>

</body>
</html>