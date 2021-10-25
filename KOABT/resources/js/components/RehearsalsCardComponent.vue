<template>
    <div class="card-container">
        <a class="card-body text-decoration-none row align-items-center cursor-pointer text-dark" 
        data-toggle="collapse" :href="'#collapse'+colapseTag" aria-expanded="false" :aria-controls="'collapse'+colapseTag">
            <div class="rehearsal_date border-right px-3" style="width: 160px">
                <div class=" rehearsal_date_day_month row mx-auto d-flex justify-content-center align-items-center">
                    <div class="rehearsal_date_day h2 font-weight-bold px-1 m-0">
                        {{ day }}
                    </div>
                    <div
                        class="rehearsal_date_month h5 font-weight-bold px-1 m-0">
                        {{ month }}
                    </div>
                </div>
                <div
                    class="rehearsal_date_calendar_day font-weight-bold text-center">
                    {{ calendarDay }}
                </div>
                <div
                    class="rehearsal_date_day_time font-weight-bold text-center">
                    {{ dayTime }}
                </div>
            </div>
            <div class="rehearsal-info px-3 text-center">
                <div class="rehearsal-type h3 text-justify">{{ rehearsal.type }}</div>
                <div class="rehearsal-troupe-info row m-0">
                    <div class="rehearsal-troupe h5 text-center m-0 ml-1">{{ rehearsal.troupe }}</div>
                </div>
                
            </div>
        </a>
        <div class="collapse mx-4" :id="'collapse'+colapseTag">
            <div class="cast font-weight-bold text-decoration"><ins>Артисты</ins></div>
            <div
                class="cast-card"
                v-for="cast in rehearsal.cast"
                :key="cast.role"
            >
                {{ cast.role }} : {{ cast.actor }}
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import "moment/locale/ru";
export default {
    mounted() {
        console.log();
    },
    props: {
        rehearsal: Object
    },
    data: function() {
        return {
            day: moment(this.rehearsal.date).format("D"),
            month: moment(this.rehearsal.date)
                .format("LLLL")
                .split(",")[1]
                .split(" ")[2],
            calendarDay: moment(this.rehearsal.date)
                .format("LLLL")
                .split(",")[0],
            dayTime: moment(this.rehearsal.date)
                .format("LLLL")
                .split(",")[2],
            colapseTag: moment(this.rehearsal.date).format("MMDDYYHH")+this.rehearsal.type.replaceAll(" ",""),
        };
    }
};
</script>

<style>
.cursor-pointer {
    cursor: pointer;
}
</style>
