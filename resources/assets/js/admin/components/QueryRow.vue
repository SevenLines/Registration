<template>
    <tr :class="bgRow" class="query-row">
        <td>
            {{serviceDisplay}}
            <br><small class="owner" v-if="query.legal" @click="filterByLegal(query.legal)">{{query.legal.fio}}</small>
        </td>
        <td>{{query.price}}</td>
        <td>{{query.paid}}</td>
        <td>{{reminder}}</td>
        <td>{{statusDisplay}}</td>
        <td style="min-width: 100px">
            <button class="btn btn-sm btn-default"  @click="editClicked">
                <i class="glyphicon glyphicon-edit"></i>
            </button>
            <button class="btn btn-sm btn-danger pull-right" @click="$emit('destory')">
                <i class="glyphicon glyphicon-remove"></i>
            </button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['query'],
        computed: {
            reminder() {
                return this.query.price - this.query.paid;
            },
            statusDisplay() {
                return {
                    0: 'Не готово',
                    1: 'В работе',
                    2: 'Готово',
                    3: 'Отдано',
                }[this.query.status]
            },
            serviceDisplay() {
                let result = SERVICES[this.query.service];
                return result
            },
            bgRow() {
                return {
                    'danger': this.query.status === 0,
                    'warning': this.query.status === 1,
                    'success': this.query.status === 2,
                    'default': this.query.status === 3,
                }
            }
        },
        methods: {
            editClicked() {
                this.$emit("edit")
            },
            filterByLegal (legal) {
                this.$emit("filterByLegal", legal);
            }
        }
    }
</script>


<style lang="scss" scoped="">
    .query-row td {
        vertical-align: middle;
    }
    .owner {
        border-bottom: 1px dashed black;
        cursor: pointer;
    }
</style>