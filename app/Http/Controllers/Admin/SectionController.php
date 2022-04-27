<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;
use Validator;

class SectionController extends Controller
{
    public function index()
    {  

        Session::put('page','sections');

        $data = Section::get();

        // dd($data);die();
        return view('admin.sections.section',compact('data'));
    }

    public function update_section_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            if($data['section_status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            Section::where('id',$data['section_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }

    public function add_section()
    {
        return view('admin.sections.add_section');
    }


    public function submit_add_section(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'section_name'=>'required',
        ]);

        if ($validator->passes()) {
            
        

        $data = new Section();
        $data->name = $request->section_name;
        $data->status = $request->status;
        $data->save();

        return response()->json(['title'=>'Success','success_msg'=>'Section submitted successfully.']);
        }
        return response()->json(['title'=>'Warning','error_msg'=>$validator->errors()->all()]);

    }

    public function edit_section($id)
    {
        // dd($id);
        $data = Section::find($id);
        return view('admin.sections.edit_section', compact('data'));
    }

    public function submit_edit_section(Request $request,$id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'section_name' => 'required',
        ]);

        if ($validator->passes()) {
            $data = Section::find($id);
            $data->name = $request->section_name;
            $data->status = $request->status;
            $data->save();

            return response()->json(['title'=>'Success', 'success_msg'=>'Sections updated successfully.']);

        }
        return response()->json(['title'=>'Warning', 'error_msg'=> $validator->errors()->all()]);
    }

    public function delete_section($id)
    {
        $data = Section::where('id',$id)->first();     
        $data->delete();
        session::flash('success','Section Deleted Successfully!');
        return redirect()->back();
    }

}
