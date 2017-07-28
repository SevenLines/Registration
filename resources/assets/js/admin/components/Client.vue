<template>
    <tr :class="{success: changed}">
        <td>
            {{fio}}
        </td>
        <td>
            {{birthday}}
        </td>
        <td>
            {{passport}}
        </td>
        <td>
            {{phone}}
        </td>
        <td>
            <div class="my-label" :class="query.klass" v-for="query in queriesList">{{query.text}}<br></div>
        </td>
        <td>
            <div class="pull-right">
                <button class="btn btn-default" @click="$emit('queries', this)">
                    <i class="glyphicon glyphicon-book"></i>
                </button>
                <button class="btn btn-default" @click="$emit('edit', this)">
                    <i class="glyphicon glyphicon-edit"></i>
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['id', 'fio', 'birthday', 'passport', 'phone', 'original', 'queries'],
        computed: {
            changed() {
                return this.fio !== this.original.fio
                    || this.birthday !== this.original.birthday
                    || this.passport !== this.original.passport
                    || this.phone !== this.original.phone;
            },
            queriesList() {
                return _.map(this.queries, function (item) {
                    return {
                        'text': SERVICES[item.service],
                        'klass': {
                            'label-danger': item.status === 0,
                            'label-warning': item.status === 1,
                            'label-success': item.status === 2,
                            'label-default': item.status === 3,
                        }
                    }
                })
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

<style>
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
</style>

