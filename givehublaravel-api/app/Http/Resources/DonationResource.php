<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_donasi,
            'nama_donasi' => $this->nama_donasi,
            'lokasi_donasi' => $this->lokasi_donasi,
            'nama_yayasan' => $this->nama_yayasan,
            'gambar' => url('/storage/donations/' . $this->gambar),
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'user' => new UserResource($this->user),
        ];
    }
}
