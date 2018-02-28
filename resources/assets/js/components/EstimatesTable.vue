<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{{ trans('estimate.issue_date') }}</th>
                <th>{{ trans('estimate.expiration_date') }}</th>
                <th>{{ trans('estimate.client_name') }}</th>
                <th>{{ trans('estimate.subject') }}</th>
                <th>{{ trans('estimate.amount_total') }}</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(estimate, index) in estimates" :key="estimate.id">
                <td>{{ estimate.issue_date }}</td>
                <td>{{ estimate.expiration_date }}</td>
                <td>{{ estimate.client_name }}</td>
                <td>{{ estimate.subject }}</td>
                <td>{{ estimate.amount_total.toLocaleString('ja-JP') }}円（税込）</td>
                <td>
                    <a
                        :href="'/admin/estimates/' + estimate.id + '/edit'"
                        class="btn btn-xs btn-warning"
                    >編集</a>
                    <delete-link
                        :href="'/api/estimates/' + estimate.id + '?api_token=' + api_token"
                        :index="index"
                        @on-remove="remove"
                    ></delete-link>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
            estimates: {
                type: Array,
                default: []
            },
            api_token: String
        },
        methods: {
            remove: function (index) {
                this.estimates.splice(index, 1);
                this.$forceUpdate()
            }
        }
    }
</script>
