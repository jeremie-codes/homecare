<?php

namespace App\Filament\Resources\Users\Schemas;

use Faker\Core\File;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('avatar')
                    ->label('Photo de profil (optionnel)')
                    ->image()
                    ->directory('profiles')
                    ->disk('public')
                    ->maxSize(4096)
                    ->default(null)->columnSpanFull(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(12)
                    ->regex('/^0[0-9]{9}$/')
                    ->default(null),
                Select::make('role')
                    ->options(['admin' => 'Admin', 'agent' => 'Agent', 'client' => 'Client'])
                    ->default('client')
                    ->required(),
                TextInput::make('adresse')
                    ->default(null),
                TextInput::make('password')
                    ->label('Password (Requis seulement lors de la création)')
                    ->password()
                    ->required(fn ($context) => $context === 'create')
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn($state) => filled($state)),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
