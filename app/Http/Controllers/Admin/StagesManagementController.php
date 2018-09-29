<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProjectManagement;
use App\StagesManagement;
use Illuminate\Http\Request;
use App\Comment;

class StagesManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $company, $project_id)
    {
        /*echo "project company $company and project id is $project_id";*/
        $keyword = $request->get('search');
        $perPage = 25;
        $comment = Comment::all();
        $project = ProjectManagement::findOrFail($project_id);
        if (!empty($keyword)) {
            $stagesmanagement = StagesManagement::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $stagesmanagement = StagesManagement::latest()->paginate($perPage);
        }
        $comments = Comment::all();
        return view('admin.stages-management.index', compact('stagesmanagement'))->with('company', $company)->with('project' , $project)->with('comment', $comment);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($company, $project_id)
    {
        return view('admin.stages-management.create')->with('company', $company)->with('project_id' , $project_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $company, $project_id)
    {
        
        $requestData = $request->all();
        $data = new StagesManagement;
        $data->name = $requestData['name'];
        $data->stage_no = $requestData['stage_no'];
        $data->description = $requestData['description'];
        $data->company = $requestData['company'];
        $data->project_name = $requestData['project_name'];
        // $data->progress = $requestData['progress'];
        // $data->comment = $requestData['comment'];
        $data->status = $requestData['status'];
        $data->stage_deadline = $requestData['stage_deadline'];
        $data->save();
        return redirect('/admin/projects/'.$company.'/'.$project_id)->with('success', 'Stage added!')->with('company', $company)->with('project_id' , $project_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show( $company, $project_id, $id)
    {
        $stagesmanagement = StagesManagement::findOrFail($id);

        return view('admin.stages-management.show', compact('stagesmanagement'))->with('company', $company)->with('project_id' , $project_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit( $company, $project_id, $id)
    {
        $stagesmanagement = StagesManagement::findOrFail($id);

        return view('admin.stages-management.edit', compact('stagesmanagement'))->with('company', $company)->with('project_id' , $project_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $company, $project_id, $id)
    {
        
        $requestData = $request->all();
        $data = StagesManagement::findOrFail($id);
        $data->name = $requestData['name'];
        $data->stage_no = $requestData['stage_no'];
        $data->description = $requestData['description'];
        $data->company = $requestData['company'];
        $data->project_name = $requestData['project_name'];        
        $data->status = $requestData['status'];
        $data->stage_deadline = $requestData['stage_deadline'];
        $data->save();

        return redirect('admin/projects/'.$company.'/'.$project_id)->with('flash_message', 'StagesManagement updated!')->with('company', $company)->with('project_id' , $project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy( $company, $project_id, $id)
    {
        StagesManagement::destroy($id);
        return redirect('admin/projects/'.$company.'/'.$project_id)->with('flash_message', 'StagesManagement deleted!')->with('company', $company)->with('project_id' , $project_id);
    }

}
