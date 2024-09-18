<?php

class EnrollmentController extends Controller
{
    public function store(Request $request, $id)
    {
        Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ])->validate();

        $course = Course::findOrFail($id);

        if (Auth::check()) {
            $course->enrollUser($request->user());

            return redirect($course->path());
        }

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $course->organization->addUser($user);
        $course->enrollUser($user);

        Auth::login($user);

        return redirect($course->path());
    }
}
