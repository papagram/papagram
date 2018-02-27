<template>
    <a
        :href="href" class="btn btn-xs btn-danger"
        @click.prevent="remove(index)"
    >削除</a>
</template>

<script>
    export default {
        props: {
            href: String,
            index: Number
        },
        methods: {
            remove: function (index) {
                let app = this
                this.$http.delete(this.href).then(function (response) {
                    app.$emit('on-remove', index)
                });
            }
        }
    }
</script>
