<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $news;
    public function _construct(){
        $this->news=new News;
        $this->middleware('guest', ['except' => ['getLogout']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return "No news today";
    }
    public function find($slug){
        $result=$this->news->get($slug)->first();
        return view('show-news')->withResult();
    }

}
