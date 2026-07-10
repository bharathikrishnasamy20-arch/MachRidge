<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteRequestResource\Pages;
use App\Models\QuoteRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Inquiries';

    protected static ?string $navigationLabel = 'Quote Requests';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Request Details')->schema([
                    Forms\Components\TextInput::make('name')->required()->maxLength(255),
                    Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                    Forms\Components\TextInput::make('phone')->maxLength(255),
                    Forms\Components\TextInput::make('company_name')->maxLength(255),
                    Forms\Components\TextInput::make('product_name')->maxLength(255),
                    Forms\Components\TextInput::make('quantity')->numeric(),
                    Forms\Components\Textarea::make('specifications')->rows(3),
                    Forms\Components\Textarea::make('message')->rows(3)->columnSpanFull(),
                ])->columns(2),
                Forms\Components\Section::make('Status')->schema([
                    Forms\Components\Select::make('status')->options([
                        'pending' => 'Pending',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'closed' => 'Closed',
                    ])->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('product_name')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->sortable()->colors([
                    'warning' => 'pending',
                    'info' => 'contacted',
                    'success' => 'quoted',
                    'danger' => 'closed',
                ]),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'contacted' => 'Contacted',
                    'quoted' => 'Quoted',
                    'closed' => 'Closed',
                ]),
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
            'index' => Pages\ManageQuoteRequests::route('/'),
        ];
    }
}
