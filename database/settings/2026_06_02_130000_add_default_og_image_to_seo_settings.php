<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if (! $this->migrator->exists('seo.default_og_image')) {
            $this->migrator->add('seo.default_og_image', '');
        }
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('seo.default_og_image');
    }
};
