

<?php if (is_user_logged_in()){ ?>

    <div class= "login2">
    <h3><a href="/?logout=">Sign out</a><h3>
    </div>

    <div class="home2">
  <h1><a href="/">Albums</a></h1>
   </div>

   <div class="add">
    <a href="/add-album"><img src = "/images/addicon.png" alt="Add"></a>
    <div id="addlink"><a href="/add-album">Add Album</a></div>
    </div>

<?php } else { ?>
    <header class="login2">
    <h3><a href='/login'>Login</a></h3>
    </header>

    <div class="home2">
  <h1><a href="/">Albums</a></h1>
   </div>
<?php } ?>
