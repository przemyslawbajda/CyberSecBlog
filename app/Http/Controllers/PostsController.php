<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Models\Comment;
use App\Models\User;
use \Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //

    
    public function create(){ //return form to creat a post
        return view('addposts');
        
    }
    
    
    
    public function store(Request $request){ //store a post
        // Validate the inputs
        $request->validate([
            'header' => 'required',
            'subheader' => 'required',
            'content' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /img
            $request->file->store('img', 'public');

  
            // Store the record, using the new file hashname which will be it's new filename identity.
            $post = new Post([
                "header" => $request->get('header'),
                "subheader" => $request->get('subheader'),
                "content" => $request->get('content'),
                "author_id" => \Auth::user()->id,
                "file_path" => $request->file->hashName()
            ]);
            $post->save(); // Finally, save the record.
        }

        return redirect('home');

    }
    
    //show content of  post
    public function show($post_id){ 
        $comments = Comment::orderBy('updated_at', 'asc')->where('post_id', '=', $post_id)->get();
        $post= Post::find($post_id);
        $author = User::where('id', '=', $post->author_id)->first();
        return view('post1', compact('comments', 'post', 'author'));
    }
    
    //showing list of the posts written by user
    public function managePosts(){ 
        $posts = Post::orderBy('created_at', 'asc')->where('author_id', '=', \Auth::user()->id)->get();
        
        return view('managePosts', compact('posts'));
    }
    
    public function edit($post_id){ // return view with form to edit a post
        $post = Post::find($post_id);
        
        return view('editPost', compact('post'));
        
    }
    
    public function update(Request $request, $post_id){ //updating post
        $post = Post::find($post_id);
        
        
        if(\Auth::user()->id != $post->author_id){ 
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']); 
        }
        
        // Validate the inputs
        $request->validate([
            'header' => 'required',
            'subheader' => 'required',
            'content' => 'required',
        ]);
        
        $post->header=$request->get('header');
        $post->subheader=$request->get('subheader');
        $post->content= $request->get('content');
        
         if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            
          
            $filePath = 'img/'. $post->file_path;
            
            Storage::disk('public')->delete( $filePath ); // delete old image from public storage
            
            $request->file->store('img', 'public');
            $post->file_path=$request->file->hashName();
        }
        
        $post->save();
        
        return redirect('manageposts');
        
    }
    
    public function destroy($post_id){ //deleting post
        $post = Post::find($post_id);
        
        if(\Auth::user()->id != $post->author_id){ 
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']); 
        }
        
        $filePath = 'img/'. $post->file_path;
        Storage::disk('public')->delete( $filePath ); // delete image from public storage
        
        if($post->delete()){ 
            return back();
        }
        
        return back();
        
    }
    
}
