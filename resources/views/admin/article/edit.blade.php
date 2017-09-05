@extends('admin.layouts.default')
@section('content')
<div class="content-wrapper">
    @include('admin.shared.tips')
    <section class="content-header">
      <h1>
        文章管理
        <small>文章修改</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <section class="content">
    <div class='row'>
    <div class='col-md-12'>
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">填写表单</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.article.update',[$article->id]) }}">
                <input type="hidden" name="oldurl" value="{{ $article->oldurl }}"  />
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
                  <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="标题" value="{{ $article->title }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">选择分类</label>
                  <div class="col-sm-10">
                      <select name="column_id" class="form-control">
                            @foreach($columns as $column)
                            @if($column->id == $article->column_id)
                            <option value="{{ $column->id }}" selected>{{ $column->name }}</option>
                            @else
                            <option value="{{ $column->id }}">{{ $column->name }}</option>
                            @endif
                            @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">作者</label>
                  <div class="col-sm-10">
                      <input type="text" name="author" class="form-control" id="inputEmail3" placeholder="作者" value="{{ $article->author }}">
                  </div>
                </div>
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">内容2</label>
                <div class="col-sm-10">
                    @include('vendor.UEditor.head')
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="content" type="text/plain" style='width:100%;height:300px;'>
                        {!! html_entity_decode($article->content) !!}
                    </script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                        ue.ready(function(){
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); 
                        });
                    </script>
                </div>
                </div>
                  
              </div>
              <div class="box-footer text-center">
                <button type="reset" class="btn btn-default">重置</button>&nbsp;
                <button type="submit" class="btn btn-info">提交</button>
              </div>
            </form>
          </div>
    </div>
    

</div>
    </section>
  </div>
@stop