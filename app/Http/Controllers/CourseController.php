<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserApplicationAssigned;
use App\Repositories\CourseRepository;
use Illuminate\Database\QueryException;
use App\Http\Requests\ApplicationRequest;
use App\Repositories\ApplicationRepository;

class CourseController extends Controller
{
    protected $courseRepo;
    protected $applicationRepo;

    public function __construct(CourseRepository $courseRepo, ApplicationRepository $applicationRepo) {
        $this->courseRepo = $courseRepo;
        $this->applicationRepo = $applicationRepo;
    }

    public function index() {
        $courses = $this->courseRepo->getAll();
        return view ('courses.index', compact('courses'));
    }

    public function show($id) {
        $course = $this->courseRepo->findById($id);
        return view('courses.show', compact('course'));
    }

    public function create() {
        return view('courses.create');
    }

    public function store(CourseRequest $request) {
        $this->courseRepo->store($request->validated());
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    public function edit($id) {
        $course = $this->courseRepo->findById($id);
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, $id) {
        // dd($request->validated());
        $this->courseRepo->update($id , $request->validated());
        return redirect()->route('course.show', $id)->with('success', 'Course updated successfully.');
    }

    public function destroy($id) {
        $this->courseRepo->delete($id);
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }

    public function deleteCourse($id) {
        $this->courseRepo->delete($id);
        return response()->json(['success' => 'done']);
    }


    //user part .. application
    public function getApplication($id) {
        $course = $this->courseRepo->findById($id);
        return view('courses.application', compact('course'));
    }

    public function postApplication(ApplicationRequest $request, $id) {  

        try {
            $validated = $request->validated();
            $validated['user_id'] = Auth::id();
            $validated['course_id'] = $id;
    
            $application =  $this->applicationRepo->store($validated);
    
            $user = Auth::user();
            $course = $this->courseRepo->findById($id);
    
            // Send email to admin
            Log::info('Dispatching MailJob', ['user_id' => $user->id, 'course_id' => $course->id]);
            dispatch(new MailJob($user, $course, $application));
    
            return redirect()->route('course.user-courses')
                             ->with('success', 'Course applied successfully.');
    
        } catch (QueryException $e) {
          
            return redirect()->route('course.user-courses')
                             ->with('error', 'You have already applied for this course.');
        }
    }

    //get all courses of user
    public function userCourses() {
        $courses = $this->applicationRepo->getByUserId();
        return view('courses.user-courses', compact('courses'));
    }

    public function unassign($id) {
            $course = $this->applicationRepo->getByCourseId($id);

            if ($course) {    
                $course->delete();
                return response()->json(['success' => 'Course unassigned successfully']);
            }
        
            return response()->json(['error' => 'Course not found or not assigned to this user'], 404);
    }
        
}
