<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // trade_action
        $trade_action = $this->trade_action();
        // sale
        $sale = $this->sale($trade_action);
        // bcs
        $this->bcs($sale);
        // dv
        $dv = $this->dv($sale);
        // order
        $this->orders($sale,$dv);
        // accounting
        // purchased && sold
    }

    private function trade_action()
    {
        return \App\Trade_action::create([
            'bc'                => 1,
            'bc_member_id'      => 4,
            'bc_time'           => Carbon\Carbon::now(),
            'dv'                => 1,
            'dv_member_id'      => 4,
            'dv_time'           => Carbon\Carbon::now(),
            'done'              => 1,
            'done_member_id'    => 4,
            'done_time'         => Carbon\Carbon::now(),
            'delivery'          => 1,
            'delivery_member_id'=> 5,
            'delivery_time'     => \Carbon\Carbon::now(),
            'store'             => 1,
            'store_member_id'   => 6,
            'store_time'        => \Carbon\Carbon::now(),
            'bl'                => 1,
            'bl_member_id'      => 6,
            'bl_time'           => \Carbon\Carbon::now(),
            'fc'                => 1,
            'fc_member_id'      => 3,
            'fc_time'           => \Carbon\Carbon::now(),
            'status'            => 'finish'
        ]);
    }

    private function sale(\App\Trade_action $trade_action)
    {
        return \App\Sale::create([
            'slug'      => 'S-1',
            'ht'        => '7000',
            'tva'       => '1400',
            'ttc'       => '8400',
            'tva_payed' => '200',
            'profit'    => '800',
            'taxes'     => '256',
            'profit_after_taxes' => '544',
            'trade_action_id' => $trade_action->id,
            'company_id' => 1
        ]);
    }

    private function bcs($sale)
    {
        $purchaseds = \App\Purchased::all();
        foreach ($purchaseds as $purchased) {
            $sale->bcs()->create([
                'qt'            => $purchased->store_qt,
                'sale_id'       => $sale->id,
                'purchased_id'  => $purchased->id
            ]);
        }
    }

    private function dv($sale)
    {
        return $sale->dv()->create([
            'slug'  => 'DV-1',
            'client_id' => 1,
        ]);
    }

    private function orders($sale,$dv)
    {
        foreach ($sale->bcs as $bc) {
            $order = $dv->orders()->create([
                'pu'                    => 140,
                'ht'                    => 1400,
                'tva'                   => 280,
                'ttc'                   => 1680,
                'tva_payed'             => 40,
                'profit'                => 160,
                'taxes'                 => 51.2,
                'profit_after_taxes'    => 108.8,
                'sale_bc_id'            => $bc->id
            ]);
            $purchased = $bc->purchased;
            $bc->purchased()->update([
                'store_qt' => $purchased->store_qt - $bc->qt
            ]);
            $sold = $order->sold()->create([
                'qt'    => $bc->qt,
                'product_id' => $bc->purchased->product_id,
                'accounting_id' => 1
            ]);
            $sold->update([
                'slug' => 'SOLD-' . $sold->id
            ]);
            $accounting = $sold->accounting;
            $sold->accounting()->update([
                'tva'    =>   $accounting->tva + 40,
                'taxes'  =>  $accounting->taxes + 51.2,
                'profit'    => $accounting->profit + 108.8,
                'taxes_after_unload' => $accounting->taxes_after_unload + 51.2,
                'tva_after_unload' => $accounting->tva_after_unload + 40,
            ]);

        }
    }
}
