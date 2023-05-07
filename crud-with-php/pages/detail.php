<h2>detail page for</h2>
<!-- <p><?=verifyDatabaseId(getCurrentDatabaseId())?></p> -->

<p><?php echo isIdValid() === "true" ? "id:" . getCurrentDatabaseId() : "invalid id"; ?></p>


<p><a href="?page=update&id=<?=getCurrentDatabaseId()?>">update</a>   <a href="?page=delete">delete</a></p>
<!-- <?php formatData(getDatabase())?> -->
<!-- <?=verifyDatabaseId(getCurrentDatabaseId())?> -->
