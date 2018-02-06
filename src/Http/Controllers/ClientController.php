<?php
declare(strict_types=1);

namespace Trancended\ClientProduct\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Trancended\ClientProduct\Http\Requests;
use Trancended\ClientProduct\Exceptions\EmptyDataException;

class ClientController extends Controller
{
    /**
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @return string
     */
    protected function performRequest(string $method, string $path, array $parameters = []): string
    {
        $client = new Client();
        $url = config('client_product.server_url') . $path;
        $response = $client->request($method, $url, $parameters);

        return $response->getBody()->getContents();
    }

    /**
     * @param string $url
     * @return mixed
     * @throws EmptyDataException
     */
    protected function performGetRequest(string $url)
    {
        $contents =  $this->performRequest('GET', $url);

        $decodedContents = json_decode($contents, true);

        $data = $decodedContents['data'];

        if (sizeof($data) > 0) {
            return $data;
        }

        throw new EmptyDataException("The {$url} return an empty collection");
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return array
     */
    protected function performPostRequest(string $url, array $parameters = [])
    {
        $contents =  $this->performRequest('POST', $url, ['form_params' => $parameters]);

        $decodedContents = json_decode($contents, true);

        return $decodedContents['data'];
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return array
     */
    protected function performPutRequest(string $url, array $parameters = [])
    {
        $contents =  $this->performRequest('PUT', $url, ['form_params' => $parameters]);

        $decodedContents = json_decode($contents, true);

        return $decodedContents['data'];
    }

    /**
     * @param string $url
     * @param array $parameters
     * @return array
     */
    protected function performDeleteRequest(string $url, array $parameters = [])
    {
        $contents =  $this->performRequest('DELETE', $url, $parameters);

        $decodedContents = json_decode($contents, true);

        return $decodedContents['data'];
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws EmptyDataException
     */
    protected function obtainAllProducts(array $parameters = [])
    {
        return $this->performGetRequest(config('client_product.endpoint_path').
            ($parameters ? '?'.http_build_query($parameters) : ''));
    }

    /**
     * @param int $productId
     * @return mixed
     * @throws EmptyDataException
     */
    protected function obtainOneProduct(int $productId)
    {
        return $this->performGetRequest(config('client_product.endpoint_path')."/{$productId}");
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function createOneProduct(array $parameters)
    {
        return $this->performPostRequest(config('client_product.endpoint_path'), $parameters);
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function updateOneProduct(array $parameters)
    {
        $productId = $parameters['id'];
        return $this->performPutRequest(config('client_product.endpoint_path')."/{$productId}", $parameters);
    }

    /**
     * @param array $parameters
     * @return array
     */
    protected function removeOneProduct(array $parameters)
    {
        $productId = $parameters['id'];
        return $this->performDeleteRequest(config('client_product.endpoint_path')."/{$productId}");
    }
}
