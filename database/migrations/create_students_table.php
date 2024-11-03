public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('student_number')->unique();
        $table->string('name');
        $table->string('bi_number');
        $table->string('course');
        $table->year('admission_year');
        $table->year('completion_year');
        $table->decimal('final_grade', 5, 2);
        $table->timestamps();
    });
}
