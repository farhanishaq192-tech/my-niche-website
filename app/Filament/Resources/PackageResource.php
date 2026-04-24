<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'Pricing Packages';
    protected static ?string $navigationGroup = 'Site Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Package Info')->schema([
                Forms\Components\TextInput::make('tier')->required()->placeholder('Tier 1'),
                Forms\Components\TextInput::make('name')->required()->placeholder('Digital Presence'),
                Forms\Components\TextInput::make('tagline')->placeholder('For businesses with no online presence'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),

            Forms\Components\Section::make('Pricing & Delivery')->schema([
                Forms\Components\TextInput::make('price_min')->numeric()->required()->prefix('PKR'),
                Forms\Components\TextInput::make('price_max')->numeric()->required()->prefix('PKR'),
                Forms\Components\TextInput::make('delivery')->required()->placeholder('5–7 working days'),
            ])->columns(3),

            Forms\Components\Section::make('Features')->schema([
                Forms\Components\Repeater::make('features')
                    ->simple(Forms\Components\TextInput::make('feature')->required())
                    ->label('Feature List')
                    ->addActionLabel('Add Feature')
                    ->columnSpanFull(),
            ]),

            Forms\Components\Section::make('Settings')->schema([
                Forms\Components\TextInput::make('button_text')->default('Get Started'),
                Forms\Components\Toggle::make('is_featured')->label('Mark as Featured (Most Popular)'),
                Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')->label('#')->sortable(),
                TextColumn::make('tier')->badge()->color('primary'),
                TextColumn::make('name')->searchable()->weight('bold'),
                TextColumn::make('price_min')->label('Price Min')->formatStateUsing(fn ($state) => 'PKR ' . number_format($state)),
                TextColumn::make('price_max')->label('Price Max')->formatStateUsing(fn ($state) => 'PKR ' . number_format($state)),
                TextColumn::make('delivery')->label('Delivery'),
                IconColumn::make('is_featured')->label('Featured')->boolean(),
                IconColumn::make('is_active')->label('Active')->boolean(),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
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
            'index'  => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit'   => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
