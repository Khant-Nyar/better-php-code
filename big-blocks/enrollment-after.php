<?php

class EnrollmentController extends Controller
{
    public function store(EnrollmentRequest $request, Course $course)
    {
        $course->enrollUser($this->createUserIfUnauthenticated($request));

        return redirect($course->path());
    }

    private function createUserIfUnauthenticated(EnrollmentRequest $request)
    {
        if ($request->user()) {
            return $request->user();
        }

        $user = User::createFromEnrollmentRequest($request);
        Auth::login($user);

        return $user;
    }
}
