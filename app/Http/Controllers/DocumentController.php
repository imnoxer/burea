<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('welcome', compact('documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new Document();
        $document->fill($request->all());
        $document->save();
        Session::flash('message', 'Document created!');
        Session::flash('alert-class', 'success');
        return redirect()->route('show', $document->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Document::all();
        $first = $documents->where('id', $id)->first();
        return view('welcome', compact('documents', 'first'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $document->title = $request->title;
        $document->content = $request->content;
        $document->save();
        Session::flash('message', 'Document updated!');
        Session::flash('alert-class', 'success');
        return redirect()->route('show', $document->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        $documents = Document::all();
        Session::flash('message', 'Document deleted!');
        Session::flash('alert-class', 'danger');
        return view('welcome', compact('documents'));
    }
}
