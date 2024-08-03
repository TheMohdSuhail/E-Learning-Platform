<?php

echo '<div id="profileModal">
<div id="profileModalContent">
    <h2>User Profile</h2>';?>
    <?php
    // Display user details if logged in
    if (isset($_SESSION["user_id"])) {
        echo '<p>User details go here.</p>';
    }
    ?>
    <?php echo'
    <button class="Sign" onclick="logout()">Log Out</button>
</div>
</div>';

?>