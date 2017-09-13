<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Infinite Scroll</title>
  <style>
  #blog-posts { width: 700px; }
  .blog-post {
    border: 1px solid black;
    margin: 10px 10px 20px 10px;
    padding: 6px 10px;
  }
  #spinner { display: none; }
  </style>
</head>
<body>
  <div id="blog-posts">
    <!-- <div id="blog-post-101" class="blog-post">
      <h3>Blog Post 101</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt augue sed diam sagittis maximus. Nunc justo eros, tempor a bibendum nec, efficitur aliquet enim. Sed quis eros neque. Aenean est arcu, tincidunt blandit blandit eget, semper id arcu. Fusce non sapien eget elit feugiat commodo. Curabitur vel odio nunc. Proin sit amet bibendum ex, fermentum posuere leo. Etiam facilisis venenatis nunc, nec vestibulum lacus faucibus in. In hac habitasse platea dictumst. Maecenas eu bibendum mi, non porttitor lacus. Curabitur at auctor ante. Sed efficitur arcu ornare tempor dictum. Nulla commodo risus lectus, at commodo arcu dapibus sit amet. Nunc finibus commodo sem vel bibendum. Ut eget facilisis lacus.
      </p>
    </div> <!-- ends blog-post-101 -->
    <!-- <div id="blog-post-102" class="blog-post">
      <h3>Blog Post 102</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget bibendum mauris. Sed viverra vestibulum faucibus. Cras pharetra lacinia libero, facilisis tincidunt mi consequat a. Cras efficitur sollicitudin velit sed vehicula. Nam ac mi tincidunt, venenatis nisl eu, venenatis risus. Proin diam ex, semper eu quam sed, tempor egestas nisi. Maecenas tincidunt gravida lacus, porta ullamcorper velit efficitur aliquet. Aenean volutpat nunc et diam ullamcorper efficitur. Phasellus erat nulla, egestas non erat sed, convallis venenatis sem. Integer tempus faucibus lectus, et finibus sapien malesuada quis. Vestibulum at dui dignissim justo rutrum condimentum quis pulvinar arcu. Phasellus et vehicula mi. Donec ut egestas lectus, a malesuada ante.
      </p>
    </div> <!-- ends blog-post-102 --> -->
    <!-- <div id="blog-post-103" class="blog-post">
      <h3>Blog Post 103</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam id turpis euismod sem malesuada molestie. Nunc finibus pulvinar risus, vel dapibus lorem ullamcorper non. Duis volutpat purus non volutpat tempor. Aenean dignissim eleifend risus, at mattis augue elementum consequat. Donec vitae augue convallis, venenatis enim sed, malesuada nulla. Fusce et leo velit. Sed a ligula vel libero pharetra sagittis quis vitae nunc. Praesent sit amet magna pellentesque, facilisis augue nec, fringilla turpis.
      </p>
    </div> <!-- ends blog-post-103 --> --> -->
  </div> <!-- ends blog-posts -->

  <div id="spinner">
    <img src="spinner.gif" width="50" height="50" />
  </div>

  <div id="load-more-container">
    <button id="load-more">Load more</button>
  </div>

  <script>

  var container = document.getElementById('blog-posts');
  var load_more = document.getElementById('load-more');

  function showSpinner() {
    var spinner = document.getElementById("spinner");
    spinner.style.display = 'block';
  }

  function hideSpinner() {
    var spinner = document.getElementById("spinner");
    spinner.style.display = 'none';
  }

  function showLoadMore() {
    load_more.style.display = 'inline';
  }

  function hideLoadMore() {
    load_more.style.display = 'none';
  }

  function loadMore() {

    showSpinner()
    hideLoadMore()

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'blog_posts.php?page=1', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        console.log('Result: ' + result);

        hideSpinner();
        // append results to end of blog posts
        showLoadMore();

      }
    };
    xhr.send();
  }

  load_more.addEventListener("click", loadMore);

  // Load even the first page with Ajax
  // loadMore();

  </script>
</body>
