<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '系统设置';

        return view('admin.setting.index', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siteTitle = Option::where('name', 'TITLE')->first();
        if ($siteTitle) {
            $siteTitle->value = $request->input('TITLE');
            $siteTitle->save();
        } else {
            Option::create([
                'name'  => 'TITLE',
                'value' => $request->input('TITLE'),
            ]);
        }

        $siteSubTitle = Option::where('name', 'SUB_TITLE')->first();
        if ($siteSubTitle) {
            $siteSubTitle->value = $request->input('SUB_TITLE');
            $siteSubTitle->save();
        } else {
            Option::create([
                'name'  => 'SUB_TITLE',
                'value' => $request->input('SUB_TITLE'),
            ]);
        }

        $keywords = Option::where('name', 'KEYWORDS')->first();
        if ($keywords) {
            $keywords->value = $request->input('KEYWORDS');
            $keywords->save();
        } else {
            Option::create([
                'name'  => 'KEYWORDS',
                'value' => $request->input('KEYWORDS'),
            ]);
        }

        $description = Option::where('name', 'DESCRIPTION')->first();
        if ($description) {
            $description->value = $request->input('DESCRIPTION');
            $description->save();
        } else {
            Option::create([
                'name'  => 'DESCRIPTION',
                'value' => $request->input('DESCRIPTION'),
            ]);
        }

        $perPage = Option::where('name', 'PER_PAGE')->first();
        if ($perPage) {
            $perPage->value = $request->input('PER_PAGE');
            $perPage->save();
        } else {
            Option::create([
                'name'  => 'PER_PAGE',
                'value' => $request->input('PER_PAGE'),
            ]);
        }

        $bnNo = Option::where('name', 'BN_NO')->first();
        if ($bnNo) {
            $bnNo->value = $request->input('BN_NO');
            $bnNo->save();
        } else {
            Option::create([
                'name'  => 'BN_NO',
                'value' => $request->input('BN_NO'),
            ]);
        }

        $statistics = Option::where('name', 'STATISTICS')->first();
        if ($statistics) {
            $statistics->value = $request->input('STATISTICS');
            $statistics->save();
        } else {
            Option::create([
                'name'  => 'STATISTICS',
                'value' => $request->input('STATISTICS'),
            ]);
        }

        return redirect(url('/admin/setting'));
    }
}
