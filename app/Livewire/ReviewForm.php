<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReviewForm extends Component
{
    public $name;
    public $email;
    public $comment;
    public $rating = 5;

    public $successMessage = false;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email', // Pedimos email para evitar spam simple
            'comment' => 'required|min:10',
        ]);

        DB::beginTransaction();
        try {
            Review::create([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]);

            DB::commit();
            // Reseteamos el formulario
            $this->reset(['name', 'email', 'comment', 'rating']);

            // Mostramos mensaje de éxito
            $this->successMessage = true;
        } catch (\Exception $e) {
            // Aquí podríamos manejar errores, loguearlos, etc.
            $this->addError('general', 'Ocurrió un error al enviar la reseña. Por favor, inténtalo de nuevo más tarde.');
        }
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
