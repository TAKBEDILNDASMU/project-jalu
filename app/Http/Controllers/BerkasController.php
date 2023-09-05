<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class BerkasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request, Berkas $berkas) : Response
    {
        return response()->view('berkas.manage-berkas', [
            'berkas' => $berkas::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Berkas $berkas) : RedirectResponse
    {
        $incomingFields = $request->validate([
            'nama_berkas' => 'required',
        ]);

        if($request->hasFile('path_berkas')) {
            $incomingFields['path_berkas'] = $request->file('path_berkas')->store('docs', 'public');
            Berkas::create($incomingFields);
        }

        return response()->redirectToRoute('berkas.index')->with('success', "Berkas berhasil ditambahkan"); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berkas $berkas) : RedirectResponse
    {
        $incomingFields = $request->validate([
            'nama_berkas' => 'required',
        ]);


        if($request->hasFile('path_berkas')) {
            $this->deleteFile($request, $berkas);
            $incomingFields['path_berkas'] = $request->file('path_berkas')->store('docs', 'public');
        }

        $berkas->update($incomingFields);
        return response()->redirectToRoute('berkas.index')->with("success", "Berkas berhasil diedit"); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Berkas $berkas)
    {
        $this->deleteFile($request, $berkas);
        $berkas->delete();
        return response()->redirectToRoute('berkas.index')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Remove File that already uploaded
     */
    public function deleteFile(Request $request, Berkas $berkas) 
    {
        $pathBerkas = 'storage/' . $berkas->path_berkas;
        if(File::exists(public_path($pathBerkas))) {
            File::delete(public_path($pathBerkas));
        } else {
            dd('berkas tidak ada');
        }
    }
}