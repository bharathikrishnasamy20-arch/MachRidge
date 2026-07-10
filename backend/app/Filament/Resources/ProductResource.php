<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product Details')->schema([
                    Forms\Components\TextInput::make('name')->required()->maxLength(255)->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                    Forms\Components\TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord: true),
                    Forms\Components\Select::make('category_id')->relationship('category', 'name')->required(),
                    Forms\Components\Textarea::make('short_description')->rows(3),
                    Forms\Components\RichEditor::make('description'),
                ])->columns(2),
                Forms\Components\Section::make('Media')->schema([
                    Forms\Components\FileUpload::make('image')->image()->directory('products'),
                    Forms\Components\FileUpload::make('gallery')->image()->multiple()->directory('products/gallery'),
                ])->columns(2),
                Forms\Components\Section::make('Details')->schema([
                    Forms\Components\Textarea::make('applications')->rows(3),
                    Forms\Components\Textarea::make('industries_served')->rows(3),
                    Forms\Components\KeyValue::make('specifications'),
                ])->columns(2),
                Forms\Components\Section::make('SEO')->schema([
                    Forms\Components\TextInput::make('meta_title')->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')->rows(2),
                    Forms\Components\Textarea::make('meta_keywords')->rows(2),
                ])->columns(2),
                Forms\Components\Section::make('Settings')->schema([
                    Forms\Components\Toggle::make('status')->default(true),
                    Forms\Components\Toggle::make('featured')->default(false),
                    Forms\Components\TextInput::make('order')->numeric()->default(0),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->width(60),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->limit(40),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                Tables\Columns\IconColumn::make('featured')->boolean()->sortable(),
                Tables\Columns\IconColumn::make('status')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('order')->numeric()->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('featured'),
                Tables\Filters\TernaryFilter::make('status'),
            ])
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
            'index' => Pages\ManageProducts::route('/'),
        ];
    }
}
