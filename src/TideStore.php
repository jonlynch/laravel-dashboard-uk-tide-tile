<?php

namespace JonLynch\TideTile;

use Spatie\Dashboard\Models\Tile;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\File;

class TideStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('tide');
    }

    public function setTides(array $tides): self
    {
        $this->tile->putData('tides', $tides);

        return $this;
    }

    public function tides(): array
    {
        return $this->tile->getData('tides') ?? [];
    }

}