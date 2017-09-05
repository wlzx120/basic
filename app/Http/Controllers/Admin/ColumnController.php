<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Column;

class ColumnController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth');
    }

    public function index()
    {
        $columns = Column::paginate(6);
        return view('admin.column.index',compact('columns'));
    }

    public function create()
    {
        return view('admin.column.create');
    }

    public function store(Request $request,Column $column)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);
        $column->name = $request->name;
        $column->save();
        session()->flash('success','添加成功');
        return redirect()->route('admin.column.index');
    }

    public function edit(Column $column)
    {
        return view('admin.column.edit',compact('column'));
    }

    public function update(Request $request,Column $column)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);
        $column->name = $request->name;
        $column->save();
        session()->flash('success','修改成功');
        return redirect()->route('admin.column.index');
    }

    public function destroy(Column $column)
    {
        $column->delete();
        session()->flash('success','删除成功');
        return back();
    }

}
