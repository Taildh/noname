@extends('dashboard.layouts.master')

@section('title')
    Create new post
@endsection

@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/assets/global/plugins/select2/select2.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('metronic/assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>
@endsection

@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('dashboard.posts.index') }}">Posts</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('dashboard.posts.create') }}">Create new post</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-plus font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Create new post</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" action="{{ route('dashboard.posts.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Category</label>
                                <div class="col-md-10">
                                    <select class="form-control input-xlarge select2me" name="category_id"
                                            data-placeholder="Select...">
                                        <option value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id')) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div>
                                    <span class="text-danger">{{ $message }}!</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Title" name="title">
                                    <div class="form-control-focus">
                                    </div>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Description</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Description"
                                           name="description">
                                    <div class="form-control-focus">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Content</label>
                                <div class="col-md-10">
                                    <textarea class="ckeditor form-control" name="detail" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Image</label>
                                <div class="col-md-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new">Select image </span>
													<span class="fileinput-exists">Change </span>
													<input type="file" name="image">
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists"
                                               data-dismiss="fileinput">Remove </a>
                                        </div>
                                        <div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-10">
                                    <input type="checkbox" checked class="make-switch" value="1" name="status">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="button" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('metronic/assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('metronic/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
@endsection
