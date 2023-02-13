index.php
<?php include "utilities.php"; ?>

<?php 
$page = currentPage();
?>

<p><?=queryString();?></p>

<?php renderPageTemplate(currentPage()); ?>