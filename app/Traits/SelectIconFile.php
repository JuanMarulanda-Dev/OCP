<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SelectIconFile
{

    public $extensions = ['.pdf', '.png', '.jpg', '.xlsx', '.docx', '.txt', '.jpeg', '.gif', '.tif', '.tiff', '.psd', '.svg', '.ai', '.ico'];

    public function chooseIconForItem($name)
    {
        $icon = "fas fa-folder";

        if(Str::of($name)->endsWith($this->extensions)){

            $nameFile = explode('.', $name);

            switch ($nameFile[count($nameFile) - 1]) {
                case 'pdf':
                        return "far fa-file-pdf";

                    break;
                case 'docx':

                        return "far fa-file-word";

                    break;
                case 'xlsx':

                        return "far fa-file-excel";

                    break;
                case 'txt':

                        return "far fa-file-alt";

                    break;
                default:

                    return "far fa-file-alt";

                    break;
            }

        }

        return $icon;
    }
    
}
