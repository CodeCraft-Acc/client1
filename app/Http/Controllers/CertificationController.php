<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('created_at', 'desc')->get();
        return view('sertifikasi', compact('certifications'));
    }

    public function create()
    {
        $certifications = Certification::orderBy('created_at', 'desc')->get();
        return view('sertifikasi', ['action' => 'add', 'certifications' => $certifications]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:honey,water,salt,flour,oil',
            'status' => 'required|in:active,pending,expired',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after:issue_date',
            'certificate_number' => 'required|string|max:255',
            'laboratory' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/certifications', $filename);
            $validated['file_path'] = 'certifications/' . $filename;
        }

        Certification::create($validated);

        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil ditambahkan');
    }

    public function show(Certification $certification)
    {
        $certifications = Certification::orderBy('created_at', 'desc')->get();
        return view('sertifikasi', ['action' => 'show', 'certification' => $certification, 'certifications' => $certifications]);
    }

    public function edit(Certification $certification)
    {
        $certifications = Certification::orderBy('created_at', 'desc')->get();
        return view('sertifikasi', ['action' => 'edit', 'certification' => $certification, 'certifications' => $certifications]);
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:honey,water,salt,flour,oil',
            'status' => 'required|in:active,pending,expired',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after:issue_date',
            'certificate_number' => 'required|string|max:255',
            'laboratory' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($certification->file_path) {
                Storage::delete('public/' . $certification->file_path);
            }
            
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/certifications', $filename);
            $validated['file_path'] = 'certifications/' . $filename;
        }

        $certification->update($validated);

        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil diperbarui');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->file_path) {
            Storage::delete('public/' . $certification->file_path);
        }
        
        $certification->delete();

        return redirect()->route('certifications.index')
            ->with('success', 'Sertifikasi berhasil dihapus');
    }

    public function download(Certification $certification)
    {
        if (!$certification->file_path) {
            return back()->with('error', 'File sertifikasi tidak ditemukan');
        }
        return Storage::disk('public')->download($certification->file_path);
    }
}
