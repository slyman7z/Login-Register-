<?php
require 'includes/header.php';
?>
<div>
    <h1>login</h1>
    <p>No account? <a href="register.php">Register Here</a> </p>

    <form action="includes/login-inc.php" method="post">
        <input type="text" name="username" id="" placeholder="Username...">
        <input type="password" name="password" id="" placeholder="password">
        <button type="submit" name="submit">Login</button>
    </form>

</div>

<?php
require 'includes/footer.php'
?>