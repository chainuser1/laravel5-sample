<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Carbon;
use Illuminate\Http\Request;
use Validator;
use Response;
use DOMDocument;
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
            return view('news.news',compact('feed'));
        else
            return view('news.news',array('error'=>'There are no news published'));
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
                $title=htmlentities($req->input('title'));
                $slug=$req->input('slug');
                $title='\''.$title.'\'';
                $content=htmlentities($req->input('content'));
                $content='\''.$content.'\'';
                $created_at=$req->input('created_at');

                $array=array('title'=>$title,'slug'=>$slug,'content'=>$content,'created_at'=>$created_at);

                $validator=Validator::make($array,[
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
       try{
           $article=$table->where('slug','=',$slug)->first();
           if(!is_null($article))
               return view('news.show',compact('article'));
           else
               return view('news.show',array('error'=>'Unable to fetch this news story. It does not appear in our database.'));
       }
       catch(QueryException $e){
           return view('news.show',array('error'=>'Unable to fetch this news story. It does not appear in our database.'));
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
    public function update($slug, Request $req, News $table)
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
           $story=$table->where('slug','=',$slug);
           $story->title=$req->input('title');
           $story->content=$req->input('content');
           $story->created_at=$req->input('created_at');
           $story->save();
           return "Your news was successfully updated.";
       }
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
    /**
     * View all unpublished news
     * @return Response
     */
    public function viewUnpublished(){
        $news=new News;
        $feed=$news->unpublished()->paginate(4);
        if(!is_null($feed))
            return view('news.news',compact('feed'));
        else
            return view('news.news',array('error'=>'There are no news published'));
    }


    public function getRssFeed(){
        $xml='http://news.google.com/news?ned=us&topic=h&output=rss';
        $xmlDoc = new DOMDocument();
        $xmlDoc->load($xml);

//get elements from "<channel>"
        $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
        $channel_title = $channel->getElementsByTagName('title')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_link = $channel->getElementsByTagName('link')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_desc = $channel->getElementsByTagName('description')
            ->item(0)->childNodes->item(0)->nodeValue;

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
        $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
        $channel_title = $channel->getElementsByTagName('title')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_link = $channel->getElementsByTagName('link')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_desc = $channel->getElementsByTagName('description')
            ->item(0)->childNodes->item(0)->nodeValue;

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
