<?php
declare(strict_types=1);
namespace Tests\Feature\Modules\UI;

use Modules\UI\app\Filament\Actions\Table\HasTableLayout;
use Modules\UI\app\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\UI\Enums\TableLayoutEnum;
use Tests\TestCase;

class TableLayoutToggleTest extends TestCase
{
    /**
     * Test che verifica che i conflitti git nel file TableLayoutToggleTableAction siano stati risolti correttamente.
     */
    public function test_table_layout_toggle_action_exists(): void
    {
        $this->assertTrue(class_exists(TableLayoutToggleTableAction::class));
        $this->assertTrue(interface_exists(HasTableLayout::class));
    }

    /**
     * Test che verifica che l'azione TableLayoutToggle costruisca correttamente l'istanza.
     */
    public function test_table_layout_toggle_action_make(): void
    {
        $action = TableLayoutToggleTableAction::make();
        $this->assertInstanceOf(TableLayoutToggleTableAction::class, $action);
        $this->assertEquals('layout', $action->getName());
    }
}
