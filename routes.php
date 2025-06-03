<?php

$page = $_GET['page'] ?? 'dashboard';                 // Use 'dashboard' as default page
$page = str_replace(['..', "\0"], '', $page);        // sanitize input
$file = "pages/$page.php";                            // build path

if (file_exists($file)) {
    require $file;                                    // include the page file
} else {
    require 'pages/404.php';                          // include 404 if not found
}
