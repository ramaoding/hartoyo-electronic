<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    public $message;
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function __construct($message, $resource)
    {
        parent::__construct($resource);
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
