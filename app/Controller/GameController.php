<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 6/26/17
 * Time: 1:30 AM
 */

namespace TradoLogic\Controller;


use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use TradoLogic\Exception\ApiException;
use TradoLogic\Model\ApiResponse;
use TradoLogic\Model\Game;
use TradoLogic\Validation\GameAddValidator;
use TradoLogic\Validation\GameDeleteValidator;

class GameController extends BaseController
{
    protected $gm;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->gm = $this->container->get('games_manager');
    }

    /**
     * @SWG\Get(path="/api/games",
     *   tags={"games"},
     *   summary="Returns a full list of games",
     *   description="",
     *   operationId="listAll",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="token",
     *     description="Token for the API call",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string")
     *   ),
     * )
     * @param Request $request
     * @param Response $response
     * @return $this
     */
    public function listAll(Request $request, Response $response)
    {
        $result = new ApiResponse(200,
            $this->gm->listAll());

        return $this->respond($result, $response);
    }

    /**
     * @SWG\Post(path="/api/game",
     *   tags={"games"},
     *   summary="Add a new game",
     *   description="",
     *   operationId="addGame",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     name="token",
     *     description="Token for the API call",
     *     required=true,
     *     type="string",
     *     in="query"
     *   ),
     *     @SWG\Parameter(
     *     name="id",
     *     description="Game Id",
     *     required=true,
     *     type="int64",
     *     in="body"
     *   ),
     *     @SWG\Parameter(
     *     name="name",
     *     description="Game name",
     *     required=true,
     *     type="string",
     *     in="body"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string")
     *   ),
     *    @SWG\Response(
     *     response=201,
     *     description="successful operation with warning",
     *     @SWG\Schema(type="string")
     *   ),
     *   @SWG\Response(
     *     response=400,
     *     description="failure with error",
     *     @SWG\Schema(type="string")
     *   ),
     *   @SWG\Response(
     *     response=409,
     *     description="Duplicate ID / failure with error",
     *     @SWG\Schema(type="string")
     *   ),
     * )
     * @param Request $request
     * @param Response $response
     * @return $this
     */
    public function add(Request $request, Response $response)
    {
        $validator = new GameAddValidator($this->gm);

        try {
            $game = new Game($request->getParam('id'), $request->getParam('name'));
            $validator->validate($game);

            // If no Exception is thrown, then data is OK!
            $checkGame = $this->gm->getBy('name', $game->name);
            if ($checkGame !== null) {
                // If there is an existing record with that name
                $apiResponse = new ApiResponse(201, $checkGame);
            } else {
                $apiResponse = new ApiResponse(200, true);
            }

        } catch (ApiException $ex) {
            $apiResponse = new ApiResponse($ex->getCode(), $ex->getMessage());
        }

        return $this->respond($apiResponse, $response);
    }
     /**
      * @SWG\Delte(path="/api/game/{id}",
      *   tags={"games"},
      *   summary="Remove a new game",
      *   description="",
      *   operationId="removeGame",
      *   produces={"application/json"},
      *   @SWG\Parameter(
      *     name="token",
      *     description="Token for the API call",
      *     required=true,
      *     type="string",
      *     in="query"
      *   ),
      *   @SWG\Response(
      *     response=200,
      *     description="successful operation",
      *     @SWG\Schema(type="string")
      *   ),
      *   @SWG\Response(
      *     response=400,
      *     description="failure with error",
      *     @SWG\Schema(type="string")
      *   ),
      *   @SWG\Response(
      *     response=404,
      *     description="No such game",
      *     @SWG\Schema(type="string")
      *   ),
      * )
      *
     * @param Request $request
     * @param Response $response
     * @return $this
     */
    public function remove(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $validator = new GameDeleteValidator($this->gm);

        try {
            $game = new Game($id);
            $validator->validate($game);

            $this->gm->remove($game);
            $apiResponse = new ApiResponse(200, true);

        } catch (ApiException $ex) {
            $apiResponse = new ApiResponse($ex->getCode(), $ex->getMessage());
        }

        return $this->respond($apiResponse, $response);
    }
}