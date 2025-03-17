<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'emailUser' => 'required',
                'senha'         => 'required',
            ]);

            $emailUser = $request->input('emailUser');
            $senha         = $request->input('senha');

            if (filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
                $user = DB::table('users')->where('email', $emailUser)->first();
            } else {
                $user = DB::table('users')->where('username', $emailUser)->first();
            }

            if ($user && Hash::check($senha, $user->senha)) {
                Session::put('user_id', $user->id);
                return redirect()->route('dashboard');
                echo 'logou';
            } else {
                return redirect()->route('login')->withErrors(['login' => 'E-mail ou senha incorretos!']);
            }
        }

        return view('auth.login');
    }
    public function dashboard()
    {
        // Verificar se o usuário está autenticado
        if (!session('user_id')) {
            return redirect()->route('login');
        }

        // Obter o usuário usando DB
        $user = DB::table('users')->where('id', session('user_id'))->first();

        // Verificar se o usuário foi encontrado
        if (!$user) {
            return redirect()->route('login');
        }

        return view('dashboard.dash', compact('user'));
    }

    public function logout()
    {
        // Remove as variáveis de sessão
        Session::flush();

        // Redireciona para a página de login
        return redirect()->route('login');
    }
}
