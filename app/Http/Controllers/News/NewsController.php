<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Gate;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $News = News::orderBy('id' , 'desc')->paginate(10);
//        $news = News::paginate(10);
        $count = News::count();

        return view('News.index' , compact('News' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $News)
    {
        if (Gate::denies('manage-News')) {
            return redirect()->route('category.index');
        }
        $categories = Category::all();
        return view('News.create' , compact('categories' ,'News'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title'=>'required|max:200',
            'subject'=>'required',
        ]);

        $News = new News();

        $News->title = $request->input('title');
        $News->subject = $request->input('subject');
        $News->category_id = $request->input('category');

        $News->save();

        return redirect(route('news.index'))->with('msg' , 'The News Has Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('News.show' , compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if (Gate::denies('manage-News')) {
            return redirect()->route('news.show');
        }
        $this->validate($request , [
            'name'=>'sometimes|max:200|unique:categories,name,' . $news->id,
            'subject'=>'sometimes|'
        ]);

        $news->title = $request->title;
        $news->subject = $request->subject;
        $news->save();

        return back()->with('success' , 'The News has Been Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , News $news)
    {

        if (Gate::denies('manage-News')) {
            return redirect()->route('news.show');
        }
        $news->delete();

        return redirect()->route('news.index')->with('success' , 'The Category has Been Deleted Successfully !');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $News = News::where('title' , 'like' , "%$search%")->paginate(10);
        $count = $News->count();

        return view('News.SearchResult' ,compact('News' ,'count'));
    }
}
