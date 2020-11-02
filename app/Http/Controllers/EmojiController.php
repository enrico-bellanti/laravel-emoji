<?php

namespace App\Http\Controllers;

use App\Emoji;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmojiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emoji = Emoji::all();
        return view('emoji.index', compact('emoji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emoji.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'slug' => "required",
            'character' => "required",
            'unicodeName' => "required|unique:emoji|max:100",
            'codePoint' => "required|unique:emoji",
            'group' => "required|max:100",
            'subGroup' => "required|max:100",
        ]);
        $newEmoji = new Emoji;
        $newEmoji->fill($data);
        $newEmoji->save();
        
        return redirect()->route('emoji.show', $newEmoji->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emoji = Emoji::find($id);
        return view('emoji.show', compact('emoji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Emoji $emoji)
    {
        return view('emoji.edit', compact('emoji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emoji $emoji)
    {
        $data = $request->all();
        $request->validate([
            'slug' => "required",
            'character' => "required",
            "unicodeName"=> [
                "required",
                "max:100",
                Rule::unique('emoji')->ignore($emoji),
            ],
            "codePoint"=> [
                "required",
                "max:15",
                Rule::unique('emoji')->ignore($emoji),
            ],
            'group' => "required|max:100",
            'subGroup' => "required|max:100",
        ]);

        $emoji->update($data);
        
        return redirect()->route('emoji.show', $emoji);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emoji $emoji)
    {
        $emoji->delete();
        return redirect()->route('emoji.index');
    }
}
