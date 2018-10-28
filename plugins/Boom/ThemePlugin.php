<?php

/**
 * Plugin Name: Boom
 * Version: 1.0
 * Author: YesTech
 * Author uri: https://t.me/drKeinakh
 */

require_once "includes/functions.php";
require_once "Boom.php";

global $Boom;
$Boom = new Boom();

function BoomActivation()
{
    global $Boom;
    $Boom = new Boom();
}

//BoomActivation();