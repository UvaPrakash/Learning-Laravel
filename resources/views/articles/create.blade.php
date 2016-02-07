@extends('app')

@section('title')
    <title>Create Article</title>
@stop

@section('content')
    <h1>Write a new article</h1>
    
    <hr/>
    
    {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
        @include('articles/form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!} 
    
   @include('errors/list') 
    
@stop
