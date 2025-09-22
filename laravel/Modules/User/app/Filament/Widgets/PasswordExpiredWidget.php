<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Override;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Modules\User\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Form;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * Widget for handling expired password reset.
 *
 * @property \Filament\Schemas\Schema $form
 * @property string|null $current_password
 * @property string|null $password
 * @property string|null $passwordConfirmation
 * @property array<string, mixed>|null $data
 */
class PasswordExpiredWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

    public null|string $current_password = '';
    public null|string $password = '';
    public null|string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public null|array $data = [];

    /**
     * @var view-string
     */
    protected string $view = 'user::filament.widgets.password-expired';

    protected static bool $shouldRegisterNavigation = false;

    /**
     * Get the form schema for password reset.
     *
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];
    }

    /**
     * Get the reset password form action.
     *
     * @return Action
     */
    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')->submit('resetPassword');
    }

    /**
     * Check if the widget should display a logo.
     *
     * @return bool
     */
    public function hasLogo(): bool
    {
        return false;
    }

    /**
     * Reset the user's password.
     *
     * @return PasswordResetResponse|null
     */
    public function resetPassword(): null|PasswordResetResponse
    {
        $this->validate();

        $user = Auth::user();
        if (!$user || !($user instanceof Model)) {
            $this->addError('current_password', __('user::auth.user_not_found'));
            return null;
        }

        // Cast e verifica esistenza dei dati del form
        $data = $this->data ?? [];
        $currentPassword = SafeStringCastAction::cast($data['current_password'] ?? '');
        $newPassword = SafeStringCastAction::cast($data['password'] ?? '');

        if (empty($currentPassword) || empty($newPassword)) {
            $this->addError('current_password', __('user::auth.password_fields_required'));
            return null;
        }

        $userPassword = SafeStringCastAction::cast($user->getAttribute('password'));
        // Cast esplicito di mixed a string per PHPStan
        $userPasswordString = $userPassword;

        if (!Hash::check($currentPassword, $userPasswordString)) {
            $this->addError('current_password', __('user::auth.password_current_incorrect'));
            return null;
        }

        $user->setAttribute('password', Hash::make($newPassword));
        $user->save();

        return new PasswordResetResponse();
    }

    /**
     * Get the current password form component.
     *
     * @return \Filament\Schemas\Components\Component
     */
    protected function getCurrentPasswordFormComponent(): Component
    {
        $authUser = Filament::auth()->user();

        if ($authUser instanceof User) {
            return TextInput::make('current_password')
                ->password()
                ->revealable()
                ->required()
                ->rule(new CheckOtpExpiredRule($authUser))
                ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
        }

        // Fallback nel caso l'utente non sia del tipo corretto
        return TextInput::make('current_password')
            ->password()
            ->revealable()
            ->required()
            ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
    }

    /*
     * protected function getPasswordFormComponent(): Component
     * {
     * $validation_messages = __('user::validation');
     *
     * return TextInput::make('password')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->rule(PasswordRule::default())
     * ->same('passwordConfirmation')
     * ->validationMessages($validation_messages)
     * ->validationAttribute(static::trans('fields.password.validation_attribute'));
     * }
     *
     * protected function getPasswordConfirmationFormComponent(): Component
     * {
     * return TextInput::make('passwordConfirmation')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->dehydrated(false);
     * }
     */

    /**
     * Get the form actions.
     *
     * @return array<int, Action|ActionGroup>
     */
    #[Override]
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
