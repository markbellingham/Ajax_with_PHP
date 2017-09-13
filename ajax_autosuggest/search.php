<?php

$query = isset($_GET['q']) ? $_GET['q'] : '';

include('includes/header.php');

?>

<div id="page-content">
  <h1>Search results</h1>

  <p>
    You searched for: <strong><?php echo htmlspecialchars($query); ?></strong>
  </p>

</div> <!-- ends page-content -->

<?php include('includes/footer.php'); ?>
