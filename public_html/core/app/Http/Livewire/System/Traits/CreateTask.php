<?php


namespace App\Http\Livewire\System\Traits;

use App\Models\System\Config;

trait CreateTask
{
    public function config()
    {
        $name = [];

        $config = Config::all();

        foreach ($config->toArray() as $value) {
            $name[$value['name']] = $value['value'];
        }
        return $name;
    }

    public function countries()
    {
        return
            (array)json_decode(
                file_get_contents(resource_path('js/country.json')),
                true
            );
    }

    public function category()
    {
        $cat = Config::where('name', 'categoryFields')->first();

        return explode(',', $cat->value);
    }
}
