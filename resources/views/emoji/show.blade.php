@extends('layout.layout')

@section('main')
    <ul class="emoji-infos">
        <li>{{$emoji->character}}</li>
        <li>Slug: {{$emoji->slug}}</li>
        <li>Unicode name: {{$emoji->unicodeName}}</li>
        <li>Code point:{{$emoji->codePoint}}</li>
        <li>Group: {{$emoji->group}}</li>
        <li>Sub Group: {{$emoji->subGroup}}</li>
        <li>
            <form action="{{route('emoji.destroy', $emoji)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </li>
        <li><a href="{{route('emoji.edit', $emoji)}}">Edit</a></li>
        <li><a href="{{route('emoji.index')}}">Back</a></li>
    </ul>
@endsection