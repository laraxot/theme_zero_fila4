<?php

declare(strict_types=1);

namespace Modules\Notify\Helpers;

use Illuminate\Support\Facades\Config;

/**
 * Helper per la gestione delle configurazioni del modulo Notify.
 * Permette di sostituire variabili template nei dati di configurazione.
 */
class ConfigHelper
{
    /**
     * Sostituisce le variabili template nei dati di configurazione.
     *
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    public static function replaceTemplateVariables(array $data): array
    {
        $companyConfig = Config::get('notify.company', []);
        $templateVariables = Config::get('notify.template_variables', []);

        // Assicura che entrambi siano array prima di combinarli
        $companyConfig = is_array($companyConfig) ? $companyConfig : [];
        $templateVariables = is_array($templateVariables) ? $templateVariables : [];

        /** @var array<string, mixed> $companyConfig */
        /** @var array<string, mixed> $templateVariables */
        $availableVariables = array_merge($companyConfig, $templateVariables);

        return self::recursiveReplace($data, $availableVariables);
    }

    /**
     * Sostituisce ricorsivamente le variabili template in un array.
     *
     * @param array<string, mixed> $data
     * @param array<string, mixed> $variables
     *
     * @return array<string, mixed>
     */
    private static function recursiveReplace(array $data, array $variables): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $result[$key] = self::replaceStringVariables($value, $variables);
            } elseif (is_array($value)) {
                /** @var array<string, mixed> $value */
                $result[$key] = self::recursiveReplace($value, $variables);
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Sostituisce le variabili template in una stringa.
     *
     * @param array<string, mixed> $variables
     */
    private static function replaceStringVariables(string $string, array $variables): string
    {
        foreach ($variables as $variable => $value) {
            $placeholder = '{{' . $variable . '}}';
            $string = str_replace($placeholder, (string) $value, $string);
        }

        return $string;
    }

    /**
     * Ottiene un valore di configurazione con sostituzione delle variabili template.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $value = Config::get($key, $default);

        if (is_string($value)) {
            $companyConfig = Config::get('notify.company', []);
            $companyConfig = is_array($companyConfig) ? $companyConfig : [];

            /* @var array<string, mixed> $companyConfig */
            return self::replaceStringVariables($value, $companyConfig);
        }

        if (is_array($value)) {
            /** @var array<string, mixed> $value */
            return self::replaceTemplateVariables($value);
        }

        return $value;
    }

    /**
     * Ottiene i dati di test con sostituzione delle variabili template.
     *
     * @return array<string, mixed>
     */
    public static function getTestData(): array
    {
        $testData = Config::get('notify.test_data', []);
        $testData = is_array($testData) ? $testData : [];

        /* @var array<string, mixed> $testData */
        return self::replaceTemplateVariables($testData);
    }

    /**
     * Ottiene la configurazione della company con sostituzione delle variabili template.
     *
     * @return array<string, mixed>
     */
    public static function getCompanyConfig(): array
    {
        $companyConfig = Config::get('notify.company', []);
        $companyConfig = is_array($companyConfig) ? $companyConfig : [];

        /* @var array<string, mixed> $companyConfig */
        return self::replaceTemplateVariables($companyConfig);
    }

    /**
     * Ottiene la configurazione dei webhook con sostituzione delle variabili template.
     *
     * @return array<string, mixed>
     */
    public static function getWebhookConfig(): array
    {
        $webhookConfig = Config::get('notify.webhooks', []);
        $webhookConfig = is_array($webhookConfig) ? $webhookConfig : [];

        /* @var array<string, mixed> $webhookConfig */
        return self::replaceTemplateVariables($webhookConfig);
    }

    /**
     * Ottiene la configurazione email con sostituzione delle variabili template.
     *
     * @return array<string, mixed>
     */
    public static function getEmailConfig(): array
    {
        $emailConfig = Config::get('notify.email', []);
        $emailConfig = is_array($emailConfig) ? $emailConfig : [];

        /* @var array<string, mixed> $emailConfig */
        return self::replaceTemplateVariables($emailConfig);
    }

    /**
     * Ottiene la configurazione dei path con sostituzione delle variabili template.
     *
     * @return array<string, mixed>
     */
    public static function getPathConfig(): array
    {
        $pathConfig = Config::get('notify.paths', []);
        $pathConfig = is_array($pathConfig) ? $pathConfig : [];

        /* @var array<string, mixed> $pathConfig */
        return self::replaceTemplateVariables($pathConfig);
    }
}
