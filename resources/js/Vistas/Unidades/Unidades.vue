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
              <div class="col-lg-12">
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
      this.nuevo(this.IDHOGAR);
      // if (this.IDHOGAR == null) {
      //   this.$router.push("/gestion");
      // } else {
      //   this.nuevo(this.IDHOGAR);
      // }
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
          unidad_distancia: ""
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
          if (this.datos.pertenece === "NA" || this.datos.pertenece === "") {
            this.mOP = false;
            this.datos.tipo_pertenece = "NA";
          } else {
            this.mOP = true;
            this.datos.tipo_pertenece = "";
          }
        }        
      },
      guardar: async function() {
        if (!this.checkForm()) {
        } else {
          this.datos.id_hogar = this.IDHOGAR;
          const parametros = {
            _token: this.csrf,
            datos: this.datos,
            opcion: "guardar"
          };
          this.valG = false;
          try {
            await establecimientosServicios
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
        if (this.datos.id_corre === "") {
          this.$refs.id_corre.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción corregimiento!",
            "error"
          );
          return;
        }
        if (this.datos.id_vereda === "") {
          this.$refs.id_vereda.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción vereda!",
            "error"
          );
          return;
        }
        if (this.datos.id_barrio === "") {
          this.$refs.id_barrio.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción barrio!",
            "error"
          );
          return;
        }
        if (this.datos.razon === "") {
          this.$refs.razon.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la razón social!", "error");
          return;
        }
        if (this.datos.direccion === "") {
          this.$refs.direccion.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite la direccion!", "error");
          return;
        }
        if (this.datos.nit === "") {
          this.$refs.nit.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el nit del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.representante === "") {
          this.$refs.representante.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el representante legal del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.registrado === "") {
          this.$refs.registrado.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción registro camara de comercio!",
            "error"
          );
          return;
        }
        if (this.datos.naturaleza === "") {
          this.$refs.naturaleza.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción naturaleza juridica del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.tipo === "") {
          this.$refs.tipo.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción tipo de establecimiento comercial!",
            "error"
          );
          return;
        }
        if (this.datos.actividad_economica === "") {
          this.$refs.actividad_economica.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción actividad economica!",
            "error"
          );
          return;
        }
        if (this.datos.capital_extranjero === "") {
          this.$refs.capital_extranjero.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción participación de capital extranjero!",
            "error"
          );
          return;
        }
        if (this.datos.permiso === "") {
          this.$refs.permiso.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción recibe el permiso de operar como!",
            "error"
          );
          return;
        }
        if (this.datos.anio === "") {
          this.$refs.anio.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el año de inicio de operación!",
            "error"
          );
          return;
        }
        if (this.datos.num_empleados === "") {
          this.$refs.num_empleados.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el numero de empleados directos!",
            "error"
          );
          return;
        }
        if (this.datos.tiempo_sin_operacion === "") {
          this.$refs.tiempo_sin_operacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el tiempo sin operación debido al covid 19!",
            "error"
          );
          return;
        }
        if (this.datos.tipo_tiempo === "") {
          this.$refs.tipo_tiempo.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción tiempo en!",
            "error"
          );
          return;
        }
        if (this.datos.fecha_retorno === "") {
          this.$refs.fecha_retorno.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la fecha de retorno a labores!",
            "error"
          );
          return;
        }
        if (this.datos.promedio_ingresos_anterior === "") {
          this.$refs.promedio_ingresos_anterior.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos anterior a la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.promedio_ingresos_durante === "") {
          this.$refs.promedio_ingresos_durante.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos durante la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.promedio_ingresos_posterior === "") {
          this.$refs.promedio_ingresos_posterior.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el promedio de ingresos posterior a la contingencia!",
            "error"
          );
          return;
        }
        if (this.datos.carga_economica === "") {
          this.$refs.carga_economica.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción principal carga economica!",
            "error"
          );
          return;
        }
        if (this.datos.protocolo_bioseguridad === "") {
          this.$refs.protocolo_bioseguridad.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción cuenta con protocolos de bioseguridad!",
            "error"
          );
          return;
        }
        if (this.datos.tipo_afectacion === "") {
          this.$refs.tipo_afectacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción tipo de afectación del establecimiento!",
            "error"
          );
          return;
        }
        if (this.datos.ayuda === "") {
          this.$refs.ayuda.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción recibió ayuda por parte del gobierno!",
            "error"
          );
          return;
        }
        if (this.datos.internet === "") {
          this.$refs.internet.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción cuenta con servicio de internet!",
            "error"
          );
          return;
        }
        if (this.datos.tiempo_recuperacion === "") {
          this.$refs.tiempo_recuperacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción Dentro de cuanto tiempo, creen que el establecimiento pueda recuperarse económicamente de las afectaciones por la emergencia Covid- 19!",
            "error"
          );
          return;
        }
        if (this.datos.principal_problema === "") {
          this.$refs.principal_problema.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción Cuál cree usted que es el principal problema del sector en el que está ubicado el establecimiento comercial!",
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
          cuantos: this.cuantasHerramienta
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
          cuantos: this.cuantasUtensilio
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
          cuantos: this.cuantasMaquina
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
          cuantos: this.cuantasInstalacion
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
          cuantos: this.cuantasMedio
        });
        this.medio = "";
        this.cuantasMedio = "";
      }
    }
  };
</script>
<style>