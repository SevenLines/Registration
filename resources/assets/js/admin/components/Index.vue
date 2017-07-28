<template>
    <div class="">
        <div class="">
            <ul class="pagination large">
                <li v-for="page in pages" :class="{active: page.page == currentPage + 1 }">
                    <a href="#" @click="setPage(page)">{{page.page}}</a>
                </li>
            </ul>
            <a class="btn btn-primary pull-right" @click="newQuery">Добавить</a>
            <div class="clearfix"></div>
            <hr>
        </div>

        <div class="modal fade" ref="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Добавить клиента</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" v-if="currentClient">
                            <input type="hidden" v-model="currentClient.id">
                            <div class="form-group">
                                <label for="">ФИО</label>
                                <input required class="form-control" type="text" name="fio" v-model="currentClient.fio">
                            </div>
                            <div class="form-group">
                                <label for="">День роджения</label>
                                <input required class="form-control" type="date" v-model="currentClient.birthday"
                                       name="birthday">
                            </div>
                            <div class="form-group">
                                <label for="">Паспорт</label>
                                <input required class="form-control" type="text" v-model="currentClient.passport"
                                       name="passport">
                            </div>

                            <div class="form-group">
                                <label for="">Телефон</label>
                                <input required class="form-control" type="text" v-model="currentClient.phone"
                                       name="phone">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveClient">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

        <div class="modal fade" ref="queriesModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Заявки</h4>
                    </div>
                    <div class="modal-body">
                        <queries-editor ref="currentClientEd"
                                        v-on:addQuery="addQuery"
                                        :client="currentClient"
                        ></queries-editor>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

        <div class="modal fade" ref="addQueryModal">
            <div class="modal-dialog">
                <query-form :currentQuery="currentQuery"
                            :currentQueryModal="$refs.currentClientEd"
                            ref="currentQueryModal"
                ></query-form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="">
            <table class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr>
                    <th>
                        <div class="input-group">
                            <span class="input-group-addon">ФИО</span>
                            <input v-on:input="onFilterChange" v-model="filters.fio" type="text" class="form-control"
                                   placeholder="...">
                        </div>
                    </th>
                    <th>
                    </th>
                    <th>
                        <div class="input-group">
                            <span class="input-group-addon">Паспорт</span>
                            <input v-on:input="onFilterChange" v-model="filters.passport" type="text"
                                   class="form-control" placeholder="...">
                        </div>
                    </th>
                    <th>
                        <div class="input-group">
                            <span class="input-group-addon">Телефон</span>
                            <input v-on:input="onFilterChange" v-model="filters.phone" type="text" class="form-control"
                                   placeholder="...">
                        </div>
                    </th>
                    <th>
                        <select class="form-control" v-on:change="onFilterChange" v-model="filters.service">
                            <option v-for="option in services" :value="option.value">
                                {{ option.key }}
                            </option>
                        </select>
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody ref="dataBody">
                <tr class="" v-for="client in clients"
                    :fio="client.fio"
                    :birthday="client.birthday"
                    :passport="client.passport"
                    :phone="client.phone"
                    :original="client.original"
                    :queries="client.queries"
                    v-on:edit="editClient($event, client)"
                    v-on:queries="showQueries($event, client)"
                    is="client">
                </tr>
                </tbody>
            </table>

            <div class="loading" ref="loadingDiv" :class="{hidden: !loading}">
                <img src="img/loading2.gif" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    import QueriesEditor from './QueriesEditor.vue'
    import Client from './Client.vue'
    import QueryForm from './QueryForm.vue'
    import _ from 'lodash'

    export default {
        mounted() {
            this.reloadClients();
        },
        data() {
            let services = [];
            services.push({
                key: "все",
                value: null,
            });
            _.forOwn(SERVICES, function (key, value) {
                services.push({
                    'key': key,
                    'value': value,
                });
            });

            return {
                currentClient: null,
                currentQuery: null,
                clients: [],
                loading: false,
                currentPage: 0,
                totalPages: 0,
                pages: [],
                filters: {
                    serivce: null,
                    fio: null,
                    birthday: null,
                    passport: null,
                    phone: null,
                },
                services
            }
        },
        components: {
            'client': Client,
            'queries-editor': QueriesEditor,
            'query-form': QueryForm,
        },
        events: {},
        methods: {
            newQuery() {
                this.currentClient = {
                    fio: '',
                    birthday: '',
                    passport: '',
                    phone: '',
                }
                $(this.$refs.editModal).modal("show");
            },
            showQueries($event, client) {
                this.currentClient = client;
                let me = this;
                $(this.$refs.queriesModal).modal("show");
                this.$refs.currentClientEd.reloadQueries(client);
            },
            addQuery(query, $caller) {
                this.currentQuery = query;
                this.$refs.addQueryModal.currentQueryModal = $caller;
                $(this.$refs.addQueryModal).modal("show");
            },
            editClient($event, client) {
                this.currentClient = client;
                $(this.$refs.editModal).modal("show");
            },
            setPage(page) {
                this.currentPage = page.page - 1;
                this.reloadClients();
            },
            saveClient() {
                let promise;
                let me = this;
                if (this.currentClient.id) {
                    promise = axios.put(`api/clients/${this.currentClient.id}`, {
                        fio: this.currentClient.fio,
                        birthday: this.currentClient.birthday,
                        passport: this.currentClient.passport,
                        phone: this.currentClient.phone,
                    });
                } else {
                    promise = axios.post("api/clients", this.currentClient);
                }
                promise.then(function (response) {
                    me.reloadClients();
                });
            },
            reloadClients() {
                let me = this;
                this.loading = true;

                var dataBodyRect = this.$refs.dataBody.getBoundingClientRect();
                if (dataBodyRect && this.$refs.loadingDiv) {
                    this.$refs.loadingDiv.style.left = `${dataBodyRect.left}px`;
                    this.$refs.loadingDiv.style.top = `${dataBodyRect.top}px`;
                    this.$refs.loadingDiv.style.width = `${dataBodyRect.width}px`;
                    this.$refs.loadingDiv.style.height = `${dataBodyRect.height}px`;
                }

                axios.get("api/clients", {
                    params: {
                        fio: this.filters.fio,
                        birthday: this.filters.birthday,
                        passport: this.filters.passport,
                        phone: this.filters.phone,
                        page: this.currentPage,
                        service: this.filters.service,
                    }
                }).then(function (response) {
                    me.clients = response.data.records.map(function (item) {
                        item.original = {
                            fio: item.fio,
                            birthday: item.birthday,
                            passport: item.passport,
                            phone: item.phone,
                        };
                        return item;
                    });
                    me.loading = false;
                    me.page = response.data.page;
                    me.totalPages = response.data.totalPages;
                    me.pages = _.range(1, me.totalPages + 1).map(function (item) {
                        return {
                            'page': item
                        }
                    });
                })
            },
            loadServices() {
                let me = this;
                axios.get("api/clients").then(function (response) {
                    me.clients = response.data.records;

                })
            },
            onFilterChange: _.debounce(function () {
                this.page = 0;
                this.reloadClients();
            }, 250)
        },
        computed: {
            reminder() {
                return this.currentQuery ? this.currentQuery.price - this.currentQuery.paid : 0;
            }
        }

    }
</script>

<style lang="scss">
    .loading {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.75);
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

    table {
        td {
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -ms-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
        }
    }

    .pagination {
        margin: 0;
    }
</style>