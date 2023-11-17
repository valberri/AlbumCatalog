<?php
 /**access genre table**/
$genres = exec_sql_query($db, 'SELECT * FROM genres')->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all">

  <title>Albums</title>
</head>

<body>

<?php include('includes/header.php'); ?>


  <section class="home">

  <form class="select" action="/" method="get">
    <h2>Filter by genre:</h2>
      <div class="choices">
      <?php foreach($genres as $genre){ ?>
        <div class="choice">
        <input type="radio" id="filter" name="genre"
        value='<?php echo $genre['id']; ?>'>
        <label for="filter"><?php echo $genre['genre_name']; ?></label>
        </div>
      <?php } ?>
      </div>


  <div class="submit">
  <input type="submit" id="submit2" name="submit" value="Filter">
    </div>
  </form>

  <?php

  /**if the form is submitted */
  if (isset($_GET['submit'])){
    $genreid = $_GET['genre'];
    $result = exec_sql_query($db,
    "SELECT albums.title AS 'albums.title',
    albums.id AS 'albums.id'
    FROM albums INNER JOIN 'album_tags' ON (albums.id = album_tags.album_id)
    WHERE (album_tags.genre_id = :genreid)",
    array(
      ":genreid" => $genreid
    )
    );
  }
  /**if form isn't submitted */
  else {
    $result = exec_sql_query($db,
    "SELECT
    albums.title AS 'albums.title',
    albums.id AS 'albums.id'
    FROM albums ORDER BY albums.id DESC"
    );
  }

  //**display albums whether or not filter is chosen */
  $records = $result->fetchAll();

?>


  <ul>

    <?php foreach ($records as $record) {
      $file='/public/uploads/albums/' . $record['albums.id'] . '.' . 'jpeg';
    ?>

      <li class="catalog">
        <a href='/details?<?php echo http_build_query(array('id' => $record['albums.id'])); ?>'>
          <div class="image">
            <img src="<?php echo htmlspecialchars($file); ?>" alt= "<?php echo htmlspecialchars($record['albums.title']); ?>">
          </div>

          <div class="title">
            <p id="first"><?php echo htmlspecialchars($record["albums.title"]); ?>
            <p id="second">Source: <cite><a href="https://www.wikipedia.org/">Wikepedia</a></cite></p>
          </div>
        </a>
      </li>

    <?php } ?>

  </ul>

  </section>



</body>

</html>
