<div class="grey lighten-4 p10">
    @if($weather->country != "")
    <div class="row mb0">
        <div class="col s3">
            <img src="{{ asset('img/weather/'. strtolower($weather->weather).'.png') }}" height="70">
        </div>
        <div class="col s8">  
            <strong class="red-text">{{ $weather->city }}, {{ $weather->country }}</strong>  
            <h3 class="grey-text mt5">{{ $weather->temp }}&deg; C</h3>
        </div>
    </div>
    @else
        <h3 class="grey-text">
            Weather not available
        </h3>
    @endif
</div>