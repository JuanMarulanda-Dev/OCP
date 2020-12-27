<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Str;

class EncryptMiddleware
{
    /**
     * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        /**
        * Se recoge la request enviada por get y se recorren y desencriptan los parámetros que tiene. El controlador recoge los datos desencriptados para procesarlos correctamente
        */
        // dd($request->route()->parameters);
        foreach($request->route()->parameters as $key => $value){
            if($key == 'id' || Str::endsWith($key, ['_id'])) {
                try {
                    $request->route()->setParameter($key, decrypt($value));
                } catch (DecryptException $e) {
                    // Redirect to before view or abort 404
                    abort(404);
                }
            }
        }

    /**
    * Se comprueba si el método es post. Si lo es se recorren sus parámetros y se comprueba que en los datos enviados por el formulario hay algún parámetro que se llame exactamente ID o que contenga _ID. Si la comprobación es exitosa se desencripta para que el controlador pueda procesar los datos correctamente
        */
        // if($request->isMethod('post')){
        //     $array = [];
        //     foreach ($request->request as $key => $value) {
        //         if($key == 'id' || Str::endsWith($key, ['_id'])){
        //             // Si lo que recibe es un array, se desencripta cada valor del array, se guarda en un array temporal y se aplica sobre el array original de la request
        //             if (is_array($value)){
        //                 foreach ($value as $key_array=>$array_item) {
        //                     if($array_item != NULL){
        //                         array_push($array, Encryptor::decrypt($array_item));
        //                     }
        //                 }
        //                 $request->request->set($key, $array);   
        //             } else {
        //                 if($value != NULL){
        //                     $request->request->set($key, Encryptor::decrypt($value));
        //                 }
        //             }
        //         }
        //     }
        // }
    
    return $next($request);
    }
}