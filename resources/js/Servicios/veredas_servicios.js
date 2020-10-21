import { http } from "./http_services";

export function listarVeredas($data) {
    return http().post('/veredas', $data);
}
export function guardarVeredas($data) {
    return http().post('/veredas/guardar', $data);
}
export function eliminarVeredas($data) {
    return http().post('/veredas/eliminar', $data);
}