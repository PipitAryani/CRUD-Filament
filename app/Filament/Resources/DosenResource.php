<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama') // Field untuk nama dosen
                    ->required(), // Pastikan kolom ini wajib diisi

                TextInput::make('nip') // Field untuk nip dosen
                    ->required(),

                TextInput::make('email') // Field untuk email dosen
                    ->email() // Validasi format email
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama') // Kolom nama dosen
                    ->sortable() // Menambahkan fitur sorting
                    ->searchable(), // Menambahkan fitur pencarian

                TextColumn::make('nip') // Kolom NIP dosen
                    ->sortable() // Menambahkan fitur sorting
                    ->searchable(), // Menambahkan fitur pencarian

                TextColumn::make('email') // Kolom email dosen
                    ->sortable() // Menambahkan fitur sorting
                    ->searchable(), // Menambahkan fitur pencarian
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Menambahkan aksi untuk mengedit data
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(), // Menambahkan aksi bulk delete
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Daftar relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
