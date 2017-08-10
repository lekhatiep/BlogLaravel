<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Auth;
use Storage;
class PostController extends Controller
{
    //if you want set conditional authenicate(login or logout) controller 
    //=>>
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    function __construct(){
        $this->middleware('role:admin|manager')->only('create');
    }
    public function index(){
    	$posts=Post::orderBy('id','desc')->with('user')->paginate(5);
        $posts_slide =DB::table('posts')->offset(4)->limit(3)->get();
        $tags=Tag::limit(3)->get();
    	return view('post',compact('posts','users','tags','posts_slide'));
        
    }

    public function create(){
        $users = User::all();
        $categories=Category::All();
        $tags=Tag::all();
    	return view('post.create',compact('users','categories','tags'));
    }

    public function store(Request $request){
    	//dd($request);
    	$this->validate($request,[
    		'title'=>'required|unique:posts|max:200',
    		'content'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'category'=>'required'|'numeric',
            'featured_img'=>'sometimes|image'
    		]);
    	$post = new Post();
    	$post->title=$request->title;
    	$post->body= Purifier::clean($request->content);
        //check fileupload
        if($request->hasFile('featured_img'))
        {
            $image=$request->file('featured_img');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image=$filename;
        }
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->user_id=$request->user_id;
    	$post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success', 'The post was created');
    	return redirect()->route('post.index');
    }

     public function show ($id){
    	$posts=Post::find($id);
        $user_id=$posts->user_id;
        $user=User::find($user_id);
        $id_comment=Auth::id();
        $mail_comment=Auth::user()->email;
        $name_comment=Auth::user()->name;
    	return view('blog.single',compact('posts','user','id_comment','mail_comment','name_comment'));
    }

    public function edit($id){
    	$post=Post::find($id);

        $categories=Category::All();
        $cats=array();
        foreach ($categories as $categories) {
            $cats[$categories->id]=$categories->name;
        }

        $tag_edit=Tag::All();
        $tags=array();
        foreach($tag_edit as $tag){
            $tags[$tag->id]=$tag->name;
        }

    	//echo"u are staying in page Edit";
    	return view('post.edit',compact(['post',$post],['cats',$cats],['tags',$tags]));
    }

    public function update(Request $request, $id){
    	 // dd($request);
        //Validate
        $post = Post::find($id);
        // if($request->slug == $post->slug){
        //     $this->validate($request,[
        //         'title'=>'required|max:200',
        //         'category_id'=>'required|integer',
        //         'body'=>'required',
        //         ]);
        // }
        // else{
    	$this->validate($request,[
    		'title'=>'required|max:200',
    		'body'=>'required',
            'category_id'=>'required|integer',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'featured_img'=>'image'
    		]);
         // }
    	 $post =Post::find($id);
    	 $post->title=$request->input('title');
    	 $post->body= Purifier::clean($request->input('body'));
         $post->slug=$request->input('slug');
         $post->category_id=$request->input('category_id');
         //check input featured image
         if($request->hasFile('featured_img')){
            $image=$request->file('featured_img');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location =public_path('images/'.$filename);
            Image::make($image)->resize(1000,600)->save($location);
            $oldfilename=$post->image;
            Storage::delete($oldfilename);
            $post->image=$filename;
         }

    	 $post->save();
         Session::flash('success', 'The post was created');
         $user_id=$post->user_id;

         $user=User::find($user_id);
         $id_comment=Auth::id();
         $mail_comment=Auth::user()->email;
         $name_comment=Auth::user()->name;

         $tag_edit =Tag::All();
         if(isset($request->tags)){
            $post->tags()->sync($request->tags);
         }else
         {
            $post->tags()->sync(array());
         }
    	// $post->update($request::all());
    	// return view('blog.single',compact('posts','user','id_comment','mail_comment','name_comment'));
         return redirect()->route('blog.single',[$post->slug]);
    }

    public function destroy($id)
    {
    	$post =Post::find($id);
        Storage::delete($post->image);
    	$post->delete();
    	return redirect()->route('post.index');
    }
    public function manage_post()
    {
        //lấy post theo user
        $posts = Post::with('user')->get();
        return view('admin.ql_post',compact('posts'));
    }
}
