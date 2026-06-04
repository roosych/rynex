<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Editable text labels for the About counters. Added after the initial
     * about settings table, so they must be persisted or Spatie throws
     * MissingSettings on save().
     */
    private array $properties = [
        'about.technicians_label'         => 'Certified technicians',
        'about.satisfaction_rate_label'   => 'customer satisfaction rate',
        'about.years_experience_label'    => 'years of experience',
        'about.appliances_repaired_label' => 'appliances repaired',
        'about.cities_served_label'       => 'cities & zip codes served',
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
