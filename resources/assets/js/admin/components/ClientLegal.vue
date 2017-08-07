<template>
    <tr>
        <td colspan="6">
            <div class="fio pull-left">
                <span @click="$emit('close')" class="btn-close glyphicon glyphicon-remove"></span>
                {{client.fio}}
            </div>
            <div class="form-inline pull-right">
                <div class="checkbox" style="margin-right: 1em">
                    <label>
                        <input type="checkbox" v-model="filterByLegalClientCheck" @change="filterByLegalClientChanged">
                        Только клиенты юр. лица
                    </label>
                </div>
                <button class="btn btn-default" @click="$emit('addClient')">
                    <i class="glyphicon glyphicon-plus"></i>
                    Добавить клиента
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['client', 'filterByLegalClient'],
        data () {
            return {
                filterByLegalClientCheck: this.filterByLegalClient
            }
        },
        methods: {
            filterByLegalClientChanged () {
                this.$emit("filterByLegalClientChanged", this.filterByLegalClientCheck)
            }
        }
    }
</script>

<style scoped="" lang="scss">
    tr {
        vertical-align: middle;

        td {
            background-color: #bddc57 !important;
            color: black;
            padding: 1em !important;
        }
        .fio {
            font-size: 24px;
        }
        .btn-close {
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            -ms-transition: all .3s;
            -o-transition: all .3s;
            transition: all .3s;
            cursor: pointer;
            &:hover {
                color: darken(#bddc57, 30);
            }
        }
    }
</style>

