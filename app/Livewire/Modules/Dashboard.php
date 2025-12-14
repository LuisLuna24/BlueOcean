<?php

namespace App\Livewire\Modules;

use App\Models\Review;
use Livewire\Component;

class Dashboard extends Component
{

    public $pendingCount;
    public $approvedCount;
    public $rejectedCount;

    public function mount()
    {
        // Ajusta los valores '0', '1', '2' según como guardes el status en tu BD
        $this->pendingCount = Review::where('is_approved', '0')->count();
        $this->approvedCount = Review::where('is_approved', '1')->count();
        $this->rejectedCount = Review::where('is_approved', '2')->count();
    }
    public function render()
    {
        return view('livewire.modules.dashboard');
    }
}
