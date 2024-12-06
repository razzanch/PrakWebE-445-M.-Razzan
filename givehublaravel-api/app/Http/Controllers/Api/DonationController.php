<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DonationResource;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('user')->latest()->paginate(5);
        return DonationResource::collection($donations);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_donasi' => 'required',
            'lokasi_donasi' => 'required',
            'nama_yayasan' => 'required',
            'gambar' => 'required|image|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('gambar')->store('public/donations');

        $donation = Donation::create([
            'nama_donasi' => $request->nama_donasi,
            'lokasi_donasi' => $request->lokasi_donasi,
            'nama_yayasan' => $request->nama_yayasan,
            'gambar' => basename($image),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'user_id' => $request->user_id,
        ]);

        return new DonationResource($donation);
    }

    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return new DonationResource($donation);
    }

    public function update(Request $request, $id)
{
    // Menggunakan _method untuk mendeteksi PUT
    if ($request->_method !== 'PUT') {
        return response()->json(['message' => 'Method Not Allowed'], 405);
    }

    // Log data request yang diterima
    Log::info('Data yang dikirimkan:', $request->all());

    $donation = Donation::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'nama_donasi' => 'sometimes|string',
        'lokasi_donasi' => 'sometimes|string',
        'nama_yayasan' => 'sometimes|string',
        'gambar' => 'sometimes|image|max:2048',
        'tanggal_mulai' => 'sometimes|date',
        'tanggal_selesai' => 'sometimes|date',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Proses gambar jika ada file yang diupload
    if ($request->hasFile('gambar')) {
        Storage::delete('public/donations/' . $donation->gambar);
        $image = $request->file('gambar')->store('public/donations');
        $donation->gambar = basename($image);
    }

    // Update data donasi
    $donation->update($request->only([
        'nama_donasi',
        'lokasi_donasi',
        'nama_yayasan',
        'tanggal_mulai',
        'tanggal_selesai',
    ]));

    return new DonationResource($donation);
}





    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        Storage::delete('public/donations/' . $donation->gambar);
        $donation->delete();

        return response()->json(['message' => 'Donation deleted successfully'], 200);
    }
}
