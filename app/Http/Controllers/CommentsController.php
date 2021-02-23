<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\CommentRequest;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postnm)
    {
        
        $comments = Comment::orderBy('updated_at', 'asc')->get();
        
        return view($postnm, compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, $post_id)
    {
        
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->message = $request->message;
        
        
        
        $comment->post_id = $post_id;
        
        if($comment->save()){ 
           return back();
           }
           return "Wystapil blad";   
   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(!Auth::check()){
            return redirect()->route('index');
        }
        
        if(!$comment = Comment::find($id)){
            return redirect()->route('index');
        }
                 
        //Sprawdzenie czy użytkownik jest autorem komentarza 
        if (\Auth::user()->id != $comment->user_id) { 
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']); 
        } 
        return view('commentEdit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        //
        if(!Auth::check()){
            return redirect()->route('index');
        }
        
        $comment = Comment::find($id); 
        //Sprawdzenie czy użytkownik jest autorem komentarza 
        if(\Auth::user()->id != $comment->user_id){ 
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']); 
        } 
        $comment->message = $request->message; 
        if($comment->save()) { 
            return redirect(session('links')[2]); // Will redirect 2 links back
            
        } 
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect()->route('index');
        }
        //
        if(!$comment = Comment::find($id)){
            return redirect()->route('index');
        }
        
        if(\Auth::user()->id == $comment->user_id  or \Auth::user()->status_id == 2){
        
            if($comment->delete()){ 
                return back()->with(['success' => true, 
                    'message_type' => 'success', 
                    'message' => 'Pomyślnie skasowano komentarz użytkownika '. 
                              '.']); 
            }
        }else{
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        
        return back()->with(['success' => false, 'message_type' => 'danger', 
            'message' => 'Wystąpił błąd podczas kasowania komentarza użytkownika '. 
                            '. Spróbuj później.']);
    }
}
