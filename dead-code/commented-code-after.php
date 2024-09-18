<?php

function user_data()
{
    $data['name'] = 'JMac';
    $data['zip'] = '12345';

    return (json_encode($data));
}