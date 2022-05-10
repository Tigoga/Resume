<script src="/scripts/jquery-3.6.0.min.js" ></script>
<script>
$(document).ready(function() {
   $("#myToast").toast('show');
});   
</script>

<?php 
session_start();
if(!isset($_SESSION["id_user"])) {
  $_SESSION["id_user"] = 1; // sets default user (client)
} 
?>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #7986CB;position:fixed;top:0px;left:0px;width:100%">
    <h1 class="text-center">Wellington L. Gaboardi Professional Website</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
     <div
        class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active text-secondary">
            <a href="/default.php"class="nav-link px-2">
              Home
         </a>
        </li>
        <?php 
        if (isset($_SESSION['logged']) && $_SESSION['logged']=="true" ): ?>
        <li class="nav-item active text-dark">
           <a href="/pages/blog/blogpage.php"class="nav-link px-2 ">
           Blog
         </a>
         <?php endif; ?>
        </li> 
           <li class="nav-item active text-dark">
           <a href="/pages/profile/profilepage.php"class="nav-link px-2 ">
          Profile
         </a>
        </li> 
           <li class="nav-item active text-dark">
           <a href="/pages/contact/contactpage.php"class="nav-link px-2">
          Contact
         </a>
       </li>
       <?php if ((!isset($_SESSION['logged']) || $_SESSION['logged']==false)): ?>
          <li class="nav-item active text-dark">
            <a href="/pages/login/login.php"class="nav-link px-2">
          Login
            </a>
       </li>
       <?php else:?>
          <li class="nav-item active text-dark">
            <a href="/pages/login/logout.php"class="nav-link px-2">
          Logout
            </a>
       </li>
       <?php endif; ?>
     </ul>
    </div> 
  </nav>    
<?php  if (isset($_GET['message'])): ?>
  <div aria-live="polite" aria-atomic="true" class="position-relative">

    <div  class="toast-container position-absolute end-0 p-3 " style="top:7em !important">

      <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color:var(--bs-primary)!important">
        <div class="toast-header">
          <strong class="me-auto">Information</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?php echo $_GET['message'] ?>
        </div>
      </div>
      
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
          <?php echo $_GET['message']?>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
</div>  
<?php endif; ?>
