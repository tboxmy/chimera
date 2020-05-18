<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $create = Permission::create([
            'name' => 'Create',
            'slug' => 'create',            
        ]);
        $editUsers = Permission::create([
            'name' => 'Edit users',
            'slug' => 'edit-users',            
        ]);
        $createQuiz = Permission::create([
            'name' => 'Create Quizzes',
            'slug' => 'create-quizzes',            
        ]);
        $editQuiz = Permission::create([
            'name' => 'Edit Quizzes',
            'slug' => 'edit-quizzes',            
        ]);
        $role = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            
        ]);
        $roleTeacher = Role::create([
            'name' => 'Teacher',
            'slug' => 'teacher',
            
        ]);
        $user = User::find(1);        
        $role->permissions()->sync( [$create->id, $editUsers->id]);
        $user->roles()->sync( $role->id);

        $teacher = User::find(2);
        $roleTeacher->permissions()->sync( [$createQuiz->id, $editQuiz->id]);
        $teacher->roles()->sync( $roleTeacher->id);

    }
}
