<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Session;
use Image;

class CategoryController extends Controller
{
    public function category()
    {
        Session::put('page','categories');
        $data = Category::with(['section','parentcategories'])->get();
        // $data = json_decode(json_encode($data));
        // echo "<pre>";print_r($data);die();

        return view('admin.categories.categories',compact('data'));
    }

    public function update_category_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            if($data['category_status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            Category::where('id',$data['category_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function add_edit_category(Request $request, $id=null)
    {
        if ($id=="") {
            //add category functionality are here
            $title = "Add Category";
            $category = new Category;
            $getdata = array();
            $getCategories = array();

            $message = 'Category Added Successfully!';

        }else{
            // edit category functionality are here
            $title = "Edit Category";
            $getdata = Category::where('id',$id)->first();
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$getdata['section_id']])->get();

            $getCategories = json_decode(json_encode($getCategories),true);

            $category = Category::find($id);
            
            $message = 'Category Updated Successfully!';

            // $getdata = json_decode(json_encode($getdata),true);

            // echo "<pre>";print_r($getCategories);die();
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // $data = json_decode(json_encode($data));
            // echo "<pre>";print_r($data);die();
            // validation

        $rules = [

            'category_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'section_id'=>'required|numeric',
            'url'=>'required',
            'category_image'=>'image',
        ];

        $validMsg = [
            'category_name.required'=>'Category Name field is required',
            'category_name.regex'=>'Valid Category Name field is required',
            'section_id.required'=>'Valid Section is required',
            'url.required'=>'Url field is required',
            'category_image.image'=>'Valid Image is required',
        ];
        $this->validate($request,$rules,$validMsg);
            // category image add
            if ($request->hasFile('category_image')) {
                $img_tmp = $request->file('category_image');

                if ($img_tmp->isValid()) {
                    $img_ext = $img_tmp->getClientOriginalExtension();

                    $img_name = rand(111,999999).'.'.$img_ext;
                    // dd($img_name);die();

                    $img_path = 'images/category_images/'.$img_name;

                    Image::make($img_tmp)->save($img_path);

               $category->category_image = $img_name;

                }
                
            }

            if (empty($data['category_discount'])) {
                $data['category_discount'] = "0.00";
            }
            if (empty($data['description'])) {
                $data['description'] = "";
            }
            if (empty($data['meta_title'])) {
                $data['meta_title'] = "";
            }
            if (empty($data['meta_description'])) {
                $data['meta_description'] = "";
            }
            if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] = "";
            }
            // save the data into database
            $category->category_name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();

            session()->flash('success',$message);
            return redirect('admin/categories');
        }

        $data = Section::get();

        // dd($data);die();
        return view('admin.categories.add-edit-category',compact('title','data','getdata','getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            $getCategories = Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();

            $getCategories = json_decode(json_encode($getCategories),true);

            // echo "<pre>";print_r($getCategories);die();
            return view('admin.categories.append_category_level')->with(compact('getCategories'));
        }
    }

    public function deleteCategoryImage($id)
    {
        $data = Category::select('category_image')->where('id',$id)->first();

        $img_path = 'images/category_images/'.$data->category_image;

        if (file_exists($img_path)) {
            unlink($img_path);
        }

        Category::where('id',$id)->update(['category_image'=>'']);

        session::flash('success','Category Image deleted Successfully!');

        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $data = Category::where('id',$id)->first();

        if ($data->category_image !=null) {
            $img_path = 'images/category_images/'.$data->category_image;

            if (file_exists($img_path)) {
               unlink($img_path);
            }
        }
        

        $data->delete();

        session::flash('success','Category Deleted Successfully!');
        return redirect()->back();
    }
}
