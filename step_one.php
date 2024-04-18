<?php 
// Require header.inc.php from includes
require('includes/header.inc.php'); 
?>

		<hr>
		<p>In the League of Heroes, everyone finds their inner strength and teams up with their favorite hero to defeat bad guys. Together, we create exciting adventures where good always triumphs over evil!</p>

			<form action="step_two.php" method="post">
				<?php 
				// This if statement states: if "errors" is set in the url ()
				if (isset($_GET['errors'])) { 
					// Display a warning message: 
					echo '<div class="input-row warning-msg">';
					echo '<p>Sorry, we can\'t turn you into a crime-fighting sidekick without all of the information. Try again!</p>';
					echo '<p> Also, make sure your bio is under 64 characters for the best experience!</p>';
					echo '</div>';
				}
				?>

				<div class="input-row">
					<label for="first_name">Sidekick Name:</label>
					<input type="text" name="user_name" id="first_name" placeholder="Enter your first name">
				</div>
				<div class="input-row">
					<label for="first_name">Favourite Hero:</label>
					<select class="input-selection" name="user_hero">
						<option value="brainio">Brainio</option>
						<option value="clamp">Clamp</option>
						<option value="dr_goliath">Dr Goliath</option>
						<option value="power_maiden">Power Maiden</option>
						<option value="ironjaw">Ironjaw</option>
						<option value="shroud">Shroud</option>
					</select>
				</div>
				<div class="input-row">
					<label for="bio">Sidekick Bio: </label>
					<textarea name="user_bio" id="bio" maxlength="140" placeholder="Enter your bio (64 characters or less)"></textarea>
				</div>
				<div class="input-row">
					<input type="submit" value="Select Sidekick">
					<input type="reset" value="Reset">
				</div>
			</form>





<?php 
// Require footer.inc.php from includes
require('includes/footer.inc.php'); 
?>


