<div>
    <div class="card">
        @if ($status)
            <h3>Are you Sure about unsubscribing?</h3>
            <p>
                If you unsubscribe, you will stop receving our latest deals and updates
            </p>

            <a href="{{ url('/') }}" class="btn btn-primary">I'd rather stay</a>
            <button type="button" class="btn btn-secondary" wire:click="unsubscribe">Unsubscribe me</button>

            <div class="emo-container">
                <div class="bunny">
                    <div class="ear l"></div>
                    <div class="ear r"></div>
                    <div class="face">
                        <div class="eye l"></div>
                        <div class="eye r"></div>
                        <div class="nose"></div>
                        <div class="mouth"></div>
                        <div class="mostash l"></div>
                        <div class="mostash r"></div>
                    </div>
                    <div class="hand l"></div>
                    <div class="hand r"></div>

                    <div class="leg l"></div>
                    <div class="leg r"></div>
                    <div class="tail"></div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <b>{{ $subscriber->email }}</b> successfully <b>unsubscribed</b> from {{ title() }}
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" wire:click="subscribe">Subscribe me</button>
            </div>
        @endif
    </div>
</div>
