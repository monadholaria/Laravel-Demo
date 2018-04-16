@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Page List</div>

                    <div class="card-body">
                        @include('includes.messages')

                        <form method="post" id="pageForm">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <div class="col-md-12 form-row">
                                    <input placeholder="Enter page title" class="form-control" type="text" name="page_title" value="{!! old('page_title') !!}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 form-row">
                                    <textarea id="content" placeholder="Enter page content" class="form-control" name="page_content">{!! old('page_content') !!}</textarea>
                                </div>
                            </div>
                            <div class="row form-row">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/page.js"></script>
@endsection