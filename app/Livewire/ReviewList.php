<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewList extends Component
{
    public function render()
    {
        return view('livewire.review-list', [
            // Traemos solo las aprobadas, ordenadas por la más reciente
            'reviews' => Review::where('is_approved', true)
                ->latest()
                ->paginate(6)
        ]);
    }
}
