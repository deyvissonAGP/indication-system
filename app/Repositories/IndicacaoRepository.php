<?php


namespace App\Repositories;

use App\Models\Indicacao;
use App\Models\Status;
use App\Http\Resources\IndicacaoCollection;

class IndicacaoRepository
{
    /**
     * @var Indicacao
     */
    protected $indicacao;

    /**
     * Construtor IndicacaoRepository.
     *
     * @param Indicacao $indicacao
     */
    public function __construct(Indicacao $indicacao)
    {
        $this->indicacao = $indicacao;
    }

    /**
     * Listar todas as indicacoes.
     *
     * @return Indicacao $indicacao
     */
    public function getAll()
    {
        return IndicacaoCollection::collection($this->indicacao->all());
    }

    /**
     * Listar indicacao por id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return new IndicacaoCollection($this->indicacao->find($id));
    }

    /**
     * Salvar Indicacao
     *
     * @param $data
     * @return Indicacao
     */
    public function save($data)
    {
        $indicacao = new $this->indicacao;

        $indicacao->nome = $data['nome'];
        $indicacao->cpf = $data['cpf'];
        $indicacao->telefone = $data['telefone'];
        $indicacao->email = $data['email'];
        $indicacao->status_id = Status::INICIADA;
        $indicacao->save();

        return new IndicacaoCollection($indicacao->fresh());
    }

    /**
     * Editar Indicacao
     *
     * @param $data
     * @return Indicacao
     */
    public function update($data, $id)
    {

        $indicacao = $this->indicacao->find($id);

        $indicacao->nome = $data['nome'];
        $indicacao->cpf = $data['cpf'];
        $indicacao->telefone = $data['telefone'];
        $indicacao->email = $data['email'];
        $indicacao->status_id = 2;

        $indicacao->update();

        return new IndicacaoCollection($indicacao->fresh());
    }

    /**
     * Deletar Indicacao
     *
     * @param $data
     * @return Indicacao
     */
    public function delete($id)
    {

        $indicacao = $this->indicacao->findOrFail($id);
        $indicacao->delete();

        return new IndicacaoCollection($indicacao);
    }
}