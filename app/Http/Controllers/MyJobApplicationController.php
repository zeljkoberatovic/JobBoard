<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    
    public function index()
    {
        return view(
            'my_job_application.index',
            [
                'applications' => auth()->user()->jobApplications()
                ->with([
                    'job' => fn($query) => $query->withCount('jobApplications')
                        ->withAvg('jobApplications', 'expected_salary')
                        ->withTrashed(),
                    'job.employer'
                ])
                    ->latest()->get()
            ]
        );
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}
