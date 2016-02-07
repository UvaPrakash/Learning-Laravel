@extends('app') 

@section('title')
    <title>About</title>
@stop

@section('content')

@if(count($people))
<h3>People:</h3>
<ul>
    @foreach($people as $person)
        <li>{{$person}}</li>
    @endforeach
</ul>
@endif

@if($first == 'Uva')
    <h1>About Me: {!! $first !!} {!! $last !!}</h1>
@else
    <h1>Failed</h1>
@endif

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut diam feugiat, ultrices libero at, aliquet felis. Proin iaculis neque mi, tincidunt dapibus felis egestas ut. Vestibulum mollis elementum felis ut porta. Aenean ornare risus ac lobortis feugiat. Nulla lacus massa, posuere eu erat eget, molestie tristique odio. Nunc imperdiet rhoncus neque, ac aliquam metus lacinia condimentum. Phasellus ultrices mi quis est convallis sollicitudin. Mauris ac urna molestie, gravida odio eu, malesuada velit. Nam porttitor semper elit sed vestibulum.</p>

@stop