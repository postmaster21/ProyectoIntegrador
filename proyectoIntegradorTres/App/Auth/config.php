<?php

  return

  array(
    "base_url" => "http://localhost/hydridauth.php",
    "providers" => array(
      "Twitter" => array(
        "enabled" => true,
        "keys" => array(
          "key" => "",
          "secret" => ""
        ),
        "includeEmail" => true
      ),
      "Facebook" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "2463748567177294",
          "secret" => "386d64ca437a39d6a7c695384fd893c6"
        ),
        "scope" => "email"
      ),
      "Google" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "",
          "secret" => ""
        )
      )
    )
  )

 ?>
