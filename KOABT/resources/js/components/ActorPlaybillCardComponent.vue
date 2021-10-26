<template>
    <div class="card-container">
        <a class="card-body text-decoration-none row align-items-center cursor-pointer text-dark" 
        data-toggle="collapse" :href="'#collapse'+colapseTag" aria-expanded="false" :aria-controls="'collapse'+colapseTag">
            <div class="playbill_date border-right px-3" style="width: 160px">
                <div class=" playbill_date_day_month row mx-auto d-flex justify-content-center align-items-center">
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
            <div class="playbill-info px-3 w-auto">
                <div class="playbill-type h6 text-justify m-0 border rounded border-info border-3 d-inline font-weight-bold" style="padding: 1px 4px 1px 2px" v-if="isrehearsals">Репетиция</div>
                <div class="playbill-type h6 text-justify m-0 border rounded border-danger border-3 d-inline font-weight-bold" style="padding: 1px 4px 1px 2px" v-if="!isrehearsals">Спектакль</div>
                <div class="playbill-title h3 text-justify mt-1">{{ playbill.title }}</div>
                <div class="playbill-time-info row m-0">
                    <div class="m-0 d-flex align-items-center mr-1" v-if="!isrehearsals">
                        <img src="img/clock.svg" style="height: 16px;">
                    </div>
                    <div class="playbill-time h5 text-center m-0">{{ playbill.disc }}</div>
                </div>
                
            </div>
        </a>
        <div class="collapse mx-4" :id="'collapse'+colapseTag">
            <div class="cast font-weight-bold text-decoration" v-if="!isrehearsals"><ins>Состав солистов</ins></div>
            <div class="cast font-weight-bold text-decoration" v-if="isrehearsals"><ins>Артисты</ins></div>
            <div
                class="cast-card"
                v-for="cast in playbill.cast"
                :key="cast.role"
            >
            <div class="cast-info font-weight-bold" v-if="cast.is_user">{{ cast.role }} : {{ cast.actor }}</div>
            <div class="cast-info" v-if="!cast.is_user">{{ cast.role }} : {{ cast.actor }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import "moment/locale/ru";
export default {
    mounted() {
        console.log(this.isrehearsals);
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
            isrehearsals: isNaN(String(this.playbill.disc).replaceAll(":", "")),
        };
    }
};
</script>

<style>
.cursor-pointer {
    cursor: pointer;
}
</style>

