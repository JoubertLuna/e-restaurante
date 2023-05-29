<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FornecedorResource\{
    Pages,
    RelationManagers
};

use App\Models\Fornecedor;
use Filament\Forms;

use Filament\Forms\Components\{
    DatePicker,
    Select,
    TextInput
};

use Filament\Resources\{
    Form,
    Resource,
    Table
};

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\{
    Builder,
    SoftDeletingScope
};

class FornecedorResource extends Resource
{
    protected static ?string $model = Fornecedor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('razao_social')
                    ->string()
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Razão Social'),

                TextInput::make('nome_fantasia')
                    ->nullable()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Nome Fantasia'),

                TextInput::make('cpf')->mask(fn (TextInput\Mask $mask) => $mask->pattern('000.000.000-00'))
                    ->nullable()
                    ->minLength(11)
                    ->maxLength(14)
                    ->rules(['cpf'])
                    ->label('CPF'),

                TextInput::make('rg')->mask(fn (TextInput\Mask $mask) => $mask->pattern('00.000-00'))
                    ->nullable()
                    ->minLength(7)
                    ->maxLength(10)
                    ->label('RG'),

                TextInput::make('cnpj')->mask(fn (TextInput\Mask $mask) => $mask->pattern('00.000.000/0000-00'))
                    ->nullable()
                    ->minLength(10)
                    ->maxLength(20)
                    ->rules('cnpj')
                    ->label('CNPJ'),

                Select::make('ativo')
                    ->required()
                    ->in(['S', 'N'])
                    ->options([
                        'S' => 'Sim',
                        'N' => 'Não',
                    ]),

                TextInput::make('fone')->mask(fn (TextInput\Mask $mask) => $mask->pattern('(00) 0000-0000'))
                    ->nullable()
                    ->minLength(10)
                    ->maxLength(14)
                    ->label('Telefone'),

                TextInput::make('celular')->mask(fn (TextInput\Mask $mask) => $mask->pattern('(00) 00000-0000'))
                    ->nullable()
                    ->minLength(11)
                    ->maxLength(15)
                    ->label('Celular'),

                TextInput::make('cep')->mask(fn (TextInput\Mask $mask) => $mask->pattern('00000-000'))
                    ->required()
                    ->minLength(8)
                    ->maxLength(10)
                    ->label('CEP'),

                TextInput::make('logradouro')
                    ->nullable()
                    ->maxLength(200)
                    ->label('Logradouro'),

                TextInput::make('numero')
                    ->nullable()
                    ->rules(['numeric'])
                    ->label('Número'),

                TextInput::make('uf')
                    ->minLength(2)
                    ->maxLength(2)
                    ->rules(['uf'])
                    ->label('Estado'),

                TextInput::make('cidade')
                    ->nullable()
                    ->maxLength(200)
                    ->label('Cidade'),

                TextInput::make('bairro')
                    ->nullable()
                    ->maxLength(200)
                    ->label('Bairro'),

                TextInput::make('complemento')
                    ->nullable()
                    ->maxLength(200)
                    ->label('Complemento'),

                DatePicker::make('data_cadastro')
                    ->displayFormat('d/m/Y')
                    ->required()
                    ->label('Data de Cadastro'),

                TextInput::make('email')
                    ->string()
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->email()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('razao_social'),
                TextColumn::make('cnpj'),
                TextColumn::make('email'),
                TextColumn::make('data_cadastro')->date('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListFornecedors::route('/'),
            'create' => Pages\CreateFornecedor::route('/create'),
            'edit' => Pages\EditFornecedor::route('/{record}/edit'),
        ];
    }
}
