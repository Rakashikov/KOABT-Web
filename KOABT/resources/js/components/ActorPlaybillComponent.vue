<template>
    <div class="container">
        <h1 class="text-start">
            Спектакли
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" v-for="item in apb" :key="item.date">
                    <actorplaybillcard-component :playbill="item"></actorplaybillcard-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            // console.log('Component mounted.')
        },
        props: {
            apb: Array
        }
    }
</script>
