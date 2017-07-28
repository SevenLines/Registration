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
        props: ['id', 'fio', 'birthday', 'passport', 'phone', 'original'],
        computed: {
            changed() {
                return this.fio !== this.original.fio
                    || this.birthday !== this.original.birthday
                    || this.passport !== this.original.passport
                    || this.phone !== this.original.phone;
            },
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

