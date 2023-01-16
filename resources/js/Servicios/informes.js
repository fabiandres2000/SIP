import { http } from "./http_services";

export function inicialesMigrantes($data) {
    return http().post('/informes/migrantes', $data);
}

export function poblacion_no_asegurada() {
    return http().post('/informes/poblacion-no-asegurada');
}

export function determinante_salud() {
    return http().post('/informes/determinante-salud');
}