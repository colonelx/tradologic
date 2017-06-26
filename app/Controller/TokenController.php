<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/26/17
 * Time: 12:44 AM
 */

namespace TradoLogic\Controller;


use Slim\Http\Request;
use Slim\Http\Response;
use TradoLogic\Model\ApiResponse;

class TokenController extends BaseController
{

    /**
     * @SWG\Get(path="/token",
     *   tags={"user"},
     *   summary="Returns API token",
     *   description="",
     *   operationId="getToken",
     *   produces={"application/json"},
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string")
     *   ),
     * )
     */
    public function get(Request $request, Response $response)
    {
        /** Usually we should check credetials, before we return a valid token,
         *  but as this is a demo project, we will just return a token.
         */
        $new_token = $this->container->get('token_manager')->generateToken();

        return $this->respond(
            new ApiResponse(ApiResponse::CODE_SUCCESS, ['token' => $new_token])
        );
    }
}