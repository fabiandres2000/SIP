import Vue from 'vue';
import Router from 'vue-router';

import Administracion from './Vistas/Administracion.vue';

Vue.use(Router);

export const routes = [
      {
            path: '/',
            name: 'Administracion',
            component: Administracion
      },
      {
            path: '/barrios',
            name: 'Barrios',
            component: () => import('./Vistas/Barrios/Barrios.vue')
      },
      {
            path: '/veredas',
            name: 'Veredas',
            component: () => import('./Vistas/Veredas/Veredas.vue')
      },
      {
            path: '/usuarios',
            name: 'Usuarios',
            component: () => import('./Vistas/Usuarios/Usuarios.vue')
      },
      {
            path: '/corregimientos',
            name: 'Corregimientos',
            component: () => import('./Vistas/Corregimientos/Corregimientos.vue')
      },
      {
            path: '/etnias',
            name: 'Etnias',
            component: () => import('./Vistas/Etnias/Etnias.vue')
      },
      {
            path: '/ocupaciones',
            name: 'Ocupaciones',
            component: () => import('./Vistas/Ocupaciones/Ocupaciones.vue')
      },
      {
            path: '/parentescos',
            name: 'Parentescos',
            component: () => import('./Vistas/Parentescos/Parentescos.vue')
      }
      ,
      {
            path: '/estadocivil',
            name: 'Estadocivil',
            component: () => import('./Vistas/Estadocivil/Estadocivil.vue')
      },
      {
            path: '/escolaridad',
            name: 'Escolaridad',
            component: () => import('./Vistas/Escolaridad/Escolaridad.vue')
      },
      {
            path: '/gestion',
            name: 'Gestion',
            component: () => import('./Vistas/Caracterizacion/Gestion.vue')
      },
      {
            path: '/ingreso',
            name: 'Ingreso',
            component: () => import('./Vistas/Caracterizacion/Ingreso.vue')
      },
      {
            path: '/editarIngreso',
            name: 'Editar',
            component: () => import('./Vistas/Caracterizacion/Editar.vue')
      },
      {
            path: '/morbilidad_nacer',
            name: 'Morbilidad_Nacer',
            component: () => import('./Vistas/Morbilidad/MorbilidadNacer.vue')
      },
      {
            path: '/morbilidad',
            name: 'Morbilidad',
            component: () => import('./Vistas/Morbilidad/Morbilidad.vue')
      },
      {
            path: '/metodos',
            name: 'Metodos',
            component: () => import('./Vistas/Metodos/Metodos.vue')
      },
      {
            path: '/motivos',
            name: 'Motivos',
            component: () => import('./Vistas/Motivos/Motivos.vue')
      },
      {
            path: '/grupos',
            name: 'Grupos',
            component: () => import('./Vistas/Grupos/Grupos.vue')
      },
      {
            path: '/enfermedadesCro',
            name: 'EnfermedadesCro',
            component: () => import('./Vistas/Enfermedades/EnfermedadesCro.vue')
      },
      {
            path: '/enfermedadesInf',
            name: 'EnfermedadesInf',
            component: () => import('./Vistas/Enfermedades/EnfermedadesInf.vue')
      },
      {
            path: '/religion',
            name: 'Religion',
            component: () => import('./Vistas/Religion/Religion.vue')
      },
      {
            path: '/colegios',
            name: 'Colegios',
            component: () => import('./Vistas/Colegios/Colegios.vue')
      },
      {
            path: '/ayu',
            name: 'Ayu',
            component: () => import('./Vistas/Caracterizacion/ayu.vue')
      },
      {
            path: '/actividad',
            name: 'Actividad',
            component: () => import('./Vistas/Actividad/Actividad.vue')
      },
      {
            path: '/establecimientos',
            name: 'Establecimientos',
            component: () => import('./Vistas/Establecimientos/Establecimientos.vue')
      },
      {
            path: '/establecimientos/editar',
            name: 'EditarEstablecimientos',
            component: () => import('./Vistas/Establecimientos/Editar.vue')
      },
      {
            path: '/unidades',
            name: 'Unidades',
            component: () => import('./Vistas/Unidades/Unidades.vue')
      },
      {
            path: '/unidades/editar',
            name: 'EditarUnidades',
            component: () => import('./Vistas/Unidades/Editar.vue')
      }

];

const router = new Router({
      routes: routes
});
export default router;