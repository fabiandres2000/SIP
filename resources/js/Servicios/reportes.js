import {http} from "./http_services";

export function gestantes($data) {
    return http().post('/reportes/gestantes', $data);
}

export function exportarGestantes($data) {
    return http().post('/reportes/exportarGestantes', $data);
}

export function nutricional($data) {
    return http().post('/reportes/nutricional', $data);
}

export function exportarNutricional($data) {
    return http().post('/reportes/exportarNutricional', $data);
}

export function inicialesCronicas($data) {
    return http().post('/reportes/cronicas', $data);
}

export function cronicasPDF($data) {
    return http().post('/reportes/cronicaspdf', $data);
}

export function inicialesMigrantes($data) {
    return http().post('/reportes/migrantes', $data);
}

export function migrantesPDF($data) {
    return http().post('/reportes/migrantespdf', $data);
}
