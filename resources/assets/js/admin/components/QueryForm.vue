<template>
    <div class="modal-content" v-if="currentQuery">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Добавить заявку</h4>
        </div>
        <div class="modal-body" :class="bgClass">
            <div>
                <select class="form-control" v-model="currentQuery.service">
                    <option v-for="option in services" :value="option.value">
                        {{ option.key }}
                    </option>
                </select>
                <div class="form-group">
                    <label for="">Цена</label>
                    <input type="number" class="form-control" v-model="currentQuery.price">
                </div>
                <div class="form-group">
                    <label for="">Оплачено</label>
                    <input type="number" class="form-control" v-model="currentQuery.paid">
                </div>
                <div class="form-group">
                    <label for="">Остаток: </label>
                    <span>{{reminder}}</span>
                </div>
                <div class="form-group">
                    <div class="btn-group">
                        <button class="btn" :class="statusClass(0, 'btn-danger')" @click="setStatus(0)">Не готово
                        </button>
                        <button class="btn" :class="statusClass(1, 'btn-warning')" @click="setStatus(1)">В работе
                        </button>
                        <button class="btn" :class="statusClass(2, 'btn-success')" @click="setStatus(2)">Готов</button>
                        <button class="btn" :class="statusClass(3, 'btn-primary')" @click="setStatus(3)">Отдано</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveQuery">Сохранить</button>
        </div>
    </div><!-- /.modal-content -->

</template>

<script>
    import _ from "lodash"

    export default {
        props: ['currentQuery', 'currentQueryModal'],
        data() {
            let services = [];
            _.forOwn(SERVICES, function (key, value) {
                services.push({
                    'key': key,
                    'value': value,
                });
            });
            return {
                services
            };
        },
        computed: {
            reminder() {
                return this.currentQuery ? this.currentQuery.price - this.currentQuery.paid : 0;
            },
            bgClass() {
                return {
                    'bg-danger': this.currentQuery.status === 0,
                    'bg-warning': this.currentQuery.status === 1,
                    'bg-success': this.currentQuery.status === 2,
                    'bg-default': this.currentQuery.status === 3,
                }
            }
        },
        methods: {
            statusClass(value, klass) {
                let result = {
                    'btn-default': this.currentQuery.status !== value,
                };
                result[klass] = this.currentQuery.status === value;
                return result
            },
            setStatus(value) {
                this.currentQuery.status = value;
            },
            saveQuery() {
                this.currentQueryModal.saveQuery(this.currentQuery);
            }
        }
    }
</script>