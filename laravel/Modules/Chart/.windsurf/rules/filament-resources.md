# Regole Risorse Filament

## Indice
- [Regole Fondamentali](#regole-fondamentali)
- [Struttura](#struttura)
- [Best Practices](#best-practices)
- [Checklist](#checklist)

## Regole Fondamentali

### Risorse
- **REGOLA FONDAMENTALE**: Ogni risorsa deve essere una classe dedicata
- Estendere `Filament\Resources\Resource`
- Implementare metodi obbligatori
- Documentare la risorsa

### Esempio Corretto
```php
// CORRETTO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = __('filament.resources.doctor.navigation.label');
    
    protected static ?string $modelLabel = __('filament.resources.doctor.model.label');
    
    protected static ?string $pluralModelLabel = __('filament.resources.doctor.model.plural');
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.resources.doctor.form.name.label'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('email')
                    ->label(__('filament.resources.doctor.form.email.label'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('phone')
                    ->label(__('filament.resources.doctor.form.phone.label'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.resources.doctor.table.name.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.resources.doctor.table.email.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament.resources.doctor.table.phone.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.resources.doctor.table.created_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.resources.doctor.table.updated_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

### Esempio Errato
```php
// ERRATO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Doctors'; // ❌ No traduzione
    
    protected static ?string $modelLabel = 'Doctor'; // ❌ No traduzione
    
    protected static ?string $pluralModelLabel = 'Doctors'; // ❌ No traduzione
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(), // ❌ No ignoreRecord
                
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
            ])
            ->filters([
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

## Struttura

### Regole Fondamentali
1. **Namespace**
   - `App\Filament\Resources`
   - `Modules\{Module}\Filament\Resources`

2. **Nome Classe**
   - Suffisso `Resource`
   - Nome descrittivo
   - PascalCase

3. **Metodi**
   - `form()`: Schema form
   - `table()`: Schema tabella
   - `getRelations()`: Relazioni
   - `getPages()`: Pagine

### Esempi

#### Risorsa Base
```php
// CORRETTO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = __('filament.resources.doctor.navigation.label');
    
    protected static ?string $modelLabel = __('filament.resources.doctor.model.label');
    
    protected static ?string $pluralModelLabel = __('filament.resources.doctor.model.plural');
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.resources.doctor.form.name.label'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('email')
                    ->label(__('filament.resources.doctor.form.email.label'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('phone')
                    ->label(__('filament.resources.doctor.form.phone.label'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.resources.doctor.table.name.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.resources.doctor.table.email.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament.resources.doctor.table.phone.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.resources.doctor.table.created_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.resources.doctor.table.updated_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}

// ERRATO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Doctors'; // ❌ No traduzione
    
    protected static ?string $modelLabel = 'Doctor'; // ❌ No traduzione
    
    protected static ?string $pluralModelLabel = 'Doctors'; // ❌ No traduzione
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(), // ❌ No ignoreRecord
                
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
            ])
            ->filters([
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

#### Risorsa con Relazioni
```php
// CORRETTO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = __('filament.resources.doctor.navigation.label');
    
    protected static ?string $modelLabel = __('filament.resources.doctor.model.label');
    
    protected static ?string $pluralModelLabel = __('filament.resources.doctor.model.plural');
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.resources.doctor.form.name.label'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('email')
                    ->label(__('filament.resources.doctor.form.email.label'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('phone')
                    ->label(__('filament.resources.doctor.form.phone.label'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\Select::make('role_id')
                    ->label(__('filament.resources.doctor.form.role.label'))
                    ->relationship('role', 'name')
                    ->required(),
                
                Forms\Components\Select::make('department_id')
                    ->label(__('filament.resources.doctor.form.department.label'))
                    ->relationship('department', 'name')
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.resources.doctor.table.name.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.resources.doctor.table.email.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament.resources.doctor.table.phone.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('role.name')
                    ->label(__('filament.resources.doctor.table.role.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('department.name')
                    ->label(__('filament.resources.doctor.table.department.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.resources.doctor.table.created_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.resources.doctor.table.updated_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label(__('filament.resources.doctor.filters.role.label'))
                    ->relationship('role', 'name'),
                
                Tables\Filters\SelectFilter::make('department')
                    ->label(__('filament.resources.doctor.filters.department.label'))
                    ->relationship('department', 'name'),
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
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\PatientsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}

// ERRATO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Doctors'; // ❌ No traduzione
    
    protected static ?string $modelLabel = 'Doctor'; // ❌ No traduzione
    
    protected static ?string $pluralModelLabel = 'Doctors'; // ❌ No traduzione
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(), // ❌ No ignoreRecord
                
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required(), // ❌ No label, no traduzione
                
                Forms\Components\Select::make('department_id')
                    ->relationship('department', 'name')
                    ->required(), // ❌ No label, no traduzione
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('role.name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('department.name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->relationship('role', 'name'), // ❌ No label, no traduzione
                
                Tables\Filters\SelectFilter::make('department')
                    ->relationship('department', 'name'), // ❌ No label, no traduzione
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

## Best Practices

### Regole Fondamentali
1. **Risorse**
   - Classe dedicata
   - Estensione corretta
   - Metodi obbligatori
   - Documentazione

2. **Form**
   - Schema completo
   - Validazione
   - Traduzioni
   - Layout

3. **Tabella**
   - Colonne complete
   - Filtri
   - Azioni
   - Bulk actions

4. **Test**
   - Test unitari
   - Test integrazione
   - Test UI
   - Test performance

### Esempi

#### Risorsa Completa
```php
// CORRETTO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = __('filament.resources.doctor.navigation.label');
    
    protected static ?string $modelLabel = __('filament.resources.doctor.model.label');
    
    protected static ?string $pluralModelLabel = __('filament.resources.doctor.model.plural');
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.resources.doctor.form.name.label'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('email')
                    ->label(__('filament.resources.doctor.form.email.label'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('phone')
                    ->label(__('filament.resources.doctor.form.phone.label'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\Select::make('role_id')
                    ->label(__('filament.resources.doctor.form.role.label'))
                    ->relationship('role', 'name')
                    ->required(),
                
                Forms\Components\Select::make('department_id')
                    ->label(__('filament.resources.doctor.form.department.label'))
                    ->relationship('department', 'name')
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.resources.doctor.table.name.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.resources.doctor.table.email.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament.resources.doctor.table.phone.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('role.name')
                    ->label(__('filament.resources.doctor.table.role.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('department.name')
                    ->label(__('filament.resources.doctor.table.department.label'))
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.resources.doctor.table.created_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.resources.doctor.table.updated_at.label'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label(__('filament.resources.doctor.filters.role.label'))
                    ->relationship('role', 'name'),
                
                Tables\Filters\SelectFilter::make('department')
                    ->label(__('filament.resources.doctor.filters.department.label'))
                    ->relationship('department', 'name'),
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
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\PatientsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}

// ERRATO
class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Doctors'; // ❌ No traduzione
    
    protected static ?string $modelLabel = 'Doctor'; // ❌ No traduzione
    
    protected static ?string $pluralModelLabel = 'Doctors'; // ❌ No traduzione
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(), // ❌ No ignoreRecord
                
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255), // ❌ No label, no traduzione
                
                Forms\Components\Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required(), // ❌ No label, no traduzione
                
                Forms\Components\Select::make('department_id')
                    ->relationship('department', 'name')
                    ->required(), // ❌ No label, no traduzione
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('role.name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('department.name')
                    ->searchable()
                    ->sortable(), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // ❌ No label, no traduzione
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->relationship('role', 'name'), // ❌ No label, no traduzione
                
                Tables\Filters\SelectFilter::make('department')
                    ->relationship('department', 'name'), // ❌ No label, no traduzione
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

## Checklist

### Per Ogni Risorsa
- [ ] Classe dedicata
- [ ] Estensione corretta
- [ ] Metodi obbligatori
- [ ] Documentata

### Per Form
- [ ] Schema completo
- [ ] Validazione
- [ ] Traduzioni
- [ ] Layout

### Per Tabella
- [ ] Colonne complete
- [ ] Filtri
- [ ] Azioni
- [ ] Bulk actions

### Per Test
- [ ] Unitari
- [ ] Integrazione
- [ ] UI
- [ ] Performance
- [ ] Copertura 
