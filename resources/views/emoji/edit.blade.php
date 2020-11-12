@extends('layout.layout')
@dd($article)
@section('main')
    <h2>Edit Emoticon</h2>
    <form action="{{route('emoji.update', $emoji)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{$emoji->slug}}">
        </div>
        <div>
            <label for="character">Character</label>
            <input type="text" name="character" id="character" value="{{$emoji->character}}">
        </div>
        <div>
            <label for="unicodeName">Unicode name</label>
            <input type="text" name="unicodeName" id="unicodeName" value="{{$emoji->unicodeName}}">
        </div>
        <div>
            <label for="codePoint">CodePoint</label>
            <input type="text" name="codePoint" id="codePoint" value="{{$emoji->codePoint}}">
        </div>
        <div>
            <label for="group">Group</label>
            <input type="group" name="group" id="group" value="{{$emoji->group}}">
        </div>
        <div>
            <label for="subGroup">SubGroup</label>
            <input type="subGroup" name="subGroup" id="subGroup" value="{{$emoji->subGroup}}">
        </div>
        <input type="submit" value="Edit">
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection