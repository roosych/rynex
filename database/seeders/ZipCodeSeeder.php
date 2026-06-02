<?php

namespace Database\Seeders;

use App\Models\ZipCode;
use Illuminate\Database\Seeder;

class ZipCodeSeeder extends Seeder
{
    public function run(): void
    {
        $zips = [
            ['60601', 'The Loop'],
            ['60602', 'The Loop'],
            ['60603', 'The Loop'],
            ['60604', 'The Loop'],
            ['60605', 'South Loop'],
            ['60606', 'The Loop'],
            ['60607', 'West Loop'],
            ['60608', 'Pilsen / Bridgeport'],
            ['60609', 'Back of the Yards'],
            ['60610', 'Near North Side'],
            ['60611', 'Streeterville / Magnificent Mile'],
            ['60612', 'East Garfield Park'],
            ['60613', 'Lakeview / Uptown'],
            ['60614', 'Lincoln Park'],
            ['60615', 'Hyde Park'],
            ['60616', 'Chinatown / Bridgeport'],
            ['60617', 'South Chicago / East Side'],
            ['60618', 'Irving Park / Avondale'],
            ['60619', 'Chatham / Calumet Heights'],
            ['60620', 'Auburn Gresham'],
            ['60621', 'Englewood'],
            ['60622', 'Wicker Park / Bucktown'],
            ['60623', 'Little Village'],
            ['60624', 'East Garfield Park / West Humboldt'],
            ['60625', 'Lincoln Square / Albany Park'],
            ['60626', 'Rogers Park'],
            ['60628', 'Roseland / Pullman'],
            ['60629', 'Chicago Lawn / Marquette Park'],
            ['60630', 'Jefferson Park / Forest Glen'],
            ['60631', 'Edison Park / Norwood Park'],
            ['60632', 'Brighton Park / Gage Park'],
            ['60634', 'Portage Park / Belmont Cragin'],
            ['60636', 'West Englewood'],
            ['60637', 'Woodlawn / Hyde Park'],
            ['60638', 'Garfield Ridge / Clearing'],
            ['60639', 'Belmont Cragin / Hermosa'],
            ['60640', 'Uptown / Andersonville'],
            ['60641', 'Montclare / Portage Park'],
            ['60642', 'Noble Square / River West'],
            ['60643', 'Beverly / Morgan Park'],
            ['60644', 'Austin'],
            ['60645', 'West Ridge / North Park'],
            ['60646', 'Norwood Park / Jefferson Park'],
            ['60647', 'Logan Square'],
            ['60649', 'South Shore'],
            ['60651', 'Humboldt Park'],
            ['60652', 'Ashburn'],
            ['60653', 'Grand Boulevard / Douglas'],
            ['60654', 'River North'],
            ['60655', 'Mount Greenwood'],
            ['60656', 'O\'Hare / Norwood Park'],
            ['60657', 'Lakeview / Wrigleyville'],
            ['60659', 'West Ridge / Peterson Park'],
            ['60660', 'Edgewater / Andersonville'],
            ['60661', 'West Loop / Greektown'],
            ['60633', 'Hegewisch'],
            ['60666', 'O\'Hare Airport'],
            ['60707', 'Galewood'],
            ['60827', 'Riverdale / Altgeld Gardens'],
        ];

        foreach ($zips as $i => [$code, $neighborhood]) {
            ZipCode::firstOrCreate(
                ['code' => $code],
                ['neighborhood' => $neighborhood, 'is_active' => true, 'sort_order' => $i]
            );
        }
    }
}
