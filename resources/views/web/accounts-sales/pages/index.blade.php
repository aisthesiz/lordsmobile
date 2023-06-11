@extends('layouts.accounts-sales')

@section('title', 'Page Title')

@section('content')

<div class="flex">
    @foreach($accountsSales as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($item->image_1) }}" />
            <div>
                <h5>{{ $item->title }}</h5>
                <h6>@money($item->value_sell)</h6>
                <p>{{ $item->description }}</p>
                <x-web.whatsapp-button
                    :text="'A conta que estou querendo: ' . route('admin.accounts-sales.edit', $item->id)"
                ></x-web-whatsapp-button>
            </div>
        </div>
    @endforeach
</div>


@endsection

@push('js')
@endpush