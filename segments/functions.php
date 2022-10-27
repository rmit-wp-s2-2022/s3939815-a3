<?php

function curl_https($url, $data = array(), $header = array(), $timeout = 30)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

    $response = curl_exec($ch);

    if ($error = curl_error($ch)) {
        die($error);
    }
    curl_close($ch);

    return $response;
}


function validate_courseid($courseid)
{
    if (empty($courseid)) {
        return "Course ID is required";
    } else {
        $courseidnew = test_input($courseid);
        if (!preg_match("/^COSC\d{4}$/", $courseidnew)) {
            return "Must start with COSC and be followed by 4 digits";
        }
    }
    return "";
}

function validate_title($title)
{
    if (empty($title)) {
        return "Title is required";
    } else {
        $titlenew = test_input($title);
        if (!preg_match("/^[A-Z][A-Za-z0-9\s]*$/", $titlenew)) {
            return "Must start with an upper-case letter and only contain letters, numbers and spaces";
        }
    }
    return "";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
