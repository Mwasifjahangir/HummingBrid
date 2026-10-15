<?php
switch (ENV) {
    case "PRODUCTION":
        require_once 'config.production.php';
        break;
    case "QUALITY": 
        require_once 'config.quality.php';
        break;
}