<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CapabilityResource\Pages;
use App\Models\Capability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CapabilityResource extends Resource
{
    protected static ?string $model = Capability::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Capability Details')->schema([
                    Forms\Components\TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                    Forms\Components\TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord: true),
                    Forms\Components\Textarea::make('description')->rows(3),
                    Forms\Components\TextInput::make('icon')->maxLength(255),
                ])->columns(2),
                Forms\Components\Section::make('Media')->schema([
                    Forms\Components\FileUpload::make('image')->image()->directory('capabilities'),
                ]),
                Forms\Components\Section::make('Settings')->schema([
                    Forms\Components\Toggle::make('status')->default(true),
                    Forms\Components\TextInput::make('order')->numeric()->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->width(60),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('status')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('order')->numeric()->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
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
            'index' => Pages\ManageCapabilities::route('/'),
        ];
    }
}
