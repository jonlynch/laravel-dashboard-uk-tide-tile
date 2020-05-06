<?php

namespace JonLynch\TideTile;

use Livewire\Component;

class TideTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        $tideStore = TideStore::make();
        return view('dashboard-tide-tile::tile',[
            'tides' => $tideStore->tides(),
            'location' =>config('dashboard.tiles.tides.location')
        ]);
    }
}
