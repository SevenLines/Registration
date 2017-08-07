<template>
    <div class="">
        <div v-if="totalPages > 1 || !legalClient.id">
            <div class="form-group">
                <paginator v-if="totalPages > 1" :pagescount="totalPages" :currentPage="currentPage" @setPage="setPage"/>
                <div v-if="!legalClient.id" class="btn btn-primary pull-right" @click="newClient">
                    <i class="glyphicon glyphicon-plus"></i>
                    Добавить клиента
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="modal fade" ref="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="form" action="" ref="editModalForm">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Клиент</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" v-model="currentClient.id">
                            <input type="hidden" v-model="currentClient.legal_id">
                            <div class="form-group">
                                <label for="">ФИО</label>
                                <input required class="form-control" type="text" name="fio" v-model="currentClient.fio">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="">День рождения</label>
                                <input ref="inputBirthday" class="form-control"
                                       data-inputmask="'alias': 'dd-mm-yyyy'" v-model="currentClient.birthday">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Паспорт</label>
                                <input required class="form-control" type="text" v-model="currentClient.passport">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Телефон</label>
                                <input class="form-control" type="text" v-model="currentClient.phone">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Комментарий</label>
                                <textarea class="form-control" rows="3" v-model="currentClient.comment"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary" @click="saveClient">
                                Сохранить
                            </button>
                        </div>
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
                                        @querySaved="onQuerySaved"
                                        @filterByLegal="filterByLegal"
                                        :client="currentClient"
                                        :legalClient="legalClient"
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

        <div class="modal fade" ref="removeClientModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Заявки</h4>
                    </div>
                    <div class="modal-body">
                        Вы уверены что хотитие удалить запись <b>"{{currentClient.fio}}"</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" @click="destroyClient">
                            Удалить
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="table-wrapper">
            <table class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr>
                    <th>
                        <div class="input-group">
                            <input v-on:input="onFilterChange" v-model="filters.fio.value" type="text"
                                   class="form-control"
                                   placeholder="ФИО">
                            <span class="input-group-btn">
                                <button class="btn" @click="buttonSortClicked('fio')" :class="buttonSortClass('fio')"
                                        type="button">
                                    <i class="glyphicon" :class="sortClass('fio')"></i>
                                </button>
                            </span>
                        </div>
                    </th>
                    <th>
                        <div class="input-group">
                            <span class="input-group-addon">День рождения</span>
                            <span class="input-group-btn">
                                <button class="btn" @click="buttonSortClicked('birthday')"
                                        :class="buttonSortClass('birthday')" type="button">
                                    <i class="glyphicon"
                                       :class="sortClass('birthday')"></i>
                                </button>
                            </span>
                        </div>
                    </th>
                    <th>
                        <div class="input-group">
                            <span class="input-group-addon">Добавлен</span>
                            <span class="input-group-btn">
                                <button class="btn" @click="buttonSortClicked('created_at')"
                                        :class="buttonSortClass('created_at')" type="button">
                                    <i class="glyphicon"
                                       :class="sortClass('created_at')"></i>
                                </button>
                            </span>
                        </div>
                    </th>
                    <th>
                        <div class="input-group" style="max-width: 150px">
                            <input v-on:input="onFilterChange" v-model="filters.passport.value" type="text"
                                   class="form-control" placeholder="Паспорт">
                            <span class="input-group-btn">
                                <button class="btn" @click="buttonSortClicked('passport')"
                                        :class="buttonSortClass('passport')" type="button">
                                    <i class="glyphicon"
                                       :class="sortClass('passport')"></i>
                                </button>
                            </span>
                        </div>
                    </th>
                    <th>
                        <div class="input-group" style="max-width: 175px">
                            <input v-on:input="onFilterChange" v-model="filters.phone.value" type="text"
                                   class="form-control"
                                   placeholder="телефон">
                            <span class="input-group-btn">
                                <button class="btn" @click="buttonSortClicked('phone')"
                                        :class="buttonSortClass('phone')" type="button">
                                    <i class="glyphicon" :class="sortClass('phone')"></i>
                                </button>
                            </span>
                        </div>
                    </th>
                    <th>
                        <select style="max-width: 130px" class="form-control" v-on:change="onFilterChange"
                                v-model="filters.service.value">
                            <option v-for="option in services" :value="option.value">
                                {{ option.key }}
                            </option>
                        </select>
                    </th>
                    <th style="min-width: 150px; text-align: center; vertical-align: middle">Действия</th>
                </tr>
                </thead>
                <tbody ref="dataBody">
                <tr is="client-legal"
                    v-if="legalClient.id"
                    @close="disableLegalClient()"
                    @addClient="newClient"
                    @filterByLegalClientChanged="filterByLegalClientChanged"
                    :filterByLegalClient="filterByLegalClient"
                    :client="legalClient"
                >
                </tr>
                <tr class="" v-for="client in clients"
                    :fio="client.fio"
                    :birthday="client.birthday"
                    :passport="client.passport"
                    :phone="client.phone"
                    :comment="client.comment"
                    :original="client.original"
                    :queries="client.queries"
                    :created_at="client.created_at"
                    :clients_count="client.clients_count"
                    v-if="legalClient.id != client.id"
                    @edit="editClient($event, client)"
                    @queries="showQueries($event, client)"
                    @destroy="onDestroyClientClick(client)"
                    @selectAsLegal="selectLegal(client)"
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
    import ClientLegal from './ClientLegal.vue'
    import QueryForm from './QueryForm.vue'
    import Inputmask from "inputmask/dist/inputmask/inputmask.date.extensions"
    import dateFormat from 'dateformat';
    import _ from 'lodash'
    import moment from 'moment';
    import Cookie from 'js-cookie'

    require('bootstrap-validator')

    export default {
        mounted() {
            this.reloadClients();
            Inputmask().mask(this.$refs.inputBirthday);
            $(this.$refs.editModalForm).validator();
        },
        data() {
            let services = [];
            services.push({
                key: "ВСЕ",
                value: -2,
            });
            services.push({
                key: "ЛЮБОЙ С УСЛУГОЙ",
                value: -3,
            });
            services.push({
                key: "НЕ ГОТОВО",
                value: -4,
            });
            services.push({
                key: "В РАБОТЕ",
                value: -5,
            });
            services.push({
                key: "ГОТОВО",
                value: -6,
            });

            _.forOwn(SERVICES, function (key, value) {
                services.push({
                    'key': key,
                    'value': value,
                });
            });

            let default_filters = {
                service: {
                    value: _.defaultTo(Cookie.get('filter.service'), -2),
                    order: 'asc'
                },
                fio: {
                    value: _.defaultTo(Cookie.get('filter.fio'), null),
                    order: 'asc'
                },
                birthday: {
                    value: _.defaultTo(Cookie.get('filter.birthday'), null),
                    order: 'asc'
                },
                passport: {
                    value: _.defaultTo(Cookie.get('filter.passport'), null),
                    order: 'asc'
                },
                phone: {
                    value: _.defaultTo(Cookie.get('filter.phone'), null),
                    order: 'asc'
                },
                created_at: {
                    value: _.defaultTo(Cookie.get('filter.created_at'), null),
                    order: 'asc'
                }
            };
            let filters = _.defaultTo(Cookie.getJSON('filters'), {});
            for (let key in default_filters) {
                if (filters[key] === undefined) {
                    filters[key] = default_filters[key];
                }
            }

            let selectedSort = _.defaultTo(Cookie.getJSON('selectedSort'), 'fio');

            return {
                currentClient: {},
                currentQuery: {},
                clients: [],
                loading: false,
                currentPage: _.defaultTo(Cookie.get('currentPage'), 1),
                totalPages: 0,
                filterByLegalClient: _.defaultTo(Cookie.get('filterByLegalClient'), true),
                legalClient: _.defaultTo(Cookie.getJSON('legalClient'), {}), // выбранное юр лицо
                selectedSort,
                filters,
                services
            }
        },
        components: {
            'client': Client,
            'queries-editor': QueriesEditor,
            'query-form': QueryForm,
            'client-legal': ClientLegal,
        },
        events: {},
        methods: {
            newClient() {
                this.currentClient = {
                    fio: '',
                    birthday: '',
                    passport: '',
                    phone: '',
                    comment: '',
                };
                if (this.legalClient.id) {
                    this.currentClient.legal_id = this.legalClient.id;
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
                var me = this;
                setTimeout(function () {
                    $(me.$refs.editModalForm).validator('validate');
                }, 100);
                $(this.$refs.editModal).modal("show");
            },
            filterByLegal (legal) {
                this.resetFilters();
                this.filterByLegalClient = true;
                this.selectLegal(legal);
            },
            selectLegal(client) {
                this.legalClient = client;
                this.currentPage = 1;
                this.reloadClients();
            },
            disableLegalClient() {
                this.legalClient = {};
                this.reloadClients();
            },
            filterByLegalClientChanged (value) {
                this.filterByLegalClient = value;
                this.currentPage = 1;
                this.reloadClients();
            },
            destroyClient() {
                let me = this;
                axios.delete(`api/clients/${this.currentClient.id}`).then(function () {
                    me.reloadClients()
                });
            },
            onDestroyClientClick(client) {
                this.currentClient = client;
                $(this.$refs.removeClientModal).modal('show')
            },
            setPage(page) {
                this.currentPage = page;
                this.reloadClients();
            },
            saveClient() {
                $(this.$refs.editModal).modal("hide");
                let promise;
                let me = this;
                let data = {
                    fio: this.currentClient.fio,
                    birthday: moment(this.currentClient.birthday, 'DD-MM-YYYY').format('YYYY-MM-DD'),
                    passport: this.currentClient.passport,
                    phone: this.currentClient.phone,
                    comment: this.currentClient.comment,
                };

                if (this.currentClient.legal_id) {
                    data.legal_id = this.currentClient.legal_id;
                }

                if (this.currentClient.id) {
                    promise = axios.put(`api/clients/${this.currentClient.id}`, data);
                } else {
                    promise = axios.post("api/clients", data);
                }
                promise.then(function (response) {
                    me.showQueries(null, response.data);
                    me.reloadClients();
                });
            },
            onQuerySaved() {
                this.reloadClients();
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

                Cookie.set('filters', this.filters);
                Cookie.set('currentPage', this.currentPage);
                Cookie.set('selectedSort', this.selectedSort);
                Cookie.set('filterByLegalClient', this.filterByLegalClient);
                Cookie.set('legalClient', this.legalClient);

                let params = {
                    fio: this.filters.fio.value,
                    birthday: this.filters.birthday.value,
                    passport: this.filters.passport.value,
                    phone: this.filters.phone.value,
                    page: this.currentPage - 1,
                    service: this.filters.service.value,
                    sort: this.selectedSort,
                    sort_order: this.filters[this.selectedSort].order
                };

                if (this.filterByLegalClient && this.legalClient.id) {
                    params.legal_id = this.legalClient.id;
                }

                axios.get("api/clients", {params}).then(function (response) {
                    me.clients = response.data.records.map(function (item) {
                        item['birthday'] = dateFormat(new Date(item.birthday), 'dd-mm-yyyy');
                        return item;
                    });
                    me.loading = false;
                    me.currentPage = parseInt(response.data.page) + 1;
                    me.totalPages = response.data.totalPages;
                })
            },
            onFilterChange: _.debounce(function () {
                this.currentPage = 1;
                this.reloadClients();
            }, 250),
            sortClass(param) {
                return {
                    'glyphicon-sort-by-attributes': this.filters[param].order === 'asc',
                    'glyphicon-sort-by-attributes-alt': this.filters[param].order === 'desc',
                }
            },
            buttonSortClass(param) {
                return {
                    'btn-info': this.selectedSort === param,
                    'btn-default': this.selectedSort === param,
                }
            },
            buttonSortClicked(param) {
                if (this.selectedSort === param) {
                    this.filters[param].order = this.filters[param].order == 'asc' ? 'desc' : 'asc'
                } else {
                    this.selectedSort = param
                }
                this.reloadClients();
            },
            resetFilters() {
                this.filters.fio.value = null;
                this.filters.birthday.value  = null;
                this.filters.passport.value  = null;
                this.filters.phone.value  = null;
                this.filters.added.value  = null;
                this.filters.service.value  = -2;
            }
        },
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

    .modal-body {
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        -ms-transition: all .3s;
        -o-transition: all .3s;
        transition: all .3s;
    }
    .table-wrapper {
        overflow: scroll;
        width: 100%;
        overflow-y: hidden;
        overflow-x: auto;
    }
</style>