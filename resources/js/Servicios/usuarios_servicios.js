import { http } from "./http_services";

export function loginUsuario(data) {
    return http().post('/login', data);
}
export function listarUsuarios($data) {
    return http().post('/usuarios', $data);
}
export function guardarUsuarios($data) {
    return http().post('/usuarios/guardar', $data);
}
export function eliminarUsuarios($data) {
    return http().post('/usuarios/eliminar', $data);
}

export function editarUsuarios($data) {
    return http().post('/usuarios/modificar', $data);
}

export function salir($data) {
    return http().post('/logout', $data);
}
export function iniciar($data) {
    return http().post('/usuarios/iniciar', $data);
}