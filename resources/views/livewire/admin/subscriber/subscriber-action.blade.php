<div>
    <button type="button"
        class="btn btn-{{ $this->subscriber->getRawOriginal('status') ? 'success' : 'danger' }} btn-air-{{ $this->subscriber->getRawOriginal('status') ? 'success' : 'danger' }}"
        wire:click="toggle_subscription">{{ $this->subscriber->getRawOriginal('status') ? 'Subscribed' : 'Unsubscribed' }}</button>
</div>
