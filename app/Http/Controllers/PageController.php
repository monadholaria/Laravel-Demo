<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * To get current Logged in user
         */
        $user = Auth::user();

        /*
         * To get all Pages created by current logged in user
         */
        $data['pages'] = Page::where('user_id',$user->id)->get();
        return view('pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * Form request validation
         */
        $this->validate($request,[
            'page_title'=>'required|max:255',
            'page_content'=>'required'
        ]);

        /*
         * To get all data of request
         */
        $data = $request->all();

        /*
         * To get current logged in user
         */
        $user = Auth::user();
        $data['user_id'] = $user->id;

        /*
         * To create Page
         */
        $page = Page::create($data);

        return redirect(action('PageController@index'))->with('message','Page has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        /*
         * To authorize user using Page Policy
         */
        $this->authorize($page);
        return view('pages.view',['pageData'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        /*
         * To authorize user using Page Policy
         */
        $this->authorize($page);
        return view('pages.edit',['pageData'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        /*
         * To authorize user using Page Policy
         */
        $this->authorize($page);

        /*
         * Form request validation
         */
        $this->validate($request,[
            'page_title'=>'required|max:255',
            'page_content'=>'required'
        ]);

        /*
         * To get all data of request
         */
        $data = $request->all();

        /*
         * To update page data
         */
        $page = $page->update($data);

        return redirect(action('PageController@index'))->with('message','Page has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        /*
         * To authorize user using Page Policy
         */
        $this->authorize($page);

        /*
         * To delete page
         */
        $result = $page->delete();
        return redirect(action('PageController@index'))->with('message','Page has been deleted.');

    }
}
