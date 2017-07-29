<template>
    <div class="" v-if="client">
        <h3>{{client.fio}}
            <br>
            <small>
                <span class="label label-default">Паспорт: <b>{{client.passport}}</b></span>
                <span class="label label-default">ДР: <b>{{client.birthday}}</b></span>
                <span class="label label-default"><span
                        class="glyphicon glyphicon-phone"></span> <b>{{client.phone}}</b></span>
            </small>
        </h3>
        <div>
            <div class="form-inline">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" v-model="showTaken" @change="reloadQueries(client)">
                        показывать отданные заявки
                    </label>
                </div>
                <button class="btn btn-sm btn-primary pull-right" @click="addQuery"><i
                        class="glyphicon glyphicon-plus"></i> Добавить заявку
                </button>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-striped table-condensed table-hover">
            <thead>
            <tr>
                <th>Услуга</th>
                <th>Цена</th>
                <th>Оплачено</th>
                <th>Остаток</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody ref="dataBody">
            <tr v-if="!loading" v-for="query in queries"
                :query="query"
                @edit="editQuery(query)"
                @destory="removeQuery(query)"
                is="query-row"
            ></tr>
            </tbody>
        </table>
        <div class="clearfix"></div>
        <div class="loadingQueryEditor" ref="loadingDiv" :class="{hidden: !loading}">
            <img src="img/loading2.gif" alt="">
        </div>
    </div>
</template>

<script>
    import QueryRow from "./QueryRow.vue"

    export default {
        props: ['client'],
        data() {
            return {
                queries: [],
                showTaken: false,
                loading: false,
            }
        },
        components: {
            'query-row': QueryRow
        },
        methods: {
            reloadQueries(client) {
                let me = this;
                this.loading = true;

                client = client ? client : this.client;
                let client_id = client.id;
                this.promise = axios.get(`api/clients/${client.id}/queries`, {
                    params: {
                        showTaken: this.showTaken
                    }
                });
                this.promise.then(function (response) {
                    if (client_id !== client.id)
                        return;
                    me.loading = false;
                    me.queries = response.data;
                })
            },
            addQuery($event, client) {
                this.$emit("addQuery", {
                    paid: 0,
                    price: 0,
                    status: 0,
                    service: 0,
                    comment: '',
                }, this);
            },
            editQuery(query) {
                this.$emit("addQuery", {
                    id: query.id,
                    paid: query.paid,
                    price: query.price,
                    status: query.status,
                    service: query.service,
                    comment: query.comment,
                    updated_at: query.updated_at,
                    created_at: query.created_at
                }, this);
            },
            removeQuery(query) {
                let me = this;
                if (confirm(`Удалить заявку?`)) {
                    if (query.id) {
                        axios.delete(`api/queries/${query.id}`).then(function (response) {
                            me.reloadQueries();
                            me.$emit("querySaved", null, query);
                        })
                    }
                }
            },
            saveQuery(query) {
                let me = this;
                let promise;
                let client_id = this.client.id;
                if (query.id) {
                    promise = axios.put(`api/clients/${this.client.id}/queries`, query)
                } else {
                    promise = axios.post(`api/clients/${this.client.id}/queries`, query)
                }
                promise.then(function (response) {
                    me.reloadQueries();
                    me.$emit("querySaved", client_id, query);
                })
            }
        }
    }
</script>

<style lang="scss" scoped="">
    .loadingQueryEditor {
        background-color: rgba(255, 255, 255, 0.75);
        width: 100%;
        height: 100px;
        overflow: hidden;
        position: relative;

        img {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    }


</style>