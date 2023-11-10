<?php

namespace Adminetic\Newsletter\Http\Livewire\Admin\Subscriber;

use Adminetic\Newsletter\Models\Admin\Subscriber;
use Livewire\Component;

class SubscriberAction extends Component
{
    public $subscriber;
    public $edit_subscriber_modal = false;
    public $delete_subscriber_modal = false;

    public $email;

    public function mount(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
        $this->email = $subscriber->email;
    }

    public function toggle_subscription()
    {
        $this->subscriber->update([
            'status' => ! $this->subscriber->getRawOriginal('status'),
        ]);
    }

    public function toggle_verification()
    {
        $this->subscriber->update([
            'verified' => ! $this->subscriber->getRawOriginal('verified'),
        ]);
    }

    public function edit_subscriber()
    {
        $this->validate([
            'email' => 'required|unique:subscribers,email|email:rfc,dns',
        ]);

        $subscriber = $this->subscriber->update([
            'email' => $this->email,
        ]);

        if (setting('subscription_mail', config('newsletter.subscription_mail' ?? false))) {
            $subscriber->send_subscription_notification_email();
        }

        $this->edit_subscriber_modal = false;
        $this->email = $this->subscriber->email;
        $this->emit('subscriber_action_success');
    }

    public function delete_subscriber()
    {
        $this->subscriber->delete();
        $this->subscriber = null;
        $this->delete_subscriber_modal = false;
    }

    public function render()
    {
        return view('newsletter::livewire.admin.subscriber.subscriber-action');
    }
}
