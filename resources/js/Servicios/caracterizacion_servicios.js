import { http } from "./http_services";

export function listarCaracterizacion($data) {
    return http().post('/caracterizacion', $data);
}

export function nuevaCaracterizacion($data) {
    return http().post('/caracterizacion/nuevo', $data);
}

export function guardar($data) {
    return http().post('/caracterizacion/guardar', $data);
}

export function validar($data) {
    return http().post('/caracterizacion/validar', $data);
}

export function eliminarCaracterizacion($data) {
    return http().post('/caracterizacion/eliminar', $data);
}

export function exportarCaracterizacion($data) {
    return http().post('/caracterizacion/exportar', $data);
}

export function exportarCaracterizacion2($data) {
    return http().post('/caracterizacion/exportar2', $data);
}

export function validarJefe($data) {
    return http().post('/caracterizacion/validarJefe', $data);
}

export function actualizar($data) {
    return http().post('/caracterizacion/actualizar', $data);
}

export function editarCaracterizacion($data) {
    return http().post('/caracterizacion/editar', $data);
}

export function eliminar($data) {
    return http().post('/caracterizacion/eliminar', $data);
}

export function controlesRA($data) {
    return http().post('/caracterizacion/controlesRA', $data);
}