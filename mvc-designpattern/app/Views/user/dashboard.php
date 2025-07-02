<?php  include(VIEWS.'inc'.DS.'header.php'); 

session_start();
?>

<div class="jumbotron text-center mt-5">
  <h1 class="display-4">LEARN PHP MVC</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg " href="<?php url('product') ?>" role="button">SHOW PRODUCTS</a>
</div>

<?php if (isset($_SESSION['user_id'])): ?>
    <h1>wlcome <?php echo($_SESSION['user_email']); ?></h1>
    <a class="btn btn-warning" href="<?= url('login/editAccount') ?>" role="button">Edit Account</a>
    <a class="btn btn-danger" href="<?= url('login/deleteAccount') ?>" role="button" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</a>
    <a type="button" class="btn btn-primary" href="<?= url('login/logout') ?>" role="button">Logout</a>
<?php else: ?>
<h1>login first</h1>
<a type="button" class="btn btn-primary" href="<?= url('login/show') ?>" role="button">Login</a>
    <a type="button" class="btn btn-primary" href="<?= url('register/show') ?>" role="button">Register</a>
<?php endif; ?>


<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>