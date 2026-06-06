@php
$schema = \Spatie\SchemaOrg\Schema::localBusiness()
    ->name($generalSettings->company_name)
    ->description($generalSettings->footer_about ?? 'Professional appliance repair service.')
    ->url(url('/'))
    ->telephone($generalSettings->phone_primary ?? '')
    ->email($generalSettings->email ?? '')
    ->address(
        \Spatie\SchemaOrg\Schema::postalAddress()
            ->streetAddress($generalSettings->address ?? '')
            ->addressLocality('Dallas')
            ->addressRegion('TX')
            ->addressCountry('US')
    )
    ->openingHoursSpecification([
        \Spatie\SchemaOrg\Schema::openingHoursSpecification()
            ->dayOfWeek(['Monday','Tuesday','Wednesday','Thursday','Friday'])
            ->opens('08:00')
            ->closes('18:00'),
        \Spatie\SchemaOrg\Schema::openingHoursSpecification()
            ->dayOfWeek(['Saturday'])
            ->opens('09:00')
            ->closes('15:00'),
    ])
    ->priceRange('$$')
    ->image(asset('template/images/template/og-default.jpg'))
    ->sameAs(array_filter([
        $generalSettings->social_facebook ?? null,
        $generalSettings->social_instagram ?? null,
        $generalSettings->social_yelp ?? null,
    ]));
@endphp
{!! $schema->toScript() !!}
