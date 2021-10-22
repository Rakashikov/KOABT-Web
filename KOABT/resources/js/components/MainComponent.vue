<template>
    <div class="container">
        <h1 class="text-start">
            Спектакли
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" v-for="item in playbill" :key="item.date">
                    <div class="card-header">{{item.title}}</div>
                    <div class="card-body">
                        {{item.time}}
                    </div>
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
            playbill: Array
        }
    }
</script>
