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

    public $captchaToken;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'comment' => 'required|min:10',
            // 2. Validamos el captcha (usando el paquete anhskohbo/no-captcha)
            'captchaToken' => 'required|captcha',
        ], [
            'captchaToken.required' => 'Por favor confirma que no eres un robot.',
            'captchaToken.captcha' => 'Error de validación del captcha.'
        ]);

        DB::beginTransaction();
        try {
            Review::create([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]);

            DB::commit();

            // 3. Reseteamos variables
            $this->reset(['name', 'email', 'comment', 'captchaToken']);

            // 4. Emitimos evento para limpiar el captcha visualmente en el frontend
            $this->dispatch('reset-captcha');

            session()->flash('success', '¡Gracias por tu reseña!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Ocurrió un error. Inténtalo más tarde.');
        }
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
