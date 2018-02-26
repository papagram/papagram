<template>
    <a :href="href" class="btn btn-xs btn-danger" @click.prevent="remove()">削除</a>
</template>

<script>
    export default {
        props: ['href'],
        methods: {
            remove: function () {
                this.$http.delete(this.href).then(function (response) {
                    alert('削除しました')
                });
            }
        }
    }
</script>
