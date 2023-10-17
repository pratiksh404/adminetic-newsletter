<?php

namespace Adminetic\Newsletter\Http\Livewire\Admin\Subscriber;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Livewire\Component;

class SubscriberAction extends Component
{
    public $subscriber;

    public function mount(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function  toggle_subscription()
    {
        $this->subscriber->update([
            'status' => !($this->subscriber->getRawOriginal('status'))
        ]);
    }

    public function render()
    {
        return view('newsletter::livewire.admin.subscriber.subscriber-action');
    }
}
