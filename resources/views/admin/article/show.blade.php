@extends('admin.layouts.default')
@section('content')
<div class="content-wrapper">
    @include('admin.shared.messages')
    @include('admin.shared.errors')
    <section class="content-header">
      <h1>
        文章管理
        <small>文章预览</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level </a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
              <div class="row">

              </div>
            </div>
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        {!! html_entity_decode($article->content) !!}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
  </div>
@stop