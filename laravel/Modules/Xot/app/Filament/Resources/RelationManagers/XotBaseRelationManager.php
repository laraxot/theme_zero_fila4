<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

use Filament\Schemas\Schema;
use Override;
use Filament\Actions\EditAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * @property class-string<Model> $resource
 */
abstract class XotBaseRelationManager extends FilamentRelationManager
{
    use HasXotTable;

    protected static string $relationship = '';

    /** @var class-string<XotBaseResource> */
    protected static string $resourceClass;

    public static function getModuleName(): string
    {
        $class = static::class;
        $arr = explode('\\', $class);
        $module_name = $arr[1];

        return $module_name;
    }

    final public function form(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }

    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }

    //*
    #[Override]
    public function getTableColumns(): array
    {
        $index = Arr::get($this->getResource()::getPages(), 'index');
        if (!$index) {
            //throw new \Exception('Index page not found');
            return [];
        }
        /** @phpstan-ignore method.nonObject */
        $index_page = $index->getPage();

        if (!method_exists($index_page, 'getTableColumns')) {
            //throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }
        /** @phpstan-ignore argument.type */
        $res = app($index_page)->getTableColumns();

        return $res;
    }

    //*/
    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            //Tables\Actions\DeleteAction::make(),
            DetachAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            //Tables\Actions\DeleteBulkAction::make(),
            DetachBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        $actions = [];
        $resource = static::class;
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canAttach')) {
            $actions['attach'] = AttachAction::make()
                ->icon('heroicon-o-link')
                ->iconButton()
                ->tooltip(__('user::actions.attach.label'))
                ->visible(fn(null|Model $_record): bool => $resource::canAttach());
        }
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($resource, 'canCreate')) {
            $actions['create'] = CreateAction::make()
                ->icon('heroicon-o-plus')
                ->iconButton()
                ->tooltip(static::trans('actions.create.tooltip'))
                ->visible(fn(null|Model $_record): bool => $resource::canCreate());
        }
        return $actions;
    }

    public function getTableFilters(): array
    {
        return [];
    }

    public function getResource(): string
    {
        // @phpstan-ignore property.staticAccess
        $resource = static::$resource;
        Assert::classExists($resource);
        Assert::isAOf($resource, XotBaseResource::class);

        return $resource;
    }

    //public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    //{
    //    return parent::getRelationship();
    //}
}
