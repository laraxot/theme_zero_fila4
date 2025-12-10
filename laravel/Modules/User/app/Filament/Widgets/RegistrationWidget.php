<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Override;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseWidget
{
    public null|array $data = [];
    protected int|string|array $columnSpan = 'full';
    public string $type;
    public string $resource;
    public string $model;
    public string $action;
    public Model $record;

    /**
     * @phpstan-var class-string
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type, Request $_request): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $this->model = $this->resource::getModel();
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        $this->data = $data;
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
    }

    #[Override]
    public function getFormModel(): Model
    {
        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        $user = $this->model::firstWhere('email', $email);
        if ($user === null) {
            return app($this->model);
        }

        $remember_token = $user->remember_token;
        if ($remember_token === null) {
            $user->remember_token = Str::uuid()->toString();
            $user->save();
        }

        if ($remember_token === $token) {
            $this->record = $user;
            return $user;
        }

        return app($this->model);
    }

    #[Override]
    public function getFormFill(): array
    {
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

    #[Override]
    public function getFormSchema(): array
    {
        return $this->resource::getFormSchemaWidget();
    }

    /**
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
    public function register(): RedirectResponse|Redirector
    {
        $lang = app()->getLocale();

        $data = $this->form->getState();

        $data = array_merge($this->data ?? [], $data);
        $record = $this->record;

        $user = app($this->action)->execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type . '_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        //return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
}
