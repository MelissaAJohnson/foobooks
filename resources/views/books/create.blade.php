@extends('layouts.master')


@section('title')
    Create book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/books/create.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <br>
    <form method="POST" action="/books/create">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="title">
        <input type="submit">
    </form>
    <br>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop