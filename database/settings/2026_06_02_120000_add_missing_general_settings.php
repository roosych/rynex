<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Properties added to App\Settings\GeneralSettings after the initial
     * settings table was created, but never persisted to the repository.
     * Spatie throws MissingSettings on save() unless every property exists.
     */
    private array $properties = [
        'general.logo'                 => '',
        'general.logo_white'           => '',
        'general.favicon'              => '',
        'general.booking_notify_emails' => 'info@rynexfix.com',
        'general.latitude'             => '41.8781',
        'general.longitude'            => '-87.6298',
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
