<template>
    <ul class="pagination large">
        <li v-for="page in pages" :class="{active: page == currentPage }">
            <a v-if="page!='...' " href="#" @click="$emit('setPage', page)">{{page}}</a>
            <span v-if="page=='...'">...</span>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            pagescount: {},
            currentPage: {},
            range: {
                default: 5
            }
        },
        data() {
            return {}
        },
        computed: {
            pages() {
                let out = [];
                let me = this;

                let pre = Math.abs(Math.min(0, me.currentPage - me.range - 1));
                let over = Math.min(0,  this.pagescount - me.currentPage - me.range);
                let previoutInsert = null;
                _.range(1, this.pagescount + 1).forEach(function (page) {
                    if (page === 1
                        || page === me.pagescount
                        || Math.abs(me.currentPage - page) < me.range + pre
                        || page < me.currentPage && me.currentPage - page < me.range - over
                    ) {
                        if (previoutInsert && previoutInsert + 1 !== page) {
                            out.push('...');
                        }
                        out.push(page);
                        previoutInsert = page;
                    }
                });

                return out
            }
        }
    }
</script>