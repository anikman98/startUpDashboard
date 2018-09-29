<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Comment;
use App\Company;
use App\ProjectManagement;
use App\StagesManagement;

class CommentController extends Controller
{
    public function addComment(Request $request,  $company, $project_id){
        $comment = new Comment;
        $comment->comment = $request['comment'];
        $comment->projects_id = $project_id;
        $comment->save();
        return redirect('/admin/projects/'.$company.'/'.$project_id)->with('success', 'Stage added!')->with('company', $company)->with('project_id' , $project_id);
    }


    public function userAddComment(Request $request){
        $comment = new Comment;
        $comment->comment = $request['comment'];
        $comment->projects_id = $request['projects_id'];
        $comment->save();
        return redirect('user/projects');
    }


}
