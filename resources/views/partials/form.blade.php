<div class="modal fade" id="modal-query">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">&nbsp;</h4>
            </div>
            <div class="modal-body content" style="text-align: center">
                <span class="message success">Ваша заявка успешна принята. Мы свяжемся с вами в ближайшее время.</span>
                <span class="message fail">Произошла ошибка, попробуйт отправить заявку попозже или позвоните нам по телефону <a
                            href="tel:+79264243334"> +7 926 424 3334</a></span>
                <div class="message loading">
                    <img src="{{ URL::asset("images/reload.gif") }}">
                    <br>
                        Ваша заявка обрабатывается, <br> подождите немного
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Ок</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    // bind submit handler to form
    $('form').on('submit', function (e) {
        e.preventDefault(); // prevent native submit
        var form = this;
        var $modal = $("#modal-query");

        gtag('send', 'event', { eventCategory: 'query', eventAction: 'submit'});

        $(this).ajaxSubmit({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                reachGoal('order');
                $modal.modal("show");
                $modal.find(".content .message").hide();
                $modal.find(".content .message.success").show();
                form.reset();
            },
            error: function () {
                $modal.modal("show");
                $modal.find(".content .message").hide();
                $modal.find(".content .message.fail").show();
            },
            beforeSubmit: function () {
                $modal.modal("show");
                $("#phone-modal").modal("hide");
                $modal.find(".content .message").hide();
                $modal.find(".content .message.loading").show();
            }
        })
    });
</script>