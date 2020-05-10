<x-dashboard-tile :position="$position">
    <div wire:poll.60s
         class="justify-items-center h-full text-center"
    >
        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide pb-2">
            {{$location}} Tides &mdash; {{\Carbon\Carbon::now()->toFormattedDateString()}}
        </h1>
        <div class="grid grid-rows-4 gap-2">
        @foreach ($tides as $tide)
            <?php 
            $time = \Carbon\Carbon::createFromTimeStamp(strtotime($tide['dateTime']))
            ?>

            <div class="text-base tracking-wide">
                @if ($tide['highLow'] === "HighWater")
                    High
                @else
                    Low
                @endif 
                <span class="">{{ $time ->format('H:i')}}
            
                {{number_format($tide['height'], 1)}}m
                <div class="text-sm text-dimmed tracking-wide">
                    {{  $time->diffForHumans(['parts' => 2])}}
                </div>
            </div>
        @endforeach
        </div>
    </div>
</x-dashboard-tile>
