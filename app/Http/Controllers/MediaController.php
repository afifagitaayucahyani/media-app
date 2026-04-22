<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Media;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::get();
        return response()->json($media);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi form
        $validator = Validator::make ($request->all(), [
            'mahasiswa_id' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'judul_penelitian' => 'required',
            'tahun_terbit' => 'required',
            'link_media' => 'required',
            'gambar_cover' => 'required',
        ]);

        // cek jika ada error validasi form
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

        // menyimpan data
        $media = new Media;
        $media->fill($request->all());
        $simpan = $media->save();

        if($simpan) {
            return response()->json([
                'status' => 'success'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal menyimpan data'
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validator = Validator::make ($request->all(), [
            'mahasiswa_id' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'judul_penelitian' => 'required',
            'tahun_terbit' => 'required',
            'link_media' => 'required',
            'gambar_cover' => 'required',
        ]);

        // cek jika ada error validasi form
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

    //cari data berdasarkan id
        $media = Media::find($id);

        // jika data tidak ditemukan
        if (!$media) {
            return response()->json([
                'status' => 'error',
                'error' => 'data tidak ditemukan'
            ], 422);
        }

        // update data
        $media->fill($request->all());
        $simpan = $media->save();

        if($simpan) {
            return response()->json([
                'status' => 'success'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'gagal menyimpan data'
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari data berdasarkan id
        $media = Media::find($id);

        // jika data tidak ditemukan
        if (!$media) {
            return response()->json([
                'status' => 'error',
                'error' => 'data tidak ditemukan'
            ], 422);
        }

        // hapus data
        $hapus = $media->delete();
        if($hapus) {
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil dihapus'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'gagal menghapus data'
            ], 422);
        }
    }
}
