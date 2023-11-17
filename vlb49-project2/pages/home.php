<?php


//default no confirmation
$show_confirmation = False;

//hidden feedbacks
$feedbackerror = array(
  'name' => '',
  'behavior' => '',
  'health' => '',
  'breed' => '',
  'damage' => '',
  'droppings' => ''
);


$form_values = array(
  'name' => '',
  'behavior' => '',
  'health' => '',
  'breedable' => '',
  'damage' => '',
  'droppings' => ''
);



//sticky values
$sticky_values = array(
  'mobname' => '',
  'passive' => '',
  'neutral' => '',
  'hostile' => '',
  'health' => '',
  'yes' => '',
  'no' => '',
  'damage' => '',
  'droppings' => ''
);



const IS_BREEDABLE = array(
  1 => 'Yes',
  2 => 'No'
);


const MOB_BEHAVIOR = array(
  1 => 'Passive',
  2 => 'Neutral',
  3 => 'Hostile'
);




// open database
$db = open_sqlite_db('secure/site.sqlite');







//if form was submitted\
$help = isset($_POST['addmob']);

if (isset($_POST['addmob'])) {


  //user data
  $form_values['name'] = trim($_POST['name']);
  $form_values['behavior'] = trim($_POST['behavior']);
  $form_values['health'] = trim($_POST['health']);
  $form_values['breedable'] = trim($_POST['breedable']);
  $form_values['damage'] = trim($_POST['damage']);
  $form_values['droppings'] = trim($_POST['droppings']);


  //assume form is valid
  $form_valid = True;


  if ($form_values['name'] == ''){
    $form_valid= False;
    $feedbackerror['name'] = "Please enter the name of the mob.";

  }


  if ($form_values['behavior'] == '') {
    $form_valid = False;
    $feedbackerror['behavior'] = 'Please choose the behavior of the mob.';
  }


  if ($form_values['health'] == '') {
    $form_valid = False;
    $feedbackerror['health'] = 'Please enter the amount of health the mob has.';
  }


  if ($form_values['breedable'] == '') {
    $form_valid = False;
    $feedbackerror['breedable'] = 'Please answer if the mob is breedable or not.';
  }


  if ($form_values['damage'] == '') {
    $form_valid = False;
    $feedbackerror['damage'] = 'Please enter the amount of damage from the mob.';
  }


  if ($form_values['droppings'] == '') {
    $form_valid = False;
    $feedbackerror['droppings'] = 'Please enter the different droppings of the mob,
    sepereated by a comma and space.';
  }


  //if everything is valid
  if ($form_valid) {
    $show_confirmation = True;
    $result = exec_sql_query(
      $db,
      "INSERT INTO mobs(mob_name, behavior, health, breedable, damage, droppings) VALUES (:names,:mobbehavior, :mobhealth, :mobbreedable, :mobdamage, :mobdroppings);",
      array(
        ':names' => $form_values['name'],
        ':mobbehavior' => $form_values['behavior'],
        ':mobhealth' => $form_values['health'],
        ':mobbreedable' => $form_values['breedable'],
        ':mobdamage' => $form_values['damage'],
        ':mobdroppings' => $form_values['droppings']
      )
    );

  } else {
    //make variables for the current data
    $sticky_values['mobname'] = $form_values['name'];
    $sticky_values['passive'] = ($form_values['behavior'] == 'passive' ? 'checked' : '');
    $sticky_values['neutral'] = ($form_values['behavior'] == 'neutral' ? 'checked' : '');
    $sticky_values['hostile'] = ($form_values['behavior'] == 'hostile' ? 'checked' : '');
    $sticky_values['health'] = $form_values['health'];
    $sticky_values['yes'] = ($form_values['breedable'] == 'yes' ? 'checked' : '');
    $sticky_values['no'] = ($form_values['breedable'] == 'no' ? 'checked' : '');
    $sticky_values['damage'] = $form_values['damage'];
    $sticky_values['droppings'] = $form_values['droppings'];
  }


}

// query grades table
$result = exec_sql_query($db, 'SELECT * FROM mobs;');


// get records from query
$records = $result->fetchAll();




?>


<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />


  <title>Minecraft</title>


  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all">
</head>


<body>

  <?php if ($show_confirmation) { ?>
    <section class="confirm">

      <h2>Your request has been recieved.</h2>
      <p>Thank you for adding your mob!</p>
      <p>Your mob is a
        <?php echo htmlspecialchars($form_values['name']); ?> with a
      </p>
      <ul>
        <li>Behavior as:
          <?php echo htmlspecialchars(MOB_BEHAVIOR[$form_values['behavior']]); ?>
        </li>
        <li>Health of:
          <?php echo htmlspecialchars($form_values['health']); ?>
        </li>
        <li>Breedable:
          <?php echo htmlspecialchars(IS_BREEDABLE[$form_values['breedable']]); ?>
        </li>
        <li>Damage of:
          <?php echo htmlspecialchars($form_values['damage']); ?>
        </li>
        <li>Drops:
          <?php echo htmlspecialchars($form_values['droppings']); ?>
        </li>
      </ul>

    </section>
  <?php } ?>


  <section class="table">

    <div class="header">
      <img src="/images/grassblock.jpg" id='block' alt="">
      <h1>Minecraft Mobs</h1>
    </div>

    <table>
      <tr>
        <th>Mob Name</th>
        <th>Behavior</th>
        <th>Health</th>
        <th>Breedable?</th>
        <th>Damage</th>
        <th>Drops</th>
      </tr>
      <?php foreach ($records as $record) { ?>
        <tr>
          <td>
            <?php echo htmlspecialchars($record['mob_name']); ?>
          </td>
          <td>
            <?php echo htmlspecialchars(MOB_BEHAVIOR[$record['behavior']]); ?>
          </td>
          <td>
            <?php echo htmlspecialchars($record['health']); ?>
          </td>
          <td>
            <?php echo htmlspecialchars(IS_BREEDABLE[$record['breedable']]); ?>
          </td>
          <td>
            <?php echo htmlspecialchars($record['damage']); ?>
          </td>
          <td>
            <?php echo htmlspecialchars($record['droppings']); ?>
          </td>
        </tr>
      <?php } ?>
    </table>

  </section>


  <p id="cite">Image and information from <cite>Source: <a href="https://minecraft.fandom.com/">Minecraft
        Wiki</a></cite></p>

  <section class="form">


    <h2>Add a mob!</h2>
    <p>Have a mob in mind that you don't see?</p>
    <p id="second">Fill out the form below with the proper information to add it into the list.</p>


    <form id="addform" action="/" method="post" novalidate>


    <div class="feedback"><?php echo $feedbackerror['name']; ?></div>
      <div class="label">
        <label for="mobname" class="question">Name of mob:</label>
        <input type="text" name="name" id="mobname" value="<?php echo $sticky_values['mobname']; ?>">
      </div>



      <div class="feedback"><?php echo $feedbackerror['behavior']; ?></div>
      <div class="behaviortitle question">Behavior of the mob:</div>


      <div class="choice">
        <label for="passiveinput">Passive</label>
        <input type="radio" id="passiveinput" name="behavior" value="1" <?php echo $sticky_values['passive']; ?>>
      </div>
      <div class="choice">
        <label for="neutralinput">Neutral</label>
        <input type="radio" id="neutralinput" name="behavior" value="2" <?php echo $sticky_values['neutral']; ?>>
      </div>
      <div class="choice">
        <label for="hostileinput">Hostile</label>
        <input type="radio" id="hostileinput" name="behavior" value="3" <?php echo $sticky_values['hostile']; ?>>
      </div>



      <div class="feedback"><?php echo $feedbackerror['health']; ?></div>
      <div class="label">
        <label for="healthinput" class="question">Enter the health of the mob:</label>
        <input type="number" id="healthinput" name="health" value="<?php echo $sticky_values['health']; ?>">
      </div>


      <div class="feedback"><?php echo $feedbackerror['breedable']; ?></div>
      <div class="breedtitle question">Is the mob breedable?</div>
      <div class="choice">
        <label for="yesinput">Yes</label>
        <input type="radio" id="yesinput" name="breedable" value="1" <?php echo $sticky_values['yes']; ?>>
      </div>
      <div class="choice">
        <label for="noinput">No</label>
        <input type="radio" id="noinput" name="breedable" value="2" <?php echo $sticky_values['no']; ?>>
      </div>



      <div class="feedback"><?php echo $feedbackerror['damage']; ?></div>
      <div class="label">
        <label for="damageinput" class="question">Enter the amount of damage the mob does:</label>
        <input type="number" id="damageinput" name="damage" value="<?php echo $sticky_values['damage']; ?>">
      </div>

      <div class="feedback"><?php echo $feedbackerror['droppings']; ?></div>
      <div class="label">
        <label for="droppinginput" class="question">List the mob droppings:</label>
        <input type="text" id="droppinginput" name="droppings" value="<?php echo $sticky_values['droppings']; ?>">
      </div>


      <div class="submit">
        <input type="submit" id='addmob' name="addmob" value="Add Mob">
      </div>

    </form>
  </section>





</body>


</html>
