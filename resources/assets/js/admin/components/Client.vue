<template>
    <tr :class="bgStyle">
        <td class="fio">
            <span @click="$emit('selectAsLegal')" :class="{legal: isLegal}">{{fio}}</span>
        </td>
        <td class="birthday">
            {{birthday}}
        </td>
        <td class="created_at">
            <small>
                <span>{{createdAt.date}}</span><br>
                <small>{{createdAt.time}}</small>
            </small>
        </td>
        <td class="passport">
            {{passport}}
        </td>
        <td class="phone">
            {{phone}}
        </td>
        <td>
            <div class="my-label" :class="query.klass" v-for="query in queriesList">
                <span>{{query.text}}</span><span v-if="query.legal_id">*</span>
            </div>
        </td>
        <td class="actions" style="min-width: 150px">
            <div class="">
                <button class="btn btn-default" @click="$emit('queries', this)">
                    <i class="glyphicon glyphicon-book"></i>
                </button>
                <button class="btn btn-default" @click="$emit('edit', this)">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>

                <button class="btn btn-danger btn-sm pull-right" @click="$emit('destroy', this)">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['id', 'fio', 'birthday', 'passport', 'phone', 'created_at', 'original', 'queries', 'comment', 'clients_count'],
        computed: {
            queriesList() {
                return _.map(this.queries, function (item) {
                    return {
                        'text': SERVICES[item.service],
                        'legal_id': item.legal_id,
                        'klass': {
                            'label-danger': item.status === 0,
                            'label-warning': item.status === 1,
                            'label-success': item.status === 2,
                            'label-default': item.status === 3,
                        }
                    }
                })
            },
            bgStyle() {
                let minStatus = 3;
                _.each(this.queries, function (item) {
                    if (item.status < minStatus) {
                        minStatus = item.status
                    }
                });
                return {
                    'danger': minStatus === 0,
                    'warning': minStatus === 1,
                    'success': minStatus === 2,
                    'default': minStatus === 3,
                }
            },
            isLegal() {
                return this.clients_count > 0
            },
            createdAt() {
                let dt = moment(this.created_at);
                return {
                    date: dt.format('DD-MM-YYYY'),
                    time: dt.format('h:mm:ss')
                }
            }
        },
        methods: {
            reset() {
                this.original = {
                    fio: this.fio,
                    birthday: this.birthday,
                    passport: this.passport,
                    phone: this.phone,
                };
            }
        }
    }
</script>

<style scoped="" lang="scss">
    .my-label {
        display: block;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
        margin-bottom: 0.25em;
    }

    .fio, .birthday, .passport, .phone, .created_at {
        vertical-align: middle;
    }

    .fio span {
        cursor: pointer;
        &:hover, &.legal {
            border-bottom: 1px dashed black;
        }
    }

    .birthday, .passport, .phone, .created_at {
        text-align: center;
    }

    .actions {
        vertical-align: middle;
    }
</style>

