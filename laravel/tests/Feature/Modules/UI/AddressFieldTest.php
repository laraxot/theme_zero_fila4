<?php
declare(strict_types=1);
namespace Tests\Feature\Modules\UI;

use Modules\UI\Filament\Forms\Components\AddressField;
use Tests\TestCase;

class AddressFieldTest extends TestCase
{
    /**
     * Test che verifica che i conflitti git nel file AddressField siano stati risolti correttamente.
     */
    public function test_address_field_exists(): void
    {
        $this->assertTrue(class_exists(AddressField::class));
    }

    /**
     * Test che verifica che il componente AddressField costruisca correttamente l'istanza.
     */
    public function test_address_field_make(): void
    {
        $field = AddressField::make('address');
        $this->assertInstanceOf(AddressField::class, $field);
        $this->assertEquals('address', $field->getName());
    }

    /**
     * Test che verifica il metodo relationship.
     */
    public function test_address_field_relationship(): void
    {
        $field = AddressField::make('address')->relationship('user_address');
        $this->assertInstanceOf(AddressField::class, $field);

        // Utilizzo reflection per accedere alla proprietà privata
        $reflection = new \ReflectionClass($field);
        $property = $reflection->getProperty('relationship');
        $property->setAccessible(true);

        $this->assertEquals('user_address', $property->getValue($field));
    }
}
