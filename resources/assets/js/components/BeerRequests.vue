<template>

    <div class="card" v-for="request in requests" v-show="!request.fulfilled_at">
        <div class="pure-g card-header">
            <div class="pure-u-4-5">
                <span>{{ request.user.name }} wants <b>{{ request.beer_name }}</b> by <b>{{ request.brewery_name }}</b></span>
            </div>
            <div class="pure-u-1-5"><!--<span>Icon</span>--></div>
        </div>

        <div class="pure-g">
            <div class="pure-u-1-5">
                <span v-on:click="vote(request)" class="badge" v-bind:class="{ vote: !request.user_has_voted, voted: request.user_has_voted }">{{ request.votes.length }}</span>
                <a href="#" v-on:click.prevent="fulfill(request)">fulfill</a>
            </div>
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
                if (!beerRequest.user_has_voted) {
                    this.$http.post('api/v1/requests/' +  beerRequest.id + '/vote', {}, {
                        headers: { 'Authorization': 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1'}
                    }).then(function() {
                        beerRequest.votes.push({});
                        beerRequest.user_has_voted = true;
                    }, (error) => {
                        console.log(error);
                    });
                }
            },

            fulfill: function(beerRequest) {
                this.$http.post('api/v1/requests/' +  beerRequest.id + '/fulfill', {}, {
                    headers: { 'Authorization': 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1'}
                }).then(function() {
                    beerRequest.fulfilled_at = true;
                }, (error) => {
                    console.log(error);
                });
            }
        }

    }
</script>
