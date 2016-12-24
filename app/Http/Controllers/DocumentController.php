<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::all();
    }

    public function store(Request $request)
    {
        $document = new Document;
        $document->name = $request->name;
        $document->link = $request->link;
        $document->team_id = $request->team_id;

        if ($document->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Document::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $document = Document::find($request->id);
        $document->name = $request->name;
        $document->link = $request->link;
        $document->team_id = $request->team_id;
        if ($document->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Document::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
