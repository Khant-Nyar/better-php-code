<?php

function check($scp, $uid)
{
    if (Auth::user()->hasRole('admin')) {
        return true;
    }

    if ($scp === 'public') {
        return true;
    }

    if ($scp === 'private' && Auth::user()->id === $uid) {
        return true;
    }

    return false;
}