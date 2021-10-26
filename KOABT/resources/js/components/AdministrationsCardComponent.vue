<template>
    <div class="card-container">
        <div class="card-body align-items-center text-dark">
            <div class="administration-title h3 text-justify m-0">
                {{ adm.position }}
            </div>
            <div class="information row align-items-center">
                <div class="administration-info px-3 w-50">
                    <div class="administration-time-info row m-0">
                        <div class="administration-time h5 text-center m-0">
                            {{ adm.last_name }} {{ adm.first_name }}
                            {{ adm.middle_name }}
                        </div>
                    </div>
                </div>
                <div class="administration-connection px-3 w-50">
                    <div class="administration-phone h5 m-0">
                        Номер телефона: {{ adm.phone }}
                    </div>
                    <div class="administration-email h5 m-0">
                        Электронная почта: {{ adm.email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log();
    },
    props: {
        adm: Object
    },
    data: function() {
        return {};
    }
};
</script>
