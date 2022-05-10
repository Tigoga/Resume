<!DOCTYPE html>
<html lang="en"data-lt-installed="true">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Default Project Page">
   <meta name="keywords" content="HTML, CSS, PHP">
   <meta name="author" content="TGG">
   <title>Wellington L. Gaboardi Professinal Website Home</title>
   <link rel="stylesheet" href="css/default.css">
   <link href="/bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
   <script src="/bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
   <link rel="stylesheet" href="/css/font-awesome.min.css">

</head>
<body>
  <?php include './pages/util/navigation.php' ?> <!--page navigation-->
  <?php include './pages/util/defaultbd.php' ?> <!-- database functions-->

  <div style="margin-top:8em"></div>       
  

  <div class="row justify-content-center" style="margin:1.5em;">
        <div class="container-sm ">
          <div class="row">
            <div class="bg-Intro col-12	col-sm-12	col-md-4	col-lg-4	col-xl-4	col-xxl-4">
              <section class="paragraphs">
                 <?php retrieveSummaryDefault(); ?>
                 <p class="text-center p-2">
                   <a class="contact" href="./pages//blog/blogpage.php">Learn more</a> or 
                  <a class="contact" href="./pages/contact/contactpage.php">contact me </a>
                </p>

              </section>
            </div>
            <div class="col-12	col-sm-12	col-md-4	col-lg-4	col-xl-4	col-xxl-4">
              <section class="bg-cimages text-center">
              <?php retrieveProjectsDefault(); ?>
             </section>
          </div>
          <div class="bg-Intro col-12	col-sm-12	col-md-4	col-lg-4	col-xl-4	col-xxl-4">
            <section class="css-cimages paragraphs">
                <?php retrieveBlog(); ?>
              </section>
          </div>

        </div>    
      </div>
  </div> 
  <?php include 'c:\resume\pages\util\footer.php' ?> <!--cabeçalho da pagina-->

 <a class="back-to-top" href="#">➣</a>
 /body>
</html>
