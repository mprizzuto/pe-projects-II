<h1>efp with ES modules</h1>
<h2 class="exercise-title">shopping cart</h2>
<p>enter items and quantity into the shopping cart</p>
<?php echo var_dump($_GET)?>
<?php require_once "./components/forms/shopping-cart-form.php"; ?>

<ul id="shopping-item-list"></ul>