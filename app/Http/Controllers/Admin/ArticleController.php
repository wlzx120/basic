<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Column;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function index(Request $request)
    {
        $columns = Column::all();
        $article = new Article();
        $where = $article;
        //获取搜索条件
        if($request->search_cid){
            $where = $where->where('column_id','=',trim($request->search_cid));
        }
        if($request->search_title){
            $where = $where->where('title','like','%'.trim($request->search_title).'%');
        }
        $articles = $where->paginate(3);
        //搜索条件保持
        $articles->cid = $request->search_cid;
        $articles->title = $request->search_title;
        return view('admin.article.index',compact('articles','columns'));
    }

    public function show(Article $article)
    {
        return view('admin.article.show',compact('article'));
    }

    public function create()
    {
        $columns = Column::all();
        return view('admin.article.create',compact('columns'));
    }

    public function store(Request $request,Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required',
            'column_id' => 'required|integer',
            'author' => 'required|string',
        ]);
        $data = [
            'title' => $request->title,
            'content' => htmlentities($request->content),
            'column_id' => $request->column_id,
            'author' => $request->author
        ];
        Article::create($data);
        session()->flash('success','添加成功');
        return redirect()->route('admin.article.index');
    }

    public function edit(Article $article,Request $request)
    {
        $columns = Column::all();
        $article->oldurl = $_SERVER['HTTP_REFERER'];
        return view('admin.article.edit',compact('article','columns'));
    }

    public function update(Request $request,Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required',
            'column_id' => 'required|integer'
        ]);
        $data =[
            'title' => $request->title,
            'content' => $request->content,
            'column_id' => $request->column_id,
        ];
        $article->update($data);
        session()->flash('success','修改成功');
        return redirect($request->oldurl);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('success','删除成功');
        return back();
    }




}
