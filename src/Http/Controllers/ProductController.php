<?php
declare(strict_types=1);

namespace Trancended\ClientProduct\Http\Controllers;

use Illuminate\Http\Request;
use Trancended\ClientProduct\Http\Requests;

class ProductController extends ClientController
{
    private const STATUS_UNAVAILABLE = 0;
    private const STATUS_AVAILABLE = 1;

    /**
     * @var array
     */
    private static $status = [
        self::STATUS_UNAVAILABLE,
        self::STATUS_AVAILABLE,
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllProducts(Request $request)
    {
        $params = [];
        if (in_array($request->get('status'), self::$status)) {
            $params['status'] = (int)$request->get('status');
        }
        if ($request->get('morethan')) {
            $params['morethan'] = (int)$request->get('morethan');
        }
        $products = $this->obtainAllProducts($params);

        return view('trancended-clientproduct::products.all-products', ['products' => $products]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInputProduct()
    {
        return view('trancended-clientproduct::products.input-product');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postOneProduct(Request $request)
    {
        $this->validate($request, ['productId' => 'required|numeric']);

        $productId = (int)$request->get('productId');
        $product = $this->obtainOneProduct($productId);

        return view('trancended-clientproduct::products.one-product', ['product' => $product]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreateProduct()
    {
        return view('trancended-clientproduct::products.create-product');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateProduct(Request $request)
    {
        $message = $this->createOneProduct($request->all());

        return redirect(config('client_product.endpoint_path'))->with('success', $message);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdateProduct()
    {
        $products = $this->obtainAllProducts();
        return view('trancended-clientproduct::products.select-product', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postUpdateProduct(Request $request)
    {
        $productId = (int)$request->get('productId');

        $product = $this->obtainOneProduct($productId);

        return view('trancended-clientproduct::products.update-product', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function putUpdateProduct(Request $request)
    {
        $message = $this->updateOneProduct($request->all());

        return redirect(config('client_product.endpoint_path'))->with('success', $message);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRemoveProduct()
    {
        $products = $this->obtainAllProducts();
        return view('trancended-clientproduct::products.select-remove-product', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postRemoveProduct(Request $request)
    {
        $productId = (int)$request->get('productId');

        $product = $this->obtainOneProduct($productId);

        return view('trancended-clientproduct::products.confirm-remove-product', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRemoveProduct(Request $request)
    {
        $message = $this->removeOneProduct($request->all());

        return redirect(config('client_product.endpoint_path'))->with('success', $message);
    }
}
