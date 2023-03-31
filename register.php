<?php
require 'includes/header.php';
?>
<div>
    <h1>Register</h1>
    <p> Already have an account? <a href="index.php">login Here</a> </p>

    <form action="includes/register-inc.php" method="POST">
        <input type="text" name="username" id="" placeholder="Username...">
        <input type="password" name="password" id="" placeholder="Password....">
        <input type="password" name="confirmPassword" id="" placeholder="Confirm Password...">
        <button type="submit" name="submit">Register</button>
    </form>
</div>

<?php
require 'includes/footer.php'
?>