<?php

$button = new button();
$lines = load_variables_from_rfxcmd_log($rfxcmd_log);
if (!isset($lines)) {
    die;
} else {
    unset($lines[0]);
}

show("Pushed switch", $lines, false);

foreach ($lines as $key => $line) {
    eval($line);
}
