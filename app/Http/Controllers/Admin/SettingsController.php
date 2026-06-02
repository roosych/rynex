<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings\AboutSettings;
use App\Settings\BenefitsSettings;
use App\Settings\GeneralSettings;
use App\Settings\HeroSettings;
use App\Settings\ProcessSettings;
use App\Settings\SeoSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ReflectionClass;
use ReflectionProperty;

class SettingsController extends Controller
{
    private array $groups = ['general', 'hero', 'about', 'process', 'benefits', 'seo'];

    /** Settings fields uploaded as files, keyed by group. Input name is "{field}_file". */
    private array $uploadFields = [
        'general' => ['logo', 'logo_white', 'favicon'],
        'seo'     => ['default_og_image'],
    ];

    public function index(): RedirectResponse
    {
        return redirect()->route('admin.settings.edit', 'general');
    }

    public function edit(string $group)
    {
        abort_unless(in_array($group, $this->groups), 404);

        $settings = app($this->settingsClass($group));

        return view("admin.settings.{$group}", compact('settings', 'group'));
    }

    public function update(Request $request, string $group): RedirectResponse
    {
        abort_unless(in_array($group, $this->groups), 404);

        $settings   = app($this->settingsClass($group));
        $reflection = new ReflectionClass($settings);

        // Properties of each group that are populated via file upload ("{field}_file" input)
        $uploadFields = $this->uploadFields[$group] ?? [];

        foreach ($uploadFields as $field) {
            $fileKey = $field . '_file';
            if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
                $path = $request->file($fileKey)->store('settings', 'public');
                $settings->$field = Storage::url($path);
            }
        }

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $prop) {
            $name = $prop->getName();

            // Skip file-upload fields — handled above
            if (in_array($name, $uploadFields)) {
                continue;
            }

            if (! $request->exists($name)) {
                continue;
            }

            $typeName = $prop->getType()?->getName();

            $settings->$name = match ($typeName) {
                'int'   => (int) $request->input($name),
                'bool'  => $request->boolean($name),
                'float' => (float) $request->input($name),
                default => (string) ($request->input($name) ?? ''),
            };
        }

        $settings->save();

        return redirect()->back()->with('success', ucfirst($group) . ' settings saved successfully.');
    }

    private function settingsClass(string $group): string
    {
        return match ($group) {
            'general'  => GeneralSettings::class,
            'hero'     => HeroSettings::class,
            'about'    => AboutSettings::class,
            'process'  => ProcessSettings::class,
            'benefits' => BenefitsSettings::class,
            'seo'      => SeoSettings::class,
        };
    }
}
