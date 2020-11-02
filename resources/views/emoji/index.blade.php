@extends('layout.layout')

@section('main')
<div>
    <a href="{{route('emoji.create')}}">Add Emoticon</a>
</div>
<ul>
    @foreach ($emoji as $singleEmoji)
        <li><a href="{{route('emoji.show', $singleEmoji->id)}}">{{$singleEmoji->character}}</a></li>
    @endforeach
</ul>
@endsection