<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Http;

trait VooTrait
{
    /**
     * Organizar os vôos por tarifa (FATE) e sub dividí-los por ida (OUTBOUND) e volta (INBOUND)
     * @param array $voos
     * @param string $ordernarPor
     * @return array
     */
    public static function agruparPorTarifa(array $voos)
    {
        $grupos = [];
        foreach ($voos as $key => $voo) {
            $tipo = $voo['outbound'] === 1 ? 'ida' : 'volta';
            $grupos[$voo['fare']][$tipo][$voo['price']][] = $voo;
        }
        return $grupos;
    }
    /**
     * Organizar os vôos por tarifa (FATE) e sub dividí-los por ida (OUTBOUND) e volta (INBOUND)
     * @param array $voos
     * @param string $ordernarPor
     * @return array
     */
    public static function formatarVoos(array $gruposPorTarifa)
    {
        $gruposFormatados = [];
        $id = 1;


        foreach ($gruposPorTarifa as $key => $tarifa) {
            foreach ($tarifa['ida'] as $precoIda => $grupoIda) {
                foreach ($tarifa['volta'] as $precoVolta => $grupoVolta) {
                    $gruposFormatados[] = self::gerarGrupoFormatado($grupoIda, $precoIda, $grupoVolta, $precoVolta, $id++);
                }
            }
        }
        $grupos = self::ordenarCrescente($gruposFormatados, 'totalPrice');
        return $grupos;
    }

    /**
     * Receber dados da IDA e da VOLTA de uma única tarifa e estruturar grupo
     * @param array $grupoIda
     * @param float $precoIda
     * @param array $grupoVolta
     * @param float $precoVolta
     * @param int $precoVolta
     * @param string $ordernarPor
     * @return array
     */
    private static function gerarGrupoFormatado($grupoIda, $precoIda, $grupoVolta, $precoVolta, $id)
    {
        return [
            'uniqueId' => $id,
            'totalPrice' => $precoVolta + $precoIda,
            'outbound' => $grupoIda,
            'inbound' => $grupoVolta,
        ];
    }

    /**
     * Ordernar array do menor para o maior de acordo com o parâmetro fornecido
     * @param array $array
     * @param string $ordernarPor
     * @return array
     */
    private static function ordenarCrescente($array, $ordernarPor)
    {
        usort($array, function ($item1, $item2) use ($ordernarPor) {
            return $item1[$ordernarPor] <=> $item2[$ordernarPor];
        });

        return $array;
    }
}
