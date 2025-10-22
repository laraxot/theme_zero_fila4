<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Override;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
 * - Facilmente estendibile (2FA, captcha, login social)
 *
 * @property array<string, mixed>|null $data
 */
class LoginWidget extends XotBaseWidget
{
    /**
     * Blade view del widget nel modulo User.
     * IMPORTANTE: quando il widget viene usato con @livewire() direttamente nelle Blade,
     * il path deve essere senza il namespace del modulo (senza "user::").
     *
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     */
    /** @phpstan-ignore-next-line property.defaultValue */
    protected string $view = 'pub_theme::filament.widgets.auth.login';

    /**
     * Inizializza il widget quando viene montato.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->email()
                ->required()
                ->autofocus(),
            TextInput::make('password')
                ->password()
                ->required()
                ->revealable(),
            Toggle::make('remember')->visible(false),
        ];
    }

    /**
     * Get the form model.
     *
     * @return Model|null
     */
    #[Override]
    protected function getFormModel(): null|Model
    {
        return null;
    }

    /**
     * Get the form fill data.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function getFormFill(): array
    {
        return [
            'email' => old('email'),
            'remember' => true,
        ];
    }

    /**
     * Handle login form submission.
     *
     * @return void
     */
    #[Override]
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

            if (!Auth::attempt($attempt_data, $remember)) {
                throw ValidationException::withMessages([
                    'email' => [__('user::messages.credentials_incorrect')],
                ]);
            }

            session()->regenerate();

            Notification::make()
                ->title(__('user::messages.login_success'))
                ->success()
                ->send();

            $this->redirect(route('home'));
        } catch (ValidationException $e) {
            Notification::make()
                ->title(__('user::messages.validation_error'))
                ->body($e->getMessage())
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            foreach ($e->errors() as $field => $messages) {
                // Semplificato: aggiungi sempre l'errore al campo specifico
                $this->addError($field, implode(' ', $messages));
            }
        } catch (Exception $e) {
            report($e);

            Notification::make()
                ->title(__('user::messages.login_error'))
                ->body(__('user::messages.login_error'))
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }
}
