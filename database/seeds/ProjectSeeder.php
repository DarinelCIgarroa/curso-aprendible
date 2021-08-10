<?php

use App\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();

        factory(Project::class, 5)->create();

        DB::table('projects')->insert([
            'title'         =>  'proyecto 1',
            'description'   =>  'Este es el proyecto 1',
            'url'           =>  'mi-primer-proyecto',
            'created_at'    =>  '20/04/11',
            'updated_at'    =>  '20/04/11',
        ]);


        DB::table('projects')->insert([
            'title'         =>  'proyecto 2',
            'description'   =>  'Este es el proyecto 2',
            'url'           =>  'mi-segundo-proyecto',
            'created_at'    =>  '21/04/11',
            'updated_at'    =>  '20/04/11',
        ]);

        DB::table('projects')->insert([
            'title'         =>  'proyecto 3',
            'description'   =>  'Este es el proyecto 3',
            'url'           =>  'mi-tercer-proyecto',
            'created_at'    =>  '18/04/11',
            'updated_at'    =>  '20/04/11',
        ]);

        DB::table('projects')->insert([
            'title'         =>  'proyecto 4',
            'description'   =>  'Este es el proyecto 4',
            'url'           =>  'mi-cuarto-proyecto',
            'created_at'    =>  '14/04/11',
            'updated_at'    =>  '20/04/11',
        ]);
    }
}
