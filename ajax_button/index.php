<?php
session_start();

// $_SESSION['favourites'] = [];
if(!isset($_SESSION['favourites'])) { $_SESSION['favourites'] = []; }

function is_favourite($id) {
  return in_array($id, $_SESSION['favourites']);
}
?>

<!doctype html>
<hrml lang="en">
  <head>
    <meta charset="utf-8">
    <title>Asynchronous Button</title>
    <style>
    #blog-posts {
      width: 700px;
    }
    .blog-post {
      border: 1px solid black;
      margin: 10px 10px 20px 10px;
      padding: 6px 10px;
    }

    button.favourite-button {
      background: #0000FF;
      color: white;
      text-align: center;
    }
    button.favourite-button:hover {
      background: #000099;
    }

    .favourite-heart {
      color: red;
      font-size: 2em;
      float: right;
      display: none;
    }
    .favourite .favourite-heart {
      display: block;
    }
    </style>
  </head>
  <body>
    <div id="blog-posts">
      <div id="blog-post-101" class="blog-post <?php if(is_favourite(101)) { echo 'favourite'; } ?> ">
        <span class="favourite-heart">&hearts;</span>
        <h3>Blog Post 101</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mollis ut erat vel tincidunt. Vestibulum vitae vestibulum justo. Nulla feugiat lorem magna, sed rutrum velit hendrerit a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas faucibus purus tellus, quis euismod ante volutpat in. Praesent viverra maximus sem ut faucibus. Nulla in diam in mi aliquam faucibus. Fusce non elit dui. Vestibulum tempus tempus dolor, eget mollis turpis finibus non. Ut eu nibh nunc. Nullam sed vestibulum lorem. Donec lacinia auctor lectus. Nunc euismod, urna vel imperdiet ornare, lacus dui auctor ipsum, ultricies sodales leo lorem non diam. Nullam posuere vulputate nisl quis ornare.
        </p>
        <button class="favourite-button">Favourite</button>
      </div> <!-- ends blog-post-101 -->
      <div id="blog-post-102" class="blog-post <?php if(is_favourite(102)) { echo 'favourite'; } ?> ">
        <span class="favourite-heart">&hearts;</span>
        <h3>Blog Post 102</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi interdum libero a libero malesuada, at semper felis scelerisque. Vestibulum lacinia tempus mi, in ornare lorem commodo ac. Praesent id nulla augue. Morbi tempus vitae dui ac gravida. Quisque placerat ornare placerat. Maecenas tincidunt gravida blandit. Nulla iaculis enim ac imperdiet eleifend. Vestibulum luctus mattis felis. Nulla facilisi. Sed tempus euismod turpis, ac consectetur magna fermentum vitae.
        </p>
        <button class="favourite-button">Favourite</button>
      </div> <!-- ends blog-post-102 -->
      <div id="blog-post-103" class="blog-post <?php if(is_favourite(103)) { echo 'favourite'; } ?> ">
        <span class="favourite-heart">&hearts;</span>
        <h3>Blog Post 103</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida massa dictum urna pulvinar, at interdum libero ultricies. Suspendisse elementum ipsum id vulputate efficitur. Quisque suscipit iaculis diam, vel consectetur tellus porta viverra. Nunc sodales sed ipsum ut dictum. Maecenas ac lacinia odio. Phasellus posuere efficitur ipsum quis dictum. Sed elementum fringilla nunc, a rhoncus nulla pellentesque vitae. Nullam non finibus leo, et aliquam tellus. Fusce sed tempus dui. Morbi finibus vel erat a elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis varius cursus ultrices. Nam varius massa quis nulla congue dapibus. Suspendisse rutrum consequat eros, nec placerat nulla tempor ut.
        </p>
        <button class="favourite-button">Favourite</button>
      </div> <!-- ends blog-post-103 -->
    </div> <!-- ends blog-posts -->


    <script>
    function favourite() {
      var parent = this.parentElement;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'favourite.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
          var result = xhr.responseText;
          console.log('Result: ' + result);
          if(result == 'true') {
            parent.classList.add("favourite");
          }
        }
      };
      xhr.send("id=" + parent.id);
    }

    var buttons = document.getElementsByClassName("favourite-button");
    for(i=0; i < buttons.length; i++) {
      buttons.item(i).addEventListener("click", favourite);
    }

    </script>

  </body>
</html>
