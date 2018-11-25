<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = \App\Company::first();
        $company->activate();
        $tokens = $company->tokens;
        foreach ($tokens as $token) {
            $user = \App\User::create([
                'login'      => $token->category->category,
                'password'  => bcrypt('123456mM')
            ]);
            $date = (int) $token->range;
            $premium = \App\Premium::create([
                'sold'          => 0,
                'range'         => 0,
                'limit'         => gmdate('Y-m-d',strtotime("+$date days")),
                'category_id'   => $token->category->id,
                'status_id'     => 2
            ]);
            $info = \App\Info::create([
                'last_name'     => 'last ' . $token->category->category,
                'first_name'    => 'first ' . $token->category->category,
                'address'       => 'address address address address address ',
                'city_id'       => 1
            ]);
            $info->tels()->create([
                'tel'       => "065783451" . $token->category_id,
                'default'   => true,
            ]);
            $info->emails()->create([
                'email'     => $token->category->category . '@ly.ly',
                'default'   => true
            ]);
            $member = $company->members()->create([
                'name'      => $token->category->category,
                'user_id'   => $user->id,
                'info_id'   => $info->id,
                'premium_id'=> $premium->id
            ]);
            $member->update([
                'slug'  => str_slug($member->name .' '.$member->id)
            ]);
            $token->delete();
        }
    }
}
