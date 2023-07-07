
<div class="card-body">

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Geral</a></li>
            <li><a href="#tabs-2">Coleta</a></li>
            <li><a href="#tabs-3">Ninho</a></li>
            <li><a href="#tabs-4">Suprimentos</a></li>
            <li><a href="#tabs-5">Recursos</a></li>
        </ul>
        <div id="tabs-1">
            @include('bot.home.includes.general')
        </div>
        <div id="tabs-2">
            @include('bot.home.includes.gather')
        </div>
        <div id="tabs-3">
            @include('bot.home.includes.rally')
        </div>
        <div id="tabs-4">
            @include('bot.home.includes.cargo-ship')
        </div>
        <div id="tabs-5">
            @include('bot.home.includes.supply')
        </div>
    </div>

</div>