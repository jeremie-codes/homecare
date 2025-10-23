<?php

namespace App\Filament\Resources\Messages;

use App\Filament\Resources\Messages\Pages\CreateMessages;
use App\Filament\Resources\Messages\Pages\EditMessages;
use App\Filament\Resources\Messages\Pages\ListMessages;
use App\Filament\Resources\Messages\Pages\ViewMessages;
use App\Filament\Resources\Messages\Schemas\MessagesForm;
use App\Filament\Resources\Messages\Schemas\MessagesInfolist;
use App\Filament\Resources\Messages\Tables\MessagesTable;
use App\Models\Message;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleBottomCenterText;

    protected static ?string $recordTitleAttribute = 'Message';

    public static function form(Schema $schema): Schema
    {
        return MessagesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MessagesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MessagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMessages::route('/'),
            'create' => CreateMessages::route('/create'),
            'view' => ViewMessages::route('/{record}'),
            'edit' => EditMessages::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
