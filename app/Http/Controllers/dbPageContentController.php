<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PageContent;

class dbPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("editlp.index", [
            "editlp" => PageContent::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("editlp.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Buat instance baru dari model PageContent
        $pageContent = new PageContent();

        // Isi atribut-atribut model dengan data yang diterima dari form
        $pageContent->title = $request->title;
        $pageContent->subtitle = $request->subtitle;
        $pageContent->description = $request->description;

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images'); // Simpan gambar ke direktori 'images'
            $pageContent->image = $imagePath; // Simpan nama file gambar ke dalam atribut image
        }

        // Simpan data ke dalam database
        $pageContent->save();

        // Redirect ke halaman yang sesuai, misalnya halaman yang menampilkan data yang baru saja disimpan
        return redirect()->route('editlp.index')->with('success', 'Data has been saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editlp = PageContent::find($id);
        if (!$editlp) return redirect()->route('editlp.index')->with('error', 'Data not found');
        return view('editlp.edit', [
            'editlp' => $editlp
        ]);
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
        $editlp = PageContent::find($id);

        // Validasi data yang dikirimkan melalui form
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan gambar baru jika diunggah
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images'); // Simpan gambar ke direktori 'images'

            // Hapus gambar lama jika ada dan simpan yang baru
            if ($editlp->image) {
                Storage::delete($editlp->image); // Hapus gambar lama
            }
            $editlp->image = $imagePath; // Simpan nama file gambar baru
        }

        // Update judul, subjudul, dan deskripsi
        $editlp->title = $request->title;
        $editlp->subtitle = $request->subtitle;
        $editlp->description = $request->description;

        // Simpan perubahan
        $editlp->save();

        return redirect()->route('editlp.index')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editlp = PageContent::find($id);

        if ($editlp) {
            if ($editlp->image) {
                Storage::delete($editlp->image); // Hapus gambar
            }
            $editlp->delete(); // Hapus data
        }

        return redirect()->route('editlp.index')->with('success', 'Data has been deleted successfully');
    }
}

