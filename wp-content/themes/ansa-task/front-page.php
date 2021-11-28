
<?php
		get_header();
	?>
  <body>
    <main>
      <div class="hero-background" style=" background: url(   <?php  the_post_thumbnail_url('single-post-thumbnail'); 

?> )">

   
        <h1>Hello, World!</h1>
      </div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <p class="text-center mb-0">
             
            <?php
                       if( have_posts() ){

                        while(have_posts()) {

                          the_post(); 
                          the_content(); 
                          

                        }
                       }
  ?>
            

            </p>
          </div>
        </div>
        <div class="news mb-5">
<?php
        query_posts(array(
   'post_type' => 'news'
)); ?>
          
       
        

          <h3 class="text-center mb-4">Recent News</h3>
          <div class="row">

          <?php

          $i=0;
          
          
          while (have_posts() &&  $i < 4 ) : the_post();   ?>
                
              <?php  $i +=1;  ?>


            <article class="col-md-3">
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt(); ?></p>
              </p>
            </article>
            <?php endwhile;  ?>
           
         
          </div>
        </div>

        <?php
      query_posts(array(
   'post_type' => 'post',
   'meta_key'   => 'product_featured',
   'meta_value' => 'on'
)); ?>



<div class="news mb-5">
          <h3 class="text-center mb-4">Projects</h3>
          <div class="row">


<?php
while (have_posts()) : the_post();   ?>
                


               

<div class="col-lg text-center">
              <img src="<?php  the_post_thumbnail_url('single-post-thumbnail'); 

?>" class="img-fluid mb-2" alt="" />
              <h6><?php the_title(); ?></h6>
            </div>


<?php endwhile;  ?>


</div>
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
