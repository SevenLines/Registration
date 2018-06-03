<style>

</style>

<a class="phone" data-toggle="modal" href="#phone-modal">
    <div id="DIV_1">
        <div id="DIV_2">
        </div>
    </div>
</a>

<div class="modal fade" id="phone-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Юридическая помощь</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="" style="padding-bottom: 16px">Хотите, мы сами вам перезвоним?</div>
                <form action="{{ route("addquery") }}" method="POST" role="form">
                    <div class="form-group">
                        <input type="text" name="name" required="required" class="index-phone form-control input-lg" placeholder="имя">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" required="required" class="index-phone form-control input-lg" placeholder="телефон">
                    </div>

                    <div class="form-group" style="margin-top: 0.5em">
                        <div class="">
                            <button type="submit" class="btn btn-danger" onClick="ga('send', 'event', { eventCategory: 'кнопка', eventAction: 'клик'});">
                                Оставить заявку
                            </button>
                        </div>
                    </div>
                    <div class="form-group" style="font-size: 0.75em">
                        Нажимая «Оставить заявку» вы подтверждаете, что ознакомлены с Политикой конфиденциальности и даете свое согласие на сбор и обработку персональных данных.
                    </div>
                </form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
