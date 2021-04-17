<?php

if ($_SERVER['PHP_AUTH_PW']!= "pas" || $_SERVER['PHP_AUTH_USER']!= "user") {
    Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
    Header ("HTTP/1.0 401 Unauthorized");
    exit();
}
