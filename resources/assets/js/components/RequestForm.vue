<template>

    <form v-on:submit.prevent="postRequest" class="pure-form pure-form-aligned">
        <fieldset>
            <div class="pure-control-group">
                <label for="beerName">Beer Name</label>
                <input type="text" id="beerName" v-model="beerName" placeholder="Rustler">
            </div>

            <button type="submit" class="pure-button pure-button-primary">Request</button>
        </fieldset>
    </form>

</template>

<script>
    export default {

        data() {
            return {
                beerName: ""
            };
        },

        methods: {
            postRequest: function(event) {

                var payload = {
                    beer_name: this.beerName
                };

                this.$http.post('api/v1/requests', payload, {
                    headers: { 'Authorization': 'Bearer 268a3ef2-6c97-11e6-a18e-08002746f3a1' }
                }).then(function(data, status, request) {
                    this.$router.go('/');
                }, function (data, status, request) {
                    console.log(status);
                });
            }
        }

    }
</script>
