import { http } from "./http_services";

export function listar($data) {
  return http().post('/unidades', $data);
}
export function nuevo($data) {
  return http().post('/unidades/nuevo', $data);
}
export function guardar($data) {
  return http().post('/unidades/guardar', $data);
}
export function eliminar($data) {
  return http().post('/unidades/eliminar', $data);
}
export function combo($data) {
  return http().post('/unidades/combo', $data);
}
export function editar($data) {
  return http().post('/unidades/editar', $data);
}
