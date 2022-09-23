import { http } from "./http_services";

export function poblacion($tipo, $id, $rangoEdad) {
    return http().get('/dashboard-riesgos-salud/poblacion?tipo='+$tipo+'&id='+$id+'&rango='+$rangoEdad);
}

export function exportarRiesgoSalud($data) {
    return http().post('/dashboard-riesgos-salud/exportar-rs-dashboard', $data);
}