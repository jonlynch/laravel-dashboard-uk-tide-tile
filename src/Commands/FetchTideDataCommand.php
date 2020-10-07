<?php

namespace JonLynch\TideTile\Commands;

use Illuminate\Console\Command;
use JonLynch\TideTile\TideStore;
use JonLynch\TideTile\Services\Tides;

class FetchTideDataCommand extends Command
{
  protected $signature = 'dashboard:fetch-tides';

  protected $description = 'Fetch Tide Data';

  public function handle()
  {
    $this->info('Fetching Tide Data');

    $tides = Tides::getTides(
      config('dashboard.tiles.tides.station_id'),
      config('dashboard.tiles.tides.api_key')
    );
    TideStore::make()->setTides($tides);

    $this->info('All done!');
  }
}
