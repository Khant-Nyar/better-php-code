<?php

function authenticated(Request $request, $user)
{
    $ajax = $request->headers->get('X-Requested-With') == 'XMLHttpRequest';

    if ((int)$user->role_id === 1) {
        if ($ajax) {
            return response()->json(array('success' => true, 'url' => '/admin/dashboard'));
        }

        return redirect('/admin/dashboard');
    }
    if ((int)$user->role_id === 2) {
        if ($ajax) {
            return response()->json(array('success' => true, 'url' => '/teacher/dashboard'));
        }

        return redirect('/teacher/dashboard');
    }
    if ((int)$user->role_id === 3) {
        if ($ajax) {
            return response()->json(array('success' => true, 'url' => '/parent/dashboard'));
        }

        return redirect('/parent/dashboard');
    }
    if ((int)$user->role_id === 4) {
        if ($ajax) {
            return response()->json(array('success' => true, 'url' => '/student/dashboard'));
        }

        return redirect('/student/dashboard');
    }
}