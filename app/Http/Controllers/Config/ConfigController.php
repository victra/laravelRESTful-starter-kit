<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Models\ConfigContent;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
	public function saveConfigBlog(Request $request)
    {
        $this->validate($request, [
            'config.*.config_id' => 'required',
            'config.*.config_content_id' => 'required',
            'config.*.value' => 'required',
        ]);

        foreach ($request->input('config') as $config) {
            $configContent = ConfigContent::where('config_id', $config['config_id'])
                                            ->where('id', $config['config_content_id'])
                                            ->first();

            $configContent->update([
                'value' => $config['value'],
            ]);
        }

        return response()->json(true);
    }

    public function getConfig(Request $request)
    {
        $query = new \App\Models\Config;

        $search = $request->input('search');
        $query = $query->where(function ($query) use ($search) {
            $query->orWhere('title', 'LIKE', '%'.$search.'%');
        });

        $config = $query->get();
        return response()->json($config);
    }
}