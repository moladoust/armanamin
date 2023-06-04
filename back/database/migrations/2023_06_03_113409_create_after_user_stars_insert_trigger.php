<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAfterUserStarsInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $trigger = '
    CREATE TRIGGER after_user_stars_insert AFTER INSERT ON
        user_stars FOR EACH ROW
    BEGIN
            IF NEW.user_stars > 0 THEN
        UPDATE
            posts AS p
        SET
            p.stars_cont =(
            SELECT
                SUM(us.user_stars) AS cnt
            FROM
                user_stars AS us
            WHERE
                us.post_id = p.id
        )
    WHERE
        p.id = NEW.post_id ;
        END IF ;
        END';
        
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `after_user_stars_insert`');
    }
}
