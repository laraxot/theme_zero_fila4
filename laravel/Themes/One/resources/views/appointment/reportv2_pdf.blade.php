<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('pub_theme::appointment.report.ready_title') - {{ $appointment->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #3b82f6;
            font-size: 24px;
            margin: 0 0 10px 0;
        }
        .header .subtitle {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            background-color: #f3f4f6;
            color: #374151;
            font-size: 14px;
            font-weight: bold;
            padding: 8px 12px;
            margin-bottom: 15px;
            border-left: 4px solid #3b82f6;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            font-weight: bold;
            width: 30%;
            padding: 5px 10px 5px 0;
            color: #374151;
        }
        .info-value {
            display: table-cell;
            padding: 5px 0;
            color: #1f2937;
        }
        .medical-section {
            background-color: #fefefe;
            border: 1px solid #e5e7eb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .medical-question {
            font-weight: bold;
            color: #374151;
            margin-bottom: 5px;
        }
        .medical-answer {
            color: #1f2937;
            margin-bottom: 10px;
            padding-left: 15px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .status-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .page-break {
            page-break-before: always;
        }
        .emergency-notice {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>@lang('pub_theme::txt.appointment.title')</h1>
        <p class="subtitle">{{ $appointment->studio->name }}</p>
        <p class="subtitle">@lang('pub_theme::txt.appointment.data'): {{ $appointment->starts_at->format('d/m/Y') }} - @lang('pub_theme::txt.appointment.time'): {{ $appointment->starts_at->format('H:i') }} - {{ $appointment->ends_at->format('H:i') }}</p>
    </div>

    @if($appointment->emergency)
    <div class="emergency-notice">
        🚨 @lang('pub_theme::appointment.fields.emergency.label')
    </div>
    @endif

    <!-- Appointment Information -->
    <div class="section">
        <div class="section-title">@lang('pub_theme::txt.appointment.title') #{{ $appointment->id }}</div>
        
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.data'):</div>
                <div class="info-value">{{ $appointment->starts_at->format('d/m/Y') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.time'):</div>
                <div class="info-value">{{ $appointment->starts_at->format('H:i') }} - {{ $appointment->ends_at->format('H:i') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.studio'):</div>
                <div class="info-value">{{ $appointment->studio->name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.studio_address'):</div>
                <div class="info-value">{{ $appointment->studio->full_address }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.phone'):</div>
                <div class="info-value">{{ $appointment->studio->phone }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.email'):</div>
                <div class="info-value">{{ $appointment->studio->email }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.state'):</div>
                <div class="info-value">
                    <span class="status-badge status-{{ $appointment->state->color() }}">
                        {{ $appointment->state->label() }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Patient Information -->
    @if($appointment->patient)
    <div class="section">
        <div class="section-title">@lang('pub_theme::appointment.fields.patient.label')</div>
        
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::appointment.fields.patient.label'):</div>
                <div class="info-value">{{ $appointment->patient->full_name }}</div>
            </div>
            @if($appointment->patient->email)
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $appointment->patient->email }}</div>
            </div>
            @endif
            @if($appointment->patient->phone)
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::txt.appointment.phone'):</div>
                <div class="info-value">{{ $appointment->patient->phone }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Doctor Information -->
    @if($appointment->doctor)
    <div class="section">
        <div class="section-title">@lang('pub_theme::appointment.fields.doctor.label')</div>
        
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">@lang('pub_theme::appointment.fields.doctor.label'):</div>
                <div class="info-value">{{ $appointment->doctor->full_name }}</div>
            </div>
            @if($appointment->doctor->specialization)
            <div class="info-row">
                <div class="info-label">Specializzazione:</div>
                <div class="info-value">{{ $appointment->doctor->specialization }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Medical Report -->
    @if($appointment->hasReport() && $appointment->report)
    <div class="page-break"></div>
    
    <div class="section">
        <div class="section-title">@lang('pub_theme::appointment.medical_report.title')</div>
        
        <div class="medical-section">
            <!-- Pain History -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.pain_history')</div>
            <div class="medical-answer">
                {{ $appointment->report->has_mouth_or_teeth_pain ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->has_mouth_or_teeth_pain && $appointment->report->mouth_teeth_pain_frequency)
                    - @lang('pub_theme::appointment.medical_report.pain_frequency'): {{ $appointment->report->mouth_teeth_pain_frequency }}
                @endif
            </div>

            <!-- Pregnancy Information -->
            @if($appointment->report->pregnancy_month || $appointment->report->pregnancy_week)
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.pregnancy_info'):</div>
            <div class="medical-answer">
                @if($appointment->report->pregnancy_month)
                    @lang('pub_theme::appointment.medical_report.pregnancy_month'): {{ $appointment->report->pregnancy_month }}
                @endif
                @if($appointment->report->pregnancy_week)
                    @lang('pub_theme::appointment.medical_report.pregnancy_week'): {{ $appointment->report->pregnancy_week }}
                @endif
            </div>
            @endif

            <!-- Dental Hygiene -->
            @if($appointment->report->teeth_brushing_frequency)
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.dental_hygiene'):</div>
            <div class="medical-answer">{{ $appointment->report->teeth_brushing_frequency }}</div>
            @endif

            <!-- Smoking -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.smoking')</div>
            <div class="medical-answer">{{ $appointment->report->smokes ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}</div>

            <!-- Dental Visits -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.dental_visits')</div>
            <div class="medical-answer">{{ $appointment->report->visits_dentist_yearly ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}</div>

            <!-- Diseases -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.diseases')</div>
            <div class="medical-answer">
                {{ $appointment->report->has_diseases ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->has_diseases && $appointment->report->specify_diseases)
                    - @lang('pub_theme::appointment.medical_report.diseases_specify'): {{ $appointment->report->specify_diseases }}
                @endif
            </div>

            <!-- Diet -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.diet_rules')</div>
            <div class="medical-answer">{{ $appointment->report->follows_diet_rules ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}</div>

            <!-- ASL Clinic -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.asl_clinic')</div>
            <div class="medical-answer">{{ $appointment->report->uses_asl_clinic_for_dental_care ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}</div>

            <!-- Missing Teeth -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.missing_teeth')</div>
            <div class="medical-answer">
                {{ $appointment->report->missing_teeth ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->missing_teeth && $appointment->report->specify_missing_teeth)
                    - @lang('pub_theme::appointment.medical_report.missing_teeth_specify'): {{ $appointment->report->specify_missing_teeth }}
                @endif
                @if($appointment->report->missing_teeth && $appointment->report->more_info_missing_teeth)
                    <br>@lang('pub_theme::appointment.medical_report.missing_teeth_more_info'): {{ $appointment->report->more_info_missing_teeth }}
                @endif
            </div>

            <!-- Decayed Teeth -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.decayed_teeth')</div>
            <div class="medical-answer">
                {{ $appointment->report->decayed_teeth ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->decayed_teeth && $appointment->report->specify_decayed_teeth)
                    - @lang('pub_theme::appointment.medical_report.decayed_teeth_specify'): {{ $appointment->report->specify_decayed_teeth }}
                @endif
                @if($appointment->report->decayed_teeth && $appointment->report->more_info_decayed_teeth)
                    <br>@lang('pub_theme::appointment.medical_report.decayed_teeth_more_info'): {{ $appointment->report->more_info_decayed_teeth }}
                @endif
            </div>

            <!-- Prosthesis/Implants -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.prosthesis_implants')</div>
            <div class="medical-answer">
                {{ $appointment->report->has_fixed_prosthesis_or_implants ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->has_fixed_prosthesis_or_implants && $appointment->report->specify_prosthesis_or_implants)
                    - @lang('pub_theme::appointment.medical_report.prosthesis_specify'): {{ $appointment->report->specify_prosthesis_or_implants }}
                @endif
                @if($appointment->report->has_fixed_prosthesis_or_implants && $appointment->report->more_info_prosthesis)
                    <br>@lang('pub_theme::appointment.medical_report.prosthesis_more_info'): {{ $appointment->report->more_info_prosthesis }}
                @endif
            </div>

            <!-- Tartar -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.tartar')</div>
            <div class="medical-answer">
                {{ $appointment->report->has_tartar ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->has_tartar && $appointment->report->specify_tartar)
                    - @lang('pub_theme::appointment.medical_report.tartar_specify'): {{ $appointment->report->specify_tartar }}
                @endif
                @if($appointment->report->has_tartar && $appointment->report->more_info_tartar)
                    <br>@lang('pub_theme::appointment.medical_report.tartar_more_info'): {{ $appointment->report->more_info_tartar }}
                @endif
            </div>

            <!-- Plaque -->
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.plaque')</div>
            <div class="medical-answer">
                {{ $appointment->report->has_plaque ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}
                @if($appointment->report->has_plaque && $appointment->report->specify_plaque)
                    - @lang('pub_theme::appointment.medical_report.plaque_specify'): {{ $appointment->report->specify_plaque }}
                @endif
                @if($appointment->report->has_plaque && $appointment->report->more_info_plaque)
                    <br>@lang('pub_theme::appointment.medical_report.plaque_more_info'): {{ $appointment->report->more_info_plaque }}
                @endif
            </div>

            <!-- Additional Care -->
            @if($appointment->report->needs_more_dental_care !== null)
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.additional_care')</div>
            <div class="medical-answer">{{ $appointment->report->needs_more_dental_care ? __('pub_theme::appointment.medical_report.yes') : __('pub_theme::appointment.medical_report.no') }}</div>
            @endif

            <!-- Further Notes -->
            @if($appointment->report->further_notes)
            <div class="medical-question">@lang('pub_theme::appointment.medical_report.further_notes'):</div>
            <div class="medical-answer">{{ $appointment->report->further_notes }}</div>
            @endif
        </div>
    </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>Documento generato il {{ now()->format('d/m/Y H:i') }}</p>
        <p>{{ $appointment->studio->name }} - {{ $appointment->studio->full_address }}</p>
        <p>@lang('pub_theme::txt.appointment.phone'): {{ $appointment->studio->phone }} | @lang('pub_theme::txt.appointment.email'): {{ $appointment->studio->email }}</p>
    </div>
</body>
</html>