<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable("vendas")){

            Schema::create('vendas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if(Schema::hasTable("vendas")){
            Schema::table("vendas", function (Blueprint $table) {
                $table->integer("ingresso_id");
                $table->integer("valor");
                $table->integer("evento_id");
                $table->string("cpf", 11);

                $table->foreign("ingresso_id")->references("id")->on("ingressos");
                $table->foreign("evento_id")->references("id")->on("eventos");
            });
        }
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
        if(Schema::hasTable("vendas")){
            Schema::table("vendas", function (Blueprint $table) {
                $table->dropColumn("ingresso_id");
                $table->dropColumn("valor");
                $table->dropColumn("evento_id");
                $table->dropColumn("cpf");
            });
        }
    }
};
