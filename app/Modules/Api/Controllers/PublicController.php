<?php


namespace Api\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use zgldh\QiniuStorage\QiniuStorage;

class PublicController extends Controller
{
    public function img(Request $request)
    {
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $disk = QiniuStorage::disk('qiniu');
            $fileName = md5($file->getClientOriginalName() . time() . rand()) . '.' . $file->getClientOriginalExtension();
            $bool = $disk->put('uploads/image_' . $fileName, file_get_contents($file->getRealPath()));
            if ($bool) {
                $path = $disk->downloadUrl('uploads/image_' . $fileName);
                return $this->success(['path' => $path]);
            }
            return $this->error('上传失败，请重试');
        }
    }
}