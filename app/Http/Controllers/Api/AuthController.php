<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @group Segurança
 */
class AuthController extends Controller
{
    /**
     * Login - Generate API token
     *
     * Utilize este endpoint para se autenticar na API e receber o Bearer token que deve ser enviado no Header a todos os endpoints.
     *
     * @bodyParam email string required O email válido, registrado para login do usuário. Example: jose@meuemail.com
     * @bodyParam password string required A senha do usuário. Example: minhaSenhaForteSQN
     * @bodyParam device_name string required O nome do dispositivo, para futura gestão de dispositivos autenticados na API. Example: iPhone do Zé
     *
     * @unauthenticated
     *
     * @responseFile resources/docs/api/login.json
     *
     * @response status=401 scenario="The provided credentials are incorrect." { "error": "The provided credentials are incorrect."  }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if (\Auth::validate($request->only('email', 'password')) == false) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        \Auth::login($user, true);

        $token = auth()->user()->createToken($request->input('device_name'))->plainTextToken;

        return response()->json(
            $this->buildResponse($token, $user, $request->input('device_name'))
        );
    }

    /**
     * Refresh - refresh do token de api
     *
     * Realiza o refresh do token, para garantir que não houve interceptação indevida, deve ser enviado o id do usuário
     * a qual o token pertence
     *
     * @bodyParam id int required O id do usuário para qual esse token está validado. Example: 234
     * @bodyParam token string required O token a ser reiniciado. Example: 23|33498030495j83049jf30495
     * @bodyParam device_name string required O nome do dispositivo, para futura gestão de dispositivos autenticados na API. Example: iPhone do Zé
     *
     * @unauthenticated
     *
     * @responseFile resources/docs/api/login.json
     *
     * @response status=401 scenario="The provided credentials are incorrect." { "error": "The provided credentials are incorrect."  }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'id' => 'required',
            'device_name' => 'required',
        ]);

        $tokenRegister = PersonalAccessToken::findToken($request->input('token'));

        if ($tokenRegister == null) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $user = $tokenRegister->tokenable;

        if ($user->id != (int)$request->input('id')) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.'
            ], 401);
        }

        \Auth::login($user, true);

        auth()->user()->tokens()->delete();

        $token = auth()->user()->createToken($request->input('device_name'))->plainTextToken;

        return response()->json(
            $this->buildResponse($token, $user, $request->input('device_name'))
        );
    }

    protected function buildResponse($token, $user, $deviceName)
    {
        $result = [];

        $result = array_merge($result, [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

        return $result;
    }

}
