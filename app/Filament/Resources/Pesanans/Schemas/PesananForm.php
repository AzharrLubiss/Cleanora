<?php

namespace App\Filament\Resources\Pesanans\Schemas;

use App\Models\Layanan;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class PesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([

                TextInput::make('kode_pesanan')
                    ->label('Kode Pesanan')
                    ->disabled()
                    ->dehydrated(),


                Select::make('user_id')
                    ->label('Pelanggan')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->where('role', 'pelanggan')
                    )
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set) {

                        $user = User::find($state);

                        $set('nomor_whatsapp', $user?->nomor_whatsapp);

                    })
                    ->required(),

                TextInput::make('nomor_whatsapp')
                    ->label('Nomor WhatsApp')
                    ->readOnly()
                    ->dehydrated(false)
                    ->afterStateHydrated(function ($component, $state, $record) {

                        if ($record) {
                            $component->state($record->user?->nomor_whatsapp);
                        }

                    }),

                Select::make('layanan_id')
                    ->label('Layanan')
                    ->relationship('layanan', 'nama')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set) {

                        $layanan = Layanan::find($state);

                        if ($layanan) {
                            $set('harga_per_kg', $layanan->harga_per_kg);
                        }

                    })
                    ->required(),

                TextInput::make('berat')
                    ->numeric()
                    ->suffix('Kg')
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set, $state) {

                        $harga = $get('harga_per_kg');

                        if ($harga && $state) {
                            $set('total_harga', $harga * $state);
                        }

                    }),

                TextInput::make('harga_per_kg')
                    ->numeric()
                    ->prefix('Rp')
                    ->readOnly(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->readOnly(),

                Select::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'dicuci' => 'Dicuci',
                        'disetrika' => 'Disetrika',
                        'siap_diambil' => 'Siap Diambil',
                        'selesai' => 'Selesai',
                    ])
                    ->default('menunggu')
                    ->required(),

                DatePicker::make('tanggal_masuk')
                    ->default(now())
                    ->required(),

                DatePicker::make('tanggal_selesai'),

                Textarea::make('catatan')
                    ->columnSpanFull(),

            ]);
    }
}