<?php

/*

Template Name: Example Template

*/

?>

<div class="filter--sidebar">
  <input type="hidden" id="filters-category" />
  <input type="hidden" id="filters-creators" />

  <?php 
    // or use include_once('parts/filter-pricerange.php');
   

    get_template_part('parts/filter','categories');
  
    
  ?>
  
</div>

<?php
		get_header();
	?>
     <?php

      query_posts(array(
   'post_type' => 'post',
 
)); 


?>
<?php $categories = get_categories(); ?>
<ul class="cat-list">
  <li><a class="cat-list_item active" href="#!" data-slug="">All projects</a></li>

  <?php foreach($categories as $category) : ?>
    <li>
      <a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
        <?= $category->name; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>


  <body>


    <main class="mt-4">
      <div class="container">
        <div class="news mb-5">
          <h3 class="text-center mb-4">Projects</h3>
          <div class="row">

          <?php
while (have_posts()) : the_post();   ?>


            <article class="col-md-4 mb-3">
              <img src="<?php  the_post_thumbnail_url('single-post-thumbnail'); 

?>" class="img-fluid mb-2" alt="" />
              <h5><?php the_title(); ?></h5>
              <p class="mb-2">
              <?php the_content(); ?>
              </p>
              <p class="mb-2">Content:  <?php  echo(  get_post_meta(get_the_ID(),'product_content')[0] == "on" ? "on" : "off"   );  ?>  </p> 
              <p class="mb-2">client:   <?php  echo(  get_post_meta(get_the_ID(),'product_client')[0]  ); ?> </p>
              <p class="mb-2">Category: <?php  the_category();  ?></p>
              <p class="mb-2">Featured: <?php  echo(  get_post_meta(get_the_ID(),'product_featured')[0] == "on" ? "on" : "off"   );     ?></p>
              <!-- <div>
                <label for="featured"></label>
                <input type="checkbox" name="featured" />
              </div> -->
            </article>
        
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
