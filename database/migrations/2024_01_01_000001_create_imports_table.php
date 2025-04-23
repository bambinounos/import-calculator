public function up()
{
    Schema::create('imports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('name');
        $table->string('currency', 3)->default('USD');
        $table->decimal('exchange_rate', 10, 4)->nullable();
        $table->decimal('total_cif', 15, 2)->nullable();
        $table->decimal('total_taxes', 15, 2)->nullable();
        $table->timestamps();
    });
}
