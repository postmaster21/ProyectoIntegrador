<?php

  require_once('vendor/autoload.php');

  if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
  {
    Hybrid_Endpoint::process();
  }

 ?>
