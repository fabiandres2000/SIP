import { http } from "./http_services";

export function listarOcupaciones($data) {
    return http().post('/ocupaciones', $data);
}
export function guardarOcupaciones($data) {
    return http().post('/ocupaciones/guardar', $data);
}
export function eliminarOcupaciones($data) {
    return http().post('/ocupaciones/eliminar', $data);
}