import { http } from "./http_services";

export function inicialesMigrantes($data) {
    return http().post('/informes/migrantes', $data);
}
