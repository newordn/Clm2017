<?php

namespace App\Http\Controllers;
use Response;
class CourseController extends Controller
{
    public function getFrenchCourses()
    {
        return view('courses');
    }
    public function getEnglishCourses()
    {
        return view('courses');
    }
    public function getCourses()
    {
        return view('courses');
    }
    public function getCourse( $filename) {
        // Check if file exists in storage directory
        $file_path = public_path($filename);

        if ( file_exists( $file_path ) ) {
            // Send Download
            return response()->download($file_path, 'example.png', [], 'inline');

        } else {
            // Error exit( 'Requested file does not exist on our server!' );
            return back();
        }
    }
}