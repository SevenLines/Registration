<template>
    <tr :class="bgRow">
        <td>{{serviceDisplay}}</td>
        <td>{{query.price}}</td>
        <td>{{query.paid}}</td>
        <td>{{reminder}}</td>
        <td>{{statusDisplay}}</td>
        <td>
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
                return SERVICES[this.query.service];
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
            }
        }
    }
</script>