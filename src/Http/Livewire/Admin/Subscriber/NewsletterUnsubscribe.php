<?php

namespace Adminetic\Newsletter\Http\Livewire\Admin\Subscriber;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Livewire\Component;

class NewsletterUnsubscribe extends Component
{
    public $subscriber;
    public $status;

    public function mount(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
        $this->status = $subscriber->getRawOriginal('status');
    }

    public function unsubscribe()
    {
        $this->subscriber->unsubscribe();
        $this->subscriber->refresh();
        $this->status = $this->subscriber->getRawOriginal('status');
    }

    public function subscribe()
    {
        $this->subscriber->subscribe();
        $this->subscriber->refresh();
        $this->status = $this->subscriber->getRawOriginal('status');
    }

    public function render()
    {
        return view('newsletter::livewire.admin.subscriber.newsletter-unsubscribe');
    }
}
