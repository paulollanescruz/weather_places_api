@foreach($places as $p)
    <div class="result-item">
        <div class="row mb0">
            <div class="col s9 ofh">
                <div>
                    <i class="material-icons red-text">location_on</i>
                    <strong class="ml10 psa">{{ $p->name }}</strong>
                </div>
                <div class="ml35 grey-text">
                    <small>{{ $p->location->formatted_address }}</small>
                </div>
            </div>
            <div class="col s3 right-align">
                <button class="btn red darken-3 mt5">
                    <i class="material-icons white-text">info</i>                   
                </button>
            </div>
        </div>
    </div>
@endforeach