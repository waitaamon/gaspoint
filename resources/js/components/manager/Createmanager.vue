<template>
    <div class="columns is-mobile">
        <div class="column is-half is-offset-one-quarter">
            <form @submit.prevent="submit">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input" v-model="name">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input" v-model="phone">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <input type="submit" class="button is-link" value="Register Manager">
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create-manager",
        data() {
            return {
                name: '',
                phone: ''
            }
        },
        methods: {
            submit () {

            }
        }
    }
</script>

<style scoped>

</style>