<div>
    <div class="recent-table table-responsive currency-table p-3">
      
            <div class="d-flex justify-content-between">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input type="text" wire:model.debounce.500ms="search" class="form-control" style="width: 50%"
                        placeholder="Subscriber Email">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-air-primary mx-1"
                        wire:click="$toggle('add_subscriber_toggle')">Add</button>
                    <button type="button" class="btn btn-success btn-air-success mx-1"
                        wire:click="$toggle('import_subscriber_toggle')">Import</button>
                    <div wire:loading.remove wire:target="export_subscriber">
                        <button type="button" class="btn btn-warning btn-air-warning mx-1"
                            wire:click="export_subscriber">Export</button>
                    </div>
                    <div wire:loading wire:target="export_subscriber">
                        <button type="button" class="btn btn-warning btn-air-warning mx-1" disabled>Exporting
                            ...</button>
                    </div>
                </div>
            </div>
            {{-- Modals --}}
            {{-- Add Subscriber Modal --}}
            @if ($add_subscriber_toggle)
                <div class="card"
                    style="position: fixed;top: 10vh;right: 25vw;bottom: 0;left: 25vw;z-index: 999;width: 50vw;height:25vh;overflow-y:auto">
                    <div class="card-header">
                        <h5 class="card-title text-center">Add Subscriber</h5>
                    </div>
                    <form wire:submit.prevent="save_subscriber">
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
                            <button type="submit" class="btn btn-primary btn-air-primary mx-1">Save</button>
                            <button type="button" class="btn btn-danger btn-air-danger mx-1"
                                wire:click="$toggle('add_subscriber_toggle')">Close</button>
                        </div>
                    </form>
                </div>
            @endif
            {{-- Import Subscriber Modal --}}
            @if ($import_subscriber_toggle)
                <div class="card"
                    style="position: fixed;top: 10vh;right: 25vw;bottom: 0;left: 25vw;z-index: 999;width: 50vw;height:40vh;overflow-y:auto">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Subscriber</h5>
                    </div>
                    <form wire:submit.prevent="import_subscriber">
                        <div class="card-body shadow-lg p-3" style="overflow-y:auto">
                            <label>Import Excel File</label> <br>
                            <input type="file" wire:model.defer="subscriber_excel">
                            @error('subscriber_excel')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <div wire:loading.remove wire:target="import_subscriber">
                                <button type="submit" class="btn btn-primary btn-air-primary mx-1">Import</button>
                            </div>
                            <div wire:loading wire:target="import_subscriber">
                                <button type="submit" class="btn btn-primary btn-air-primary mx-1" disabled>Import In
                                    Progress ...</button>
                            </div>
                            <button type="button" class="btn btn-danger btn-air-danger mx-1"
                                wire:click="$toggle('import_subscriber_toggle')">Close</button>
                        </div>
                    </form>
                </div>
            @endif
            <hr>
   
        <table class="table">
            <thead>
                <tr>
                    <th class="f-light">Email</th>
                    <th class="f-light d-flex justify-content-end">Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($subscribers->count() > 0)
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <td title="{{ $subscriber->code }}">{{ $subscriber->email }}</td>
                            <td class="d-flex justify-content-end">
                                @livewire('newsletter-subscriber-action', ['subscriber' => $subscriber], key('subscriber' . $subscriber->id))
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">
                            <div class="alert alert-light-danger d-flex justify-content-center" role="alert">
                                <p class="txt-danger">No subscribers yet</p>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <hr>
        {{ $subscribers->links() }}
    </div>
    @push('livewire_third_party')
        <script>
            $(function() {
                Livewire.on('subscriber_panel_success', message => {
                    var notify_allow_dismiss = Boolean(
                        {{ config('adminetic.notify_allow_dismiss', true) }});
                    var notify_delay = {{ config('adminetic.notify_delay', 2000) }};
                    var notify_showProgressbar = Boolean(
                        {{ config('adminetic.notify_showProgressbar', true) }});
                    var notify_timer = {{ config('adminetic.notify_timer', 300) }};
                    var notify_newest_on_top = Boolean(
                        {{ config('adminetic.notify_newest_on_top', true) }});
                    var notify_mouse_over = Boolean(
                        {{ config('adminetic.notify_mouse_over', true) }});
                    var notify_spacing = {{ config('adminetic.notify_spacing', 1) }};
                    var notify_notify_animate_in =
                        "{{ config('adminetic.notify_animate_in', 'animated fadeInDown') }}";
                    var notify_notify_animate_out =
                        "{{ config('adminetic.notify_animate_out', 'animated fadeOutUp') }}";
                    var notify = $.notify({
                        title: "<i class='{{ config('adminetic.notify_icon', 'fa fa-bell-o') }}'></i> " +
                            "Alert",
                        message: message
                    }, {
                        type: 'success',
                        allow_dismiss: notify_allow_dismiss,
                        delay: notify_delay,
                        showProgressbar: notify_showProgressbar,
                        timer: notify_timer,
                        newest_on_top: notify_newest_on_top,
                        mouse_over: notify_mouse_over,
                        spacing: notify_spacing,
                        animate: {
                            enter: notify_notify_animate_in,
                            exit: notify_notify_animate_out
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
