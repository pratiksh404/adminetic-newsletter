<div>
    @if (!is_null($subscriber))
        <div class="d-flex justify-content-center">
            <button type="button"
                class="btn btn-{{ $this->subscriber->getRawOriginal('verified') ? 'success' : 'danger' }} btn-air-{{ $this->subscriber->getRawOriginal('verified') ? 'success' : 'danger' }} mx-2"
                wire:click="toggle_verification">{{ $this->subscriber->getRawOriginal('verified') ? 'Verified' : 'Unverified' }}</button>
            <button type="button"
                class="btn btn-{{ $this->subscriber->getRawOriginal('status') ? 'success' : 'danger' }} btn-air-{{ $this->subscriber->getRawOriginal('status') ? 'success' : 'danger' }} mx-2"
                wire:click="toggle_subscription">{{ $this->subscriber->getRawOriginal('status') ? 'Subscribed' : 'Unsubscribed' }}</button>
            <button type="button" class="btn btn-warning btn-air-warning mx-2"
                wire:click="$toggle('edit_subscriber_modal')" wire:click="toggle_subscription"><i
                    class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-air-danger mx-2 btn-air-danger"
                wire:click="$toggle('delete_subscriber_modal')" wire:click="toggle_subscription"><i
                    class="fa fa-trash"></i></button>
        </div>

        {{-- Modals --}}
        {{-- Edit Subscriber --}}
        @if ($delete_subscriber_modal)
            <div class="card"
                style="position: fixed;top: 10vh;right: 25vw;bottom: 0;left: 25vw;z-index: 999;width: 50vw;height:15vh;overflow-y:auto">
                <div class="card-header">
                    <h5 class="card-title text-center">Delete Subscriber</h5>
                </div>

                <div class="card-body shadow-lg p-3" style="overflow-y:auto">
                    Are you sure you want to delete this subscriber ?
                </div>
                <div class="card-footer justify-content-end">
                    <button type="button" class="btn btn-danger btn-air-danger mx-1"
                        wire:click="delete_subscriber">Delete</button>
                    <button type="button" class="btn btn-danger btn-air-danger mx-1"
                        wire:click="$toggle('delete_subscriber_modal')">Close</button>
                </div>

            </div>
        @endif
        {{-- Edit Subscriber --}}
        @if ($edit_subscriber_modal)
            <div class="card"
                style="position: fixed;top: 10vh;right: 25vw;bottom: 0;left: 25vw;z-index: 999;width: 50vw;height:20vh;overflow-y:auto">
                <div class="card-header">
                    <h5 class="card-title text-center">Edit Subscriber</h5>
                </div>
                <form wire:submit.prevent="edit_subscriber">
                    <div class="card-body shadow-lg p-3" style="overflow-y:auto">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" wire:model.defer="email" class="form-control"
                                placeholder="Subscriber Email ...">
                        </div>
                        @error('email')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-footer justify-content-end">
                        <button type="submit" class="btn btn-primary btn-air-primary mx-1">Edit</button>
                        <button type="button" class="btn btn-danger btn-air-danger mx-1"
                            wire:click="$toggle('edit_subscriber_modal')">Close</button>
                    </div>
                </form>
            </div>
        @endif
    @endif
</div>
