<?php

namespace App\Http\Controllers\Persons;

use App\City;
use App\Info_box;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $clients = auth()->user()->member->company->clients;
        return view('persons.client.index',compact('clients'));
    }

    public function create()
    {
        $cities = City::all();
        return view('persons.client.create',compact('cities'));
    }

    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'brand'=>'unique:info_boxes',
            'name'=>'unique:info_boxes',
            'licence'=>'',
            'turnover'=>'',
            'taxes'=>'',
            'fax'=>'unique:info_boxes',
            'speaker'=>'',
            'build'=>'',
            'address'=>'',
            'floor'=>'',
            'apt_nbr'=>'',
            'zip'=>'',
            'city_id'=>'',

        ]);
        $datam = $this->validate(request(),['email'=>'unique:emails']);
        $datat = $this->validate(request(),['tel'=>'unique:tels']);

        if($info_box = Info_box::create($data)){
            $datad = $this->validate(request(),['description'=>'']);
            $datad['slug'] = str_slug(request()->name . ' ' .$info_box->id, '-');
            $datad['company_id'] = auth()->user()->member->company->id;
            $info_box->emails()->create($datam);
            $info_box->tels()->create($datat);
            $client = $info_box->client()->create($datad);
            $status = session()->flash('status',__('pages.client.add_success'));
            return redirect('/Client/'.$client->id)->with($status);
        }

    }

    public function show($id)
    {
        $client = Client::where('id',$id)->get()[0];
        return view('persons.client.show',compact('client'));
    }

    public function edit($id)
    {

        $client = Client::findOrFail($id);
        $cities = City::all();
        return view('persons.client.edit',compact('client','cities'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $data = $this->validate(request(),[
            'brand'=>'unique:info_boxes,brand,'.$client->info_box_id,
            'name'=>'unique:info_boxes,name,'.$client->info_box_id,
            'licence'=>'',
            'turnover'=>'',
            'taxes'=>'',
            'fax'=>'unique:info_boxes,fax,'.$client->info_box_id,
            'speaker'=>'',
            'build'=>'',
            'address'=>'',
            'floor'=>'',
            'apt_nbr'=>'',
            'zip'=>'',
            'city_id'=>'',

        ]);

        if($info_box = $client->info_box->update($data)){

            $datac = $this->validate(request(),['description'=>'']);
            $datac['slug'] = str_slug(request()->name . ' ' .$client->info_box->id, '-');
            $datac['company_id'] = auth()->user()->member->company->id;
            if(isset($client->info_box->emails[0]->id)){
                $datam = $this->validate(request(),['email'=>'unique:emails,email,'.$client->info_box->emails[0]->id]);
                $client->info_box->emails()->update($datam);
            }else{
                if(request()->email){
                    $datam = $this->validate(request(),['email'=>'']);
                    $client->info_box->emails()->create($datam);
                }
            }
            if(isset($client->info_box->tels[0]->id)){
                $datat = $this->validate(request(),['tel'=>'']);
                $client->info_box->tels()->update($datat);
            }else{
                if(request()->tel){
                    $datat = $this->validate(request(),['tel'=>'']);
                    $client->info_box->tels()->create($datat);
                }
            }
            $client->update($datac);
            $status = session()->flash('status',__('pages.client.update_success'));
            return redirect('/Client/'.$client->id)->with($status);
        }
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->info_box->emails()->delete();
        $client->info_box->tels()->delete();
        $client->info_box->delete();
        $client->delete();
        $clients = auth()->user()->member->company->clients;
        $status = session()->flash('status',__('pages.client.delete_success'));
        return redirect('/Client')->with([$status,$clients]);
    }
}
