<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMessage;
use Carbon\Carbon;

class emailController extends Controller
{
    public function showTemplate() {
        return view('email.welcome-message');
    }

    public function create() {
    	return view('pages.email-blast')->withTitle('Email Blast');
    }

    public function store(Request $request) {

    	$this->validate($request, [
    		'file' => 'required',
    		'template' => 'required'
    	]);

    	// check if has file
    	if($request->hasFile('file')) {

    		$template = $request->template;

    		if($template == 'Welcome Message') {

    			// start load file
	    		Excel::load($request->file, function($reader) {

	    			// dump result
		    		//$reader->dd(); die;

		    		// Loop through all sheets
					$reader->each(function($sheet) {

						// start send mail
						try {
							Mail::to($sheet->email)->queue(new WelcomeMessage());
						}
						catch(\Exception $e) {
							return back()->withSuccess('Email published!');
							// throw $e;
						}
					});

				});

    		}
    		else {
    			return back()->withErrors('Templates not found.');
    		}
    		

			return back()->withSuccess('Email published!');

    	}
    	else {

    		return back()->withErrors("No file found.");

    	}

    }
}
