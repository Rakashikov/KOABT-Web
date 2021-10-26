<template>
    <div class="container">
        <h1 class="text-start">
            Администрация театра
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" v-for="item in adms" :key="item.position">
                    <administrationscard-component :adm="item"></administrationscard-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            adms: Array
        }
    }
</script>
