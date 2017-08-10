<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Datatables;
use DB;
class CategoryController extends Controller
{
    public function index()
    {
    	$categories=Category::all();
    	 return view('category.index',compact('categories'));
        return response()->json($categories);
    }
   
    public function create(){
    	return view('category.create');
    }
    public function store(Request $request)
    {
        //dd($request);
    	$this->validate($request,[
    		'name'=>'required|min:5|max:255'
    		]);
    	$category= new Category();
    	$category->name=$request->name;
    	$category->save();
    	return redirect()->route('category.index');
    	// dd($request);

    }
    public function edit($id)
    {   

    	$category=Category::find($id);
    	return view('category.edit',compact('category'));
    }
    public function update(Request $request, $id){
    	$this->validate($request,[
    		'name'=>'required|min:5|max:255'
    		]);
    	$category=Category::find($id);
    	$category->name=$request->name;
    	$category->save();
    	return redirect()->route('category.index');
    }
    public function destroy($id){
    	$category=Category::find($id);
    	$category->delete();
    	return redirect()->route('category.index');
    }
     public function indexajax()
    {
        // $categories=Category::all();
        // return response()->json($categories);
        //$output.='<a href="#">delete</a>';
        // $html.='';
        // $html.= Form::open(['route'=>['category.destroy',$cat->id],'method'=>'delete']);
        // $html.='<button type="submit">Delete</button>';
        // $html.=Form::close();

        $cats = DB::table('categories')->select(['id','name']);
        //$data = $out->getData();
        return Datatables::of($cats)
        ->addcolumn('action',function($cat){
             return '<a href="'.url('category').'/'.$cat->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
                <form action="'.url('category').'/'.$cat->id.'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                '.csrf_field().'

                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></span></button>
                </form>
             ';
         }) 
        ->make(true);

    }
}
