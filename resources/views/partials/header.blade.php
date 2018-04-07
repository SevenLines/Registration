<div class="header">
    <img src="{{ asset("images/types/herb.png") }}" alt="" class="herb pull-right">
    <img src="{{ asset("images/types/herb.png") }}" alt="" class="herb pull-left">
    <div class="header-info" style=" text-align: center">
        @if(Settings::get('index_page_text'))
        <div class="info">
            <div class="" style="text-align: center">
                {!! Settings::get('index_page_text') !!}
            </div>
        </div>
        @endif

        @if(Settings::get('index_bordered_page_text'))
        <div class="" style="text-align: center">
            <div class="main_info">
                {!! Settings::get('index_bordered_page_text') !!}
            </div>
        </div>
        @endif
        <div class="flags" style="display:inline-block;">
            <img src="{{ URL::asset("images/flags/ru.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/az.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/am.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/kz.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/tj.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/uz.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/bl.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/kzh.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/mld.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/ua.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/flag1.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/flag2.png") }}" alt="">
            <img src="{{ URL::asset("images/flags/flag3.png") }}" alt="">
        </div>
    </div>
</div>