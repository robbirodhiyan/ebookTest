<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        return view('ebooks.index', compact('ebooks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'file_pdf' => 'required|mimes:pdf',
        ]);
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('storage\PDF', $fileName);
        }
        Ebook::create([
            'nama' => $request->nama,
            'file_pdf' => $filePath ?? null,
        ]);

        return redirect()->route('ebook.index')->with('success', 'Ebook berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $ebook = Ebook::find($id);
        $ebook->delete();
        return redirect()->route('ebook.index')->with('success', 'Ebook berhasil dihapus');
    }

    public function viewPdf($id)
    {
        $ebook = Ebook::findOrFail($id);

        if (!$ebook->file_pdf) {
            abort(404, 'File PDF tidak ditemukan.');
        }

        $pdfContent = Storage::get($ebook->file_pdf);

        $pdfBase64 = base64_encode($pdfContent);

        $fileName = pathinfo($ebook->nama, PATHINFO_FILENAME);

        return view('ebooks.view_pdf', compact('pdfBase64', 'fileName'));
    }
}
