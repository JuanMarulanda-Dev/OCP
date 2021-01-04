<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

trait SearchProjectContet
{
        public function search_project_content($project_folder, $withFolder = 1){

            // Search the data of th project
            $folders = ($withFolder==1)? Storage::disk('s3')->directories($project_folder) : [];
            $files = Storage::disk('s3')->files($project_folder);

            if($files == [] || $folders == []){
                // Return only the array with data
                if($files == []){
                    return $folders;
                }else{
                    return $files;
                }
            }else{
                // Merge those arrays on one
                return Arr::sort(array_merge($files, $folders));
            }
            
        }

}