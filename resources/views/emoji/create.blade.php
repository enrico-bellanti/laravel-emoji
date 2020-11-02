@extends('layout.layout')
@section('main')
    <h2>Add new Emoticon</h2>
    <form action="{{route('emoji.store')}}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug">
        </div>
        <div>
            <label for="character">Character</label>
            <input type="text" name="character" id="character">
        </div>
        <div>
            <label for="unicodeName">Unicode name</label>
            <input type="text" name="unicodeName" id="unicodeName">
        </div>
        <div>
            <label for="codePoint">CodePoint</label>
            <input type="text" name="codePoint" id="codePoint">
        </div>
        <div>
            <label for="group">Group</label>
            <input type="group" name="group" id="group">
        </div>
        <div>
            <label for="subGroup">SubGroup</label>
            <input type="subGroup" name="subGroup" id="subGroup">
        </div>
        <input type="submit" value="Insert">
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