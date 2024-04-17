<?php 
// Require header.inc.php from includes
require('includes/header.inc.php'); 
?>

<?php
// Harvest and sanitize form data
// NOTE: htmlspecialchars - Convert special characters (e.g "<" , ">") to HTML entities
// Harvest username(user_name) from step_one.php via POST method and remove special characters, and store as "$username".
// Same for user bio from the form
$username = htmlspecialchars($_POST['user_name']);
$bio = htmlspecialchars($_POST['user_bio']);
// NOTE: str_replace("search","replace",$string) - replace search string with replacement string in $string
// Harvest favourite hero from step_one.php via POST method and replace underscore with white space, E.g. power_maiden => power maiden
$favourite_hero = str_replace("_"," ",$_POST['user_hero']);

// Test if data harvest working or not:
// echo d($username);
// echo d($favourite_hero);
// echo d($bio);

// Implement error handling
// This if statement states: if user_name OR user_bio from step_one.php is empty OR more than 64 characters from user_bio()
if ($_POST['user_name'] == "" || $_POST['user_bio'] == "" || strlen($_POST['user_bio']) > 65){
    // send a http header "header()" and redirect to step_one.php?errors ,which "errors" will be declared in the url
    header("location: step_one.php?errors");
    // NOTE: die() - terminate the script
    die();
}
?>

<!-- Option to restart the process at step one -->
<p class="restart-text">Not <?php echo "$username";?> ? Click <a href="step_one.php">here</a> to go back.</p>
<hr>


<!-- Display a personalized message -->
<h2>Welcome, <?php echo "$username";?></h2>
<p>Thank you for volunteering as a Sidekick for The League of Heroes. We're excited to have you on board with us and it seems like you and <?php echo "$favourite_hero";?> are ready for some new adventures! </p>

<?php
// Display a ‘superhero’ card 

// THIS WAS MY FIRST APPROACH BUT I THINK FOREACH LOOP WILL BE MORE EFFICIENT
// if ($favourite_hero == "brainio"){
//     $fav_hero_img = "<img src='img/brainio.png' alt='Favourite hero'>";
//     $fav_hero_bio = "This is brainio";
// } else if ($favourite_hero == "clamp"){
//     $fav_hero_img = "<img src='img/clamp.png'>";
//     $fav_hero_bio = "This is clamp";
// } else if ($favourite_hero == "dr goliath"){
//     $fav_hero_img = "<img src='img/dr-goliath.png'>";
// } else if ($favourite_hero == "power maiden"){
//     $fav_hero_img = "<img src='img/power-maiden.png'>";
// } else if ($favourite_hero == "ironjaw"){
//     $fav_hero_img = "<img src='img/ironjaw.png'>";
// } else if ($favourite_hero == "shroud"){
//     $fav_hero_img = "<img src='img/shroud.png'>";
// }

// THIS IS THE SECOND APPROACH
// Create 3 arrays : $hero_list, $hero_img_list, $hero_bio_list to store the heroes' name, images and bio.
$hero_list = [
    "brainio","clamp","dr goliath","power maiden","ironjaw","shroud"
];
$hero_img_list = [
    "img/brainio.png",
    "img/clamp.png",
    "img/dr-goliath.png",
    "img/power-maiden.png"
    ,"img/ironjaw.png",
    "img/shroud.png"
];
$hero_bio_list = [
    "Hi, I am brainio with big brain.",
    "This is Clamp, not crocodile.",
    "I am Dr Goliarg and I am blue!",
    "This is Power Maiden with pruple hair!",
    "This is Batman, kidding, I am Ironjaw.",
    "This is Shroud with a green mask.",
];

// NOTE: foreach() - loop through each item in the array
// This foreach loop states: loop through the $hero_list array, assign index number ($index) and value ($hero) to each array item 
// E.g [0] => brainio [1] => clamp [2] => dr goliath [3] => power maiden [4] => ironjaw [5] => shroud
foreach($hero_list as $index => $hero){
    // This if statement states: if value of $favourite_hero is equal to the value of $hero()
    if($favourite_hero == $hero){
        // Assign the corresponding hero image from $hero_img_list based on $index obtained to $fav_hero_img. Same for $fav_hero_bio.
        $fav_hero_img = $hero_img_list[$index];
        $fav_hero_bio = $hero_bio_list[$index];
    }
}
?>

<?php
// Display a ‘nemesis’ card 

// Create 3 arrays : $nemesis_name_list, $nemesis_img_list, $nemesis_bio_list to store the nemesis's name, images and bio.
$nemesis_name_list = [
    "EVIL MORTY",
    "ROBERTO",
    "SIDESHOW BOB"
];
$nemesis_img_list = [
    "img/nemesis_1.png",
    "img/nemesis_2.png",
    "img/nemesis_3.jpg"
];
$nemesis_bio_list = [
    "I'm not the one who's hurting Morty. I'm just the one who's making sure you stay hurt.",
    "I'm thinking of a number between one and ten - guess it, and you die first.",
    "Hello, Bart. And, Hello $username."
];

// NOTE: rand(min,max) - generate a random integer between min value and max value
// Generatena number from the range of 0 to 2 and assign to the variable $random_number
// Min is 0 beacuse an array starts at 0
$random_number = rand(0,2);

// Assign the value from $nemesis_name_list based on the index number ($random_number) to the variable $nemesis_name. Same for nemesis images ($nemesis_img) and bio ($nemesis_bio).
$nemesis_name = $nemesis_name_list[$random_number];
$nemesis_img = $nemesis_img_list[$random_number];
$nemesis_bio = $nemesis_bio_list[$random_number];
?>

<div class="card-container">
        <div class="card">
            <!-- Display a ‘sidekick’ card with username ($username) and bio ($bio) from stop_one.php -->
            <!-- NOTE : strtoupper($string) - turns a string uppercase, uppercase name feels more hero-ish -->
            <h2>SIDEKICK - <?php echo strtoupper($username);?></h2>
            <img src="img/tom-from-accounting.png" alt="Sidekick">
            <hr>
            <p><?php echo "$bio";?></p>
        </div>

        <!-- Display a ‘superhero’ card with each hero's name ($favourite_hero), image ($fav_hero_img) and bio ($fav_hero_bio)-->
        <div class="card">
            <h2>FAVOURITE HERO - <?php echo strtoupper($favourite_hero);?></h2>
            <img src="<?php echo "$fav_hero_img";?>" alt="Favourite hero">
            <hr>
            <?php echo "<p>$fav_hero_bio</p>";?>
        </div>

        <!-- Display a ‘nemesis’ card with each nemesis's name ($nemesis_name), image ($nemesis_img), bio (#nemesis_bio).  -->
        <div class="card">
            <h2>NEMESIS - <?php echo strtoupper($nemesis_name);?></h2>
            <img src="<?php echo "$nemesis_img";?>" alt="Nemesis">
            <hr>
            <?php echo "<p>$nemesis_bio</p>";?>
        </div>
</div>

<?php 
// Require footer.inc.php from includes
require('includes/footer.inc.php'); 
?>
