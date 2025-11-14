<?php

include_once __DIR__ . '/config/autoload.php';
require_once __DIR__ . '/config/db.php';

if (isset($_POST['heroid'])) {
  echo $_POST['heroid'];
}