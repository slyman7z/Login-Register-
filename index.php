<?php
require 'includes/header.php';
?>
<?php
if (isset($_SESSION['sessionId'])) {
    echo "You are logged in";
} else {
    echo "Home";
}
?>

<?php
require 'includes/footer.php'
?>