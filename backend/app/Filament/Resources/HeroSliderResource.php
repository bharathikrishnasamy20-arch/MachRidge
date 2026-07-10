<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSliderResource\Pages;
use App\Models\HeroSlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSliderResource extends Resource
{
    protected static ?string $model = HeroSlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Slide Content')->schema([
                    Forms\Components\TextInput::make('title')->required()->maxLength(255),
                    Forms\Components\TextInput::make('subtitle')->maxLength(255),
                    Forms\Components\Textarea::make('description')->rows(3),
                    Forms\Components\TextInput::make('btn_text')->maxLength(255),
                    Forms\Components\TextInput::make('btn_link')->maxLength(255),
                    Forms\Components\TextInput::make('btn2_text')->maxLength(255),
                    Forms\Components\TextInput::make('btn2_link')->maxLength(255),
                ])->columns(2),
                Forms\Components\Section::make('Media')->schema([
                    Forms\Components\FileUpload::make('image')->image()->directory('hero-sliders'),
                    Forms\Components\FileUpload::make('bg_image')->image()->directory('hero-sliders/bg'),
                    Forms\Components\TextInput::make('overlay_opacity')->numeric()->step(0.01)->minValue(0)->maxValue(1),
                ])->columns(2),
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
                Tables\Columns\ImageColumn::make('image')->width(80),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subtitle')->searchable(),
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
            'index' => Pages\ManageHeroSliders::route('/'),
        ];
    }
}
