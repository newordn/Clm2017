<?php

namespace App\Http\Controllers;

class CourseController extends Controller
{
    public function getCourses()
    {
        return view('courses');
    }
}