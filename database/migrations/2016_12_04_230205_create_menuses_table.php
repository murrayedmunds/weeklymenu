<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('mainMondayMetadataLinkTitle')->nullable();
            $table->string('mainMondayMetadataLinkDescription')->nullable();
            $table->longText('mainMondayNote')->nullable();
            $table->string('mainMondayUrl')->nullable();
            $table->string('mainMondayImageUrl')->nullable();
            $table->string('sideMondayMetadataLinkTitle')->nullable();
            $table->string('sideMondayMetadataLinkDescription')->nullable();
            $table->longText('sideMondayNote')->nullable();
            $table->string('sideMondayUrl')->nullable();
            $table->string('sideMondayImageUrl')->nullable();
            $table->string('mainTuesdayMetadataLinkTitle')->nullable();
            $table->string('mainTuesdayMetadataLinkDescription')->nullable();
            $table->longText('mainTuesdayNote')->nullable();
            $table->string('mainTuesdayUrl')->nullable();
            $table->string('mainTuesdayImageUrl')->nullable();
            $table->string('sideTuesdayMetadataLinkTitle')->nullable();
            $table->string('sideTuesdayMetadataLinkDescription')->nullable();
            $table->longText('sideTuesdayNote')->nullable();
            $table->string('sideTuesdayUrl')->nullable();
            $table->string('sideTuesdayImageUrl')->nullable();
            $table->string('mainWednesdayMetadataLinkTitle')->nullable();
            $table->string('mainWednesdayMetadataLinkDescription')->nullable();
            $table->longText('mainWednesdayNote')->nullable();
            $table->string('mainWednesdayUrl')->nullable();
            $table->string('mainWednesdayImageUrl')->nullable();
            $table->string('sideWednesdayMetadataLinkTitle')->nullable();
            $table->string('sideWednesdayMetadataLinkDescription')->nullable();
            $table->longText('sideWednesdayNote')->nullable();
            $table->string('sideWednesdayUrl')->nullable();
            $table->string('sideWednesdayImageUrl')->nullable();
            $table->string('mainThursdayMetadataLinkTitle')->nullable();
            $table->string('mainThursdayMetadataLinkDescription')->nullable();
            $table->longText('mainThursdayNote')->nullable();
            $table->string('mainThursdayUrl')->nullable();
            $table->string('mainThursdayImageUrl')->nullable();
            $table->string('sideThursdayMetadataLinkTitle')->nullable();
            $table->string('sideThursdayMetadataLinkDescription')->nullable();
            $table->longText('sideThursdayNote')->nullable();
            $table->string('sideThursdayUrl')->nullable();
            $table->string('sideThursdayImageUrl')->nullable();
            $table->string('mainFridayMetadataLinkTitle')->nullable();
            $table->string('mainFridayMetadataLinkDescription')->nullable();
            $table->longText('mainFridayNote')->nullable();
            $table->string('mainFridayUrl')->nullable();
            $table->string('mainFridayImageUrl')->nullable();
            $table->string('sideFridayMetadataLinkTitle')->nullable();
            $table->string('sideFridayMetadataLinkDescription')->nullable();
            $table->longText('sideFridayNote')->nullable();
            $table->string('sideFridayUrl')->nullable();
            $table->string('sideFridayImageUrl')->nullable();
            $table->string('mainSaturdayMetadataLinkTitle')->nullable();
            $table->string('mainSaturdayMetadataLinkDescription')->nullable();
            $table->longText('mainSaturdayNote')->nullable();
            $table->string('mainSaturdayUrl')->nullable();
            $table->string('mainSaturdayImageUrl')->nullable();
            $table->string('sideSaturdayMetadataLinkTitle')->nullable();
            $table->string('sideSaturdayMetadataLinkDescription')->nullable();
            $table->longText('sideSaturdayNote')->nullable();
            $table->string('sideSaturdayUrl')->nullable();
            $table->string('sideSaturdayImageUrl')->nullable();
            $table->string('mainSundayMetadataLinkTitle')->nullable();
            $table->string('mainSundayMetadataLinkDescription')->nullable();
            $table->longText('mainSundayNote')->nullable();
            $table->string('mainSundayUrl')->nullable();
            $table->string('mainSundayImageUrl')->nullable();
            $table->string('sideSundayMetadataLinkTitle')->nullable();
            $table->string('sideSundayMetadataLinkDescription')->nullable();
            $table->longText('sideSundayNote')->nullable();
            $table->string('sideSundayUrl')->nullable();
            $table->string('sideSundayImageUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuses');
    }
}
