<template>

    <div class="card" v-for="request in requests">
            <div class="pure-g card-header">
                <div class="pure-u-4-5">
                    <span>{{ request.beer_name }} by {{ request.brewery_name }}</span>
                </div>
                <div class="pure-u-1-5"><!--<span>Icon</span>--></div>
            </div>

            <div class="pure-g">
                <div class="pure-u-1-5">{{ request.votes.length }}</div>
                <div class="pure-u-1-5"><span v-on:click="vote(request)" v-show="!request.user_has_voted">vote</span></div>
                <div class="pure-u-1-5"></div>
                <div class="pure-u-1-5"></div>
                <div class="pure-u-1-5">{{ request.user.name }}</div>
            </div>

    </div>

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
            },

            vote: function(beerRequest) {
                this.$http.post('api/v1/requests/' +  beerRequest.id + '/vote', {}, {
                    headers: { 'Authorization': 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1'}
                }).then(function() {
                    beerRequest.votes.push({});
                    beerRequest.user_has_voted = true;
                }, (error) => {
                    console.log(error);
                });
            }
        }

    }
</script>
