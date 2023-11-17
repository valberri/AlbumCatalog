<?php
$genres = exec_sql_query($db, 'SELECT * FROM genres')->fetchAll();
$id = $_GET['id'];

$result = exec_sql_query(
  $db,
  "SELECT
    albums.id AS 'albums.id',
    albums.title AS 'albums.title',
    albums.artist AS 'albums.artist',
    albums.num_songs AS 'albums.num_songs',
    albums.reldate AS 'albums.reldate',
    albums.descr AS 'albums.descr'
    FROM album_tags INNER JOIN albums ON (albums.id = album_tags.album_id)
    INNER JOIN genres ON (album_tags.genre_id)
    WHERE (albums.id = :albumid)
    GROUP BY albums.id;",
  array(
    ':albumid' => $id
  )

);

$records = $result->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all">

  <title>Albums</title>
</head>


<?php
include('includes/header.php');
?>

<?php
foreach ($records as $record) {
  $file = '/public/uploads/albums/' . $id . '.' . 'jpeg';
?>

  <div class="details">
    <div class="cover">
      <img src="<?php echo htmlspecialchars($file); ?>" alt="<?php echo htmlspecialchars($record['albums.title']); ?>">
      <p id="second">Source: <cite><a href="https://www.wikipedia.org/">Wikepedia</a></cite></p>
    </div>

    <a href="/details?<?php echo http_build_query(array('id' => $record['albums.id'])); ?>"></a>

    <div class="info">

      <h3>Album Title: <?php echo htmlspecialchars($record['albums.title']); ?></h3>
      <h3>Album Artist: <?php echo htmlspecialchars($record['albums.artist']); ?></h3>
      <h3>Number of Tracks: <?php echo htmlspecialchars($record['albums.num_songs']); ?></h3>
      <h3>Release Date: <?php echo htmlspecialchars($record['albums.reldate']); ?></h3>
      <h3>Genre: <?php echo htmlspecialchars($record['genres.id']); ?></h3>
      <h3>Album Description: <?php echo htmlspecialchars($record['albums.descr']); ?></h3>

    </div>
  </div>
<?php } ?>







</div>
