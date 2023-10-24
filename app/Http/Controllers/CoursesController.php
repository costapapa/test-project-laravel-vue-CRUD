<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Courses::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $courseData = $request->input('courses') ?? []; // Get the 'courses' data, or an empty array if it doesn't exist

    $newCourse = new Courses;
    $newCourse->course_name = $courseData["course_name"] ?? null; // Access 'course_name', or set to null if not present
    $newCourse->description = $courseData["description"] ?? null; // Access 'description', or set to null if not present
    $newCourse->instructor = $courseData["instructor"] ?? null; // Access 'instructor', or set to null if not present
    $newCourse->duration = $courseData["duration"] ?? null; // Access 'duration', or set to null if not present
    $newCourse->start_date = $courseData["start_date"] ?? null; // Access 'start_date', or set to null if not present
    $newCourse->save();

    return $newCourse;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courseInfo = Courses::find($id);

        if ($courseInfo) {
            return $courseInfo;
        }
    
        return "Course not found";


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courseInfo = $request->input('courses') ?? [];
        $course = Courses::find($id);
        // NULL COALESCE OPERATOR 
        $course->course_name = $courseInfo["course_name"] ?? $course->course_name;
        $course->description = $coursInfo["description"] ?? $course->description;
        $course->instructor = $courseInfo["instructor"] ?? $course->instructor;
        $course->duration = $courseInfo["duration"] ?? $course->duration;
        $course->start_date = $courseInfo["start_date"] ?? $course->start_date;
    
        $course->save();

        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courseInfo = Courses::find($id);

        if ($courseInfo) {
            $courseInfo->delete();
            return "Course Deleted";
        }

        return "Course not found";

    }
}
