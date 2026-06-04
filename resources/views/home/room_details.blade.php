<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      @include('home.css')
    
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
       
               @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
     

       <div  class="our_room">
    <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
         
            <div class="row">
            
               <div class="col-md-8 col-sm-12 mx-auto">
                  <div id="serv_hover"  class="room">
                     <div style="display: flex; justify-content: center;padding: 20px 0;" >
                        <figure style="margin: 0;"><img style="width: 700px; height: 300px; object-fit: cover;" src="room/{{ $room->image }}" alt="#"/ ></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{ $room->room_title }}</h3>
                        <p  style="padding: 12px 0;" >{{ $room->description }}</p>
                        <h4 style="padding: 12px 0;">Free WiFi : {{ $room->free_wifi }}</h4>
                        <h4 style="padding: 12px 0;">Room Type : {{ $room->room_type }}</h4>
                        <h3 style="padding: 12px 0;">Price : ${{ $room->price }}</h3>
                    
                       
                     </div>
                  </div>
               </div>
             
            </div>
         </div>
</div>
     
      <!--  footer -->
      @include('home.footer')
   </body>
</html>