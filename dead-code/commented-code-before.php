<?php

function user_data()
{
    $data['name'] = 'JMac';
    // $data['address'] = '123 Something Way';
    // $data['city'] = 'Louisville';
    // $data['state'] = 'KY';
    $data['zip'] = '12345';

    // return(json_encode($data, JSON_UNESCAPED_UNICODE));
    return (json_encode($data));
}