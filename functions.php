<?php

function show($mystring, $no_html = false) {
    if ($no_html) {
        echo ( print_r($mystring, true));
    } else {
        echo "<pre style='border: 1px rgb(229, 229, 229) solid; background: #FAFAFA; padding: 10px; color: gray; max-height: 200px; overflow: auto;'>" . print_r($mystring, true) . "</pre>";
    }
}

function write_to_log($logfile, $array) {
    file_put_contents($logfile, "\n" . date("Y-m-d h:i:sa") . "\n", FILE_APPEND);
    file_put_contents($logfile, print_r($array, true), FILE_APPEND);
}

function load_variables_from_rfxcmd_log($rfxcmd_log) {
    exec("grep -m 1 -n -a -i \"\-\-\-\-\-\" $rfxcmd_log | cut -d \":\" -f 1", $stdout_lines);

    if (count($stdout_lines) == 0) {
        exec("echo '------------------------------------------------' >> $rfxcmd_log");
        exec("grep -m 1 -n -a -i \"\-\-\-\-\-\" $rfxcmd_log | cut -d \":\" -f 1", $stdout_lines);
    }

    $numberoflines = $stdout_lines[0] * 1;
    unset($stdout_lines);

    exec("head -$numberoflines $rfxcmd_log", $stdout_lines);
    array_pop($stdout_lines);
    if (count($stdout_lines) > 0) {
        write_to_log($rfxcmd_log . ".log", $stdout_lines);
    }

    foreach ($stdout_lines as $key => $line) {
        $line = str_replace("-", "", $line);
        $line = str_replace("\t", "", $line);
        $line = str_replace(" ", "", $line);
        $line = str_replace("/", "", $line);
        $line = str_replace("=", "(\"", $line);
        $line = ucfirst($line);
        $line = '$button->set' . $line . "\");";
        $stdout_lines[$key] = $line;
    }

    $content = file($rfxcmd_log);
    array_splice($content, 0, $numberoflines);
    file_put_contents($rfxcmd_log, $content);

    return $stdout_lines;
}

function hb_call_restapi($url, $headers, $post = null, $put = null) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    if (isset($post)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if (isset($put)) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $put);
    }

    curl_setopt($ch, CURLOPT_URL, $url);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function hb_login() {
    global $protocol;
    global $hostname;
    global $port;
    global $method;
    global $username;
    global $password;

    $url = "$protocol://$hostname:$port/api/auth/login";
    $post = '{ "username": "' . $username . '","password": "' . $password . '","otp": "string"}';
    $headers = [
        'accept: */*',
        'Content-Type: application/json'
    ];

    return json_decode(hb_call_restapi($url, $headers, $post));
}

function hb_get_accessoiries() {
    global $protocol;
    global $hostname;
    global $port;
    global $method;
    global $username;
    global $password;

    $json = hb_login();

    $access_token = $json->access_token;
    $token_type = $json->token_type;

    $url = "$protocol://$hostname:$port/api/accessories";
    $post = '{ "username": "' . $username . '","password": "' . $password . '","otp": "string"}';
    $headers = [
        'accept: */*',
        'Authorization: ' . $token_type . ' ' . $access_token . ''
    ];

    return json_decode(hb_call_restapi($url, $headers));
}

function hb_put_accessoiries($accessoirie, $value) {
    global $protocol;
    global $hostname;
    global $port;
    global $method;
    global $username;
    global $password;

    $json = hb_login();

    $access_token = $json->access_token;
    $token_type = $json->token_type;

    switch ($value) {
        case "On":
            $value = "True";
            break;
        default:
            $value = "False";
            break;
    }

    $url = "$protocol://$hostname:$port/api/accessories/$accessoirie";
    $myarray = ["characteristicType" => "On", "value" => $value];
    $jsonput = json_encode($myarray);
    $headers = [
        "accept: */*",
        "Content-Type: application/json",
        "Authorization: $token_type $access_token"
    ];

    return json_decode(hb_call_restapi($url, $headers, null, $jsonput));
}
