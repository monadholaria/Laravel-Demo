@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Page List</div>

                    <div class="card-body">
                        @include('includes.messages')
                        @if(count($pages))
                            <ul class="list-group">
                                @foreach($pages as $page)
                                    <li class="list-group-item">{!! $page->page_title !!}<span class="float-right"><a href="{!! action('PageController@show',$page->id) !!}">View</a></span></li>
                                @endforeach
                            </ul>
                        @else
                            <div>Pages not available. <a href="{!! action('PageController@create') !!}">Create it.</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
