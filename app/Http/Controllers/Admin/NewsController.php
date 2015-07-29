<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateNewsRequest;
use App\News;
use Carbon;
class NewsController extends Controller
{
    protected $news;
    /**
     * Create a new controller instance.
     * @return void
     */

    public function _construct(){
        $this->middleware('auth');
        $this->news=new News;
    }


     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getIndex()
    {
        //$feed=$this->news->findAll()->where('created_at','<=',Carbon::now());
        return view('news.news'/*,compact('feed')*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return view('news.create-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore(CreateNewsRequest $request)
    {
            if($request->ajax()){
                return $request->get('_token');
            }
            else
               return '<p class="alert-primary">'.$request->get('created_at').'</p>';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postDestroy($id)
    {
        //
    }
}
