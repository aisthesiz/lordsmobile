@extends('layouts.events')

@section('classes_body', 'font-serif justify-center bg-cover')

@section('body_style', 'background-image: url(https://buypackbus.com/img/background.png)')

@section('content')

<div class="container">
    <section class="text-center font-semibold pt-10 text-white">
        <h1 class="text-6xl pt-32">Make Your Reservation</h1>
        <h1 class="text-6xl">For BUY PACK BUS !</h1>
    </section>

    <section class="mt-10">
        
        <div class="relative h-20 border-0  opacity-80 hover:opacity-100">
            <input type="text" class="absolute top-0 left-0 text-4xl w-full border-0 pt-6 text-neutral-600" placeholder="Write down your in-game name here"/>
            <label class="absolute top-1 left-3 text-amber-700 font-sans uppercase text-sm">username</label>
        </div>

        <div class="flex">
            <div class="relative h-20 border-0 border-gray-400 opacity-80 hover:opacity-100 w-full">
                
                <select class="absolute top-1 left-0 text-4xl w-full border-0 pt-6 mr-5 text-neutral-600">
                    <option>Roud #1 $50</option>
                    <option>Roud #2 $50</option>
                    <option>Roud #3 $50</option>
                    <option>Roud #4 $50</option>
                </select>
                <label class="absolute top-1 left-3 text-amber-700 font-sans uppercase text-sm">Select which Round here</label>
            </div>
            <button type="submit" class="w-1/3 bg-amber-700 p-4 my-1 uppercase text-white font-sans ml-2">Book my seat</button>
        </div>
    </section>

    <section class="mt-36 text-center text-white">
        <span class=" text-4xl font-semibold">Rounds available today</span>
    </section>

    <section class="bg-white bg-opacity-80 mt-10 h-96 p-4 flex">
        <div class="px-14 border-4 border-black rounded h-14 font-sans text-2xl py-2 bg-white bg-opacity-100 uppercase">expired</div>
        <div class="mt-2 ml-2 text-3xl">Round 1 : $50 at 6:30 AM EST / 18:30 BEIJING</div>
    </section>
</div>

@stop()