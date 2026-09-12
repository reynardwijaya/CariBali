<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.homecss')
   </head>
   <body>
      <div class="unified_banner_section">
         @include('home.header')
         @include('home.banner')
      </div>

      @include('home.favorite_places')
      @include('home.about')
      @include('home.explore_testimonials')
      @include('home.faq')
      @include('home.footer')

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/owl.carousel.js"></script>
   </body>
</html>
