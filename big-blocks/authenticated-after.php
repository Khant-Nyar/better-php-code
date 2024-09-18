<?php

function authenticated(Request $request, User $user)
{
    return redirectToDashboard($request->ajax(), $user->dashboard());
}

function redirectToDashboard($isAjax, $path)
{
    if ($isAjax) {
        return response()->json(array('success' => true, 'url' => $path));
    }

    return redirect($path);
}


/* example of code moved to User */
class User
{
    public function dashboard()
    {
        switch ($this->role_id) {
            case 1:
                return '/admin/dashboard';
            case 2:
                return '/teacher/dashboard';
            case 3:
                return '/parent/dashboard';
            case 4:
                return '/student/dashboard';
        }
    }
}