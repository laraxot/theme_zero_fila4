<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;

/**
 * Modules\Xot\Contracts\HasRecursiveRelationshipsContract.
 *
 * @property int                $id
 * @property string $name
 * @property int                $depth
 * @property Collection<static> $children
 * @property int|null           $children_count
 * @property Collection<static> $ancestors                  The model's recursive parents.
 * @property int|null           $ancestors_count
 * @property Collection<static> $ancestorsAndSelf           The model's recursive parents and itself.
 * @property int|null           $ancestors_and_self_count
 * @property Collection<static> $bloodline                  The model's ancestors, descendants and itself.
 * @property int|null           $bloodline_count
 * @property Collection<static> $childrenAndSelf            The model's direct children and itself.
 * @property int|null           $children_and_self_count
 * @property Collection<static> $descendants                The model's recursive children.
 * @property int|null           $descendants_count
 * @property Collection<static> $descendantsAndSelf         The model's recursive children and itself.
 * @property int|null           $descendants_and_self_count
 * @property Collection<static> $parentAndSelf              The model's direct parent and itself.
 * @property int|null           $parent_and_self_count
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface HasRecursiveRelationshipsContract
{
    /**
     * Execute a query with a maximum depth constraint for the recursive query.
     */
    public static function withMaxDepth(int $maxDepth, callable $query): mixed;

    /**
     * Get the name of the parent key column.
     *
     * @return string
     */
    public function getParentKeyName();

    /**
     * Get the qualified parent key column.
     *
     * @return string
     */
    public function getQualifiedParentKeyName();

    /**
     * Get the name of the local key column.
     *
     * @return string
     */
    public function getLocalKeyName();

    /**
     * Get the qualified local key column.
     *
     * @return string
     */
    public function getQualifiedLocalKeyName();

    /**
     * Get the name of the depth column.
     *
     * @return string
     */
    public function getDepthName();

    /**
     * Get the name of the path column.
     *
     * @return string
     */
    public function getPathName();

    /**
     * Get the path separator.
     *
     * @return string
     */
    public function getPathSeparator();

    /**
     * Get the additional custom paths.
     *
     * @return array
     */
    public function getCustomPaths();

    /**
     * Get the name of the common table expression.
     *
     * @return string
     */
    public function getExpressionName();

    /**
     * Get the model's ancestors.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors<static>
     *
     * @return Ancestors
     */
    public function ancestors();

    /**
     * Get the model's ancestors and itself.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors<static>
     *
     * @return Ancestors
     */
    public function ancestorsAndSelf();

    /**
     * Get the model's bloodline.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline<static>
     *
     * @return Bloodline
     */
    public function bloodline();

    /**
     * Get the model's children.
     *
     * return \Illuminate\Database\Eloquent\Relations\HasMany<static>
     *
     * @return HasMany
     */
    public function children();

    /**
     * Get the model's children and itself.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants<static>
     *
     * @return Descendants
     */
    public function childrenAndSelf();

    /**
     * Get the model's descendants.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants<static>
     *
     * @return Descendants
     */
    public function descendants();

    /**
     * Get the model's descendants and itself.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants<static>
     *
     * @return Descendants
     */
    public function descendantsAndSelf();

    /**
     * Get the model's parent.
     *
     * return \Illuminate\Database\Eloquent\Relations\BelongsTo<static, static>
     *
     * @return BelongsTo
     */
    public function parent();

    /**
     * Get the model's parent and itself.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors<static>
     *
     * @return Ancestors
     */
    public function parentAndSelf();

    /**
     * Get the model's root ancestor.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor<static>
     *
     * @return RootAncestor
     */
    public function rootAncestor();

    /**
     * Get the model's root ancestor or self.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf<static>
     */
    public function rootAncestorOrSelf(): RootAncestorOrSelf;

    /**
     * Get the model's siblings.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings<static>
     *
     * @return Siblings
     */
    public function siblings();

    /**
     * Get the model's siblings and itself.
     *
     * return \Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings<static>
     *
     * @return Siblings
     */
    public function siblingsAndSelf();

    /**
     * Get the first segment of the model's path.
     *
     * @return string
     */
    public function getFirstPathSegment();

    /**
     * Determine whether the model's path is nested.
     *
     * @return bool
     */
    public function hasNestedPath();

    /**
     * Determine if an attribute is an integer.
     *
     * @param string $attribute
     *
     * @return bool
     */
    public function isIntegerAttribute($attribute);

    /**
     * added by XOT, viene utilizzato nelle options delle select.
     */
    public function getLabel(): string;
}
