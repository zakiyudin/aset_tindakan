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
<ul>
<li>
<h4>Akan Expired</h4>
@foreach ($asuransi as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglExAsuransi = $carbon->parse($raw->tgl_ex_asuransi);
$diffDaysAsuransi = $tglExAsuransi->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_asuransi)->format('d-m-Y');
@endphp
@if ($diffDaysAsuransi <= 14 && $tglExAsuransi >= $dateNow && $raw->tgl_ex_asuransi != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal asuransi {{ $raw->tgl_ex_asuransi }} akan berakhir dalam {{ $diffDaysAsuransi }}
</li>
</ul>
@endif
@endforeach
</li>
<!--sudah lewat masa expired---->
<hr>
<li>
<h4>Sudah Melewati Masa Expired</h4>
@foreach ($asuransi as $item)
@php
$dateNow = $carbon->parse($carbon->now());
$tglExAsuransi = $carbon->parse($raw->tgl_ex_asuransi);
$diffDaysAsuransi = $tglExAsuransi->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_asuransi)->format('d-m-Y');
@endphp
@if ($diffDaysAsuransi <= 14 && $tglExAsuransi <= $dateNow && $raw->tgl_ex_asuransi != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal asuransi {{ $raw->tgl_ex_asuransi }} sudah melewati masa expired selama {{ $diffDaysAsuransi }} hari
</li>
</ul>
@endif
@endforeach
</li>
</ul>
@component('mail::button', ['url' => url('kendaraan_expired/asuransi_expired')])
Lihat Asuransi
@endcomponent

<h2>Pajak STNK(1thn)</h2>
<ul>
<li>
<h4>Akan Expired</h4>
@foreach ($pajak_stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglPajakStnk = $carbon->parse($raw->tgl_ex_pajak_stnk);
$diffDaysPajakStnk = $tglPajakStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_pajak_stnk)->format('d-m-Y');
@endphp
@if ($diffDaysPajakStnk <= 14 && $tglPajakStnk >= $dateNow && $raw->tgl_ex_pajak_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak {{ $dateFormat }} akan berakhir dalam {{ $diffDaysPajakStnk }} hari.
</li>
</ul>
@endif
@endforeach
</li>
<!--sudah lewat masa expired---->
<hr>
<li>
<h4>Sudah Melewati Masa Expired</h4>
@foreach ($pajak_stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglPajakStnk = $carbon->parse($raw->tgl_ex_pajak_stnk);
$diffDaysPajakStnk = $tglPajakStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_pajak_stnk)->format('d-m-Y');
@endphp
@if ($diffDaysPajakStnk <= 14 && $tglPajakStnk <= $dateNow && $raw->tgl_ex_pajak_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak {{ $dateFormat }} sudah melewati masa expired selama {{ $diffDaysPajakStnk }} hari
</li>
</ul>
@endif
@endforeach
</li>
</ul>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/kendaraan_expired/pajak_stnk_expired'])
Lihat Pajak STNK (1thn)
@endcomponent

<h2>Pajak STNK(5thn)</h2>
<ul>
<li>
<h4>Akan Expired</h4>
@foreach ($stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglStnk = $carbon->parse($raw->tgl_ex_stnk);
$diffDayStnk = $tglStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_stnk)->format('d-m-Y');
@endphp
@if ($diffDayStnk <= 14 && $tglStnk >= $dateNow && $raw->tgl_ex_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak STNK 5thn {{ $dateFormat }} akan berakhir dalam {{ $diffDayStnk }} hari.
</li>
</ul>
@endif
@endforeach
</li>
<!--sudah lewat masa expired---->
<hr>
<li>
<h4>Sudah Melewati Masa Expired</h4>
@foreach ($stnk as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglStnk = $carbon->parse($raw->tgl_ex_stnk);
$diffDayStnk = $tglStnk->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_stnk)->format('d-m-Y');
@endphp
@if ($diffDayStnk <= 14 && $tglStnk <= $dateNow && $raw->tgl_ex_stnk != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal Pajak STNK 5thn {{ $dateFormat }} sudah melewati masa expired selama {{ $diffDayStnk }} hari
</li>
</ul>
@endif
@endforeach
</li>
</ul>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/kendaraan_expired/stnk_expired'])
Lihat Pajak STNK (5thn)
@endcomponent

<h2>Pajak KIR(6bln)</h2>
<ul>
<li>
<h4>Akan Expired</h4>
@foreach ($kir as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglKir = $carbon->parse($raw->tgl_ex_kir);
$diffDaysKir = $tglKir->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_kir)->format('d-m-Y');
@endphp
@if ($diffDaysKir <= 14 && $tglKir >= $dateNow && $raw->tgl_ex_kir != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal KIR {{ $dateFormat }} akan berakhir dalam {{ $diffDaysKir }} hari.
</li>
</ul>
@endif
@endforeach
</li>
<!--sudah lewat masa expired---->
<hr>
<li>
<h4>Sudah Melewati Masa Expired</h4>
@foreach ($kir as $raw)
@php
$dateNow = $carbon->parse($carbon->now());
$tglKir = $carbon->parse($raw->tgl_ex_kir);
$diffDaysKir = $tglKir->diffInDays($dateNow);
$dateFormat = $carbon->parse($raw->tgl_ex_kir)->format('d-m-Y');
@endphp
@if ($diffDaysKir <= 14 && $tglKir <= $dateNow && $raw->tgl_ex_kir != null)
<ul>
<li>
{{ $raw->nopol }} - {{ $raw->jenis_kendaraan }} dengan tanggal KIR {{ $dateFormat }} sudah melewati masa expired selama {{ $diffDaysKir }} hari
</li>
</ul>
@endif
@endforeach
</li>
</ul>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/kendaraan_expired/kir_expired'])
Lihat Pajak KIR
@endcomponent



{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
IT Support
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')

@endslot
@endisset
@endcomponent
