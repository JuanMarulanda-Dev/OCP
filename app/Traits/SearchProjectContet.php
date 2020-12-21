<?php

namespace App\Traits;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait SearchProjectContet
{
        public function search_project_content($project_folder){

            $folders = Storage::disk('s3')->directories($project_folder);
            $files = Storage::disk('s3')->files($project_folder);

            if($files == [] || $folders == []){
                if($files == []){
                    return $folders;
                }else{
                    return $files;
                }
            }else{
                return Arr::sort(array_merge($files, $folders));
            }
            
        }

}