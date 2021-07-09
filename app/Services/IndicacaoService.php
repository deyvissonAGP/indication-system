<?php


namespace App\Services;

use App\Repositories\IndicacaoRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use App\Rules\IndicacaoUnique;

class IndicacaoService
{
    /**
     * @var $indicacaoRepository
     */
    protected $indicacaoRepository;

    /**
     * Construtor indicacaoRepository.
     *
     * @param IndicacaoRepository $indicacaoRepository
     */
    public function __construct(IndicacaoRepository $indicacaoRepository)
    {
        $this->indicacaoRepository = $indicacaoRepository;
    }

    /**
     * Deletar indicacao por id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->indicacaoRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível deletar esta indicacao');
        }

        DB::commit();

        return $result;

    }

    /**
     * Listar todas as indicacoes.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->indicacaoRepository->getAll();
    }

    /**
     * Listar indicacao por id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->indicacaoRepository->getById($id);
    }

    /**
     * Editar dados da indicacao
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function updateIndicacao($data, $id)
    {
        $validator = Validator::make($data, [
            'nome' => [
                'required',
                'min:5',
                'string',
                new IndicacaoUnique('indicacoes', $id),
            ],
            'cpf' => [
                'required',
                'numeric',
                new IndicacaoUnique('indicacoes', $id),
            ],
            'telefone' => [
                new IndicacaoUnique('indicacoes', $id),
            ],
            'email' => [
                new IndicacaoUnique('indicacoes', $id),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $result = $this->indicacaoRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível atualizar os dados da indicação');
        }

        DB::commit();

        return $result;

    }

    /**
     * Validar dados da indicacao.
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function saveIndicacao($data)
    {
        $validator = Validator::make($data, [
            'nome' => [
                'required',
                'min:5',
                'string',
                new IndicacaoUnique('indicacoes'),
            ],
            'cpf' => [
                'required',
                'numeric',
                new IndicacaoUnique('indicacoes'),
            ],
            'telefone' => [
                new IndicacaoUnique('indicacoes'),
            ],
            'email' => [
                new IndicacaoUnique('indicacoes'),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->indicacaoRepository->save($data);

        return $result;
    }
}
