<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        $query = Document::query();
        
        // Filter by category if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }
        
        $documents = $query->latest()->get();
        
        return view('dokumen', compact('documents'));
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:SPPCA,SPPKA,Dokumen Arsip',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'laboratory' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');
        
        $document = Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'year' => $request->year,
            'laboratory' => $request->laboratory,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()->route('documents.index', ['category' => $request->category])
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Display the specified document.
     */
    public function show(Document $document)
    {
        return view('dokumen.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     */
    public function edit(Document $document)
    {
        return view('dokumen.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'laboratory' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240'
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $file = $request->file('file');
            $path = $file->store('documents', 'public');
            
            $document->update([
                'file_path' => $path,
                'file_name' => $file->getClientOriginalName(),
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $file->getSize()
            ]);
        }

        $document->update([
            'title' => $request->title,
            'description' => $request->description,
            'laboratory' => $request->laboratory
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus');
    }

    /**
     * Download the specified document.
     */
    public function download(Document $document)
    {
        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }
}
