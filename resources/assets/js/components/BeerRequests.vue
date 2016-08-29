<template>

    <ul>
        <li v-for="request in requests">
            {{ request.user.name }} wants {{ request.beer_name }} by {{ request.brewery_name }}. {{ request.votes.length }} votes
        </li>
    </ul>


</template>

<script>
    export default {

        created() {
            this.fetchRequests();
        },

        data() {
            return {
                requests: []
            };
        },

        methods: {
            fetchRequests: function() {
                this.$http.get('api/v1/requests', {
                    headers: { 'Authorization': 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1'}
                }).then((requests) => {
                    this.requests = requests.data;
                }, (error) => {
                    console.log(error);
                });
            }
        }

    }
</script>
