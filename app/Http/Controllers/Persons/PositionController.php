<?php

namespace App\Http\Controllers\Persons;

use App\City;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Info_box;


class PositionController extends Controller
{

    public function index()
    {
        $positions = auth()->user()->member->company->positions;

        return view('persons.position.index',compact('positions'));
    }

    public function create()
    {
        $cities = City::all();
        return view('persons.position.create',compact('cities'));
    }

    public function store(Request $request)
    {

        /*$data = $this->validate(request(),[
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
        }*/

        $data = $this->validate(request(),[
            'first_name'=>'',
            'last_name'=>'',
            'address'=>'',
            'sex'=>'',
            'city_id'=>'required',
            'birth'=>'',
            'cin'=>'unique:infos,cin',
            'facial'=>'',
            'email'=>'unique:emails,email',
            'tel'=>'unique:tels,tel',
            'face'=>'',
        ]);
        $info = \App\Info::create($data);

        $info->emails()->create([
            'email'     => $data['email'],
            'default'   => 1
        ]);
        $info->tels()->create([
            'tel'       => $data['tel'],
            'default'   => 1
        ]);
        $info->position()->create([
            'position'      => str_slug($info->first_name . ' ' . $info->last_name . ' ' .$info->id, '-'),
            'member_id'     => auth()->user()->member->id,
            'company_id'    => auth()->user()->member->company->id
        ]);

        return $this->show($info->position->id);

    }

    public function show($id)
    {
        $position = Position::where('id',$id)->get()[0];
        return view('persons.position.show',compact('position'));
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $cities = City::all();
        return view('persons.position.edit',compact('position','cities'));
    }

    public function update(Request $request, $id)
    {
        $position = Position::findOrFail($id);
        $data = $this->validate(request(),[
            'first_name'=>'',
            'last_name'=>'',
            'address'=>'',
            'sex'=>'',
            'city_id'=>'required',
            'birth'=>'',
            'cin'=>'unique:infos,cin,'.$position->info->id,
            'facial'=>'',
        ]);
        if($info = $position->info->update($data)){
            $dataPosition['position'] = str_slug(request()->first_name . ' ' . request()->last_name . ' ' .$position->info->id, '-');
            $position->position = $dataPosition['position'];
            $position->save();
            if(isset($position->info->emails[0]->id)){
                $datam = $this->validate(request(),['email'=>'unique:emails,email,'.$position->info->emails[0]->id]);
                $position->info->emails()->update($datam);
            }
            else{
                if(request()->email){
                    $datam = $this->validate(request(),['email'=>'']);
                    $position->info->emails()->create($datam);
                }
            }
            if(isset($position->info->tels[0]->id)){
                $datat = $this->validate(request(),['tel'=>'']);
                $position->info->tels()->update($datat);
            }
            else{
                if(request()->tel){
                    $datat = $this->validate(request(),['tel'=>'']);
                    $position->info->tels()->create($datat);
                }
            }
            if(request()->img){

                            if(file_exists('storage/'.$file->img)){
                                                    @unlink('storage/'.$file->img);
                                                }
                            $product->imgs()->update([
                                'img'   => $file->store('positions')
                            ]);

                        }
            $status = session()->flash('status',__('pages.position.update_success'));
            return redirect('/Position/'.$position->id)->with($status);
        }
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->info->emails()->delete();
        $position->info->tels()->delete();
        $position->info->delete();
        $position->delete();
        $positions = auth()->user()->member->company->clients;
        $status = session()->flash('status',__('pages.position.delete_success'));
        return redirect('/Position')->with([$status,$positions]);
    }
}
