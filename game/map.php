<?php

require_once '../includes/auth.php';

require_once '../includes/layout_start.php';
?>
        
<div class="vilagterkep">
    <img src="../assets/images/locations/terkep.png" class="terkep" alt="Világtérkép">

    <form action="../game/location_select.php" method="POST">
        <button type="submit" name="location"
                value="swamp" class="helyszin mocsar"
                title="Mocsár">
        </button>

        <button type="submit" name="location"
                value="forest" class="helyszin erdo"
                title="Erdő">
        </button>
    </form>
</div>

    
<?php
require_once '../includes/layout_end.php';
?>