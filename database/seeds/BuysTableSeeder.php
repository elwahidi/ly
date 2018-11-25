<?php

use Illuminate\Database\Seeder;

class BuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // trade_action
        $trade = $this->trade_action();
        // buy
        $buy = $this->buy($trade);
        // bcs
        $this->bcs($buy);
        // dvs
        $dv1 = $this->dv($buy,1,1,5000,1);
        $dv2 = $this->dv($buy,2,2,5100,false);
        $dv3 = $this->dv($buy,3,3,5200,false);
        // orders
        foreach ($buy->bcs as $bc){
            $this->order($dv1,$bc,100,1);
            $this->order($dv2,$bc,101,2);
            $this->order($dv3,$bc,103,3);
        }
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
            'bl'                => 'images/bl/bl.jpg',
            'bl_member_id'      => 6,
            'bl_time'           => \Carbon\Carbon::now(),
            'fc'                => 'images/fc/fc.jpg',
            'fc_member_id'      => 3,
            'fc_time'           => \Carbon\Carbon::now(),
            'status'            => 'finish'
        ]);
    }

    private function buy(\App\Trade_action $trade_action)
    {
        return $trade_action->buy()->create([
            'slug'          => 'B-1',
            'company_id'    => 1,
            'ht'            => 5000,
            'tva'           => 1000,
            'ttc'           => 6000
        ]);
    }

    private function bcs(\App\Buy $buy)
    {
        $products = \App\Product::all();
        foreach ($products as $product) {
            $product->buy_bcs()->create([
                'buy_id'    => $buy->id,
                'qt'        => 10
            ]);
        }
    }

    private function dv(\App\Buy $buy,int $provider,int $i, int $ht, bool $selected)
    {
        $tva = ($ht * 20) / 100;
        $ttc = $tva + $ht;
        return $buy->dvs()->create([
            'slug'          => 'DV-' . $i,
            'provider_id'   => $provider,
            'ht'            => $ht,
            'tva'           => $tva,
            'ttc'           => $ttc,
            'selected'      => $selected
        ]);
    }

    private function order(\App\Buy_dv $dv,\App\Buy_bc $bc,int $pu,int $i)
    {
        $ht  = $pu * (int) $bc->qt;
        $tva = ($ht * 20) / 100;
        $ttc = $ht + $tva;
        $order = $dv->orders()->create([
            'pu'        => $pu,
            'ht'        => $ht,
            'tva'       => $tva,
            'ttc'       => $ttc,
            'buy_bc_id' => $bc->id,
        ]);
        if($dv->id == 1){
            $accounting = \App\Accounting::first();
            $accounting->update([
                'tva'                    => $order->tva + $accounting->tva,
                'tva_after_unload'       => $order->tva + $accounting->tva,
            ]);
            $order->purchased()->create([
                'slug'      => 'buy-' . $i,
                'qt'        => $bc->qt,
                'store_qt'  => $bc->qt,
                'product_id'=> $bc->product_id,
                'accounting_id' => 1
            ]);
        }
    }
}
