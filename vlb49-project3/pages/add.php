<?php

/**the confirmation is not visible */
$show_confirmation = False;


$genres = exec_sql_query($db, 'SELECT * FROM genres')->fetchAll();

define("MAX_FILE_SIZE", 1000000);

/**feedback */
$feedback = array(
  'title' => '',
  'artist' => '',
  'number' => '',
  'date' => '',
  'genre' => '',
  'descr' => '',
  'cover' => ''
);

/**form values */
$formvalues = array(
  'albumtitle' => '',
  'albumartist' => '',
  'numsongs' => '',
  'releasedate' => '',
  'descr' => '',
  'Pop' => '',
  'Hip Hop' => '',
  'Alternative Hip Hop' => '',
  'R&B' => '',
  'Trap' => '',
  'Jazz' => '',
  'Rock' => '',
  'Alternative Indie' => '',
  'Psychedelic' => '',

);

/**sticky values */
$stickyvalues = array(
  'title' => '',
  'artist' => '',
  'number' => '',
  'date' => '',
  'descr' => '',
  'cover' => '',
  'Pop' => '',
  'Hip Hop' => '',
  'Alternative Hip Hop' => '',
  'R&B' => '',
  'Trap' => '',
  'Jazz' => '',
  'Rock' => '',
  'Alternative Indie' => '',
  'Psychedelic' => '',
  'descr' => ''
);




if (isset($_POST['addalbum'])) {

  //pulling file info
  $uploaded_file = $_FILES['userfile'];
  $filebasename = basename($uploaded_file['name']);

  /**user values get put into form values */
  $formvalues['albumtitle'] = trim($_POST['albumtitle']);
  $formvalues['albumartist'] = trim($_POST['albumartist']);
  $formvalues['numsongs'] = trim($_POST['numsongs']);
  $formvalues['releasedate'] = trim($_POST['reldate']);
  /**checkboxes */
  $formvalues['Pop'] = (bool)$_POST['Pop'];
  $formvalues['Hip Hop'] = (bool)$_POST['Hip_Hop'];
  $formvalues['Alternative Hip Hop'] = (bool)$_POST['Alternative_Hip_Hop'];
  $formvalues['R&B'] = (bool)$_POST['R&B'];
  $formvalues['Trap'] = (bool)$_POST['Trap'];
  $formvalues['Jazz'] = (bool)$_POST['Jazz'];
  $formvalues['Rock'] = (bool)$_POST['Rock'];
  $formvalues['Alternative Indie'] = (bool)$_POST['Alternative_Indie'];
  $formvalues['Psychedelic'] = (bool)$_POST['Psychedelic'];

  $formvalues['descr'] = trim($_POST['descr']);

  $form_valid = True;


  /**If no value is entered -> feedback + form is false */
  if ($formvalues['albumtitle'] == '') {
    $form_valid = False;
    $feedback['title'] = "Please enter the title of the album.";
  }

  if ($formvalues['albumartist'] == '') {
    $form_valid = False;
    $feedback['artist'] = "Please enter the album artist.";
  }

  if ($formvalues['numsongs'] == '') {
    $form_valid = False;
    $feedback['number'] = "Please enter the number of tracks on the album.";
  }

  if ($formvalues['releasedate'] == '') {
    $form_valid = False;
    $feedback['date'] = "Please enter the date the album was released.";
  }

  if (
    !$formvalues['Pop'] &&
    !$formvalues['Hip Hop'] &&
    !$formvalues['Alternative Hip Hop'] &&
    !$formvalues['R&B'] &&
    !$formvalues['Trap'] &&
    !$formvalues['Jazz'] &&
    !$formvalues['Rock'] &&
    !$formvalues['Alternative Indie'] &&
    !$formvalues['Psychedelic']
  ) {
    $form_valid = False;
    $feedback['genre'] = "Please enter at least one genre for the album.";
  }


  if ($formvalues['descr'] == '') {
    $form_valid = False;
    $feedback['descr'] = "Please enter a description of the album.";
  }

  if (empty($uploaded_file)) {
    $form_valid = False;
    $feedback['cover'] = "Please upload a .JPEG file for your album cover.";
  }


  /**If form is valid -> enter values in database */

  if ($form_valid) {
    $show_confirmation = True;

    $insert_alumbs = exec_sql_query(
      $db,
      "INSERT INTO albums(title, artist, num_songs, reldate, descr) VALUES (:newtitle, :newartist, :newnum, :newdate, :newdescr);",
      array(
        ':newtitle' => $formvalues['albumtitle'],
        ':newartist' => $formvalues['albumartist'],
        ':newnum' => $formvalues['numsongs'],
        ':newdate' => $formvalues['releasedate'],
        ':newdescr' => $formvalues['descr']
      )
    );

    //define last album id
    $last_album_id = $db->lastInsertId('albums.id');


    //if genre was selected, enter into data base
    if ($formvalues['Pop'] == True) {
      $genreid1 = (int)$_POST['Pop'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid1
        )
      );
    }

    if ($formvalues['Hip Hop'] == True) {
      $genreid2 = (int)$_POST['Hip_Hop'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid2
        )
      );
    }

    if ($formvalues['Alternative Hip Hop'] == True) {
      $genreid3 = (int)$_POST['Alternative_Hip_Hop'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid3
        )
      );
    }

    if ($formvalues['R&B'] == True) {
      $genreid4 = (int)$_POST['R&B'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid4
        )
      );
    }

    if ($formvalues['Trap'] == True) {
      $genreid5 = (int)$_POST['Trap'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid5
        )
      );
    }

    if ($formvalues['Jazz'] == True) {
      $genreid6 = (int)$_POST['Jazz'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid6
        )
      );
    }

    if ($formvalues['Rock'] == True) {
      $genreid7 = (int)$_POST['Rock'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid7
        )
      );
    }

    if ($formvalues['Alternative Indie'] == True) {
      $genreid8 = (int)$_POST['Alternative_Indie'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid8
        )
      );
    }

    if ($formvalues['Psychedelic'] == True) {
      $genreid9 = (int)$_POST['Psychedelic'];
      exec_sql_query(
        $db,
        "INSERT INTO album_tags(album_id, genre_id) VALUES (:albumid, :genre_id);",
        array(
          ':albumid' => $last_album_id,
          ':genre_id' => $genreid9
        )
      );
    }


    //create album path
    $last_album_path = 'public/uploads/albums/' . $last_album_id . '.' . 'jpeg';

    //move from temp location to new
    move_uploaded_file($uploaded_file["tmp_name"], $last_album_path);



    //if form not valid, keep sticky values
  } else {
    $stickyvalues['title'] = $formvalues['albumtitle'];
    $stickyvalues['artist'] = $formvalues['albumartist'];
    $stickyvalues['number'] = $formvalues['numsongs'];
    $stickyvalues['date'] = $formvalues['releasedate'];
    $stickyvalues['Pop'] = ($formvalues['Pop'] ? 'checked' : '');
    $stickyvalues['Alternative Hip Hop'] = ($formvalues['Alternative Hip Hop'] ? 'checked' : '');
    $stickyvalues['R&B'] = ($formvalues['R&B'] ? 'checked' : '');
    $stickyvalues['Trap'] = ($formvalues['Trap'] ? 'checked' : '');
    $stickyvalues['Jazz'] = ($formvalues['Jazz'] ? 'checked' : '');
    $stickyvalues['Rock'] = ($formvalues['Rock'] ? 'checked' : '');
    $stickyvalues['Alternative Indie'] = ($formvalues['Alternative Indie'] ? 'checked' : '');
    $stickyvalues['Psychedelic'] = ($formvalues['Psychedelic'] ? 'checked' : '');
    $stickyvalues['descr'] = $formvalues['descr'];
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all">

  <title>New Album</title>
</head>


<body class="addpage">

  <header class="login2">
    <h3><a href="/?logout=">Sign out</a></h3>
  </header>

  <header class="home2">
    <h1><a href="/">Albums</a></h1>
  </header>

  <?php if ($show_confirmation) { ?>
    <div class="confirmation">
      <h2>You're all set!</h2>
      <p>Thank you. Your album has been added to the home page.</p>
      <a href="/">Go back to home page</a>
    </div>
  <?php } ?>

  <section class="addform">

    <h2>Add an album!</h2>

    <form id="add-form" action="/add-album" method="post" enctype="multipart/form-data">



      <div class="feedback"><?php echo $feedback['title']; ?></div>
      <div class="label">
        <label for="title">Title of Album:</label>
        <input type="text" id="title" name="albumtitle" value=' <?php echo $stickyvalues['title']; ?>'>
      </div>

      <div class="feedback"><?php echo $feedback['artist']; ?></div>
      <div class="label">
        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="albumartist" value='<?php echo $stickyvalues['artist']; ?>'>
      </div>

      <div class="feedback"><?php echo $feedback['number']; ?></div>
      <div class="label">
        <label for="number">Number of Tracks:</label>
        <input type="number" id="number" name="numsongs" value='<?php echo $stickyvalues['number']; ?>'>
      </div>

      <div class="feedback"><?php echo $feedback['date']; ?></div>
      <div class="label">
        <label for="date">Release Date:</label>
        <input type="date" id="date" name="reldate" value='<?php echo $stickyvalues['date']; ?>'>
      </div>



      <div class="genrelabel">Genre of the album: (You may select more than one)</div>
      <?php foreach ($genres as $genre) { ?>

        <div class="choice">
          <label for="<?php echo $genre['genre_name'] ?>"><?php echo $genre['genre_name'] ?></label>
          <input type="checkbox" id="<?php echo $genre['genre_name'] ?>" name="<?php echo $genre['genre_name'] ?>" value="<?php echo $genre['id'] ?>">
        </div>
      <?php } ?>




      <div class="feedback"><?php echo $feedback['descr']; ?></div>
      <div class="label">
        <label for="description">Album Description:</label>
        <input type="type" id="description" name="descr" value='<?php echo $stickyvalues['descr']; ?>'>
      </div>



      <input type="hidden" name="MAX_FILE_SIZE" value="1000000">


      <div class="coverlabel">
        <h3>Upload Album Cover</h3>
        <p>Only accepts .jpeg file extentions</p>
      </div>
      <div class="imagelabel">
        <label for="albumupload">Album Cover:</label>
        <input type="file" id="albumupload" name="userfile" accept=".jpeg">
      </div>


      <div class="submit">
        <input type="submit" id="addalbum" name="addalbum" value="Add Album">
      </div>


    </form>


  </section>



</body>
