<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndicacaoCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email' => $this->email,            
            'status_id' => $this->status_id,            
        ];
    }
}
