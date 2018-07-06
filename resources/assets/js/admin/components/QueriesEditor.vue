<template>
    <div class="" v-if="client">
        <h3>{{client.fio}}
            <br>
            <small>
                <span class="label label-default">Паспорт: <b>{{client.passport}}</b></span>
                <!--<span class="label label-default">ДР: <b>{{client.birthday}}</b></span>-->
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
                <div class="clearfix"></div>
            </div>
        </div>
        <hr>
        <div class="table-wrapper">
            <table class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr>
                    <th>Услуга</th>
                    <th>Цена</th>
                    <th>Оплачено</th>
                    <th>Остаток</th>
                    <th>Затраты</th>
                    <th>Прибыль</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody ref="dataBody">
                <tr v-if="!loading" v-for="query in queries"
                    :query="query"
                    @edit="editQuery(query)"
                    @destory="removeQuery(query)"
                    @filterByLegal="filterByLegal"
                    is="query-row"
                ></tr>
                </tbody>
                <tfoot>
                <tr>
                    <th><strong>Итого:</strong></th>
                    <th>{{results.price}}</th>
                    <th>{{results.paid}}</th>
                    <th>{{results.reminder}}</th>
                    <th>{{results.expenses}}</th>
                    <th>{{results.profit}}</th>
                    <th colspan="2"></th>
                </tr>
                </tfoot>
            </table>
            <div class="clearfix"></div>
            <div class="loadingQueryEditor" ref="loadingDiv" :class="{hidden: !loading}">
                <img src="img/loading2.gif" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    import QueryRow from "./QueryRow.vue"

    export default {
        props: ['client', 'legalClient'],
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
        computed: {
          results () {
              let out = {
                  price: 0,
                  paid: 0,
                  reminder: 0,
                  expenses: 0,
                  profit: 0,
              };
              this.queries.forEach(i => {
                  out.price += i.price;
                  out.paid += i.paid;
                  out.reminder += (i.price - i.paid);
                  out.expenses += parseFloat(i.expenses);
                  out.profit += parseFloat(i.profit);
              });
              return out;
          }
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
                let data = {
                    paid: 0,
                    price: 0,
                    status: 0,
                    service: 0,
                    comment: '',
                };

                if (this.legalClient.id) {
                    data.legal_id = this.legalClient.id
                }

                this.$emit("addQuery", data, this);
            },
            editQuery(query) {
                this.$emit("addQuery", query, this);
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
            filterByLegal(legal) {
                this.$emit("filterByLegal", legal);
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