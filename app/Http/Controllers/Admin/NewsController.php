<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Carbon;
use Illuminate\Http\Request;
use Validator;
use Response;
use Session;
use DOMDocument;
use Illuminate\Database\QueryException as QueryException;
class NewsController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //->get()
        $news=new News;
        $feed=$news->createdAt()->paginate(4);
        if(!is_null($feed))
            return view('news.search',compact('feed'));
        else
            return redirect('/news')->with(array('error'=>'There are no news published'));
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search(News $news, Request $req){
        try{
            $search=$req->input('search');
            $feed=$news->searchByTitle($search)->paginate(4);
            return view('news.search',compact('feed'))->with(['search'=>$search]);
        }
        catch(QueryException $e){
            return redirect('/errors/502')->with(['errors'=>'An error occurred while searching news.','search'=>$search]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $req, News $table)
    {

             if($req->ajax()){
                 if(strcmp(trim(Session::get('type')),'admin')==0){
                     $title=htmlentities($req->input('title'));
                     $slug=$req->input('slug');
                     $title='\''.ucwords($title).'\'';
                     $content='\''.htmlentities($req->input('content')).'\'';
                     $created_at=$req->input('created_at');
                     $array=array('title'=>$title,'slug'=>$slug,'content'=>$content,'created_at'=>$created_at);
                     $validator=Validator::make($array,[
                         'title'=>'required|max:250|min:5',
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
                 else
                     return "You are not allowed for this transaction. ";

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
       try{
           $article=$table->searchBySlug($slug);
           if(!is_null($article))
               return view('news.show',compact('article'));
           else
               return redirect('/error/503',array('error'=>'Unable to fetch this news story. It does not appear in our database.'));
       }
       catch(QueryException $e){
           return redirect('/error/503',array('error'=>'Unable to fetch this news story. It does not appear in our database.'));
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function edit($slug, News $table)
    {
        $story=$table->where('slug','=',$slug)->first();
        if(!is_null($story))
            return view('news.edit',compact('story'));
        else
            return view('news.show',array('error'=>'Unable to fetch this news story. It does not appear in our database.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $slug
     * @return Response
     */
    public function update(Request $req)
    {

            if($req->ajax()){
                if(strcmp(trim(Session::get('type')),'admin')==0){
                    $title=htmlentities($req->input('title'));
                    $id=$req->input('id');
                    $slug=$req->input('slug');
                    $title='\''.ucwords($title).'\'';
                    $content='\''.htmlentities($req->input('content')).'\'';
                    $created_at=$req->input('created_at');

                    $array=array('title'=>$title,'slug'=>$slug,'content'=>$content,'created_at'=>$created_at);
                    $validator=Validator::make($array,[
                        'title'=>'required|max:250|min:5',
                        'slug'=>'required',
                        'content'=>'required',
                        'created_at'=>'required|date',
                    ]);
                    if($validator->fails()){
                        $errors=$validator->messages();
                        return  Response::json($errors->all());
                    }
                    $table=News::findOrNew($id);
                    $table->title=$req->input('title');
                    $table->slug=$req->input('slug');
                    $table->content=$req->input('content');
                    $table->created_at=strtotime($req->input('created_at'));
                    $table->save();
                    return  "Your news was successfully saved.";
                }
                else
                    return 'Your not allowed to make this transaction.';
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $req
     * @return Response
     */
    public function destroy(Request $req)
    {

            if($req->ajax()){
                if(strcmp(trim(Session::get('type')),'admin')==0){
                    $id=$req->input('id');
                    $row=News::where('id','=',$id)->delete();
                    return (string)$row;
                }
                else
                    return 'You are not allowed to make this transaction.';
            }

    }
    /**
     * View all unpublished news
     * @return Response
     */
    public function viewUnpublished(){
        $news=new News;
        $feed=$news->unpublished()->paginate(4);
        if(!is_null($feed))
            return view('news.search',compact('feed'));
        else
            return redirect('/news')->with(array('error'=>'There are no news published'));
    }
    public function getRssFeed(){
        $xml='http://news.google.com/news?ned=us&topic=h&output=rss';
        $xmlDoc = new DOMDocument();
        $xmlDoc->load($xml);

//get elements from "<channel>"
//        $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
//        $channel_title = $channel->getElementsByTagName('title')
//            ->item(0)->childNodes->item(0)->nodeValue;
//        $channel_link = $channel->getElementsByTagName('link')
//            ->item(0)->childNodes->item(0)->nodeValue;
//        $channel_desc = $channel->getElementsByTagName('description')
//            ->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
//        echo("<p class=\"alert-success\"><a  class=\"btn-link\" href='" . $channel_link
//            . "'>" . $channel_title . "</a>");
//        echo("<br>");
//        echo($channel_desc . "</p>");

//get and output "<item>" elements
        $x=$xmlDoc->getElementsByTagName('item');
        for ($i=0; $i<=5; $i++) {
            $item_title=$x->item($i)->getElementsByTagName('title')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_link=$x->item($i)->getElementsByTagName('link')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_desc=$x->item($i)->getElementsByTagName('description')
                ->item(0)->childNodes->item(0)->nodeValue;
            echo ("<p class=\"alert-info\"><a class=\"btn-link\" href='" . $item_link
                . "'>" . $item_title . "</a></p>");
            echo ("<br>");
            echo ("<p class=\"col-sm-2\>".$item_desc . "</p>");
        }
    }
    public function getRssFeedApple(){
//        $xml='https://www.apple.com/main/rss/hotnews/hotnews.rss';
        $xml='http://www.cnet.com/rss/news';
        $xmlDoc = new DOMDocument();
        $xmlDoc->load($xml);

//get elements from "<channel>"
//        $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
//        $channel_title = $channel->getElementsByTagName('title')
//            ->item(0)->childNodes->item(0)->nodeValue;
//        $channel_link = $channel->getElementsByTagName('link')
//            ->item(0)->childNodes->item(0)->nodeValue;
//        $channel_desc = $channel->getElementsByTagName('description')
//            ->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
//        echo("<p class=\"alert-success\"><a  class=\"btn-link\" href='" . $channel_link
//            . "'>" . $channel_title . "</a>");
//        echo("<br>");
//        echo($channel_desc . "</p>");

//get and output "<item>" elements
        $x=$xmlDoc->getElementsByTagName('item');
        for ($i=0; $i<=5; $i++) {
            $item_title=$x->item($i)->getElementsByTagName('title')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_link=$x->item($i)->getElementsByTagName('link')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_desc=$x->item($i)->getElementsByTagName('description')
                ->item(0)->childNodes->item(0)->nodeValue;
            echo ("<p class=\"alert-info\"><a class=\"btn-link\" href='" . $item_link
                . "'>" . $item_title . "</a></p>");
            echo ("<br>");
            echo ("<p class=\"col-sm-2\>".$item_desc . "</p>");
        }
    }
}
