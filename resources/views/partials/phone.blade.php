<style>

</style>

<a class="phone" data-toggle="modal" href="#phone-modal">
    <div id="DIV_1">
        <div id="DIV_2">
        </div>
    </div>
</a>

<div class="modal fade" id="phone-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Юридическая помощь</h4>
			</div>
			<div class="modal-body">
                <div class="" style="padding-bottom: 16px">Сейчас сотрудники не в офисе. <br>Хотите, мы сами вам перезвоним?</div>
                <form action="{{ route("addquery") }}" method="POST" class="form-inline" role="form">
                    <div class="form-group">
                        <input type="text" name="name" required="required" class="index-phone form-control input-lg" placeholder="имя">
                        <input type="text" name="phone" required="required" class="index-phone form-control input-lg" placeholder="телефон">
                    </div>

                    <div class="form-group" style="margin-top: 0.5em">
                        <div class="">
                            <button type="submit" class="btn btn-warning">
                                Оставить заявку
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" required="required" value=""></label>
                            <span style="font-size: 0.75em">Подтверждаю, что я ознакомлен с
                            <a  class="privacy-link" data-toggle="modal" href="#modal-privacy">Политикой конфиденциальности</a> и даю свое согласие на сбор и обработку персональных данных.*</span>
                        </div>
                    </div>
                </form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
