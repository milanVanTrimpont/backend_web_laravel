<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class ProfielKaart extends Component
{
    public $gebruikersnaam;
    public $name;
    public $verjaardag;
    public $bio;
    public $link;

    public function __construct($gebruikersnaam, $name, $verjaardag = null, $bio = null, $link)
    {
        $this->gebruikersnaam = $gebruikersnaam;
        $this->name = $name;
        $this->verjaardag = $verjaardag;
        $this->bio = $bio;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.profiel-kaart');
    }
}
