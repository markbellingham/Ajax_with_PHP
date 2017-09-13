<?php
// You can simulate a slow server with sleep
sleep(2);

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

// Typically, this would be a call to a database
function find_blog_posts($page) {
  $first_post = 101;
  $per_page = 3;
  $offset = (($page - 1) * $per_page) + 1;

  $blog_posts = [];
  // This is our fake database
  for($i = 0; $i < $per_page; $i++) {
    $id = $first_post - 1 + $offset + $i;
    $blog_post = [
      'id' => $id,
      'title' => "Blog Post #{$id}",
      'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt augue sed diam sagittis maximus. Nunc justo eros, tempor a bibendum nec, efficitur aliquet enim. Sed quis eros neque. Aenean est arcu, tincidunt blandit blandit eget, semper id arcu. Fusce non sapien eget elit feugiat commodo. Curabitur vel odio nunc. Proin sit amet bibendum ex, fermentum posuere leo. Etiam facilisis venenatis nunc, nec vestibulum lacus faucibus in. In hac habitasse platea dictumst. Maecenas eu bibendum mi, non porttitor lacus. Curabitur at auctor ante. Sed efficitur arcu ornare tempor dictum. Nulla commodo risus lectus, at commodo arcu dapibus sit amet. Nunc finibus commodo sem vel bibendum. Ut eget facilisis lacus."
    ];
    $blog_posts[] = $blog_post;
  }
  return $blog_posts;
}

if(!is_ajax_request()) { exit; }

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$blog_posts = find_blog_posts($page);
?>

<?php foreach($blog_posts as $blog_post) { ?>
  <div id="blog-post-<?php echo $blog_post['id']; ?>" class="blog-post">
    <h3><?php echo $blog_post['title']; ?></h3>
    <p><?php echo $blog_post['content']; ?></p>
  </div>
<?php } ?>
