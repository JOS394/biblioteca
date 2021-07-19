<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Login;
use App\User;


use Closure;
use PhpParser\Node\Stmt\ElseIf_;
use Symfony\Component\VarDumper\VarDumper;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next)
    {
        $nombre = request()->only('username');
        $credenciales = request()->only('username','password');
        $tipo = User::where('username', '=', $nombre)
        ->select('tipo_usuario')
        ->get();

        foreach ($tipo as $tipoItem){ 
            $tipousuario=($tipoItem['tipo_usuario']);
            }




        if ($tipousuario==1) {
            return $next($request); //si es administrador
        } elseif ($tipousuario==2) {
            return redirect('homeu'); //si es administrador
        } else {
            return redirect('home3'); //si es administrador;
        }

    }
}
