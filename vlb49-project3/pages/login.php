<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all">

  <title>New Album</title>
</head>

<header class="home2">
    <h1><a href="/">Albums</a></h1>
</header>


<div class="loginspace">
<div class="loginbox">
<h2>Log in to add an album:</h2>
<?php
echo login_form('/', $session_messages);
?>
</div>
</div>
