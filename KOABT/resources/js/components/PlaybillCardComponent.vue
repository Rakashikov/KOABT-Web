<template>
    <div class="card-container">
        <a class="card-body text-decoration-none row align-items-center cursor-pointer text-dark" 
        data-toggle="collapse" :href="'#collapse'+colapseTag" aria-expanded="false" :aria-controls="'collapse'+colapseTag">
            <div class="playbill_date border-right px-3" style="width: 160px">
                <div class=" playbill_date_day_month row mx-auto d-flex justify-content-around align-items-center">
                    <div class="playbill_date_day h2 font-weight-bold px-1 m-0">
                        {{ day }}
                    </div>
                    <div
                        class="playbill_date_month h5 font-weight-bold px-1 m-0"
                    >
                        {{ month }}
                    </div>
                </div>
                <div
                    class="playbill_date_calendar_day font-weight-bold text-center"
                >
                    {{ calendarDay }}
                </div>
                <div
                    class="playbill_date_day_time font-weight-bold text-center"
                >
                    {{ dayTime }}
                </div>
            </div>
            <div class="playbill-info px-3 text-center">
                <div class="playbill-title h3 text-justify">{{ playbill.title }}</div>
                <div class="playbill-time-info row m-0">
                    <div class="m-0 d-flex align-items-center">
                        <img src="img/clock.svg" style="height: 16px;">
                    </div>
                    <div class="playbill-time h5 text-center m-0 ml-1">{{ playbill.time }}</div>
                </div>
                
            </div>
        </a>
        <div class="collapse mx-4" :id="'collapse'+colapseTag">
            <div class="cast font-weight-bold text-decoration"><ins>Состав солистов</ins></div>
            <div
                class="cast-card"
                v-for="cast in playbill.cast"
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
        playbill: Object
    },
    data: function() {
        return {
            day: moment(this.playbill.date).format("D"),
            month: moment(this.playbill.date)
                .format("LLLL")
                .split(",")[1]
                .split(" ")[2],
            calendarDay: moment(this.playbill.date)
                .format("LLLL")
                .split(",")[0],
            dayTime: moment(this.playbill.date)
                .format("LLLL")
                .split(",")[2],
            colapseTag: moment(this.playbill.date).format("MMDDYYHH")+this.playbill.title.replaceAll(" ",""),
        };
    }
};
</script>

<style>
.cursor-pointer {
    cursor: pointer;
}
</style>
