<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Carbon;
use Illuminate\Http\Request;
use Validator;
use Response;
class NewsController extends Controller
{


     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(News $table)
    {
        $feed=$table->where('created_at','<=',Carbon::now());
        return view('news.news',compact('feed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $req, News $table)
    {
         if($req->ajax()){
                $validator=Validator::make($req->all(),[
                 'title'=>'required|max:250',
                 'slug'=>'unique:news,slug',
                 'content'=>'required',
                 'created_at'=>'required|date',
                ]);
                if($validator->fails()){
                    $errors=$validator->messages();
                    return  Response::json($errors->all());
                }
             $table->title=$req->input('title');
             $table->slug=$req->input('slug');
             $table->content=$req->input('content');
             $table->created_at=strtotime($req->input('created_at'));
             $table->save();
                return  "Your news was successfully saved.";

         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function show($slug, News $table)
    {
        $article=$table->where('slug','=',$slug)->first();
        return view('news.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $slug
     * @return Response
     */
    public function update($slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return Response
     */
    public function destroy($slug)
    {
        //
    }
}
