<?php
session_start();

if(!isset($_SESSION['favourites'])) { $_SESSION['favourites'] = []; }

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()) { exit; }

$raw_id = isset($_POST['id']) ? $_POST['id'] : '';

echo $raw_id;

?>
