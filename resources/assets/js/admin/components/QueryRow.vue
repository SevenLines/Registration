<template>
    <tr>
        <td>
            <span v-text="fio"></span>
        </td>
        <td>
            <span v-text="birthday"></span>
        </td>
        <td>
            <span v-text="phone"></span>
        </td>
        <td>
            <span v-text="serviceName"></span>
        </td>
        <td>
            <span v-text="price"></span>
        </td>
        <td>
            <span v-text="paid"></span>
        </td>
        <td>
            <span v-text="reminder"></span>
        </td>
        <td>
            <span v-text="status"></span>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['id', 'fio', 'birthday', 'phone', 'service', 'price', 'paid', 'status', 'services'],
        computed: {
            serviceName() {
                return this.services[this.service]
            },
            reminder() {
                return this.price - this.paid;
            }
        }
    }
</script>