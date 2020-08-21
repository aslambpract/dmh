<?php



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RolesTableSeeder extends Seeder
{

    public function run()
    {

        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        DB::table('roles')->truncate();


        Role::create([
            'id'            => 1,
            'name'          => 'Administrator',
            'description'   => 'Full access admin dashboard.'
        ]);

        Role::create([
            'id'            => 2,
            'name'          => 'User',
            'description'   => 'Access to user dashboard'
        ]);
    }
}
