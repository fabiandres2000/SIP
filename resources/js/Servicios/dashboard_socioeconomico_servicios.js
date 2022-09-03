import { http } from "./http_services";

export function listarEstadisticaPersonas($tipo, $id) {
    return http().get('/socioeconomico/por-persona?tipo='+$tipo+'&id='+$id+'&consulta=1');
}

export function listarEstadisticaNinios($tipo, $id) {
    return http().get('/socioeconomico/por-persona?tipo='+$tipo+'&id='+$id+'&consulta=2');
}