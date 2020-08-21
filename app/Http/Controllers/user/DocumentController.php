<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\DocumentUpload;
use App\News;
use App\EventVideos;


use Auth;
use DB;
use Input;
use Redirect;
use Session;

use App\Helpers\Thumbnail;


use App\Http\Controllers\user\UserAdminController;
use Response;

class DocumentController extends UserAdminController
{

    public function download()
    {

        $title = trans('download.document_download');
        $sub_title =  trans('download.document_download');
        $method  =  trans('download.document_download');
        $downloads = DocumentUpload::paginate(10);
        return view('app.user.documents.documentsupload', compact('title', 'downloads', 'sub_title', 'method'));
    }
    public function getDownload(Request $request)
    {
        

         $name    = $request->name;
        $file    = storage_path() . "/uploads/documents/" . $request->name;
        $headers = array(
            'Content-Type: application/pdf',
        );


        return Response::download($file, $request->name, $headers);
    }
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewnews($id)
    {
        $title     =  trans('users.view_news');
        $sub_title =  trans('users.view_news');
        $base      =  trans('users.view_news');
        $method    =  trans('users.view_news');
        $post=News::find($id);
        return view('app.user.users.viewnews', compact('title', 'sub_title', 'base', 'method', 'post'));
    }
    public function allnews()
    {
        $title     =  trans('users.view_news');
        $sub_title =  trans('users.view_news');
        $base      =  trans('users.view_news');
        $method    =  trans('users.view_news');
        $news=News::orderBy('created_at', 'DESC')->paginate(5);
        return view('app.user.users.allnews', compact('title', 'sub_title', 'base', 'method', 'news'));
    }

    public function allvideos()
    {
        $title     =  trans('users.videos');
        $sub_title =  trans('users.videos');
        $base      =  trans('users.videos');
        $method    =  trans('users.videos');
        $videos=EventVideos::all();
        $result=array();
        foreach ($videos as $key => $video) {
            $video_html=EventVideos::getVideoHtmlAttribute($video->url);
            $result[$video->id]['id']=$video->id;
            $result[$video->id]['title']=$video->title;
            $result[$video->id]['url']=$video_html;
            $result[$video->id]['created']=$video->created_at;
          # code...
        }
        // dd($result);
        // dd($result);
        return view('app.user.users.videos', compact('title', 'sub_title', 'base', 'method', 'result'));
    }
}
