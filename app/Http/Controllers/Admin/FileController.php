<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\File;
// use Illuminate\Notifications\Notification;
use Auth;
use App\Files;
use App\User;
use App\Notifications\EmailNotfication;
use App\Notifications\NewTask;
use Notifiable;
use Notification;


class FileController extends Controller
{
    public function index(){
    	return view('admin.manageStartup.fileupload');
    }

    public function store(Request $request){
        $role = $request['roles'];  
        /*foreach($request['roles[0]'] as $role)*/
    	if($request->hasfile('template')){
            $company = $request['company'];
            $filename = $request->file('template')->getClientOriginalName();
            $request->file('template')->storeAs('public/admin', $filename);
            
            $file = new Files;
            $file->name = $filename;
            $file->company = $company[0];
            $file->from_whom = Auth::user()->getRoleNames();
            $file->template_type = $request['template_type'];
            $file->deadline = $request['deadline'];
            $file->save();
            $users = User::all();
            foreach($users as $user){
                if($user->company == $company[0])
                    $user->notify(new NewTask($request['template_type']));
                    // Notification::send($users, new NewTask($request['template_type']));
                    // echo $user;
            }            
    		return redirect('/admin/file/upload')->with('success', 'File has been uploaded');
        }else{
    		return redirect('/admin/file/upload')->with('error', 'No file was selected'); 
    	}
    }

    public function userProjectStore(Request $request){
        /*foreach($request['roles[0]'] as $role)*/
    	if($request->hasfile('template')){
            $company = $request['company'];
            $filename = $request->file('template')->getClientOriginalName();
            $request->file('template')->storeAs('public/admin', $filename);
            $file = new Files;
            $file->name = $filename;
            $file->company = $company;
            $file->from_whom = Auth::user()->name;
            $file->template_type = $request['template_type'];
            $file->deadline = $request['deadline'];
            $file->save();
            $users = User::all();
            foreach($users as $user){
                if($user->company == $company)
                    $user->notify(new NewTask('for-admin'));
            }            
    		return redirect('/user/projects')->with('success', 'File has been uploaded');
        }else{
    		return redirect('/user/projects')->with('error', 'No file was selected'); 
    	}
    }
    public function adminProjectStore(Request $request , $company){
        /*foreach($request['roles[0]'] as $role)*/
    	if($request->hasfile('template')){
            $company = $request['company'];
            $filename = $request->file('template')->getClientOriginalName();
            $request->file('template')->storeAs('public/admin', $filename);
            $file = new Files;
            $file->name = $filename;
            $file->company = $company;
            $file->from_whom = Auth::user()->name;
            $file->template_type = $request['template_type'];
            $file->deadline = $request['deadline'];
            $file->save();
            $users = User::all();
            foreach($users as $user){
                if($user->company == $company)
                    $user->notify(new NewTask($request['template_type']));
            }            
    		return redirect('/admin/startups/'.$company)->with('success', 'File has been uploaded');
        }else{
    		return redirect('/admin/startups/'.$company)->with('error', 'No file was selected'); 
    	}
    }



    public function userindex(){
        return view('user.userfileupload');
    }

    public function userstore(Request $request){
        if($request->hasfile('template')){
            $user = \Auth::user();  
            // $role = $user->roles;
            $filename = $request->file('template')->getClientOriginalName();
            $request->file('template')->storeAs('public/user', $filename);
            $file = new Files;
            $file->name = $filename;
            $file->company =$request['company'];
            $file->template_type = $request['template_type'];
            $file->from_whom = $request['company'];
            $file->save();
            $users = User::role('Super-Admin')->get(); 
            foreach($users as $user){
                $user->notify(new NewTask('for-admin'));
            }
            return redirect('/user/file')->with('success', 'File has been uploaded');
        }else{
            return redirect('/user/file/upload')->with('error', 'No file was selected'); 
        }
    }

    public function show(){
        $files = Files::all();
        return view('admin.managestartup.adminfileshow')->with('files', $files);
    }
    public function userFileShow(){
        $files = Files::all();
        return view('admin.managestartup.useruploadedfiles')->with('files', $files);
    }


    public function delete(){
    }
}
