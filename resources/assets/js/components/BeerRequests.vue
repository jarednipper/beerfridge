<template>

    <li v-for="request in requests">
        {{ request.beer_name }}
    </li>

</template>

<script>
    export default {

        created() {
            this.fetchBeerRequests();
        },

        data() {
            return {
                requests: []
            };
        },

        methods: {
            fetchBeerRequests: function() {
                this.$http.get('api/v1/requests').then((requests) => {
                    this.requests = requests.data;
                }, (error) => {
                    console.log(error);
                });
            }
        }

    }
</script>
