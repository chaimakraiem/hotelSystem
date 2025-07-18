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
   
     @include('home.mes_reservations')
   

    @include('home.footer')
 
     
   </body>
</html>