<?php

namespace App\Filament\Resources\Agents;

use App\Filament\Clusters\Compte\CompteCluster;
use App\Filament\Resources\Agents\Pages\CreateAgent;
use App\Filament\Resources\Agents\Pages\EditAgent;
use App\Filament\Resources\Agents\Pages\ListAgents;
use App\Filament\Resources\Agents\Schemas\AgentForm;
use App\Filament\Resources\Agents\Tables\AgentsTable;
use App\Models\Agent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $recordTitleAttribute = 'Agent';

    protected static ?string $cluster = CompteCluster::class;

    public static function form(Schema $schema): Schema
    {
        return AgentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Vérifie que le repeater user_data existe
        if (isset($data['user_data']) && !empty($data['user_data'][0])) {
            $userData = $data['user_data'][0];

            // Si un utilisateur existant est choisi
            if (!empty($userData['existing_user_id'])) {
                $data['user_id'] = $userData['existing_user_id'];
            } else {
                // Crée un nouveau compte utilisateur
                $user = \App\Models\User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'phone' => $userData['phone'] ?? null,
                    'adresse' => $userData['adresse'] ?? null,
                    'avatar' => $userData['avatar'] ?? null,
                    'password' => $userData['password'], // déjà hashé depuis le form
                    'is_active' => $userData['is_active'] ?? true,
                    'role' => 'agent', // important : type d'utilisateur
                ]);

                $data['user_id'] = $user->id;
            }
        }

        // Supprime la section du repeater avant d’insérer en base
        unset($data['user_data']);

        return $data;
    }


    public static function getPages(): array
    {
        return [
            'index' => ListAgents::route('/'),
            'create' => CreateAgent::route('/create'),
            'edit' => EditAgent::route('/{record}/edit'),
        ];
    }
}
