<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Actions\File\AssetAction;
use Rinvex\Country\CountryLoader;

/**
 * National Flag Select Component.
 *
 * A Filament Select component that displays countries with their flags
 * and supports searching by country name using localized translations.
 */
class NationalFlagSelect extends Select
{
    /**
     * Set up the component configuration.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->searchable()
            ->allowHtml()
            ->optionsLimit(300)
            ->native(false)
            ->options($this->getCountryOptions(...))
            ->getSearchResultsUsing($this->getFilteredCountryOptions(...));
    }

    /**
     * Get all country options with flags and localized names.
     *
     * @return array<string, string>
     */
    protected function getCountryOptions(): array
    {
        $countries = countries();
        $countries = Arr::sort($countries, fn($c) => $c['name']);

        $options = Arr::mapWithKeys($countries, function ($c) {
            $code = $c['iso_3166_1_alpha2'];
            //$label = $c['name'];
            $flag_name = strtolower($code);
            $localizedLabel = __('lang::countries.' . $flag_name);

            $flag_src = app(AssetAction::class)->execute('lang::svg/flag/' . $flag_name . '.svg');
            $flag = '<img src="' . $flag_src . '" class="h-4 w-6 mr-2" inline-block />';

            $html = '<span class="flex items-center gap-2">' . $flag . $localizedLabel . '</span>';
            return [$code => $html];
        });

        return $options;
    }

    /**
     * Get filtered country options based on search query.
     *
     * @param string $search The search query
     * @return array<string, string>
     */
    protected function getFilteredCountryOptions(string $search): array
    {
        if (empty(trim($search))) {
            return $this->getCountryOptions();
        }

        $countries = countries();
        $searchLower = strtolower($search);

        // Filter countries by search term
        $filteredCountries = array_filter($countries, function ($country) use ($searchLower) {
            $code = $country['iso_3166_1_alpha2'];
            $flag_name = strtolower($code);

            // Get localized country name
            $localizedName = __('lang::countries.' . $flag_name);

            // Search in both English name and localized name
            return (
                str_contains(strtolower($country['name']), $searchLower) ||
                str_contains(strtolower($localizedName), $searchLower) ||
                str_contains(strtolower($code), $searchLower)
            );
        });

        // Sort filtered results by name
        $filteredCountries = Arr::sort($filteredCountries, fn($c) => $c['name']);

        // Map to options format with flags
        $options = Arr::mapWithKeys($filteredCountries, function ($c) {
            $code = $c['iso_3166_1_alpha2'];
            $flag_name = strtolower($code);
            $localizedLabel = __('lang::countries.' . $flag_name);

            $flag_src = app(AssetAction::class)->execute('lang::svg/flag/' . $flag_name . '.svg');
            $flag = '<img src="' . $flag_src . '" class="h-4 w-6 mr-2" inline-block />';

            $html = '<span class="flex items-center gap-2">' . $flag . $localizedLabel . '</span>';
            return [$code => $html];
        });

        return $options;
    }
}
