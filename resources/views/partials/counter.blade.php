<div style="text-align: center">
    <div class="sale-info">
        <div>
            <span class="highlight">Отправьте</span> заявку прямо сейчас и <span class="highlight">получите</span> скидку на наши услуги!
        </div>
        <div style="margin-bottom: 0.5em">Торопитесь - до конца акции осталось</div>
    </div>
    <div class="hidden-xs">
        <script src="http://megatimer.ru/s/b222fed4822727436eebfbbc7968bf29.js"></script>
    </div>
    <div class="hidden-lg hidden-md hidden-sm">
        <script src="http://megatimer.ru/s/f33f299374934a6f1aad76ed9dd07e95.js"></script>
    </div>
    <div style="padding-top: 2em">
        <form action="{{ route("addquery") }}" method="POST" class="form-inline" role="form">
            <div class="form-group">
                <input type="text" required="required" name="name" class="index-phone form-control input-lg"
                       placeholder="имя">
                <input type="text" required="required" name="phone" class="index-phone form-control input-lg"
                       placeholder="телефон">
            </div>

            <div class="form-group">
                <div class="">
                    <button type="submit" onclick="reachGoal('order'); return true;" class="btn btn-lg btn-warning">
                        Оставить заявку
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" required="required" value=""></label>
                    <span style="font-size: 0.75em">Подтверждаю, что я ознакомлен с
                            <a class="privacy-link" data-toggle="modal" href="#modal-privacy">Политикой конфиденциальности</a> и даю свое согласие на сбор и обработку персональных данных.*</span>
                </div>
            </div>
        </form>
    </div>
</div>