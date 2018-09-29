<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Files;
use Auth;
use App\User;
use App\ProjectManagement;
use Illuminate\Http\Request;
use App\Notifications\EmailNotfication;
use App\Notifications\NewTask;
use Illuminate\Support\Facades\File;
use Illuminate\Notifications\Notification;
use App\Comment;

class ProjectManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    

/*    public function check($company = ''){
        return $this->company;
    }*/

    public function index(Request $request, $company)
    {
        $files = Files::all();
        $keyword = $request->get('search');
        $perPage = 25;
        if (!empty($keyword)) {
            $projectmanagement = ProjectManagement::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $projectmanagement = ProjectManagement::latest()->paginate($perPage);
        }
        

        return view('admin.project-management.index', compact('projectmanagement'))->with('company', $request['company'])->with('files', $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($company)
    {
        return view('admin.project-management.create')->with('company', $company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $company)
    {
        
        $startup = Company::all();
        $requestData = $request->all();
        $project = new ProjectManagement;
        $startup = $request['company'];
        $project->name = $requestData['name'];
        $project->status = $requestData['status'];
        $project->priority =$requestData['priority'];
        $project->deadline = $requestData['deadline'];
        $project->assignee = $requestData['assignee'];
        $project->deliverable = $requestData['deliverable'];
        $project->description = $requestData['description'];
        $project->stakeholders = $requestData['stakeholders'];
        $project->company = $company;
        $project->save();

        return redirect('admin/startups/'.$company)->with('success', 'Project has been added!')->with('company', $company);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
 /*   public function show($company,$id)
    {
        $projectmanagement = ProjectManagement::findOrFail($id);

        return view('admin.project-management.show', compact('projectmanagement'))->with('company', $company);
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($company,$id)
    {
        $projectmanagement = ProjectManagement::findOrFail($id);

        return view('admin.project-management.edit', compact('projectmanagement'))->with('company', $company);
        /*return $company;*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $company,$id)
    {
        /*$projectmanagement->update($requestData);*/
        
        $requestData = $request->all();
        $project = ProjectManagement::findOrFail($id);
        $project->name = $requestData['name'];
        $project->status = $requestData['status'];
        $project->priority =$requestData['priority'];
        $project->deadline = $requestData['deadline'];
        $project->assignee = $requestData['assignee'];
        $project->deliverable = $requestData['deliverable'];
        $project->description = $requestData['description'];
        $project->stakeholders = $requestData['stakeholders'];
        $project->company = $company;
        $project->save();

        return redirect('admin/startups/'.$company)->with('success', 'Project has been updated!')->with('company', $company);
    }

    public function statusUpdate(Request $request, $company){
        // $requestData = $request->all();
        // $changeStatus = ProjectManagement::findOrFail($requestData['project_id']);
        // $changeStatus = $requestData['status'];
        // $changeStatus->save();\

        $changeStatus = ProjectManagement::where('company', $company)->update([
            'status' => $request['status'],
        ]);
        if($changeStatus){
            return redirect('admin/startups/'.$company)->with('success', 'Project has been updated!')->with('company', $company);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($company,$id)
    {
        ProjectManagement::destroy($id);

        return redirect('admin/startups/'.$company)->with('flash_message', 'ProjectManagement deleted!')->with('company', $company);
    }

    public function projectShow(Request $request){
        $files = Files::all();
        $user_company = Auth::user()->company;
        $projects = ProjectManagement::all();
        $comments = Comment::all();
        return view('user.projectshow')->with('projects', $projects)->with('user_company',$user_company)->with('files', $files)->with('comments', $comments);
    }
}
