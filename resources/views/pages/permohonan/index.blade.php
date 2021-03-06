@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 order-lg-0 order-0">
                {{-- Step 1 --}}
                <x-permohonan.layanan-form />

                @if (request()->routeIs('permohonan.third-view') && request()->id)
                    {{-- Step 4 --}}
                    <x-permohonan.riwayat-view />

                    <x-permohonan.persyaratan-form />
                @endif
            </div>

            <div class="col-lg-8 order-lg-1 order-1">
                {{-- Step 2 --}}
                @if (request()->routeIs('permohonan.second-view'))
                    <x-permohonan.pemohon-form />
                @endif
                {{-- Step 3 --}}
                @if (request()->routeIs('permohonan.third-view') || request()->routeIs('permohonan.third-view-new'))
                    <x-permohonan.pemohon-view />
                @endif

                @if (request()->routeIs('permohonan.third-view') || request()->routeIs('permohonan.third-view-new'))
                    <x-permohonan.data-form />
                @endif
            </div>

            <div class="col-lg-12 order-lg-4 order-4">
                {{-- Step 5 --}}
                <x-permohonan.aggrement-form />
            </div>

        </div>
    </div>
@endsection
