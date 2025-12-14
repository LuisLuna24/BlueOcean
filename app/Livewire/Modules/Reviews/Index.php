<?php

namespace App\Livewire\Modules\Reviews;

use App\Models\Review;
use Livewire\Component;

class Index extends Component
{
    public $status = '';
    protected $queryString = [
        'status' => ['except' => ''],
    ];
    public $validateModal = false;
    public $validateId;

    public $nombre, $email, $comment;
    public function openValidateModal($id)
    {
        $this->validateModal = true;
        $this->validateId = $id;

        $data = Review::find($id);
        $this->nombre = $data->name;
        $this->email = $data->email;
        $this->comment = $data->comment;
    }

    public function confirmValidation()
    {
        $review = Review::find($this->validateId);
        if ($review) {
            $review->is_approved = 1;
            $review->save();
        }
        $this->resetForm();
        $this->validateModal = false;
    }

    public function notValidate()
    {
        $review = Review::find($this->validateId);
        if ($review) {
            $review->is_approved = 2;
            $review->save();
        }
        $this->resetForm();
        $this->validateModal = false;
    }

    public function resetForm()
    {
        $this->reset(['validateId', 'nombre', 'email', 'comment']);
    }


    public function render()
    {
        $collection = Review::query();

        if ($this->status !== '') {
            $collection = $collection->where('is_approved', $this->status);
        }

        $collection = $collection->orderBy('created_at', 'desc')
            ->paginate(10, pageName: 'reviews-page');
        return view('livewire.modules.reviews.index', [
            'collection' => $collection,
        ]);
    }
}
