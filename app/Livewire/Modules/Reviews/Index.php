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

    //&==========================================================================================validate
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
        $this->dispatch('notify');
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
        $this->dispatch('notify');
    }

    public function resetForm()
    {
        $this->reset(['validateId', 'nombre', 'email', 'comment']);
    }

    //&==========================================================================================validateAll

    public $valideteAllModal = false;

    public function validateAll()
    {
        $this->valideteAllModal = true;
    }

    public function validateAllSubmit()
    {
        try {
            $review = Review::where('is_approved', 0)->get();
            if ($review) {
                foreach ($review as $key => $value) {
                    $value->is_approved = 1;
                    $value->save();
                }
            }
            $this->valideteAllModal = false;

            $this->dispatch('notify');
        } catch (\Exception $e) {
            dd($e->getMessage());
            abort(500);
        }
    }

    //&==========================================================================================deleteRejected

    public $delteRejectedModal = false;

    public $password = '';
    public function deleteRejected()
    {
        $this->delteRejectedModal = true;
    }

    public function deleteRejectedSubmit()
    {
        $this->validate([
            'password' => ['required', 'current_password'], // Valida contra la contraseña del usuario actual
        ]);

        try {
            $review = Review::where('is_approved', 2)->get();
            if ($review) {
                foreach ($review as $key => $value) {
                    $value->delete();
                }
            }
            $this->dispatch('notify');
        } catch (\Exception $e) {
            dd($e->getMessage());
            abort(500);
        }

        $this->delteRejectedModal = false;
        $this->reset('password');
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
