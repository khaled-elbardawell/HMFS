<?php


namespace App\Traits;

use App\Upload;
use Intervention\Image\Facades\Image;

trait UploadTrait
{
    /**
     * List Thumb Folders
     * @var string[]
     */
    private static $listThumbFolders = [
        'full'     => null,
        'thumb200' => ['200','200'],
        'thumb600' => ['600','600'],
    ];




    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function upload(){
        return $this->morphTo(Upload::class, 'uploadable');
    }// end method

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function uploads(){
        return $this->morphMany(Upload::class, 'uploadable');
    }// end method



    /**
     * Delete Upload Data (Delete from DB and unlink old files)
     * @param $uploadable_id
     * @param string $type
     * @param string $local
     */
    public static function deleteUpload($uploadable_id,$type='image',$local='en'){
            $query = Upload::where('uploadable_type',self::class)
                ->where('uploadable_id',$uploadable_id);
            if(!is_null($type)){
                $query = $query->where('type',$type);
            }

           if(!is_null($type)){
              $query = $query->where('locale',$local);
           }

            $old_uploads = $query->get();
            if ($old_uploads){
                foreach ($old_uploads as $old_upload){
                    self::unlink($old_upload->file,$type);
                }
                $query->delete();
            }
    }// end method



    /**
     * Save images or files Upload in DB and upload folder
     * @param $uploadable_id
     * @param string $action
     * @param string $type
     * @param string $local
     * @param string $file_input_name
     */
    public static function saveUpload($uploadable_id,$action='create',$type='image',$local='en',$file_input_name='file'){
        $files = request()->file($file_input_name);
        if ($files){
            if (!is_array($files)){
                 $files = [$files];
             }

            if ($action == "update"){
                self::updateUploadDB($files,$uploadable_id,$type,$local);
            }

            self::saveFile($uploadable_id,$files,$type,$local);
        }
    }// end method


    /**
     * Save images or files Upload in DB and upload folder
     * @param $uploadable_id
     * @param $action
     * @param $files
     * @param $type
     * @param $local
     * @param $file_input_name
     */
    private static function saveFile($uploadable_id,$files,$type,$local){
        $imageUpload = null;
        foreach ($files as $file){
            if ($type == 'image'){
                $imageUpload = Image::make($file);
            }
            $original_file_name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $save_file_name = self::generateFileName($original_file_name);

            if ($type == 'image' && $imageUpload){
                foreach (self::$listThumbFolders as $folder => $size){
                    if ($size){
                        $imageUpload->resize($size[0],$size[1]);
                    }
                    $imageUpload->save(public_path("upload/images/$folder/$save_file_name"));
                }
            }else{
                 $file->move(public_path("upload/files"), $save_file_name);
            }

            Upload::create([
                'uploadable_type' => self::class,
                'uploadable_id'   => $uploadable_id,
                'name'            => $original_file_name,
                'file'            => $save_file_name,
                'extension'       => $extension,
                'type'            => $type,
                'locale'          => $local
            ]);
        }
    }// end method



    /**
     * Update Upload Data (Delete old from DB and unlink old files)
     * @param $files
     * @param $uploadable_id
     * @param $type
     * @param $local
     */
    private  static function updateUploadDB($files,$uploadable_id,$type,$local){
        if ($files){
            $query = Upload::where('uploadable_type',self::class)
                ->where('uploadable_id',$uploadable_id)
                ->where('type',$type)
                ->where('locale',$local);

            $old_uploads = $query->get();
            if ($old_uploads){
                foreach ($old_uploads as $old_upload){
                    self::unlink($old_upload->file,$type);
                }
                $query->delete();
            }
        }
    }// end method



    /**
     * Generate File Name For Save
     * @param $name
     * @return string
     */
    private static function generateFileName($name){
        $fileName = date('Y-m-d-H-i-s') . '_' . trim($name);
        $fileName = str_replace(' ','_',$fileName);
        $fileName = str_replace(['(',')'],'_',$fileName);
        $fileName = trim(strtolower($fileName));
        return $fileName;
    }// end method



    /**
     * Unlink file from upload
     * @param $file_name
     * @param string $type
     */
    private static function unlink($file_name,$type='image'){
        if ($type == 'image'){
            foreach (self::$listThumbFolders as $folder => $size) {
                if(file_exists(public_path("/upload/images/$folder/".$file_name))) {
                    unlink(public_path("/upload/images/$folder/".$file_name));
                }
            }
        }else{
            if (file_exists(public_path('/upload/files/'.$file_name))){
                unlink(public_path('/upload/files/'.$file_name));
            }
        }
    }// end method

}// end trait
