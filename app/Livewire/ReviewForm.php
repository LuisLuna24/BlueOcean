<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
            // CAMBIO IMPORTANTE: Validación manual para v3
            'captchaToken' => ['required', function ($attribute, $value, $fail) {

                // 1. Enviamos el token a Google
                $response = Http::withoutVerifying()->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                $data = $response->json();

                if (!$data['success'] || !isset($data['score']) || $data['score'] < 0.5) {
                    $fail('Google ha detectado actividad inusual. Intenta más tarde.');
                }
            }],
        ], [
            'captchaToken.required' => 'La validación de seguridad es requerida.',
        ]);

        DB::beginTransaction();
        try {
            Review::create([
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]);

            DB::commit();

            $this->reset(['name', 'email', 'comment', 'captchaToken']);


            $this->successMessage = true;
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
