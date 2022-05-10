<?php 
// Blog Page

include("../util/connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
    session_start();
		//something was posted
		$id_user = $_SESSION['id_user'];
		$id_subject = $_POST['subject'];
		$tx_blog = $_POST['blog'];

		{

            //read from database
         $query = "insert into blog (id_subject,dt_created,me_description, id_user) values ('$id_subject',now(),'$tx_blog','$id_user')";
         $result = mysqli_query($con, $query);

         if($result) {
            header("Location: /default.php?message=Your blog information was submitted! Thank you");
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
   <script src="https://cdn.tiny.cloud/1/7603xr39pe5hctyn5q3cuaufsu3ooaviknqjol1t3hj8ouyw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <?php include 'c:\resume\pages\util\navigation.php' ?> <!--cabeçalho da pagina-->
  <section>
    <div class="wrapper">
        <div class="row">
            <form name="frmBlog" action="./blogpage.php" method="post" >
              <table class="form-style">
                <tr>
                    <td>
                      <label style="font-size: 1.4em;">
                      Blog Form
                    </label>
                    </td>
                    <td>
                      <label for="name">
                          Subject <span class="required">*</span>
                      </label>
                    </td>
                    <td>
                      <select name="subject" id="subject">
                        <option value=1>Agile</option>
                        <option value=2>Project</option>
                        <option value=3>Business</option>
                        <option value=4>Database</option>
                        <option value=5>Language</option>
                        <option value=6>IA/ML</option>
                        <option value=7>Utilties</option>
                        <option value=8>News</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>
                      <label for="blog">
                        Text Blog <span class="required">*</span>
                      </label>
                    </td>
                    <td>
                      <textarea name="blog" class="long field-textarea" placeholder="Insert your text blog here !"></textarea>
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
          </div>
      </div>  
    </div>  
  </section>
  <?php include 'c:\resume\pages\util\footer.php' ?> <!--cabeçalho da pagina-->
  <script >
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Blog editor',
    width: '100%',
  });
</script>

</body>
</html>