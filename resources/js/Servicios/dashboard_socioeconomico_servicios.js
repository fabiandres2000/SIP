import { http } from "./http_services";

export function listarEstadisticaPersonas($tipo, $id) {
    return http().get('/socioeconomico/por-persona?tipo='+$tipo+'&id='+$id);
}