<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

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
        // check the value of nama_berkas and path_berkas, return error if there is no value and if it's same with other data
        $incomingFields = $request->validate(
            [
                'nama_berkas' => ['required', Rule::unique('berkas', 'nama_berkas')],
                'path_berkas' => 'required'
            ],
            [
                'nama_berkas.required' => "Nama Berkas harus diisi",
                'nama_berkas.unique' => "Nama berkas sudah ada, ganti yang lain",
                'path_berkas.required' => "File berkas tidak ada"
            ]
        );

        // storing the uploaded file into storage file and then submit the credential to database
        $incomingFields['path_berkas'] = $request->file('path_berkas')->store('docs', 'public');
        Berkas::create($incomingFields);

        return response()->redirectToRoute('berkas.index')->with('success', "Berkas berhasil ditambahkan"); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berkas $berkas) : RedirectResponse
    {
        // check the value of nama_berkas, return error if there is no value and if it's same with other data
        $incomingFields = $request->validate(
            [
                'nama_berkas' => 'required',
            ],
            [
                'nama_berkas.required' => "Nama Berkas harus diisi",
            ]
        );

        // return error if the nama_berkas has the same value and user not uploaded a file
        if($incomingFields['nama_berkas'] == $berkas->nama_berkas && !$request->hasFile('path_berkas')) {
            return response()->redirectToRoute('berkas.index')->with("error", "Mohon ganti nama atau file berkas"); 
        }

        // if the user upload an file, delete the previous file and store the new file into the storage
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
    private function deleteFile(Request $request, Berkas $berkas) 
    {
        $pathBerkas = 'storage/' . $berkas->path_berkas;
        if(File::exists(public_path($pathBerkas))) {
            File::delete(public_path($pathBerkas));
        } else {
            dd('berkas tidak ada, mungkin folder storage belum link ke folder public ?');
        }
    }
}