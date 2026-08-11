<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    private array $properties = [
        'codes.google_analytics_id'   => '',
        'codes.google_tag_manager_id' => '',
        'codes.head_code'             => '',
        'codes.body_code'             => '',
        'codes.footer_code'           => '',
    ];

    public function up(): void
    {
        foreach ($this->properties as $property => $default) {
            if (! $this->migrator->exists($property)) {
                $this->migrator->add($property, $default);
            }
        }
    }

    public function down(): void
    {
        foreach (array_keys($this->properties) as $property) {
            $this->migrator->deleteIfExists($property);
        }
    }
};
