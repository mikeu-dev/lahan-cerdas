<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class MapPicker extends Field
{
    protected string $view = 'forms.components.map-picker';

    protected string $latField = 'latitude';
    protected string $lngField = 'longitude';

    public function latField(string $field): static
    {
        $this->latField = $field;
        return $this;
    }

    public function lngField(string $field): static
    {
        $this->lngField = $field;
        return $this;
    }

    public function getLatField(): string
    {
        return $this->latField;
    }

    public function getLngField(): string
    {
        return $this->lngField;
    }

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->dehydrated(false); // Do not save this field to DB
    }
}
