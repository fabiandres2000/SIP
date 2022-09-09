import { http } from "./http_services";

export function listarEstadisticaPersonas($tipo, $id) {
    return http().get('/socioeconomico/por-persona?tipo='+$tipo+'&id='+$id+'&consulta=1');
}

export function listarEstadisticaNinios($tipo, $id) {
    return http().get('/socioeconomico/por-persona?tipo='+$tipo+'&id='+$id+'&consulta=2');
}

export function desempleo($tipo, $id) {
    return http().get('/socioeconomico/desempleo?tipo='+$tipo+'&id='+$id);
}

export function mercadoLaboral() {
    return http().get('/socioeconomico/mercado-laboral');
}

export function exportarAnalfabetas($data) {
    return http().post('/socioeconomico/exportar-analfabetas', $data);
}