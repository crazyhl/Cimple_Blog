<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Qiniu\Auth;

class QiniuController extends Controller
{
    /**
     * 获取七牛token.
     */
    public function getToken()
    {
        $accessKey = 'JxSeAXh6u94q-ZLaw6VxyGFldH0B5CoP3e0HzutY';
        $secretKey = 'h0CDrAatJspD8Fg4DUIioD-ZC-9aCv_yBvzhVMGp';

        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);
        $bucket = 'cimple';

        // 生成上传Token
        $token = $auth->uploadToken($bucket);

        return ['uptoken' => $token];
    }
}
