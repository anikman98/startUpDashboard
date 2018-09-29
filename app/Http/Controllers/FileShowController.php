<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
class FileshowController extends Controller
{
	public function firststep(){
		return view('user.filemanagement');
	}

    public function businessshow(){
    	$files = Files::all();
    	return view('user.businesstempshow')->with('files', $files);
    }

    public function milestoneshow(){
    	$files = Files::all();
    	return view('user.milestonetempshow')->with('files', $files);
    }

    public function pilotprojectshow(){
    	$files = Files::all();
    	return view('user.pilotprojecttempshow')->with('files', $files);
    }

   public function down($file = '')
	{
	    $filePath = storage_path('public/admin/'.$file);
	    if (! file_exists($filePath)) {
		    return \Response::download( $filepath, $file); 
	    }
	        return view('user.showfile')->with('error', 'File not found!');
	}
}
