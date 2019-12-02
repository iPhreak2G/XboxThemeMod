<?php

include('XboxOneThemeLib.php');

$theme = new XboxOneTheme();
$real_ip = $theme->get_client_ip();
$theme->get_client_color_by_ip($real_ip);

?>
