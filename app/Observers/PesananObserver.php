<?php

namespace App\Observers;

use App\Models\Pesanan;
use App\Services\FonnteService;

class PesananObserver
{
    public function updated(Pesanan $pesanan): void
    {
        // cek apakah status berubah
        if ($pesanan->isDirty('status')) {

            $statusBaru = $pesanan->status;

            $message = match ($statusBaru) {

                'dicuci' =>
                    "Halo {$pesanan->user->name}, laundry Anda sedang dicuci.",

                'disetrika' =>
                    "Halo {$pesanan->user->name}, laundry Anda sedang disetrika.",

                'siap_diambil' =>
                    "Halo {$pesanan->user->name}, laundry Anda sudah selesai dan siap diambil.",

                'selesai' =>
                    "Terima kasih {$pesanan->user->name}, laundry Anda telah selesai.",

                default => null,
            };


            if ($message && $pesanan->user->nomor_whatsapp) {

                FonnteService::send(
                    $pesanan->user->nomor_whatsapp,
                    $message
                );

            }
        }
    }
}