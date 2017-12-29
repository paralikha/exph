<?php

namespace Experience\Composers;

use Experience\Models\Experience;
use Pluma\Support\Composers\BaseViewComposer;

class ExperiencesViewComposer extends BaseViewComposer
{
    /**
     * The name of the variable.
     *
     * @var string
     */
    protected $name = 'experiences';

    /**
     * Main function.
     *
     * @return mixed
     */
    public function handle()
    {
        $experiences = json_decode(json_encode([
            'items' => Experience::inRandomOrder()->take(10)->get(),
        ]));

        return $experiences;
    }
}
