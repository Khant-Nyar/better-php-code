<?php

function check($scp, $uid)
{
    if (Auth::user()->hasRole('admin')) {
        return true;
    }

    switch ($scp) {
        case 'public':
            return true;
            break;
        case 'private':
            if (Auth::user()->id === $uid) {
                return true;
            }
            break;
        default:
            return false;
    }
}