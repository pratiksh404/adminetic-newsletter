<?php

namespace Adminetic\Newsletter\Http\Livewire\Admin\Subscriber;

use Adminetic\Newsletter\Exports\SubscribersExport;
use Adminetic\Newsletter\Imports\SubscribersImport;
use Adminetic\Newsletter\Models\Admin\Subscriber;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class SubscriberPanel extends Component
{
    use WithPagination, WithFileUploads;

    public $limit = 10;
    public $search;
    public $add_subscriber_toggle = false;
    public $import_subscriber_toggle = false;

    // Attribute
    public $email;
    public $subscriber_excel;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['subscriber_action_success' => '$refresh'];

    public function save_subscriber()
    {
        $this->validate([
            'email' => 'required|unique:subscribers,email|email:rfc,dns',
        ]);

        $subscriber = Subscriber::create([
            'email' => $this->email,
        ]);

        if (setting('subscription_mail', config('newsletter.subscription_mail' ?? false))) {
            $subscriber->send_subscription_notification_email();
        }

        $this->add_subscriber_toggle = false;
        $this->email = null;

        $this->emit('subscriber_panel_success', 'Subscriber added successfully');
    }

    public function import_subscriber()
    {
        $this->validate([
            'subscriber_excel' => 'file|mimes:csv,xlsx',
        ]);

        Excel::import(new SubscribersImport, $this->subscriber_excel);

        $this->import_subscriber_toggle = false;
        $this->subscriber_excel = null;

        $this->emit('subscriber_panel_success', 'Subscriber imported successfully');
    }

    public function export_subscriber()
    {
        return Excel::download(new SubscribersExport, 'subscribers.xlsx');
    }

    public function render()
    {
        $subscribers = $this->getSubscribers();

        return view('newsletter::livewire.admin.subscriber.subscriber-panel', compact('subscribers'));
    }

    private function getSubscribers()
    {
        $data = Subscriber::query();

        $data = $this->searchedSubscribers($data);

        $data = $data->latest();

        return $data->paginate($this->limit ?? 10);
    }

    private function searchedSubscribers($data)
    {
        if (! is_null($this->search)) {
            $data->where('email', 'like', '%'.$this->search.'%');
        }

        return $data;
    }
}
