<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Media Details')->schema([
                    Forms\Components\TextInput::make('name')->required()->maxLength(255),
                    Forms\Components\TextInput::make('file_name')->required()->maxLength(255),
                    Forms\Components\TextInput::make('mime_type')->maxLength(255),
                    Forms\Components\TextInput::make('file_size')->numeric(),
                    Forms\Components\TextInput::make('url')->maxLength(255),
                    Forms\Components\TextInput::make('alt_text')->maxLength(255),
                    Forms\Components\TextInput::make('collection_name')->maxLength(255),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('file_name')->searchable(),
                Tables\Columns\TextColumn::make('mime_type')->badge(),
                Tables\Columns\TextColumn::make('file_size')->formatStateUsing(fn ($state) => $state ? round($state / 1024, 2) . ' KB' : ''),
                Tables\Columns\TextColumn::make('collection_name')->badge(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMedia::route('/'),
        ];
    }
}
