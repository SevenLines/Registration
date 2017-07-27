<template>
    <tr :class="{success: changed}">
        <td>
            <input class="form-control" type="text" v-model="fio">
        </td>
        <td>
            <input class="form-control" type="text" v-model="birthday">
        </td>
        <td>
            <input class="form-control" type="text" v-model="passport">
        </td>
        <td>
            <input class="form-control" type="text" v-model="phone">
        </td>
        <td>
            <div class="pull-right">
                <button class="btn btn-success" :class="{disabled: !changed}" @click="save">
                    <i class="glyphicon glyphicon-save"></i>
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
            save() {
                this.$emit("save", this);
            },
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