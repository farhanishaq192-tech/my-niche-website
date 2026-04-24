<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Leads';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Contact Information')
                ->icon('heroicon-o-user')
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make('name')
                            ->label('Full Name')
                            ->icon('heroicon-o-user-circle')
                            ->weight('bold')
                            ->size('lg'),
                        TextEntry::make('created_at')
                            ->label('Received At')
                            ->icon('heroicon-o-clock')
                            ->dateTime('d M Y, h:i A'),
                    ]),
                    Grid::make(2)->schema([
                        TextEntry::make('email')
                            ->label('Email Address')
                            ->icon('heroicon-o-envelope')
                            ->copyable()
                            ->copyMessage('Email copied!')
                            ->color('primary'),
                        TextEntry::make('phone')
                            ->label('Phone Number')
                            ->icon('heroicon-o-phone')
                            ->copyable()
                            ->copyMessage('Phone copied!'),
                    ]),
                ]),

            Section::make('Inquiry Details')
                ->icon('heroicon-o-document-text')
                ->schema([
                    TextEntry::make('service')
                        ->label('Interested Service')
                        ->badge()
                        ->color('success'),
                    TextEntry::make('message')
                        ->label('Message')
                        ->prose()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('email')->searchable()->copyable(),
                TextColumn::make('phone')->copyable(),
                TextColumn::make('service')->badge()->color('primary'),
                TextColumn::make('message')->limit(60)->tooltip(fn ($record) => $record->message),
                TextColumn::make('created_at')->label('Received')->dateTime('d M Y, h:i A')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('service')->options([
                    'Tier 1 – Digital Presence' => 'Tier 1 – Digital Presence',
                    'Tier 2 – Smart Business'   => 'Tier 2 – Smart Business',
                    'Tier 3 – Full AI Platform' => 'Tier 3 – Full AI Platform',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
