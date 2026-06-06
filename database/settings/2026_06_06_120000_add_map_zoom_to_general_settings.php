<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if (! $this->migrator->exists('general.map_zoom')) {
            $this->migrator->add('general.map_zoom', '15');
        }
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('general.map_zoom');
    }
};
