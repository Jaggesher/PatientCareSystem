<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use Auth;

class patientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function Show(){
    	$id=Auth::user()->id;
        $dbVar=User::find($id);
    	return view('patient.view-patient')->with('Personal',$dbVar);
    }

    public function ShowEdit(){
    	$id=Auth::user()->id;
        $dbVar=User::find($id);
    	return view('patient.edit-patient')->with('Personal',$dbVar);
    }

    public function UpdateInfo(Request $request){

    }

    public function UpdatePassword(Request $request){

    }

    public function StorePic(Request $request){
    	 $this->validate($request,[
            'fileToUpload' => 'required|image|mimes:jpeg,jpg,png|max:2500',
        ]);

        $file = $request->file('fileToUpload');
        $id=Auth::user()->id;
        $dbVar=User::find($id);
        $destinationPath="profilePicture";
        $fileName=$id.'P.'.$file->getClientOriginalExtension();
        $uploadSuccess = $file->move($destinationPath, $fileName);
        if($uploadSuccess){
            $dbVar->img=$destinationPath.'/'.$fileName;
            $dbVar->save();
            return redirect()->route('patient.Profile');
        }
        //Here just send a flush message for for someting wrong for storing picture
        $request->session()->flash('wrong', 'Something Went Wrong. Please Try Latter');

        return redirect()->back();
    }


}
