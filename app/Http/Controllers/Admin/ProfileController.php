<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

use App\Models\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
     public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, profile::$rules);

        $profile = new profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        
         // 送信されてきたフォームデータを格納する
        $profile = Profile::find($request->id);
       
        // $profile に $profile_form の値を反映させる
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        
        $profile->fill($profile_form);
        $profile->save();
        
        
        $history = new profilehistory();
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/edit?id='. $profile->id);
    
    }
    
     public function delete(Request $request)
    {
        // 該当する Modelを取得
        $profile = Profile::find($request->id);

        // 削除する
        $profile->delete();

        return redirect('admin/profile/edit');
    }
}
