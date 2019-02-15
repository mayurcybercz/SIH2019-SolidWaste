<?php 

// include_once 'default-header.php';

?>
<p> User signup</P>
<section class="main-container">
	<div class="main-wrapper">
		<form class="signup-form" action="../includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
            <input type="email" name="email" placeholder="E-mail">
            <input type="number" name="mobile" placeholder="Mobile">
			<input type="text" name="uid" placeholder="Username">
			<input type="Password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>


	</div>
</section>

<?php 

// include_once 'default-footer.php';

?>