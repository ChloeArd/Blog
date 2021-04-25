<?php
session_start();
// We destroy the variables of our session.
session_unset();
// We destroy our session.
session_destroy();

header("Location: ../../View/home.view.php?success=1");