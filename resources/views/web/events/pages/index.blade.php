@extends('layouts.events')

@section('classes_body', 'font-sans ')

@section('title', config('app.name', 'Eventos') . ' - Contas a Venda')

@section('body_style', 'antialiased')

@section('content')

@include('web.events.layouts.index-header')

<section>
    <div class="bg-gray-50 flex justify-center">

        <div class="flex flex-col lg:flex-row w-full lg:w-8/12 justify-between">
            
            <div class="lg:w-1/2 px-2 lg:px-0 flex flex-col mt-24">
                <p class="font-sans font-sm font-bold">Melhor oportunidade por apenas R$3.000</p>
                <h1 class="font-sans text-6xl font-bold mt-4">Conta 1.3B Elite, <br />T5 com 3 Heróis</h1>
                <p class="font-sans font-sm font-light mt-4">Conta 1.3B 810-828-781 Elite T5 , 3 Heróis Wonder, 2 taças, 5 slots familiares, 8 selos Wonder II, Full Bonna Lvl 4</p>
                <a href="#" class="w-48 bg-orange-500 text-white text-center font-light	uppercase flex gap-3 rounded mt-8">
                    <span class="my-5 ml-9 mr-2">Saber Mais</span>
                    <span class="my-6"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg></span>
                </a>
            </div>

            <div class="w-1/2">
                <img class="h-auto" src="https://herolords.com.br/wp-content/uploads/2023/06/personagem-home-topo.png" />
            </div>
        </div>
    </div>
</section>

<div class="container w-full lg:w-8/12">

    <section class="mx-7 lg:mx-0 lg:grid lg:grid-cols-3 lg:gap-4 lg:content-start">

        <div class="justify-center my-10">
            <div class="mb-4">
                <img class="" src="{{ url('assets/images/home-calendario.png') }}"/>
            </div>
            <p class="w-full text-center font-bold mb-4">Calendário de Eventos</p>
            <p class="font-light text-center">Fique por dentro de quando vão rolar os próximos eventos de caça</p>
        </div>

        <div class="justify-center my-10">
            <div class="mb-4 content-center">
                <img class="" src="{{ url('assets/images/home-ranking.png') }}"/>
            </div>
            <p class="w-full text-center font-bold mb-4">Ranking</p>
            <p class="font-light text-center">Acompanhe como está a evolução da sua guilda e como anda sua evolução</p>
        </div>

        <div class="justify-center mt-10">
            <div class="mb-4">
                <img class="" src="{{ url('assets/images/home-bot.png') }}"/>
            </div>
            <p class="w-full text-center font-bold mb-4">HeroBot</p>
            <p class="font-light text-center">Farme suas contas de mais rápida e segura, com todo o suporte que você precisa</p>
        </div>

    </section>

    <section class="mx-7 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-4 lg:content-start">
        @php
            $images= ['assets/images/mug-blue-300x300.jpg','assets/images/mug-coffee-300x300.jpg','assets/images/mug-yellow-300x300.jpg'];
        @endphp
        @for($i = 1; $i <= 12; $i++)
            <a href="//uol.com.br" target="_blank">
                <div class="justify-center my-10 text-center">
                    <div class="mb-4 flex justify-center">
                        <img class="rounded-md" src="{{ url($images[array_rand($images)]) }}"/>
                    </div>
                    <p class="font-bold mt-4">Black Printed Coffee Mug</p>
                    <p class="font-bold text-gray-800">R$ 15,00</p>
                </div>
            </a>
        @endfor

    </section>
</div>

<section class="bg-top bg-origin-content bg-fixed bg-cover" style="background-image: url('https://herolords.com.br/wp-content/uploads/2023/06/home-banner.jpg')">
    <div class="flex justify-center">
        <div class="flex flex-col lg:flex-row w-full lg:w-8/12">
            <div class="mx-4 my-32 lg:mx-0 mb-10 lg:w-1/2">
                <div class="text-orange-400 font-bold text-xl tracking-wide mb-6">Super Promoção!</div>
                <div class="text-white font-medium text-2xl tracking-wide mb-12">Conta Trap Rally 833M Elite Sets, Full Wonder II</div>
                <div class="text-orange-400">Compre agora com 20% de desconto</div>
                
                <div>
                    <a href="#" class="w-48 bg-orange-500 text-white text-center font-light	uppercase flex gap-3 rounded mt-8">
                        <span class="my-5 ml-9 mr-2">Saber Mais</span>
                        <span class="my-6"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg></span>
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 my-32">
                <iframe class="aspect-video w-full" src="https://www.youtube.com/embed/XHOmBV4js_E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<div class="container w-full lg:w-8/12">
    <p class="text-center mt-20 text-lg lg:text-2xl font-bold">As mais clicadas</p>
    <section class="mx-7 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-4 lg:content-start">
        @php
            $images= ['assets/images/mug-blue-300x300.jpg','assets/images/mug-coffee-300x300.jpg','assets/images/mug-yellow-300x300.jpg'];
        @endphp
        @for($i = 1; $i <= 4; $i++)
            <a href="//uol.com.br" target="_blank">
                <div class="justify-center my-10 text-center">
                    <div class="mb-4 flex justify-center">
                        <img class="rounded-md" src="{{ url($images[array_rand($images)]) }}"/>
                    </div>
                    <p class="font-bold mt-4">Black Printed Coffee Mug</p>
                    <p class="font-bold text-gray-800">R$ 15,00</p>
                </div>
            </a>
        @endfor

    </section>
</div>

@include('web.events.layouts.footer')

@stop()