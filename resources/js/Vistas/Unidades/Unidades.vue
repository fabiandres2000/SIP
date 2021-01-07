<template>
  <div>
    <div class="kt-portlet" style="margin-top: -4%;">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            <span class="kt-widget20__number kt-font-danger">GESTIÓN DE UNIDADES PRODUCTIVAS</span>
          </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <a href="#" class="btn btn-danger kt-margin-r-10" @click.prevent="volver">
            <i class="la la-arrow-left"></i>
            <span class="kt-hidden-mobile">Volver</span>
          </a>
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-brand"
              @click.prevent="guardar"
              :disabled="!valG"
              :class="spinG"
            >
              <i class="la la-edit"></i>
              <span class="kt-hidden-mobile">Guardar</span>
            </button>
          </div>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-section">
          <div class="kt-section__content">
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Departamento (*):</label>
                <b-form-select
                  v-model.trim="datos.id_dpto"
                  :class="datos.id_dpto==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('dpto')"
                  ref="id_dpto"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in dpto_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_dpto!=''">Departamento Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_dpto==''">El departamento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Municipio (*):</label>
                <b-form-select
                  v-model.trim="datos.id_mun"
                  :class="datos.id_mun==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('muni')"
                  ref="id_mun"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in muni_options[datos.id_dpto]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_mun!=''">Municipio Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_mun==''">El municipio es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Corregimiento:</label>
                <b-form-select
                  v-model="datos.id_corre"
                  @change="cambiarCombo('corregi')"
                  :class="datos.id_corre==''?'is-invalid':'is-valid'"
                  ref="id_corre"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in corregi_options[datos.id_mun]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_corre!=''">Corregimiento Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.id_corre==''">El corregimiento es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Vereda:</label>
                <b-form-select
                  v-model="datos.id_vereda"
                  :class="datos.id_vereda==''?'is-invalid':'is-valid'"
                  @change="cambiarCombo('vereda')"
                  ref="id_vereda"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in vereda_options[datos.id_corre]"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_vereda!=''">Vereda Valida</div>
              </div>
              <div class="col-lg-4">
                <label>Barrio:</label>
                <b-form-select
                  v-model="datos.id_barrio"
                  :class="datos.id_barrio==''?'is-invalid':'is-valid'"
                  ref="id_barrio"
                >
                  <option value selected>Seleccione</option>
                  <option value="0">No Aplica</option>
                  <option
                    v-for="item in barrio_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.id_barrio!=''">Barrio Valido</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Dirección:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Dirección"
                  v-model.trim="datos.direccion"
                  :class="datos.direccion==''?'is-invalid':'is-valid'"
                  ref="direccion"
                />
                <div class="valid-feedback" v-if="datos.direccion!=''">La Dirección es Valida</div>
                <div class="invalid-feedback">
                  <span v-if="datos.direccion==''">La dirección es obligatoria</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tipo de Documento (*):</label>
                <b-form-select
                  v-model.trim="datos.tipo_id"
                  :class="datos.tipo_id==''?'is-invalid':'is-valid'"
                  @change="formato('tipoid')"
                  ref="tipo_id"
                >
                  <option value selected>Seleccione</option>
                  <option value="CC">CEDULA DE CIUDADANIA</option>
                  <option value="PA">PASAPORTE</option>
                  <option value="RC">REGISTRO CIVIL</option>
                  <option value="TI">TARJETA DE IDENTIDAD</option>
                  <option value="ASI">ADULTO SIN IDENTIFICACIÓN</option>
                  <option value="MSI">MENOR SIN IDENTIFICACIÓN</option>
                  <option value="CE">CEDULA DE EXTRANJERIA</option>
                </b-form-select>
                <div class="valid-feedback" v-if="datos.tipo_id!=''">Tipo de Documento es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.tipo_id==''">Tipo de Documento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Documento (*):</label>
                <input
                  type="text"
                  ref="identificacion"
                  class="form-control text-capitalize"
                  placeholder="Documento"
                  @change="formato('id1')"
                  v-model.trim="datos.identificacion"
                  :class="datos.identificacion==''?'is-invalid':'is-valid'"
                />
                <div class="valid-feedback" v-if="datos.identificacion!=''">Documento es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.identificacion==''">Documento es obligatorio</span>
                </div>
              </div>
              <div class="col-lg-4">
                <label>Nivel Educativo:</label>
                <b-form-select
                  v-model="datos.nivel_educativo"
                  :class="datos.nivel_educativo==''?'is-invalid':'is-valid'"
                >
                  <option value selected>Seleccione</option>
                  <option
                    v-for="item in escolaridad_options"
                    :value="item.value"
                    :key="item.value"
                  >{{item.texto}}</option>
                </b-form-select>
                <div
                  class="valid-feedback"
                  v-if="datos.nivel_educativo!=''"
                >Nivel Educativo es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nivel_educativo==''">Nivel Educativo es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Productor:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Productor"
                  v-model.trim="datos.nom_productor"
                  :class="datos.nom_productor==''?'is-invalid':'is-valid'"
                  ref="nom_productor"
                />
                <div class="valid-feedback" v-if="datos.nom_productor!=''">Productor es Valido</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nom_productor==''">Productor es obligatorio</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Nombre de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la Finca"
                  v-model.trim="datos.nom_finca"
                  :class="datos.nom_finca==''?'is-invalid':'is-valid'"
                  ref="nom_finca"
                />
                <div class="valid-feedback" v-if="datos.nom_finca!=''">Nombre de la Finca es Valida</div>
                <div class="invalid-feedback">
                  <span v-if="datos.nom_finca==''">Nombre de la Finca es obligatoria</span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Hogares en la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Hogares en la Finca"
                  v-model.trim="datos.hogares_finca"
                  :class="datos.hogares_finca==''?'':'is-valid'"
                  ref="hogares_finca"
                  @change="formato('hogares_finca')"
                />
              </div>
              <div class="col-lg-6">
                <label>Línea productiva:</label>
                <b-form-select
                  v-model="datos.linea_productiva"
                  :class="datos.linea_productiva==''?'':'is-valid'"
                  ref="linea_productiva"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Cultivos agrícolas.</option>
                  <option value="2">Pecuarias - especie animal con perspectiva comercial.</option>
                  <option value="3">Cultivos forestales con perspectiva comercial.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Area de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Area de la Finca"
                  v-model.trim="datos.area_total_finca"
                  :class="datos.area_total_finca==''?'':'is-valid'"
                  ref="area_total_finca"
                  @change="formato('area_total_finca')"
                />
              </div>
              <div class="col-lg-3">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area"
                  :class="datos.unidad_area==''?'':'is-valid'"
                  ref="unidad_area"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Distancia de la Finca:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Distancia de la Finca"
                  v-model.trim="datos.distancia_finca"
                  :class="datos.distancia_finca==''?'':'is-valid'"
                  ref="distancia_finca"
                  @change="formato('distancia_finca')"
                />
              </div>
              <div class="col-lg-3">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_distancia"
                  :class="datos.unidad_distancia==''?'':'is-valid'"
                  ref="unidad_distancia"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetros.</option>
                  <option value="2">Metros.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Tenencia de la Propiedad:</label>
                <b-form-select
                  v-model="datos.tenencia_propiedad"
                  :class="datos.tenencia_propiedad==''?'':'is-valid'"
                  ref="tenencia_propiedad"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Arrendamiento.</option>
                  <option value="2">Propio.</option>
                  <option value="3">Aparecería.</option>
                  <option value="4">Comodato.</option>
                  <option value="5">Usufructo.</option>
                  <option value="6">Propietario sin título.</option>
                  <option value="7">Propietarios con Titulo.</option>
                  <option value="8">Anticresis.</option>
                  <option value="9">Tenedor.</option>
                  <option value="10">Adjudicaría o común.</option>
                  <option value="11">Empeño.</option>
                  <option value="12">Ocupación de hecho.</option>
                  <option value="13">Posesión.</option>
                  <option value="14">Propiedad Colectiva.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Quien Atiende la Entrevista:</label>
                <b-form-select
                  v-model="datos.atiende_entrevista"
                  :class="datos.atiende_entrevista==''?'':'is-valid'"
                  ref="atiende_entrevista"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Pariente.</option>
                  <option value="2">Producto.</option>
                  <option value="3">Trabajador.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>¿Posee crédito de producción?:</label>
                <b-form-select
                  v-model="datos.credito_produccion"
                  :class="datos.credito_produccion==''?'':'is-valid'"
                  ref="credito_produccion"
                  @change="mostrarOtro('CP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI.</option>
                  <option value="NO">NO.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3" v-show="mOCP">
                <label>Fuentes del préstamo:</label>
                <b-form-select
                  v-model="datos.fuentes_prestamo"
                  :class="datos.fuentes_prestamo==''?'':'is-valid'"
                  ref="fuentes_prestamo"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Bancos</option>
                  <option value="2">Entidades Estatales</option>
                  <option value="3">Familiares</option>
                  <option value="4">Agremiaciones</option>
                  <option value="5">Prestamistas</option>
                  <option value="6">Empresas de insumos</option>
                  <option value="7">Otra</option>
                  <option value="NA">No Aplica</option>
                </b-form-select>
              </div>
            </div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">MAQUINARIA Y EQUIPOS</span>
            </p>
            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Herramientas de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Herramienta:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Herramienta"
                  v-model="herramienta"
                />
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasHerramienta"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarHerramienta"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Herramientas</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in herramientasData" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.herramienta}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemHerramientas(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->

                  <!--end: Section-->
                </div>
              </div>
            </div>

            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Utensilios de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Utensilio:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Utensilio"
                  v-model="utensilio"
                />
              </div>
              <div class="col-lg-2">
                <label>Cuantos:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantos"
                  v-model="cuantasUtensilio"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarUtensilio"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Utensilios</th>
                        <th>Cuantos</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in utensiliosData" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.utensilio}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemUtensilios(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->

                  <!--end: Section-->
                </div>
              </div>
            </div>

            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Maquinaria de la Producción</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Maquina:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Maquina"
                  v-model="maquina"
                />
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasMaquina"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarMaquina"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Maquinas</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in maquinasData" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.maquina}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemMaquinas(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->

                  <!--end: Section-->
                </div>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">INSTALACIONES</span>
            </p>
            <p>
              <span class="kt-font-boldest" style="font-size: 18px;">Instalaciones del Predio</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Instalación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Instalación"
                  v-model="instalacion"
                />
              </div>
              <div class="col-lg-2">
                <label>Cuantas:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantas"
                  v-model="cuantasInstalacion"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarInstalacion"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Instalaciones</th>
                        <th>Cuantas</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in instalacionesData" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.instalacion}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemInstalacion(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->

                  <!--end: Section-->
                </div>
              </div>
            </div>

            <div class="kt-separator kt-separator--border-dashed"></div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>¿El predio dispone de Vías de acceso?:</label>
                <b-form-select
                  v-model="datos.vias_acceso"
                  :class="datos.vias_acceso==''?'':'is-valid'"
                  ref="vias_acceso"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Tipo de vías de acceso:</label>
                <b-form-select
                  v-model="datos.tipos_vias_acceso"
                  :class="datos.tipos_vias_acceso==''?'':'is-valid'"
                  ref="tipos_vias_acceso"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Pavimentadas.</option>
                  <option value="2">No pavimentadas.</option>
                  <option value="3">Fluviales.</option>
                  <option value="4">Aéreas.</option>
                </b-form-select>
              </div>
            </div>

            <p>
              <span
                class="kt-font-boldest"
                style="font-size: 18px;"
              >Medios de transporte con los que el productor se moviliza y/o transporta sus productos e insumos</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Medio de Transporte:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Medio de Transporte"
                  v-model="medio"
                />
              </div>
              <div class="col-lg-2">
                <label>Cuantos:</label>
                <input
                  type="number"
                  min="1"
                  class="form-control text-capitalize"
                  placeholder="Cuantos"
                  v-model="cuantasMedio"
                />
              </div>
              <div class="col-lg-1">
                <br />
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a
                  href="javascript:;"
                  class="btn btn-outline-info btn-icon"
                  data-skin="dark"
                  data-toggle="kt-tooltip"
                  data-placement="top"
                  title="Agregar"
                  @click.prevent="agregarMedio"
                >
                  <i class="fa fa-plus"></i>
                </a>&nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-sm table-hover">
                    <thead class>
                      <tr class="kt-bg-fill-brand">
                        <th>No.</th>
                        <th>Medio</th>
                        <th>Cuantos</th>
                        <td class="text-center">Opciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) in mediosData" :key="index">
                        <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.medio}}</span>
                        </td>
                        <td
                          style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                        >
                          <span class="text-capitalize">{{item.cuantos}}</span>
                        </td>
                        <td style="text-align:center;vertical-align: middle;text-align: center;">
                          <button
                            class="btn btn-icon btn-sm btn-outline-danger"
                            type="button"
                            title="Eliminar"
                            @click="eliminarItemMedio(index)"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                  <!--begin: Section-->

                  <!--end: Section-->
                </div>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span class="kt-font-boldest" style="font-size: 20px;">CULTIVOS AGRÍCOLAS.</span>
            </p>

            <div class="form-group row">
              <div class="col-lg-3">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datos.importancias_agricolas"
                  :class="datos.importancias_agricolas==''?'':'is-valid'"
                  ref="importancias_agricolas"
                  @change="formato('importancias_agricolas')"
                />
              </div>
              <div class="col-lg-3">
                <label>Area de Producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Area de Producción"
                  v-model.trim="datos.area_produccion"
                  :class="datos.area_produccion==''?'':'is-valid'"
                  ref="area_produccion"
                  @change="formato('area_produccion')"
                />
              </div>
              <div class="col-lg-3">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area_produccion"
                  :class="datos.unidad_area_produccion==''?'':'is-valid'"
                  ref="unidad_area_produccion"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Producto:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producto"
                  v-model.trim="datos.producto"
                  :class="datos.producto==''?'':'is-valid'"
                  ref="producto"
                />
              </div>
              <div class="col-lg-6">
                <label>Variedad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Variedad"
                  v-model.trim="datos.variedad"
                  :class="datos.variedad==''?'':'is-valid'"
                  ref="variedad"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Semilla:</label>
                <b-form-select
                  v-model="datos.semilla"
                  :class="datos.semilla==''?'':'is-valid'"
                  ref="semilla"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Certificada.</option>
                  <option value="2">No Certificada.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datos.pertenece"
                  :class="datos.pertenece==''?'':'is-valid'"
                  ref="pertenece"
                  @change="mostrarOtro('P')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Asociaciones.</option>
                  <option value="2">Cooperativas.</option>
                  <option value="3">Agremiaciones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-show="mOP">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datos.tipo_pertenece"
                  :class="datos.tipo_pertenece==''?'':'is-valid'"
                  ref="tipo_pertenece"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Político.</option>
                  <option value="2">Social.</option>
                  <option value="3">Tecnológico.</option>
                  <option value="4">Asistencial.</option>
                  <option value="5">Salud.</option>
                  <option value="6">Comercial.</option>
                  <option value="7">Etnia.</option>
                  <option value="8">Cultural.</option>
                  <option value="9">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8" v-show="mOP">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datos.nombre_organizacion"
                  :class="datos.nombre_organizacion==''?'':'is-valid'"
                  ref="nombre_organizacion"
                />
              </div>
              <div class="col-lg-5" v-show="mOP==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datos.no_pertenece"
                  :class="datos.no_pertenece==''?'':'is-valid'"
                  ref="no_pertenece"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Desconocimiento.</option>
                  <option value="2">Falta de interés.</option>
                  <option value="3">Falta de tiempo.</option>
                  <option value="4">Falta de oportunidad.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datos.beneficios"
                  :class="datos.beneficios==''?'':'is-valid'"
                  ref="beneficios"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Económico.</option>
                  <option value="2">En especies.</option>
                  <option value="3">Capacitación.</option>
                  <option value="4">Recreación y deporte.</option>
                  <option value="5">Reconocimiento de la comunidad.</option>
                  <option value="6">Participación en la toma de decisiones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datos.trabaja_asociacion"
                  :class="datos.trabaja_asociacion==''?'':'is-valid'"
                  ref="trabaja_asociacion"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Para cada uno de los productos que tan frecuente se hace la cosecha :</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Para cada uno de los productos que tan frecuente se hace la cosecha"
                  v-model.trim="datos.frecuente_cosecha"
                  :class="datos.frecuente_cosecha==''?'':'is-valid'"
                  ref="frecuente_cosecha"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Área de Cosecha de cada uno de los productos:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área de Cosecha de cada uno de los productos"
                  v-model.trim="datos.area_cosecha"
                  :class="datos.area_cosecha==''?'':'is-valid'"
                  ref="area_cosecha"
                  @change="formato('area_cosecha')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area_cosecha"
                  :class="datos.unidad_area_cosecha==''?'':'is-valid'"
                  ref="unidad_area_cosecha"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Costo total de la producción en pesos.:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total de la producción en pesos."
                  v-model.trim="datos.costo_produccion"
                  :class="datos.costo_produccion==''?'':'is-valid'"
                  ref="costo_produccion"
                  @change="formato('costo_produccion')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Costo de establecimiento de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de establecimiento de la producción"
                  v-model.trim="datos.costo_establecimiento"
                  :class="datos.costo_establecimiento==''?'':'is-valid'"
                  ref="costo_establecimiento"
                  @change="formato('costo_establecimiento')"
                />
              </div>
              <div class="col-lg-6">
                <label>Costo de sostenimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de sostenimiento"
                  v-model.trim="datos.costo_sostenimiento"
                  :class="datos.costo_sostenimiento==''?'':'is-valid'"
                  ref="costo_sostenimiento"
                  @change="formato('costo_sostenimiento')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datos.produccion_destinada"
                  :class="datos.produccion_destinada==''?'':'is-valid'"
                  ref="produccion_destinada"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Tipo de problema que enfrenta en su producción:</label>
                <b-form-select
                  v-model="datos.tipo_problema"
                  :class="datos.tipo_problema==''?'':'is-valid'"
                  ref="tipo_problema"
                  @change="mostrarOtro('TPP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Sanitario.</option>
                  <option value="2">Rendimiento.</option>
                  <option value="3">Comercialización.</option>
                  <option value="4">Ambiental.</option>
                  <option value="5">Otras.</option>
                </b-form-select>
              </div>
              <div class="col-lg-8" v-show="mOTPP">
                <label>Otros tipos de problemas:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otros tipos de problemas"
                  v-model.trim="datos.otro_tipo_problema"
                  :class="datos.otro_tipo_problema==''?'':'is-valid'"
                  ref="otro_tipo_problema"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datos.compradores"
                  :class="datos.compradores==''?'':'is-valid'"
                  ref="compradores"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Acopiador.</option>
                  <option value="2">Transportador.</option>
                  <option value="3">Detallista.</option>
                  <option value="4">Transformador.</option>
                  <option value="5">Cooperativa.</option>
                  <option value="6">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Precio promedio de venta:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta"
                  v-model.trim="datos.precio_promedio_venta"
                  :class="datos.precio_promedio_venta==''?'':'is-valid'"
                  ref="precio_promedio_venta"
                  @change="formato('precio_promedio_venta')"
                />
              </div>
              <div class="col-lg-4">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datos.metodo_pago"
                  :class="datos.metodo_pago==''?'':'is-valid'"
                  ref="metodo_pago"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Efectivo.</option>
                  <option value="2">Trasferencia.</option>
                  <option value="3">Cheque.</option>
                  <option value="4">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Precio promedio de venta kg:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta kg"
                  v-model.trim="datos.precio_promedio_venta_kg"
                  :class="datos.precio_promedio_venta_kg==''?'':'is-valid'"
                  ref="precio_promedio_venta_kg"
                  @change="formato('precio_promedio_venta_kg')"
                />
              </div>
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datos.subproductos_produccion"
                  :class="datos.subproductos_produccion==''?'':'is-valid'"
                  ref="subproductos_produccion"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datos.programa_asistencia_tecnica"
                  :class="datos.programa_asistencia_tecnica==''?'':'is-valid'"
                  ref="programa_asistencia_tecnica"
                  @change="mostrarOtro('PAT')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-4" v-show="mOPAT">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datos.nombre_programa"
                  :class="datos.nombre_programa==''?'':'is-valid'"
                  ref="nombre_programa"
                />
              </div>
              <div class="col-lg-4" v-show="mOPAT">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datos.entidad"
                  :class="datos.entidad==''?'':'is-valid'"
                  ref="entidad"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-7">
                <label>¿Durante el último año, ha usted realizados cambios en su producción en temas de innovación?:</label>
                <b-form-select
                  v-model="datos.cambios_produccion_anio"
                  :class="datos.cambios_produccion_anio==''?'':'is-valid'"
                  ref="cambios_produccion_anio"
                  @change="mostrarOtro('CTI')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
              <div class="col-lg-5" v-show="mOCTI">
                <label>¿En qué actividad realizó el cambio?:</label>
                <b-form-select
                  v-model="datos.actividad_cambio"
                  :class="datos.actividad_cambio==''?'':'is-valid'"
                  ref="actividad_cambio"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Producción</option>
                  <option value="2">Transformación</option>
                  <option value="3">Comercialización</option>
                  <option value="4">Organizacional</option>
                </b-form-select>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span
                class="kt-font-boldest"
                style="font-size: 20px;"
              >EXPLOTACIONES PECUARIAS - ESPECIE ANIMAL CON PERSPECTIVA COMERCIAL</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datos.importancia_comercial"
                  :class="datos.importancia_comercial==''?'':'is-valid'"
                  ref="importancia_comercial"
                  @change="formato('importancia_comercial')"
                />
              </div>
              <div class="col-lg-6">
                <label>Producto:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producto"
                  v-model.trim="datos.producto_comercial"
                  :class="datos.producto_comercial==''?'':'is-valid'"
                  ref="producto_comercial"
                />
              </div>
              <div class="col-lg-3">
                <label>Raza ó Tipo:</label>
                <b-form-select
                  v-model="datos.raza"
                  :class="datos.raza==''?'':'is-valid'"
                  ref="raza"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Producción</option>
                  <option value="2">Transformación</option>
                  <option value="3">Comercialización</option>
                  <option value="4">Organizacional</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Costo Total:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total"
                  v-model.trim="datos.costo_total"
                  :class="datos.costo_total==''?'':'is-valid'"
                  ref="costo_total"
                  @change="formato('costo_total')"
                />
              </div>
              <div class="col-lg-4">
                <label>Costo de Establecer:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de Establecer"
                  v-model.trim="datos.costo_establecer"
                  :class="datos.costo_establecer==''?'':'is-valid'"
                  ref="costo_establecer"
                  @change="formato('costo_establecer')"
                />
              </div>
              <div class="col-lg-4">
                <label>Costo Sostenimiento Explotación Pecuaria:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo Sostenimiento Explotación Pecuaria"
                  v-model.trim="datos.costo_pecuaria"
                  :class="datos.costo_pecuaria==''?'':'is-valid'"
                  ref="costo_pecuaria"
                  @change="formato('costo_pecuaria')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5">
                <label>Problemática de los productos con perspectiva comercial:</label>
                <b-form-select
                  v-model="datos.problematica_productos"
                  :class="datos.problematica_productos==''?'':'is-valid'"
                  ref="problematica_productos"
                  @change="mostrarOtro('PPP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Sanitario</option>
                  <option value="2">Rendimiento</option>
                  <option value="3">Comercialización</option>
                  <option value="4">Ambiental</option>
                  <option value="5">Otras</option>
                </b-form-select>
              </div>
              <div class="col-lg-7" v-show="mOPPP">
                <label>Otra Problematica de los productos con perspectiva comercial:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otra Problematica de los productos con perspectiva comercial"
                  v-model.trim="datos.otra_problematica"
                  :class="datos.otra_problematica==''?'':'is-valid'"
                  ref="otra_problematica"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción"
                  v-model.trim="datos.produccion"
                  :class="datos.produccion==''?'':'is-valid'"
                  ref="produccion"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datos.produccion_destinada_pecuaria"
                  :class="datos.produccion_destinada_pecuaria==''?'':'is-valid'"
                  ref="produccion_destinada_pecuaria"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Número de animales:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Número de animales"
                  v-model.trim="datos.numero_animales"
                  :class="datos.numero_animales==''?'':'is-valid'"
                  ref="numero_animales"
                  @change="formato('numero_animales')"
                />
              </div>
              <div class="col-lg-4">
                <label>Área destinada a esta producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área destinada a esta producción"
                  v-model.trim="datos.area_destinada_produccion"
                  :class="datos.area_destinada_produccion==''?'':'is-valid'"
                  ref="area_destinada_produccion"
                  @change="formato('area_destinada_produccion')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area_destinada"
                  :class="datos.unidad_area_destinada==''?'':'is-valid'"
                  ref="unidad_area_destinada"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datos.compradores_pecuaria"
                  :class="datos.compradores_pecuaria==''?'':'is-valid'"
                  ref="compradores_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Acopiador.</option>
                  <option value="2">Transportador.</option>
                  <option value="3">Detallista.</option>
                  <option value="4">Transformador.</option>
                  <option value="5">Cooperativa.</option>
                  <option value="6">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Precio promedio de venta:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta"
                  v-model.trim="datos.precio_promedio_venta_pecuaria"
                  :class="datos.precio_promedio_venta_pecuaria==''?'':'is-valid'"
                  ref="precio_promedio_venta_pecuaria"
                  @change="formato('precio_promedio_venta_pecuaria')"
                />
              </div>
              <div class="col-lg-4">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datos.metodo_pago_pecuaria"
                  :class="datos.metodo_pago_pecuaria==''?'':'is-valid'"
                  ref="metodo_pago_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Efectivo.</option>
                  <option value="2">Trasferencia.</option>
                  <option value="3">Cheque.</option>
                  <option value="4">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datos.subproductos_produccion_pecuaria"
                  :class="datos.subproductos_produccion_pecuaria==''?'':'is-valid'"
                  ref="subproductos_produccion_pecuaria"
                />
              </div>
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datos.pertenece_pecuaria"
                  :class="datos.pertenece_pecuaria==''?'':'is-valid'"
                  ref="pertenece_pecuaria"
                  @change="mostrarOtro('PATP')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPATP">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datos.nombre_programa_pecuaria"
                  :class="datos.nombre_programa_pecuaria==''?'':'is-valid'"
                  ref="nombre_programa_pecuaria"
                />
              </div>
              <div class="col-lg-4" v-show="mOPATP">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datos.entidad_pecuaria"
                  :class="datos.entidad_pecuaria==''?'':'is-valid'"
                  ref="entidad_pecuaria"
                />
              </div>
              <div class="col-lg-4">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datos.pertenece_organizacion_pecuaria"
                  :class="datos.pertenece_organizacion_pecuaria==''?'':'is-valid'"
                  ref="pertenece_organizacion_pecuaria"
                  @change="mostrarOtro('POPECU')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Asociaciones.</option>
                  <option value="2">Cooperativas.</option>
                  <option value="3">Agremiaciones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPECU">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datos.tipo_organizacion_pecuaria"
                  :class="datos.tipo_organizacion_pecuaria==''?'':'is-valid'"
                  ref="tipo_organizacion_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Político.</option>
                  <option value="2">Social.</option>
                  <option value="3">Tecnológico.</option>
                  <option value="4">Asistencial.</option>
                  <option value="5">Salud.</option>
                  <option value="6">Comercial.</option>
                  <option value="7">Etnia.</option>
                  <option value="8">Cultural.</option>
                  <option value="9">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-8" v-show="mOPECU">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datos.nombre_organizacion_pecuaria"
                  :class="datos.nombre_organizacion_pecuaria==''?'':'is-valid'"
                  ref="nombre_organizacion_pecuaria"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPECU==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datos.no_pertenece_pecuaria"
                  :class="datos.no_pertenece_pecuaria==''?'':'is-valid'"
                  ref="no_pertenece_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Desconocimiento.</option>
                  <option value="2">Falta de interés.</option>
                  <option value="3">Falta de tiempo.</option>
                  <option value="4">Falta de oportunidad.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-2">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datos.beneficios_pecuaria"
                  :class="datos.beneficios_pecuaria==''?'':'is-valid'"
                  ref="beneficios_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Económico.</option>
                  <option value="2">En especies.</option>
                  <option value="3">Capacitación.</option>
                  <option value="4">Recreación y deporte.</option>
                  <option value="5">Reconocimiento de la comunidad.</option>
                  <option value="6">Participación en la toma de decisiones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datos.trabaja_asociacion_pecuaria"
                  :class="datos.trabaja_asociacion_pecuaria==''?'':'is-valid'"
                  ref="trabaja_asociacion_pecuaria"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed"></div>
            <p style="text-align: center;">
              <span
                class="kt-font-boldest"
                style="font-size: 20px;"
              >CULTIVOS FORESTALES CON PERSPECTIVA COMERCIAL</span>
            </p>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Importancia del 1 al 10:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Importancia del 1 al 10"
                  v-model.trim="datos.importancia_forestales"
                  :class="datos.importancia_forestales==''?'':'is-valid'"
                  ref="importancia_forestales"
                  @change="formato('importancia_forestales')"
                />
              </div>
              <div class="col-lg-5">
                <label>Producto:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producto, nombre de la especia a forestar"
                  v-model.trim="datos.producto_forestales"
                  :class="datos.producto_forestales==''?'':'is-valid'"
                  ref="producto_forestales"
                />
              </div>
              <div class="col-lg-4">
                <label>Variedad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Variedad"
                  v-model.trim="datos.variedad_forestales"
                  :class="datos.variedad_forestales==''?'':'is-valid'"
                  ref="variedad_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Edad de la plantación:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Edad de la plantación"
                  v-model.trim="datos.edad_plantacion"
                  :class="datos.edad_plantacion==''?'':'is-valid'"
                  ref="edad_plantacion"
                  @change="formato('edad_plantacion')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida :</label>
                <b-form-select
                  v-model="datos.tipo_edad"
                  :class="datos.tipo_edad==''?'':'is-valid'"
                  ref="tipo_edad"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Años.</option>
                  <option value="2">Meses</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Área sembrada:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Área sembrada"
                  v-model.trim="datos.area_sembrada_forestales"
                  :class="datos.area_sembrada_forestales==''?'':'is-valid'"
                  ref="area_sembrada_forestales"
                  @change="formato('area_sembrada_forestales')"
                />
              </div>
              <div class="col-lg-2">
                <label>Unidad de Medida:</label>
                <b-form-select
                  v-model="datos.unidad_area_forestales"
                  :class="datos.unidad_area_forestales==''?'':'is-valid'"
                  ref="unidad_area_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Kilómetro cuadrado.</option>
                  <option value="2">Metro cuadrado.</option>
                  <option value="3">Milla cuadrada.</option>
                  <option value="4">Yarda cuadrada.</option>
                  <option value="5">Pie cuadrado.</option>
                  <option value="6">Pulgada cuadrada.</option>
                  <option value="7">Hectárea.</option>
                  <option value="8">Acre.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Rendimiento por árbol en m3:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Rendimiento por árbol en m3"
                  v-model.trim="datos.rendimiento_arbol"
                  :class="datos.rendimiento_arbol==''?'':'is-valid'"
                  ref="rendimiento_arbol"
                  @change="formato('rendimiento_arbol')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo Total:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo total"
                  v-model.trim="datos.costo_total_forestales"
                  :class="datos.costo_total_forestales==''?'':'is-valid'"
                  ref="costo_total_forestales"
                  @change="formato('costo_total_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo de Establecimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo de Establecimiento"
                  v-model.trim="datos.costo_establecimiento_forestales"
                  :class="datos.costo_establecimiento_forestales==''?'':'is-valid'"
                  ref="costo_establecimiento_forestales"
                  @change="formato('costo_establecimiento_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Costo Sostenimiento:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Costo Sostenimiento"
                  v-model.trim="datos.costo_sostenimiento_forestales"
                  :class="datos.costo_sostenimiento_forestales==''?'':'is-valid'"
                  ref="costo_sostenimiento_forestales"
                  @change="formato('costo_sostenimiento_forestales')"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5">
                <label>Problemática de los productos con perspectiva comercial:</label>
                <b-form-select
                  v-model="datos.problematica_productos_forestales"
                  :class="datos.problematica_productos_forestales==''?'':'is-valid'"
                  ref="problematica_productos_forestales"
                  @change="mostrarOtro('PPPF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Sanitario</option>
                  <option value="2">Rendimiento</option>
                  <option value="3">Comercialización</option>
                  <option value="4">Ambiental</option>
                  <option value="5">Otras</option>
                </b-form-select>
              </div>
              <div class="col-lg-7" v-show="mOPPPF">
                <label>Otra Problematica de los productos con perspectiva comercial:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Otra Problematica de los productos con perspectiva comercial"
                  v-model.trim="datos.otros_problematica_productos_forestales"
                  :class="datos.otros_problematica_productos_forestales==''?'':'is-valid'"
                  ref="otros_problematica_productos_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Producción destinada al mercado:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Producción destinada al mercado"
                  v-model.trim="datos.produccion_destinada_forestales"
                  :class="datos.produccion_destinada_forestales==''?'':'is-valid'"
                  ref="produccion_destinada_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label>Número de Arboles:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Número de Arboles"
                  v-model.trim="datos.numero_arboles"
                  :class="datos.numero_arboles==''?'':'is-valid'"
                  ref="numero_arboles"
                  @change="formato('numero_arboles')"
                />
              </div>
              <div class="col-lg-3">
                <label>Compradores:</label>
                <b-form-select
                  v-model="datos.compradores_forestales"
                  :class="datos.compradores_forestales==''?'':'is-valid'"
                  ref="compradores_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Acopiador.</option>
                  <option value="2">Transportador.</option>
                  <option value="3">Detallista.</option>
                  <option value="4">Transformador.</option>
                  <option value="5">Cooperativa.</option>
                  <option value="6">Consumidor final.</option>
                </b-form-select>
              </div>
              <div class="col-lg-3">
                <label>Precio promedio de venta:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Precio promedio de venta"
                  v-model.trim="datos.precio_promedio_venta_forestales"
                  :class="datos.precio_promedio_venta_forestales==''?'':'is-valid'"
                  ref="precio_promedio_venta_forestales"
                  @change="formato('precio_promedio_venta_forestales')"
                />
              </div>
              <div class="col-lg-3">
                <label>Método de pago.:</label>
                <b-form-select
                  v-model="datos.metodo_pago_forestales"
                  :class="datos.metodo_pago_forestales==''?'':'is-valid'"
                  ref="metodo_pago_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Efectivo.</option>
                  <option value="2">Trasferencia.</option>
                  <option value="3">Cheque.</option>
                  <option value="4">Trueque.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8">
                <label>Subproductos de la producción:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Subproductos de la producción"
                  v-model.trim="datos.subproductos_produccion_forestales"
                  :class="datos.subproductos_produccion_forestales==''?'':'is-valid'"
                  ref="subproductos_produccion_forestales"
                />
              </div>
              <div class="col-lg-4">
                <label>Pertenencia a Programas de Asistencia Técnica:</label>
                <b-form-select
                  v-model="datos.pertenece_forestales"
                  :class="datos.pertenece_forestales==''?'':'is-valid'"
                  ref="pertenece_forestales"
                  @change="mostrarOtro('PATF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPATF">
                <label>Nombre del programa:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre del programa"
                  v-model.trim="datos.nombre_programa_forestales"
                  :class="datos.nombre_programa_forestales==''?'':'is-valid'"
                  ref="nombre_programa_forestales"
                />
              </div>
              <div class="col-lg-4" v-show="mOPATF">
                <label>Entidad:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Entidad"
                  v-model.trim="datos.entidad_forestales"
                  :class="datos.entidad_forestales==''?'':'is-valid'"
                  ref="entidad_forestales"
                />
              </div>
              <div class="col-lg-4">
                <label>¿Pertenece a alguna organización? :</label>
                <b-form-select
                  v-model="datos.pertenece_organizacion_forestales"
                  :class="datos.pertenece_organizacion_forestales==''?'':'is-valid'"
                  ref="pertenece_organizacion_forestales"
                  @change="mostrarOtro('PF')"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Asociaciones.</option>
                  <option value="2">Cooperativas.</option>
                  <option value="3">Agremiaciones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4" v-show="mOPF">
                <label>¿De qué tipo? :</label>
                <b-form-select
                  v-model="datos.tipo_pertenece_forestales"
                  :class="datos.tipo_pertenece_forestales==''?'':'is-valid'"
                  ref="tipo_pertenece_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Político.</option>
                  <option value="2">Social.</option>
                  <option value="3">Tecnológico.</option>
                  <option value="4">Asistencial.</option>
                  <option value="5">Salud.</option>
                  <option value="6">Comercial.</option>
                  <option value="7">Etnia.</option>
                  <option value="8">Cultural.</option>
                  <option value="9">Deportiva.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-8" v-show="mOPF">
                <label>Nombre de la organización:</label>
                <input
                  type="text"
                  class="form-control text-capitalize"
                  placeholder="Nombre de la organización"
                  v-model.trim="datos.nombre_organizacion_forestales"
                  :class="datos.nombre_organizacion_forestales==''?'':'is-valid'"
                  ref="nombre_organizacion_forestales"
                />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-5" v-show="mOPF==false">
                <label>Razón por la cual no pertenece a ninguna organización:</label>
                <b-form-select
                  v-model="datos.no_pertenece_forestales"
                  :class="datos.no_pertenece_forestales==''?'':'is-valid'"
                  ref="no_pertenece_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Desconocimiento.</option>
                  <option value="2">Falta de interés.</option>
                  <option value="3">Falta de tiempo.</option>
                  <option value="4">Falta de oportunidad.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
              <div class="col-lg-4">
                <label>Beneficios :</label>
                <b-form-select
                  v-model="datos.beneficios_forestales"
                  :class="datos.beneficios_forestales==''?'':'is-valid'"
                  ref="beneficios_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="1">Económico.</option>
                  <option value="2">En especies.</option>
                  <option value="3">Capacitación.</option>
                  <option value="4">Recreación y deporte.</option>
                  <option value="5">Reconocimiento de la comunidad.</option>
                  <option value="6">Participación en la toma de decisiones.</option>
                  <option value="NA">No Aplica.</option>
                </b-form-select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6">
                <label>Trabaja en asociación para realizar las actividades productivas :</label>
                <b-form-select
                  v-model="datos.trabaja_asociacion_forestales"
                  :class="datos.trabaja_asociacion_forestales==''?'':'is-valid'"
                  ref="trabaja_asociacion_forestales"
                >
                  <option value selected>Seleccione</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </b-form-select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  "use strict";
  import * as unidadesServicios from "../../Servicios/unidades_servicios";
  import * as barriosServicios from "../../Servicios/barrios_servicios";

  // Import component
  import Loading from "vue-loading-overlay";
  // Import stylesheet
  import "vue-loading-overlay/dist/vue-loading.css";
  export default {
    components: {
      Loading
    },
    mounted() {
      this.hoy = moment();
      this.IDHOGAR = this.$route.params.IDHOGAR;
      this.datos.id_hogar = this.IDHOGAR;
      if (this.IDHOGAR == null) {
        this.$router.push("/gestion");
      } else {
        this.nuevo(this.IDHOGAR);
      }
    },
    data() {
      return {
        IDHOGAR: 0,
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        barrio_options: {},
        vereda_options: {},
        escolaridad_options: {},
        hoy: "",
        datos: {
          id: 0,
          id_hogar: 0,
          id_dpto: "",
          id_mun: "",
          id_corre: "",
          id_vereda: "",
          id_barrio: "",
          direccion: "",
          estado: "Activo",
          id_compania: 1,
          fecha: "",
          usuario_crear: "",
          fecha_editar: "",
          usuario_editar: "",

          nom_productor: "",
          nivel_educativo: "",
          tipo_id: "",
          identificacion: "",
          nom_finca: "",
          hogares_finca: "",
          linea_productiva: "",
          area_total_finca: "",
          distancia_finca: "",
          tenencia_propiedad: "",

          atiende_entrevista: "",
          credito_produccion: "",
          fuentes_prestamo: "",
          cual_fuente: "",
          herramientas_produccion: "",
          vias_acceso: "",
          tipos_vias_acceso: "",
          importancias_agricolas: "",
          area_produccion: "",
          unidad_area_produccion: "",

          producto: "",
          variedad: "",
          semilla: "",
          pertenece: "",
          tipo_pertenece: "",
          nombre_organizacion: "",
          beneficios: "",
          no_pertenece: "",
          trabaja_asociacion: "",
          frecuente_cosecha: "",

          area_cosecha: "",
          unidad_area_cosecha: "",
          costo_produccion: "",
          costo_establecimiento: "",
          costo_sostenimiento: "",
          produccion_destinada: "",
          tipo_problema: "",
          compradores: "",
          precio_promedio_venta: "",
          metodo_pago: "",

          precio_promedio_venta_kg: "",
          subproductos_produccion: "",
          programa_asistencia_tecnica: "",
          nombre_programa: "",
          entidad: "",
          cambios_produccion_anio: "",
          actividad_cambio: "",
          importancia_comercial: "",
          raza: "",
          costo_total: "",

          costo_establecer: "",
          costo_pecuaria: "",
          problematica_productos: "",
          otra_problematica: "",
          produccion: "",
          numero_animales: "",
          area_destinada_produccion: "",
          unidad_area_destinada: "",
          compradores_pecuaria: "",
          precio_promedio_venta_pecuaria: "",

          metodo_pago_pecuaria: "",
          subproductos_produccion_pecuaria: "",
          pertenece_pecuaria: "",
          nombre_programa_pecuaria: "",
          entidad_pecuaria: "",
          pertenece_organizacion_pecuaria: "",
          tipo_organizacion_pecuaria: "",
          nombre_organizacion_pecuaria: "",
          beneficios_pecuaria: "",
          no_pertenece_pecuaria: "",

          trabaja_asociacion_pecuaria: "",
          importancia_forestales: "",
          producto_forestales: "",
          variedad_forestales: "",
          edad_plantacion: "",
          tipo_edad: "",
          area_sembrada_forestales: "",
          unidad_area_forestales: "",
          rendimiento_arbol: "",
          costo_total_forestales: "",

          costo_establecimiento_forestales: "",
          costo_sostenimiento_forestales: "",
          problematica_productos_forestales: "",
          produccion_destinada_forestales: "",
          numero_arboles: "",
          compradores_forestales: "",
          metodo_pago_forestales: "",
          precio_promedio_venta_forestales: "",
          subproductos_produccion_forestales: "",
          pertenece_forestales: "",

          nombre_programa_forestales: "",
          entidad_forestales: "",
          pertenece_organizacion_forestales: "",
          tipo_pertenece_forestales: "",
          nombre_organizacion_forestales: "",
          beneficios_forestales: "",
          no_pertenece_forestales: "",
          trabaja_asociacion_forestales: "",
          unidad_area: "",
          unidad_distancia: "",
          otro_tipo_problema: "",
          producto_comercial: "",
          produccion_destinada_pecuaria: "",
          otros_problematica_productos_forestales: ""
        },
        herramienta: "",
        cuantasHerramienta: "",
        herramientasData: [],
        utensilio: "",
        cuantasUtensilio: "",
        utensiliosData: [],
        maquina: "",
        cuantasMaquina: "",
        maquinasData: [],
        instalacion: "",
        cuantasInstalacion: "",
        instalacionesData: [],

        medio: "",
        cuantasMedio: "",
        mediosData: [],
        mOCP: false,
        mOP: false,
        mOTPP: false,
        mOPAT: false,
        mOCTI: false,
        mOPPP: false,
        mOPATP: false,
        mOPECU: false,
        mOPPPF: false,
        mOPATF: false,
        mOPF: false,
        valG: true,
        CODIGOGENE: ""
      };
    },
    computed: {
      spinG() {
        if (this.valG) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      }
    },
    filters: {
      moneda(val) {
        var number = +val.replace(/[^\d.]/g, "");
        return isNaN(number) ? 0 : number;
      },
      moment: function(date) {
        return moment(date).format("YYYY-MM-DD");
      }
    },
    methods: {
      nuevo: async function(id_hogar) {
        const parametros = {
          _token: this.csrf,
          id_hogar: id_hogar
        };
        try {
          await unidadesServicios.nuevo(parametros).then(respuesta => {
            this.dpto_options = respuesta.data.arrayDpto;
            this.muni_options = respuesta.data.arrayMuni;
            this.corregi_options = respuesta.data.arrayCorregi;
            this.vereda_options = respuesta.data.arrayVeredas;
            this.escolaridad_options = respuesta.data.arrayEscolaridad;
            this.CODIGOGENE = respuesta.data.codigo;
          });
        } catch (error) {
          switch (error.response.status) {
            case 422:
              this.$swal("Error...!", "Ocurrio un error!", "error");
              break;
            default:
              this.$swal("Error...!", "Ocurrio un error!", "error");
              break;
          }
        }
      },
      cambiarCombo: async function(caja) {
        if (caja === "dpto") {
          this.datos.id_mun = "";
          this.datos.id_corre = "";
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";
        }
        if (caja === "muni") {
          this.datos.id_corre = "";
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";
          const parametros = {
            _token: this.csrf,
            id: this.datos.id_mun,
            opcion: "MUN"
          };
          try {
            await barriosServicios.comboBarrios(parametros).then(respuesta => {
              this.barrio_options = respuesta.data.arrayBarrios;
            });
          } catch (error) {
            switch (error.response.status) {
              case 422:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                break;
              default:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                break;
            }
          }
        }
        if (caja === "corregi") {
          this.datos.id_vereda = "";
          this.datos.id_barrio = "";

          console.log(this.datos.id_corre);
          if (this.datos.id_corre !== "0") {
            const parametros = {
              _token: this.csrf,
              id: this.datos.id_corre,
              opcion: "CORRE"
            };
            try {
              await barriosServicios.comboBarrios(parametros).then(respuesta => {
                this.barrio_options = respuesta.data.arrayBarrios;
              });
            } catch (error) {
              switch (error.response.status) {
                case 422:
                  this.$swal("Error...!", "Ocurrio un error!", "error");
                  break;
                default:
                  this.$swal("Error...!", "Ocurrio un error!", "error");
                  break;
              }
            }
          } else {
            if (this.datos.id_corre === "0") {
              const parametros = {
                _token: this.csrf,
                id: this.datos.id_mun,
                opcion: "MUN"
              };
              try {
                await barriosServicios
                  .comboBarrios(parametros)
                  .then(respuesta => {
                    this.barrio_options = respuesta.data.arrayBarrios;
                  });
              } catch (error) {
                switch (error.response.status) {
                  case 422:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                  default:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                }
              }
            }
          }
        }
      },
      volver() {
        this.$router.push("/gestion");
      },
      mostrarOtro(tipo) {
        if (tipo === "CP") {
          if (this.datos.credito_produccion === "SI") {
            this.mOCP = true;
            this.datos.fuentes_prestamo = "";
          } else {
            this.mOCP = false;
            this.datos.fuentes_prestamo = "NA";
          }
        }
        if (tipo === "P") {
          if (this.datos.pertenece === "NA") {
            this.mOP = false;
            this.datos.tipo_pertenece = "NA";
            this.datos.nombre_organizacion = "NA";
            this.datos.no_pertenece = "NA";
          } else {
            if (this.datos.pertenece === "") {
              this.mOP = false;
              this.datos.tipo_pertenece = "";
              this.datos.nombre_organizacion = "";
              this.datos.no_pertenece = "";
            } else {
              this.mOP = true;
              this.datos.tipo_pertenece = "";
              this.datos.nombre_organizacion = "";
              this.datos.no_pertenece = "NA";
            }
          }
        }
        if (tipo === "TPP") {
          if (this.datos.tipo_problema === "5") {
            this.mOTPP = true;
          } else {
            this.mOTPP = false;
          }
          this.datos.otro_tipo_problema = "";
        }
        if (tipo === "PAT") {
          if (this.datos.programa_asistencia_tecnica === "SI") {
            this.mOPAT = true;
          } else {
            this.mOPAT = false;
          }
          this.datos.nombre_programa = "";
          this.datos.entidad = "";
        }
        if (tipo === "CTI") {
          if (this.datos.cambios_produccion_anio === "SI") {
            this.mOCTI = true;
          } else {
            this.mOCTI = false;
          }
          this.datos.actividad_cambio = "";
        }
        if (tipo === "PPP") {
          if (this.datos.problematica_productos === "5") {
            this.mOPPP = true;
          } else {
            this.mOPPP = false;
          }
          this.datos.otra_problematica = "";
        }
        if (tipo === "PATP") {
          if (this.datos.pertenece_pecuaria === "SI") {
            this.mOPATP = true;
          } else {
            this.mOPATP = false;
          }
          this.datos.nombre_programa_pecuaria = "";
          this.datos.entidad_pecuaria = "";
        }
        if (tipo === "POPECU") {
          if (this.datos.pertenece_organizacion_pecuaria === "NA") {
            this.mOPECU = false;
            this.datos.tipo_organizacion_pecuaria = "NA";
            this.datos.nombre_organizacion_pecuaria = "NA";
            this.datos.no_pertenece_pecuaria = "NA";
          } else {
            if (this.datos.pertenece_organizacion_pecuaria === "") {
              this.mOPECU = false;
              this.datos.tipo_organizacion_pecuaria = "";
              this.datos.nombre_organizacion_pecuaria = "";
              this.datos.no_pertenece_pecuaria = "";
            } else {
              this.mOPECU = true;
              this.datos.tipo_organizacion_pecuaria = "";
              this.datos.nombre_organizacion_pecuaria = "";
              this.datos.no_pertenece_pecuaria = "NA";
            }
          }
        }
        if (tipo === "PPPF") {
          if (this.datos.problematica_productos_forestales === "5") {
            this.mOPPPF = true;
          } else {
            this.mOPPPF = false;
          }
          this.datos.otros_problematica_productos_forestales = "";
        }
        if (tipo === "PATF") {
          if (this.datos.pertenece_forestales === "SI") {
            this.mOPATF = true;
          } else {
            this.mOPATF = false;
          }
          this.datos.nombre_programa_forestales = "";
          this.datos.entidad_forestales = "";
        }
        if (tipo === "PF") {
          if (this.datos.pertenece_organizacion_forestales === "NA") {
            this.mOPF = false;
            this.datos.tipo_pertenece_forestales = "NA";
            this.datos.nombre_organizacion_forestales = "NA";
            this.datos.no_pertenece = "NA";
          } else {
            if (this.datos.pertenece_organizacion_forestales === "") {
              this.mOPF = false;
              this.datos.tipo_pertenece_forestales = "";
              this.datos.nombre_organizacion_forestales = "";
              this.datos.no_pertenece_forestales = "";
            } else {
              this.mOPF = true;
              this.datos.tipo_pertenece_forestales = "";
              this.datos.nombre_organizacion_forestales = "";
              this.datos.no_pertenece_forestales = "NA";
            }
          }
        }
      },
      guardar: async function() {
        if (!this.checkForm()) {
        } else {
          const parametros = {
            _token: this.csrf,
            datos: this.datos,
            herramientas: this.herramientasData,
            utensilios: this.utensiliosData,
            maquinas: this.maquinasData,
            instalaciones: this.instalacionesData,
            medios: this.mediosData,
            CODIGOGENE: this.CODIGOGENE,
            opcion: "guardar"
          };
          this.valG = false;
          try {
            await unidadesServicios
              .guardar(parametros)
              .then(respuesta => {
                if (respuesta.data.OPC == "SI") {
                  this.$swal(
                    "Guardar...!",
                    "Datos Guardados Exitosamente!",
                    "success"
                  );
                  this.volver();
                } else {
                  this.$swal("Guardar...!", "Ocurrio un problema!", "warning");
                }
                this.valG = true;
              })
              .catch(error => {});
          } catch (error) {
            switch (error.response.status) {
              case 419:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                break;
              case 422:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                break;
              default:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                break;
            }
          }
          this.valG = true;
        }
      },
      checkForm(e) {
        let bande = true;
        if (this.datos.id_dpto === "") {
          this.$refs.id_dpto.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción departamento!",
            "error"
          );
          return;
        }
        if (this.datos.id_mun === "") {
          this.$refs.id_mun.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción municipio!",
            "error"
          );
          return;
        }
        if (this.datos.direccion === "") {
          this.$refs.direccion.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la direccion!", "error");
          return;
        }
        if (this.datos.tipo_id === "") {
          this.$refs.tipo_id.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione el tipo de identificación!",
            "error"
          );
          return;
        }
        if (this.datos.identificacion === "") {
          this.$refs.identificacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de identificación!",
            "error"
          );
          return;
        }
        if (this.datos.nom_productor === "") {
          this.$refs.nom_productor.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite el productor!", "error");
          return;
        }
        if (this.datos.nivel_educativo === "") {
          this.$refs.nivel_educativo.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione el nivel educativo!",
            "error"
          );
          return;
        }
        if (this.datos.nom_finca === "") {
          this.$refs.nom_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el nombre de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.hogares_finca === "") {
          this.$refs.hogares_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de hogares en la finca!",
            "error"
          );
          return;
        }
        if (this.datos.linea_productiva === "") {
          this.$refs.linea_productiva.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la linea productiva!",
            "error"
          );
          return;
        }
        if (this.datos.area_total_finca === "") {
          this.$refs.area_total_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el area total de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.unidad_area === "") {
          this.$refs.unidad_area.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida!",
            "error"
          );
          return;
        }
        if (this.datos.distancia_finca === "") {
          this.$refs.distancia_finca.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite la distancia de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.unidad_distancia === "") {
          this.$refs.unidad_distancia.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la unidad de medida de la distancia de la finca!",
            "error"
          );
          return;
        }
        if (this.datos.tenencia_propiedad === "") {
          this.$refs.tenencia_propiedad.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la tenencia de la propiedad!",
            "error"
          );
          return;
        }
        if (this.datos.atiende_entrevista === "") {
          this.$refs.atiende_entrevista.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione quien atiende la entrevista!",
            "error"
          );
          return;
        }
        if (this.datos.credito_produccion === "") {
          this.$refs.credito_produccion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione si posee credito de producción!",
            "error"
          );
          return;
        }
        return bande;
        e.preventDefault();
      },
      formato(caja) {
        if (caja == "id1") {
          if (this.datos.tipo_id == "CC") {
            this.datos.identificacion = this.datos.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
            let val = (this.datos.identificacion / 1)
              .toFixed(0)
              .replace(".", ",");
            this.datos.identificacion = val
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (this.datos.identificacion == "NaN") {
              this.datos.identificacion = "";
            }
            if (this.datos.identificacion == "0") {
              this.datos.identificacion = "";
            }
          }
        }
        if (caja == "tipoid") {
          this.datos.identificacion = "";
          if (this.datos.tipo_id != "CC") {
            if (this.datos.tipo_id === "ASI" || this.datos.tipo_id === "MSI") {
              this.datos.identificacion =
                this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
            } else {
              this.datos.identificacion = this.datos.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
            }
          } else {
            if (this.datos.tipo_id == "CC") {
              this.datos.identificacion = this.datos.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
              let val = (this.datos.identificacion / 1)
                .toFixed(0)
                .replace(".", ",");
              this.datos.identificacion = val
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              if (this.datos.identificacion == "NaN") {
                this.datos.identificacion = "";
              }
              if (this.datos.identificacion == "0") {
                this.datos.identificacion = "";
              }
            }
          }
        }
        if (caja === "anio") {
          this.datos.anio = this.datos.anio.replace(/[^.\d]/g, "").trim();
          if (this.datos.anio == "NaN") {
            this.datos.anio = "";
          }
          if (this.datos.anio == "0") {
            this.datos.anio = "";
          }
        }
        if (caja === "hogares_finca") {
          this.datos.hogares_finca = this.datos.hogares_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.hogares_finca == "NaN") {
            this.datos.hogares_finca = "";
          }
          if (this.datos.hogares_finca == "0") {
            this.datos.hogares_finca = "";
          }
        }
        if (caja == "area_total_finca") {
          this.datos.area_total_finca = this.datos.area_total_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_total_finca == "NaN") {
            this.datos.area_total_finca = "";
          }
          if (this.datos.area_total_finca == "0") {
            this.datos.area_total_finca = "";
          }
        }
        if (caja == "distancia_finca") {
          this.datos.distancia_finca = this.datos.distancia_finca
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.distancia_finca == "NaN") {
            this.datos.distancia_finca = "";
          }
          if (this.datos.distancia_finca == "0") {
            this.datos.distancia_finca = "";
          }
        }
        if (caja == "importancias_agricolas") {
          this.datos.importancias_agricolas = this.datos.importancias_agricolas
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.importancias_agricolas == "NaN") {
            this.datos.importancias_agricolas = "";
          }
          if (this.datos.importancias_agricolas == "0") {
            this.datos.importancias_agricolas = "";
          }

          if (
            Number(this.datos.importancias_agricolas) < 1 ||
            Number(this.datos.importancias_agricolas) > 10
          ) {
            this.datos.importancias_agricolas = "";
          }
        }
        if (caja == "area_produccion") {
          this.datos.area_produccion = this.datos.area_produccion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_produccion == "NaN") {
            this.datos.area_produccion = "";
          }
          if (this.datos.area_produccion == "0") {
            this.datos.area_produccion = "";
          }
        }
        if (caja == "area_cosecha") {
          this.datos.area_cosecha = this.datos.area_cosecha
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_cosecha == "NaN") {
            this.datos.area_cosecha = "";
          }
          if (this.datos.area_cosecha == "0") {
            this.datos.area_cosecha = "";
          }
        }
        if (caja == "costo_produccion") {
          this.datos.costo_produccion = this.datos.costo_produccion.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_produccion / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_produccion = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_produccion == "NaN") {
            this.datos.costo_produccion = "";
          }
          if (this.datos.costo_produccion == "0") {
            this.datos.costo_produccion = "";
          }
        }
        if (caja == "costo_establecimiento") {
          this.datos.costo_establecimiento = this.datos.costo_establecimiento.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_establecimiento / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_establecimiento = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_establecimiento == "NaN") {
            this.datos.costo_establecimiento = "";
          }
          if (this.datos.costo_establecimiento == "0") {
            this.datos.costo_establecimiento = "";
          }
        }
        if (caja == "costo_sostenimiento") {
          this.datos.costo_sostenimiento = this.datos.costo_sostenimiento.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_sostenimiento / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_sostenimiento = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_sostenimiento == "NaN") {
            this.datos.costo_sostenimiento = "";
          }
          if (this.datos.costo_sostenimiento == "0") {
            this.datos.costo_sostenimiento = "";
          }
        }
        if (caja == "precio_promedio_venta") {
          this.datos.precio_promedio_venta = this.datos.precio_promedio_venta.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.precio_promedio_venta / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.precio_promedio_venta = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.precio_promedio_venta == "NaN") {
            this.datos.precio_promedio_venta = "";
          }
          if (this.datos.precio_promedio_venta == "0") {
            this.datos.precio_promedio_venta = "";
          }
        }
        if (caja == "precio_promedio_venta_kg") {
          this.datos.precio_promedio_venta_kg = this.datos.precio_promedio_venta_kg.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.precio_promedio_venta_kg / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.precio_promedio_venta_kg = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.precio_promedio_venta_kg == "NaN") {
            this.datos.precio_promedio_venta_kg = "";
          }
          if (this.datos.precio_promedio_venta_kg == "0") {
            this.datos.precio_promedio_venta_kg = "";
          }
        }
        if (caja == "importancia_comercial") {
          this.datos.importancia_comercial = this.datos.importancia_comercial
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.importancia_comercial == "NaN") {
            this.datos.importancia_comercial = "";
          }
          if (this.datos.importancia_comercial == "0") {
            this.datos.importancia_comercial = "";
          }

          if (
            Number(this.datos.importancia_comercial) < 1 ||
            Number(this.datos.importancia_comercial) > 10
          ) {
            this.datos.importancia_comercial = "";
          }
        }
        if (caja == "numero_animales") {
          this.datos.numero_animales = this.datos.numero_animales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.numero_animales == "NaN") {
            this.datos.numero_animales = "";
          }
          if (this.datos.numero_animales == "0") {
            this.datos.numero_animales = "";
          }
        }
        if (caja == "area_destinada_produccion") {
          this.datos.area_destinada_produccion = this.datos.area_destinada_produccion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_destinada_produccion == "NaN") {
            this.datos.area_destinada_produccion = "";
          }
          if (this.datos.area_destinada_produccion == "0") {
            this.datos.area_destinada_produccion = "";
          }
        }
        if (caja == "precio_promedio_venta_pecuaria") {
          this.datos.precio_promedio_venta_pecuaria = this.datos.precio_promedio_venta_pecuaria.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.precio_promedio_venta_pecuaria / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.precio_promedio_venta_pecuaria = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.precio_promedio_venta_pecuaria == "NaN") {
            this.datos.precio_promedio_venta_pecuaria = "";
          }
          if (this.datos.precio_promedio_venta_pecuaria == "0") {
            this.datos.precio_promedio_venta_pecuaria = "";
          }
        }
        if (caja == "importancia_forestales") {
          this.datos.importancia_forestales = this.datos.importancia_forestales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.importancia_forestales == "NaN") {
            this.datos.importancia_forestales = "";
          }
          if (this.datos.importancia_forestales == "0") {
            this.datos.importancia_forestales = "";
          }

          if (
            Number(this.datos.importancia_forestales) < 1 ||
            Number(this.datos.importancia_forestales) > 10
          ) {
            this.datos.importancia_forestales = "";
          }
        }
        if (caja == "area_sembrada_forestales") {
          this.datos.area_sembrada_forestales = this.datos.area_sembrada_forestales
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.area_sembrada_forestales == "NaN") {
            this.datos.area_sembrada_forestales = "";
          }
          if (this.datos.area_sembrada_forestales == "0") {
            this.datos.area_sembrada_forestales = "";
          }
        }
        if (caja == "edad_plantacion") {
          this.datos.edad_plantacion = this.datos.edad_plantacion
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.edad_plantacion == "NaN") {
            this.datos.edad_plantacion = "";
          }
          if (this.datos.edad_plantacion == "0") {
            this.datos.edad_plantacion = "";
          }
        }
        if (caja == "rendimiento_arbol") {
          this.datos.rendimiento_arbol = this.datos.rendimiento_arbol
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.rendimiento_arbol == "NaN") {
            this.datos.rendimiento_arbol = "";
          }
          if (this.datos.rendimiento_arbol == "0") {
            this.datos.rendimiento_arbol = "";
          }
        }
        if (caja == "costo_total_forestales") {
          this.datos.costo_total_forestales = this.datos.costo_total_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_total_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_total_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_total_forestales == "NaN") {
            this.datos.costo_total_forestales = "";
          }
          if (this.datos.costo_total_forestales == "0") {
            this.datos.costo_total_forestales = "";
          }
        }
        if (caja == "costo_establecimiento_forestales") {
          this.datos.costo_establecimiento_forestales = this.datos.costo_establecimiento_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_establecimiento_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_establecimiento_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_establecimiento_forestales == "NaN") {
            this.datos.costo_establecimiento_forestales = "";
          }
          if (this.datos.costo_establecimiento_forestales == "0") {
            this.datos.costo_establecimiento_forestales = "";
          }
        }
        if (caja == "costo_sostenimiento_forestales") {
          this.datos.costo_sostenimiento_forestales = this.datos.costo_sostenimiento_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.costo_sostenimiento_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.costo_sostenimiento_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.costo_sostenimiento_forestales == "NaN") {
            this.datos.costo_sostenimiento_forestales = "";
          }
          if (this.datos.costo_sostenimiento_forestales == "0") {
            this.datos.costo_sostenimiento_forestales = "";
          }
        }
        if (caja == "numero_arboles") {
          this.datos.numero_arboles = this.datos.numero_arboles
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.datos.numero_arboles == "NaN") {
            this.datos.numero_arboles = "";
          }
          if (this.datos.numero_arboles == "0") {
            this.datos.numero_arboles = "";
          }
        }
        if (caja == "precio_promedio_venta_forestales") {
          this.datos.precio_promedio_venta_forestales = this.datos.precio_promedio_venta_forestales.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.datos.precio_promedio_venta_forestales / 1)
            .toFixed(0)
            .replace(".", ",");
          this.datos.precio_promedio_venta_forestales = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.datos.precio_promedio_venta_forestales == "NaN") {
            this.datos.precio_promedio_venta_forestales = "";
          }
          if (this.datos.precio_promedio_venta_forestales == "0") {
            this.datos.precio_promedio_venta_forestales = "";
          }
        }
      },
      eliminarItemHerramientas: function(index) {
        this.herramientasData.splice(index, 1);
      },
      agregarHerramienta: function() {
        if (this.herramienta === "") {
          this.$swal("Error...!", "Por favor Digite Una Herramienta!", "error");
          return;
        }
        if (this.cuantasHerramienta === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Herramientas Tiene!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantasHerramienta)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Herramientas Tiene!",
            "error"
          );
          return;
        }
        this.herramientasData.push({
          id: 0,
          herramienta: this.herramienta,
          cuantos: this.cuantasHerramienta,
          estado: 'Activo'
        });
        this.herramienta = "";
        this.cuantasHerramienta = "";
      },
      eliminarItemUtensilios: function(index) {
        this.utensiliosData.splice(index, 1);
      },
      agregarUtensilio: function() {
        if (this.utensilio === "") {
          this.$swal("Error...!", "Por favor Digite Un Utensilio!", "error");
          return;
        }
        if (this.cuantasUtensilio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Utensilios Tiene!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantasUtensilio)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Utensilios Tiene!",
            "error"
          );
          return;
        }
        this.utensiliosData.push({
          id: 0,
          utensilio: this.utensilio,
          cuantos: this.cuantasUtensilio,
          estado: 'Activo'
        });
        this.utensilio = "";
        this.cuantasUtensilio = "";
      },
      isNumeric: function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      },
      eliminarItemMaquinas: function(index) {
        this.maquinasData.splice(index, 1);
      },
      agregarMaquina: function() {
        if (this.maquina === "") {
          this.$swal("Error...!", "Por favor Digite Una Maquina!", "error");
          return;
        }
        if (this.cuantasMaquina === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Maquinas Tiene!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantasMaquina)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Maquinas Tiene!",
            "error"
          );
          return;
        }
        this.maquinasData.push({
          id: 0,
          maquina: this.maquina,
          cuantos: this.cuantasMaquina,
          estado: 'Activo'
        });
        this.maquina = "";
        this.cuantasMaquina = "";
      },
      eliminarItemInstalacion: function(index) {
        this.instalacionesData.splice(index, 1);
      },
      agregarInstalacion: function() {
        if (this.instalacion === "") {
          this.$swal("Error...!", "Por favor Digite Una Instalación!", "error");
          return;
        }
        if (this.cuantasInstalacion === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Instalaciones Tiene el Predio!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantasInstalacion)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantas Instalaciones Tiene el Predio!",
            "error"
          );
          return;
        }
        this.instalacionesData.push({
          id: 0,
          instalacion: this.instalacion,
          cuantos: this.cuantasInstalacion,
          estado: 'Activo'
        });
        this.instalacion = "";
        this.cuantasInstalacion = "";
      },
      eliminarItemMedio: function(index) {
        this.mediosData.splice(index, 1);
      },
      agregarMedio: function() {
        if (this.medio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite Un Medio de Transporte!",
            "error"
          );
          return;
        }
        if (this.cuantasMedio === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Medios de Transporte tiene!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantasMedio)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Medios de Transporte tiene!",
            "error"
          );
          return;
        }
        this.mediosData.push({
          id: 0,
          medio: this.medio,
          cuantos: this.cuantasMedio,
          estado: 'Activo'
        });
        this.medio = "";
        this.cuantasMedio = "";
      }
    }
  };
</script>
<style>