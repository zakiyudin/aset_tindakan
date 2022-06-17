@inject('carbon', 'Carbon\Carbon')
@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@endif

@if (! empty($introLine))
    {{ $introLine }}
@else
    
@endif

<h2>Asuransi</h2>
<br>
@foreach ($asuransi as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglExAsuransi = $carbon->parse($raw->tgl_ex_asuransi);
$diffDaysAsuransi = $tglExAsuransi->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_asuransi)->format('d-m-Y');
@endphp
@if ($diffDaysAsuransi <= 50 && $tglExAsuransi <= $dateNow && $raw->tgl_ex_asuransi != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal asuransi {{ $raw->tgl_ex_asuransi }} akan berakhir dalam {{ $diffDaysAsuransi }}
</li>
</ul>
@endif
@endforeach

<h2>Pajak STNK(1thn)</h2>
@foreach ($pajak_stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglPajakStnk = $carbon->parse($raw->tgl_ex_pajak_stnk);
$diffDaysPajakStnk = $tglPajakStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_pajak_stnk)->format('d-m-Y');
@endphp
@if ($diffDaysPajakStnk <= 50 && $tglPajakStnk >= $dateNow && $raw->tgl_ex_pajak_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak {{ $dateFormat }} akan berakhir dalam {{ $diffDaysPajakStnk }} hari.
</li>
</ul>
@endif
@endforeach

<h2>Pajak STNK(5thn)</h2>
@foreach ($stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglStnk = $carbon->parse($raw->tgl_ex_stnk);
$diffDayStnk = $tglStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_stnk)->format('d-m-Y');
@endphp
@if ($diffDayStnk <= 50 && $tglStnk >= $dateNow && $raw->tgl_ex_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak STNK 5thn {{ $dateFormat }} akan berakhir dalam {{ $diffDayStnk }} hari.
</li>
</ul>
@endif
@endforeach

<h2>Pajak KIR(6bln)</h2>
@foreach ($kir as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglKir = $carbon->parse($raw->tgl_ex_kir);
$diffDaysKir = $tglKir->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_kir)->format('d-m-Y');
@endphp
@if ($diffDaysKir <= 50 && $tglKir >= $dateNow && $raw->tgl_ex_kir != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal KIR {{ $dateFormat }} akan berakhir dalam {{ $diffDaysKir }} hari.
</li>
</ul>
@endif
@endforeach

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
