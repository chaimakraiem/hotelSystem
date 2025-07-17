<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.css')
   </head>

   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>

      <header>
      @include('home.header')
       </header>
   @include('home.slider')
    
     @include('home.banner')
   
     @include('home.room')
   
     @include('home.gallery')
   
     @include('home.contact')

    @include('home.footer')
 
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>