@extends('layouts.app')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="author" content="Gekkode">
@endsection

@section('title')
    <title>{{setting('ToDo')}}</title>
@endsection

@section('content')
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Resultat after the search process:
                <small>{{$key}}</small>
            </h1>

            @include('_partials.posts-list')

        </div>
        @include('_partials.sidebar')
    </div>
@endsection