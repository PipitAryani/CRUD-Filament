<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MakulResource\Pages;
use App\Models\Makul;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class MakulResource extends Resource
{
    protected static ?string $model = Makul::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    // Form method to define fields for creating and editing "Makul" data
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input field for 'kode'
                TextInput::make('kode')
                    ->required()
                    ->maxLength(255),

                // Input field for 'nama'
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                // Input field for 'sks' (TextInput with type 'number')
                TextInput::make('sks')
                    ->required()
                    ->numeric() // Ensures only numbers are allowed
                    ->minValue(1)
                    ->maxValue(6),
            ]);
    }

    // Table method to define the table for listing "Makul" data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->sortable() // Make 'kode' column sortable
                    ->searchable(), // Make 'kode' column searchable

                TextColumn::make('nama')
                    ->sortable() // Make 'nama' column sortable
                    ->searchable(), // Make 'nama' column searchable

                TextColumn::make('sks')
                    ->sortable(), // Make 'sks' column sortable
            ])
            ->filters([
                // Define filters here if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMakuls::route('/'),
            'create' => Pages\CreateMakul::route('/create'),
            'edit' => Pages\EditMakul::route('/{record}/edit'),
        ];
    }
}