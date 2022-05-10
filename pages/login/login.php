
<?php 
   // Login Session Page
   session_start();

	include("../util/connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from user where tx_username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					if($user_data['tx_password'] === md5($password))
					{

						$_SESSION['id_user'] = $user_data['id_user'];
                  $_SESSION['logged'] = true;
						header("Location: /default.php?message=Authentication successfully !");
						die;
					}
				}
			}
			
			echo "Wrong username or password!'";
		}else
		{
			echo "Wrong username or password!'";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Login Page">
   <meta name="keywords" content="HTML, CSS, PHP">
   <meta name="author" content="TGG">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Wellington L. Gaboardi Professinal Website Home - Login Page</title>
   <link rel="stylesheet" href="/css/pages.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
   <link href="/bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
   <script src="/bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body id="login">
   <?php include 'c:\resume\pages\util\navigation.php' ?> <!--cabeçalho da pagina-->

   <section>
   <form name="frmLogin" action="./login.php" method="post">
   <table class="form-style">
   <tr>
               <td>
                  <label style="font-size: 1.4em;">
                  Login Form
               </label>
               </td>
               <td>
                  <label for="name">
                     Your name <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="text" name="username" class="long" placeholder="Username" pattern=[A-Z\sa-z]{3,20} maxlength=20 required/>
                  <?php if($_SERVER['REQUEST_METHOD'] == "POST"): ?>
                      <span style="color:#ffc107">Invalid Login or Password!!!!</span>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <td>
                  <label for="password">
                     Password
                  </label>   
                  <input type="password" name="password" class="long"  placeholder="********" maxlength=20 required/>
               </td>
            </tr>
            <tr>
               <td>
                  <input type="submit" value="Send">      
                  <input type="reset" value="Reset"> 
               </td>
            </tr>
         </table>
         </section>
      </form>
   </section> 

</body>
 <footer>
      <div class="row">
         <div class="col-12 text-center ">
         <h4>
            <a>Wellington Gaboardi's Professional Website</a>
         </h4>
            <div>
            <P>© 2022 WLG - Rights Reserved</P>
            </div>
         </div>
      </div>
   </footer>
   <a class="back-to-top" href="#">➣</a>

</html>
