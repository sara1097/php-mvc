<!-- <h1>home<h1>

<h1> -->
<?php
//we manage the data sent to the view with its name in the array key

//  echo $title;
//  ?>
<!-- // </h1> 
// <h3><?php //echo $content ?></h3> -->

<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<div class="jumbotron text-center mt-5">
  <h1 class="display-4">LEARN PHP MVC</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg " href="<?php url('product') ?>" role="button">SHOW PRODUCTS</a>
</div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>