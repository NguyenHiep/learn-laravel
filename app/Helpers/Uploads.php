<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class Uploads
{
    const UPLOAD_FILE_SUCCESS   = 1;
    const UPLOAD_FILE_ERROR     = 0;
    const FILE_UPLOAD_NOT_EXIST = -1;
    /***
     * Upload file
     * @param Request $request
     * @param $key
     * @param $path_save
     * @return int|string
     */
    public static function upload(Request $request, $key, $path_save)
    {
        if ($request->hasFile($key)) {
            if ($request->file($key)->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                $fileExtension = $request->file($key)->getClientOriginalExtension(); // Lấy . của file
                // Filename cực shock để khỏi bị trùng
                $fileName = time() . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                // Thư mục upload
                $uploadPath = public_path($path_save); // Thư mục upload
                // Bắt đầu chuyển file vào thư mục
                $request->file($key)->move($uploadPath, $fileName);
                return $fileName;
            } else {
                Log::error(__METHOD__, ['Upload is failed']);
                return self::UPLOAD_FILE_ERROR;
            }
        }
    }

    /***
     * Upload multiples files
     *
     * @param Request $request
     * @param array $keys input name file upload
     * @param $path_save path upload
     * @param array $rule validation for image
     * @param null $new_name
     * @return \Illuminate\Http\RedirectResponse|int|array
     */
    public static function multiple_upload(
        Request $request,
        $keys,
        $path_save,
        $rule = [],
        $new_name = null
    ) {
        if ( $request->hasFile( $keys) ) {
            $imageRules = [$keys => 'image|max:1024'];
            if (!empty($rule)) {
                $imageRules = $rule;
            }
            $galary_img = [];
            $datas = $request->{$keys};
            foreach ($datas as $image) {
                $galary = [$keys => $image];
                $imageValidator = Validator::make($galary, $imageRules);
                if ($imageValidator->fails()) {
                    $messages = $imageValidator->messages();
                    return redirect()->back()->withErrors($messages);
                }

                if ($image->isValid()) {
                    // File này có thực, bắt đầu đổi tên và move
                    $fileExtension = $image->getClientOriginalExtension(); // Lấy . của file
                    // Filename cực shock để khỏi bị trùng
                    $fileName = time() . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
                    if (!empty($new_name)) {
                        $fileName = time() . $new_name;
                    }
                    // Thư mục upload
                    $uploadPath = public_path($path_save); // Thư mục upload
                    // Bắt đầu chuyển file vào thư mục
                    $image->move($uploadPath, $fileName);
                    $galary_img[] = $fileName;
                } else {
                    Log::error(__METHOD__, ['Upload is failed']);
                    return self::UPLOAD_FILE_ERROR;
                }

            }
            return $galary_img;
        }

    }

}