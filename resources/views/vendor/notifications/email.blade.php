@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

@component('mail::table')

| Nopol              | Jenis                        | Tgl Asuransi                 |
| :----------------: |:----------------------------:| :--------------------------: |
@foreach ($asuransi as $raw)
| {{ $raw->nopol }} | {{ $raw->jenis_kendaraan }} | {{ $raw->tgl_ex_asuransi }} |
@endforeach


| Nopol              | Jenis                        | Tgl Pajak STNK               |
| :----------------: |:----------------------------:| :--------------------------: |
@foreach ($pajak_stnk as $raw)
| {{ $raw->nopol }} | {{ $raw->jenis_kendaraan }} | {{ $raw->tgl_ex_pajak_stnk }} |
@endforeach


| Nopol              | Jenis                        | Tgl STNK               |
| :----------------: |:----------------------------:| :--------------------------: |
@foreach ($stnk as $raw)
| {{ $raw->nopol }} | {{ $raw->jenis_kendaraan }} | {{ $raw->tgl_ex_stnk }} |
@endforeach


| Nopol              | Jenis                        | Tgl KIR                      |
| :----------------: |:----------------------------:| :--------------------------: |
@foreach ($kir as $raw)
| {{ $raw->nopol }} | {{ $raw->jenis_kendaraan }} | {{ $raw->tgl_ex_kir }} |
@endforeach
@endcomponent

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
