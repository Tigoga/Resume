<?php 

// Contact Page
include("../util/connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name_contact = $_POST['name'];
		$email_contact = $_POST['email'];
		$subject_contact = $_POST['subject'];
		$message_contact = $_POST['message'];

		{

            //read from database
         $query = "insert into contact (tx_name, tx_email, me_subject, me_message) values ('$name_contact','$email_contact','$subject_contact','$message_contact')";
         $result = mysqli_query($con, $query);

         mysqli_query($con, $query);

         if($result) {
            header("Location: /default.php?message=Your contact information was submitted! Thank you");
            die;
         }
      }
	}

?>

<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Contact Page">
   <meta name="keywords" content="HTML, CSS, PHP">
   <meta name="author" content="TGG">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Wellington L. Gaboardi Professinal Website Home - Login Page</title>
   <link rel="stylesheet" href="/css/pages.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
   <link href="/bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
   <script src="/bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
  <?php include 'c:\resume\pages\util\navigation.php' ?> <!--cabeçalho da pagina-->
  <section>
    <div class="wrapper">
    <form name="frmContact" action="./contactpage.php" method="post">
      <table class="form-style">
         <tr>
            <td>
               <label style="font-size: 1.4em;">
               Contact Form
            </label>
            </td>
            <td>
               <label for="name">
                  Your name <span class="required">*</span>
               </label>
            </td>
            <td>
               <input type="text" id="name" name="name" class="long" required placeholder="Contact name"/>
            </td>
         </tr>
         <tr>
            <td>
               <label for="email">
                  Your email address <span class="required">*</span>
               </label>
            </td>
            <td>
               <input type="email" name="email" id="email" class="long"  required  placeholder="email@provider.com"/>
            </td>
         </tr>
         <tr>
            <td>
               <label for="subject">
                  Subject <span class="required">*</span>
               </label>
               <input type="text" id="subject" name="subject" required placeholder="Subject">
            </td>
         </tr>
      <tr>
            <td>
               <label for="message">
                  Message <span class="required">*</span>
               </label>
            </td>
            <td>
               <textarea name="message" id="message" required class="long field-textarea" placeholder="Message text"></textarea>
            </td>
         </tr>
         <tr>
            <td>
               <input type="submit" value="Send">      
               <input type="reset" value="Reset"> 
            </td>
         </tr>
      </table>
     </form>
     <div class="wrapper">  
  </section>
  <?php include 'c:\resume\pages\util\footer.php' ?> <!--cabeçalho da pagina-->
</body>
</html>