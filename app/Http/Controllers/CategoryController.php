<?php

namespace App\Http\Controllers;
use App\ Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $category = new Category;
            $category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('categories/view-category')->with('flash_message_success','Category Added Successfully!');
        }
        $levels=Category::where(['parent_id'=>0])->get();
        return view('categories.add_category')->with(compact('levels'));
    }
    public function viewCategory(){
        $categories =Category::orderBy('id','DESC')->get();
        $categories= json_decode(json_encode($categories));
         //echo "<pre>"; print_r($categories);die;
        return view('categories.view_category')->with(compact('categories'));
        //echo "Test"; die;
    }
    public function editCategory(Request $request,$id = null){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo"<pre>"; print_r($data);die;
             Category::where('id',$id)->update(['name'=>$data['name'], 'description'=>$data['description'], 'url'=>$data['url'] 
            ]);
            return redirect('categories/view-category')->with('flash_message_success','Category Updated Successfully!');
        }
        
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels=Category::where(['parent_id'=>0])->get();
        return view ('categories.edit_category')->with(compact('categoryDetails','levels'));
    }
    public function deleteCategory(Request $request, $id=null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category Deleted Successfully!');
        }
    }
}
