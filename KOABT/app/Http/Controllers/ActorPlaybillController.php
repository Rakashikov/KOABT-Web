<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playbill;
use App\Models\Event;
use App\Models\Cast;
use App\Models\ActorRole;
use App\Models\Role;
use App\Models\Actor;
use App\Models\Rehearsal;
use App\Models\TypesOfRehearsal;
use App\Models\Troupe;
use stdClass;
use Carbon\Carbon;

class ActorPlaybillController extends Controller
{
    public function index()
    {
        $res = [];
        $playbills = Playbill::orderBy('date_and_time')->get();
        foreach ($playbills as $playbill_key => $playbill){
            // dd(Carbon::parse($playbill->date_and_time) -> toDateTimeString());
            if(Carbon::parse($playbill->date_and_time)->toDateTimeString() < Carbon::now()->toDateTimeString()) continue;
            $tmp_playbill = new stdClass;
            $tmp_playbill-> date = $playbill->date_and_time;
            $tmp_playbill-> title = Event::where("id", $playbill->event_id)->value('title');
            $tmp_playbill-> disc =  Carbon::parse(Event::where("id", $playbill->event_id)->value('duration'))->format('H:i:s');
            $tmp_playbill-> cast = [];
            foreach(Cast::where("id", $playbill->cast_id)->get() as $cast_key => $cast){
                $tmp_cast = new stdClass;
                $tmp_aroles = ActorRole::where("id", $cast->aroles_id)->get();
                $tmp_cast-> role = Role::where("id", $tmp_aroles[0]->role_id)->value('character_name');
                $tmp_cast-> actor = Actor::where("id", $tmp_aroles[0]->actor_id)->value('last_name');
                $tmp_playbill->cast[$cast_key] = $tmp_cast;
            }
            array_push($res, $tmp_playbill);
            // $res[$playbill_key] = $tmp_playbill;
        }
        $rehearsals = Rehearsal::orderBy('date_and_time')->get();
        foreach ($rehearsals as $rehearsal_key => $rehearsal){
            if(Carbon::parse($rehearsal->date_and_time)->toDateTimeString() < Carbon::now()->toDateTimeString()) continue;
            $tmp_rehearsals = new stdClass;
            $tmp_rehearsals-> date = $rehearsal->date_and_time;
            $tmp_rehearsals-> title = TypesOfRehearsal::where("id", $rehearsal->type_id)->value("name");
            $tmp_rehearsals-> disc = Troupe::where("id", $rehearsal->troupe_id)->value("name");
            $tmp_rehearsals-> cast = [];
            foreach(Cast::where("id", $rehearsal->actors_ids)->get() as $cast_key => $cast){
                $tmp_cast = new stdClass;
                $tmp_aroles = ActorRole::where("id", $cast->aroles_id)->get();
                $tmp_cast-> role = Role::where("id", $tmp_aroles[0]->role_id)->value('character_name');
                $tmp_cast-> actor = Actor::where("id", $tmp_aroles[0]->actor_id)->value('last_name');
                $tmp_rehearsals->cast[$cast_key] = $tmp_cast;
            }
            array_push($res, $tmp_rehearsals);
        }
        usort($res, fn($a, $b) => strcmp($a->date, $b->date));
        // dd($res);
        return view('actorPlaybill', compact('res'));
    }
}
