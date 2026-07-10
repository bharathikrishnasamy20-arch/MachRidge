<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Setting')->schema([
                    Forms\Components\TextInput::make('key')->required()->maxLength(255)->unique(ignoreRecord: true),
                    Forms\Components\Textarea::make('value')->rows(3),
                    Forms\Components\TextInput::make('group')->maxLength(255),
                    Forms\Components\Select::make('type')->options([
                        'text' => 'Text',
                        'image' => 'Image',
                        'textarea' => 'Textarea',
                        'email' => 'Email',
                        'number' => 'Number',
                    ])->default('text'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable()->sortable()->badge(),
                Tables\Columns\TextColumn::make('value')->limit(60),
                Tables\Columns\TextColumn::make('group')->searchable()->badge()->sortable(),
                Tables\Columns\TextColumn::make('type')->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')->options(fn () => Setting::distinct()->pluck('group', 'group')->toArray()),
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
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
