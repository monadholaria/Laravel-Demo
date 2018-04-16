@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1 class="float-left">{!! $pageData->page_title !!}</h1><span class="float-right"><a href="{!! action('PageController@edit',$pageData->id) !!}">Edit</a></span></div>

                    <div class="card-body">
                        @include('includes.messages')

                        {!! $pageData->page_content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
