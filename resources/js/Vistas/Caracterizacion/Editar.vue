<template>
  <!--Begin::Section-->
  <div class="row">
    <div class="col-12">
      <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile" style="margin-top: -4%;">
        <div
          class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm"
        >
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              <span class="kt-widget20__number kt-font-danger">CARACTERIZACIÓN</span>
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
                @click.prevent="Actualizar"
                :disabled="!valGActu"
                :class="spinGActu"
              >
                <i class="la la-refresh"></i>
                <span class="kt-hidden-mobile">Actualizar</span>
              </button>
            </div>
          </div>
        </div>
        <div class="kt-portlet__body">
          <ul
            class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success"
            role="tablist"
          >
            <li class="nav-item">
              <a
                class="nav-link active"
                data-toggle="tab"
                href="#tabIdentificacion"
                role="tab"
                @click="cambiarTab2('tabIdentificacion')"
              >Identificación</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#tabVivienda"
                role="tab"
                @click="cambiarTab2('tabVivienda')"
              >Viviendas</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#cartxciclo"
                role="tab"
                @click="cambiarTab2('cartxciclo')"
              >Cart. X ciclo</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#adolescente"
                role="tab"
                @click="cambiarTab2('adolescente')"
              >Adolecentes/Jovenes</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#adultomayor"
                role="tab"
                @click="cambiarTab2('adultomayor')"
              >Adulto mayor</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#migrante"
                role="tab"
                @click="cambiarTab2('migrante')"
              >Migrante</a>
            </li>
          </ul>
          <div class="tab-content">
            <!-- Identificación -->
            <div class="tab-pane active" id="tabIdentificacion" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('tabVivienda','tabIdentificacion')"
                    :disabled="!valGIden"
                    :class="spinGIden"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">A.Ficha Del Hogar</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Departamento (*):</label>
                  <b-form-select
                    v-model.trim="hogar.id_dpto"
                    :class="hogar.id_dpto==''?'is-invalid':'is-valid'"
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
                  <div class="valid-feedback" v-if="hogar.id_dpto!=''">Departamento Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_dpto==''">El departamento es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Municipio (*):</label>
                  <b-form-select
                    v-model.trim="hogar.id_mun"
                    :class="hogar.id_mun==''?'is-invalid':'is-valid'"
                    @change="cambiarCombo('muni')"
                    ref="id_mun"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in muni_options[hogar.id_dpto]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_mun!=''">Municipio Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_mun==''">El municipio es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Corregimiento:</label>
                  <b-form-select
                    v-model="hogar.id_corre"
                    @change="cambiarCombo('corregi')"
                    :class="hogar.id_corre==''?'is-invalid':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in corregi_options[hogar.id_mun]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_corre!=''">Corregimiento Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.id_corre==''">El corregimiento es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Vereda:</label>
                  <b-form-select
                    v-model="hogar.id_vereda"
                    :class="hogar.id_vereda==''?'is-invalid':'is-valid'"
                    @change="cambiarCombo('vereda')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in vereda_options[hogar.id_corre]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_vereda!=''">Vereda Valida</div>
                </div>
                <div class="col-lg-4">
                  <label>Barrio:</label>
                  <b-form-select
                    v-model="hogar.id_barrio"
                    :class="hogar.id_barrio==''?'is-invalid':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in barrio_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_barrio!=''">Barrio Valido</div>
                </div>
                <div class="col-lg-4">
                  <label>Zona:</label>
                  <b-form-select
                    v-model="hogar.id_zona"
                    :class="hogar.id_zona==''?'is-invalid':'is-valid'"
                    @change="habilitar_zonas"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="1">Urbano</option>
                    <option value="2">Rural centro poblado</option>
                    <option value="3">Rural disperso</option>
                  </b-form-select>
                  <div class="valid-feedback" v-if="hogar.id_zona!=''">Zona Valida</div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Tenencia de Vivienda (*):</label>
                  <b-form-select
                    v-model.trim="hogar.tenencia_vivienda"
                    :class="hogar.tenencia_vivienda==''?'is-invalid':'is-valid'"
                    ref="tenencia_vivienda"
                  >
                    <option value selected>Seleccione</option>
                    <option value="PROPIETARIO">PROPIETARIO(A)</option>
                    <option value="ARRENDADO">ARRENDADO(A)</option>
                    <option value="FAMILIAR">FAMILIAR</option>
                    <option value="CUIDADOR">CUIDADOR(A)</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.tenencia_vivienda!=''"
                  >Tenencia de Vivienda Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.tenencia_vivienda==''">La tenencia de vivienda es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Numero de Hogares (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Numero de Hogares"
                    v-model="hogar.numero_hogares"
                    :class="allLetter(hogar.numero_hogares)==false?'is-invalid':'is-valid'"
                    @change="validarNumHog"
                    ref="numero_hogares"
                  />
                  <div
                    class="valid-feedback"
                    v-if="allLetter(hogar.numero_hogares)==true"
                  >Numero de Hogares Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="allLetter(hogar.numero_hogares)==false"
                    >El numero de hogares debe ser numerico</span>
                    <span v-if="hogar.numero_hogares==''">El numero de hogares es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Población Especial (*):</label>
                  <b-form-select
                    v-model.trim="hogar.poblacion_especial"
                    :class="hogar.poblacion_especial==''?'is-invalid':'is-valid'"
                    ref="poblacion_especial"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">NO APLICA</option>
                    <option value="1">DESPLAZADO</option>
                    <option value="3">VICTIMA DEL CONFLICTO ARMADO</option>
                    <option value="4">MADRE COMUNITARIA</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.poblacion_especial==''"
                  >Población Especial Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.poblacion_especial==''">La población especial es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>¿La comunidad presenta vías de acceso? (*):</label>
                  <b-form-select
                    v-model.trim="hogar.vias_acceso"
                    :class="hogar.vias_acceso==''?'is-invalid':'is-valid'"
                    ref="vias_acceso"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="1">Pavimentadas</option>
                    <option value="2">Placa huella</option>
                    <option value="3">Sin pavimentar</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.vias_acceso!=''"
                  >Presenta vias de acceso Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="hogar.vias_acceso==''"
                    >La comunidad presenta vías de acceso es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-5">
                  <label>¿Presenta acceso fácil a los servicios públicos? (*):</label>
                  <b-form-select
                    v-model.trim="hogar.servicios_publicos"
                    :class="hogar.servicios_publicos==''?'is-invalid':'is-valid'"
                    ref="servicios_publicos"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">Permanente</option>
                    <option value="2">Ocacional</option>
                    <option value="3">Periódico</option>
                    <option value="4">No hay acceso a servicios públicos</option>
                    <option value="5">No</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                    v-if="hogar.servicios_publicos!=''"
                  >Presenta acceso fácil a los servicios públicos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="hogar.servicios_publicos==''"
                    >Presenta acceso fácil a los servicios públicos es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Dirección (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Dirección"
                    v-model.trim="hogar.direccion"
                    :class="hogar.direccion==''?'is-invalid':'is-valid'"
                    ref="direccion"
                  />
                  <div class="valid-feedback" v-if="hogar.direccion!=''">La Dirección es Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="hogar.direccion==''">La dirección es obligatoria</span>
                  </div>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 15px;">Jefe del Hogar</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Tipo de Documento (*):</label>
                  <b-form-select
                    v-model.trim="caracData.tipo_id"
                    :class="caracData.tipo_id==''?'':'is-valid'"
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
                </div>
                <div class="col-lg-4">
                  <label>Documento (*):</label>
                  <input
                    type="text"
                    ref="identificacion"
                    class="form-control text-capitalize"
                    placeholder="Documento"
                    @change="formato('id1')"
                    v-model.trim="caracData.identificacion"
                    :class="caracData.identificacion==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-4">
                  <label>Parentesco (*):</label>
                  <b-form-select
                    v-model.trim="caracData.parentesco"
                    :class="caracData.parentesco==''?'':'is-valid'"
                    ref="parentesco"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in parentesco_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Sexo (*):</label>
                  <b-form-select
                    v-model.trim="caracData.sexo"
                    :class="caracData.sexo==''?'':'is-valid'"
                    ref="sexo"
                  >
                    <option value selected>Seleccione</option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Orientación Sexual (*):</label>
                  <b-form-select
                    v-model.trim="caracData.orientacion"
                    :class="caracData.orientacion==''?'':'is-valid'"
                    ref="sexo"
                  >
                    <option value selected>Seleccione</option>
                    <option value="HETEROSEXUAL">HETEROSEXUAL</option>
                    <option value="HOMOSEXUAL">HOMOSEXUAL</option>
                    <option value="BISEXUAL">BISEXUAL</option>
                    <option value="NODECLARA">NO DECLARA</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Identidad de Genero (*):</label>
                  <b-form-select
                    v-model.trim="caracData.identidad_genero"
                    :class="caracData.identidad_genero==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="HETEROSEXUAL">CISGENERO</option>
                    <option value="HOMOSEXUAL">TRANSGENERO</option>
                    <option value="BISEXUAL">TRANSEXUAL</option>
                    <option value="NODECLARA">TERCER GENERO Ó NO BINARIOS</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Primer Nombre (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Primer Nombre"
                    v-model.trim="caracData.pnom"
                    :class="caracData.pnom==''?'':'is-valid'"
                    ref="pnom"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Segundo Nombre:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Segundo Nombre"
                    v-model.trim="caracData.snom"
                    :class="caracData.snom==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Primer Apellido (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Primer Apellido"
                    v-model.trim="caracData.pape"
                    :class="caracData.pape==''?'':'is-valid'"
                    ref="pape"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Segundo Apellido:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Segundo Apellido"
                    v-model.trim="caracData.sape"
                    :class="caracData.sape==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Telefono:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Telefono"
                    v-model.trim="caracData.telefono"
                    :class="caracData.telefono==''?'':'is-valid'"
                    @change="formato('telefono1')"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Estado Civil (*):</label>
                  <b-form-select
                    v-model="caracData.estado_civil"
                    :class="caracData.estado_civil==''?'':'is-valid'"
                    ref="estado_civil"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in estado_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Fecha de Nacimiento (*):</label>
                  <input
                    id="date"
                    type="date"
                    placeholder="Fecha de Nacimiento"
                    v-model="caracData.fecha_nacimiento"
                    :class="caracData.fecha_nacimiento==''?'':'is-valid'"
                    class="form-control text-capitalize"
                    ref="fecha_nacimiento"
                    :max="hoy | moment"
                  />
                </div>
                <div class="col-lg-2">
                  <label>Edad:</label>
                  <input
                    type="text"
                    v-model="calEdad2"
                    class="form-control text-capitalize"
                    placeholder="Edad"
                    :class="caracData.edad==''?'':'is-valid'"
                    readonly
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-2">
                  <label>Puntaje Sisben:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    v-model.trim="caracData.puntaje_sisben"
                    :class="caracData.puntaje_sisben==''?'':'is-valid'"
                    @change="formato('puntaje1')"
                  />
                </div>

                <div class="col-lg-7">
                  <label>Eps (*):</label>
                  <b-form-select
                    v-model.trim="caracData.afiliacion_entidad"
                    :class="caracData.afiliacion_entidad==''?'':'is-valid'"
                    ref="afiliacion_entidad"
                    @change="mostrarOtro('OEPS1')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NINGUNA">NINGUNA</option>
                    <option value="OTRA">OTRA</option>
                    <option
                      v-for="item in admini_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Tipo Afiliación:</label>
                  <b-form-select
                    v-model="caracData.tipo_afiliacion"
                    :class="caracData.tipo_afiliacion==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="SUBSIDIADO">SUBSIDIADO</option>
                    <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                    <option value="ESPECIAL">ESPECIAL</option>
                    <option value="PPNA">POBLACIÓN POBRE NO ASEGURADA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOEPS1">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="caracData.otra_eps"
                    :class="caracData.otra_eps==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Embarazo:</label>
                  <b-form-select
                    v-model="caracData.embarazo"
                    :class="caracData.embarazo==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI" :disabled="inputDisabled2">SI</option>
                    <option value="NO" :disabled="inputDisabled2">NO</option>
                    <option value="NOAPLICA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Embarazo Multiple:</label>
                  <b-form-select
                    v-model="caracData.embarazo_multiple"
                    :class="caracData.embarazo_multiple==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI" :disabled="inputDisabled2">SI</option>
                    <option value="NO" :disabled="inputDisabled2">NO</option>
                    <option value="NOAPLICA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Discapacidad:</label>
                  <b-form-select
                    v-model="caracData.discapacidad"
                    :class="caracData.discapacidad==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">FISICA</option>
                    <option value="2">COGNITIVA</option>
                    <option value="3">SENSORIAL</option>
                    <option value="4">PSÍQUICA</option>
                    <option value="5">NINGUNA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Nivel Educativo:</label>
                  <b-form-select
                    v-model="caracData.nivel_escolaridad"
                    :class="caracData.nivel_escolaridad==''?'':'is-valid'"
                    @change="mostrarOtro('mOCOL1')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in escolaridad_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6" v-show="mOCOL1">
                  <label>Colegio:</label>
                  <b-form-select
                    v-model="caracData.colegio"
                    :class="caracData.colegio==''?'':'is-valid'"
                    class="form-control kt-select2 selectBus"
                    style="width: 100%"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in colegio_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3" v-show="mOCOL1">
                  <label>Grado:</label>
                  <b-form-select
                    v-model="caracData.grado"
                    :class="caracData.grado==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="Ninguno">Ninguno</option>
                    <option
                      v-for="item in grados_option[caracData.nivel_escolaridad]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Ocupación (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Ocupaciones"
                    v-model="ocupacionAuxiliar"
                    ref="ocupacion"
                    :class="ocupacionAuxiliar==''?'':'is-valid'"
                    @click="abrirModalOcupaciones('jefe')"
                    :readonly="true"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Etnia (*):</label>
                  <b-form-select
                    v-model="caracData.etnia"
                    :class="caracData.etnia==''?'':'is-valid'"
                    @change="cambiarCombo('etnia')"
                    ref="etnia"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in etnia_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>

                <div class="col-lg-4">
                  <label>Clasificación de la Etnia (*):</label>
                  <b-form-select
                    v-model="caracData.clasificacion"
                    :class="caracData.clasificacion==''?'':'is-valid'"
                    ref="clasificacion"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in clasifi_options[caracData.etnia]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>

                <div class="col-lg-4">
                  <label>Perdida de peso en los ultimos 3 meses:</label>
                  <b-form-select
                    v-model="caracData.perdida_peso"
                    :class="caracData.perdida_peso==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="ND">NO DECLARA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Entiende Español:</label>
                  <b-form-select
                    v-model="caracData.entiende"
                    :class="caracData.entiende==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>PYP:</label>
                  <b-form-select v-model="caracData.pyp" :class="caracData.pyp==''?'':'is-valid'">
                    <option value selected>Seleccione</option>
                    <option value="Crecimiento">Crecimiento y Desarrollo</option>
                    <option value="Joven">Joven</option>
                    <option value="Adulto">Adulto Mayor</option>
                    <option value="Planificacion">Planificación Familiar</option>
                    <option value="Control">Control Prenatal</option>
                    <option value="Alimentacion">Alimentación Escolar</option>
                    <option value="Ninguno">Ninguno</option>
                  </b-form-select>
                </div>
                <div class="col-lg-2">
                  <label>Migrante:</label>
                  <b-form-select
                    v-model="caracData.migrante"
                    :class="caracData.migrante==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Salario (*):</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Salario"
                    v-model.trim="caracData.salario"
                    :class="caracData.salario==''?'':'is-valid'"
                    ref="salario"
                    @change="formato('salario')"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Pertenece a algún programa del ICBF:</label>
                  <b-form-select
                    v-model="caracData.programa_icbf"
                    :class="caracData.programa_icbf==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
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
                    @click.prevent="agregarJefe"
                  >
                    <i class="fa fa-plus"></i>
                  </a>&nbsp;
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>No.</th>
                          <th>Tipo de Documento</th>
                          <th>Documento</th>
                          <th>Primer Nombre</th>
                          <th>Segundo Nombre</th>
                          <th>Primer Apellido</th>
                          <th>Segundo Apellido</th>
                          <th>Sexo</th>
                          <th>Orientación Sexual</th>
                          <th>Identidad de Genero</th>
                          <th>Parentesco</th>
                          <th>Telefono</th>
                          <th>Estado Civil</th>
                          <th>Nacimiento</th>
                          <th>Edad</th>
                          <th>Puntaje Sisben</th>
                          <th>Eps</th>
                          <th>Cual Eps</th>
                          <th>Tipo Afiliación</th>
                          <th>Embarazo</th>
                          <th>Embarazo Multiple</th>
                          <th>Discapacidad</th>
                          <th>Nivel de Escolaridad</th>
                          <th>Ocupación</th>
                          <th>Colegio</th>
                          <th>Grado</th>
                          <th>Etnia</th>
                          <th>Clasificación de la Etnia</th>
                          <th>Perdida de Peso</th>
                          <th>Entiende Español</th>
                          <th>PYP</th>
                          <th>Migrante</th>
                          <th>Salario</th>
                          <th>Programa ICBF</th>
                          <th class="text-center">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in datosJefe" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.tipo_id"
                              :class="item.tipo_id==''?'':'is-valid'"
                              @input="tipo_id=>updateJefe(item,tipo_id,'tipo_id',index)"
                              style="width:250px;"
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
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Documento"
                              v-model.trim="item.identificacion"
                              :class="item.identificacion==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'identificacion',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Primer Nombre"
                              v-model.trim="item.pnom"
                              :class="item.pnom==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'pnom',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Segundo Nombre"
                              v-model.trim="item.snom"
                              :class="item.snom==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'snom',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Primer Apellido"
                              v-model.trim="item.pape"
                              :class="item.pape==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'pape',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Segundo Apellido"
                              v-model.trim="item.sape"
                              :class="item.sape==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'sape',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.sexo"
                              :class="item.sexo==''?'':'is-valid'"
                              @input="sexo=>updateJefe(item,sexo,'sexo',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="MASCULINO">MASCULINO</option>
                              <option value="FEMENINO">FEMENINO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.orientacion"
                              :class="item.orientacion==''?'':'is-valid'"
                              @input="orientacion=>updateJefe(item,orientacion,'orientacion',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="HETEROSEXUAL">HETEROSEXUAL</option>
                              <option value="HOMOSEXUAL">HOMOSEXUAL</option>
                              <option value="BISEXUAL">BISEXUAL</option>
                              <option value="NODECLARA">NO DECLARA</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.identidad_genero"
                              :class="item.identidad_genero==''?'':'is-valid'"
                              @input="identidad_genero=>updateJefe(item,identidad_genero,'identidad_genero',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="HETEROSEXUAL">CISGENERO</option>
                              <option value="HOMOSEXUAL">TRANSGENERO</option>
                              <option value="BISEXUAL">TRANSEXUAL</option>
                              <option value="NODECLARA">TERCER GENERO Ó NO BINARIOS</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.parentesco"
                              :class="item.parentesco==''?'':'is-valid'"
                              @input="parentesco=>updateJefe(item,parentesco,'parentesco',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in parentesco_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Telefono"
                              v-model.trim="item.telefono"
                              :class="item.telefono==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'telefono',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.estado_civil"
                              :class="item.estado_civil==''?'':'is-valid'"
                              @input="estado_civil=>updateJefe(item,estado_civil,'estado_civil',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in estado_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              id="date"
                              type="date"
                              placeholder="Fecha de Nacimiento"
                              v-model="item.fecha_nacimiento"
                              :class="item.fecha_nacimiento==''?'':'is-valid'"
                              class="form-control text-capitalize"
                              :max="hoy | moment"
                              @input="changeupdateJefe(item,$event,'fecha_nacimiento',index)"
                              style="width:200px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              v-model="item.edad"
                              class="form-control text-capitalize"
                              placeholder="Edad"
                              :class="item.edad==''?'':'is-valid'"
                              readonly
                              style="width:100px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Puntaje Sisben"
                              v-model.trim="item.puntaje_sisben"
                              :class="item.puntaje_sisben==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'puntaje_sisben',index)"
                              style="width:150px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Eps"
                              v-model="item.textoEps"
                              :class="item.textoEps==''?'':'is-valid'"
                              style="width:400px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Cual"
                              v-model.trim="item.otra_eps"
                              :class="item.otra_eps==''?'':'is-valid'"
                              style="width:400px;"
                              v-show="item.afiliacion_entidad=='OTRA'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.tipo_afiliacion"
                              :class="item.tipo_afiliacion==''?'':'is-valid'"
                              @input="tipo_afiliacion=>updateJefe(item,tipo_afiliacion,'tipo_afiliacion',index)"
                              style="width:200px;"
                            >
                              <option
                                value
                                selected
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad!=''"
                              >Seleccione</option>
                              <option
                                value="0"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad!='NINGUNA'"
                              >No Aplica</option>
                              <option
                                value="SUBSIDIADO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >SUBSIDIADO</option>
                              <option
                                value="CONTRIBUTIVO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >CONTRIBUTIVO</option>
                              <option
                                value="ESPECIAL"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >ESPECIAL</option>
                              <option
                                value="PPNA"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >POBLACIÓN POBRE NO ASEGURADA</option>
                              <option
                                value="BENEFICIARIO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >BENEFICIARIO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.embarazo"
                              :class="item.embarazo==''?'':'is-valid'"
                              @input="embarazo=>updateJefe(item,embarazo,'embarazo',index)"
                              style="width:200px;"
                            >
                              <option
                                value
                                selected
                                :disabled="item.sexo=='MASCULINO' || item.sexo=='FEMENINO'"
                              >Seleccione</option>
                              <option
                                value="SI"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >SI</option>
                              <option
                                value="NO"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >NO</option>
                              <option value="NOAPLICA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.embarazo_multiple"
                              :class="item.embarazo_multiple==''?'':'is-valid'"
                              @input="embarazo_multiple=>updateJefe(item,embarazo_multiple,'embarazo_multiple',index)"
                              style="width:200px;"
                            >
                              <option
                                value
                                selected
                                :disabled="item.sexo=='MASCULINO' || item.sexo=='FEMENINO'"
                              >Seleccione</option>
                              <option
                                value="SI"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO' || item.embarazo=='NO'"
                              >SI</option>
                              <option
                                value="NO"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >NO</option>
                              <option value="NOAPLICA" :disabled="item.embarazo=='NO'">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.discapacidad"
                              :class="item.discapacidad==''?'':'is-valid'"
                              @input="discapacidad=>updateJefe(item,discapacidad,'discapacidad',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="1">FISICA</option>
                              <option value="2">COGNITIVA</option>
                              <option value="3">SENSORIAL</option>
                              <option value="4">PSÍQUICA</option>
                              <option value="5">NINGUNA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.nivel_escolaridad"
                              :class="item.nivel_escolaridad==''?'':'is-valid'"
                              @input="nivel_escolaridad=>updateJefe(item,nivel_escolaridad,'nivel_escolaridad',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="0">No Aplica</option>
                              <option
                                v-for="item in escolaridad_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Ocupación"
                              v-model="item.textoOcupacion"
                              :class="item.textoOcupacion==''?'':'is-valid'"
                              style="width:400px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Colegio"
                              v-model="item.textoColegio"
                              :class="item.textoColegio==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'colegio',index)"
                              style="width:300px;"
                              v-show="item.nivel_escolaridad==3 || item.nivel_escolaridad==14 || item.nivel_escolaridad==15"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.grado"
                              :class="item.grado==''?'':'is-valid'"
                              @input="grado=>updateJefe(item,grado,'grado',index)"
                              style="width:200px;"
                              v-show="item.nivel_escolaridad==3 || item.nivel_escolaridad==14 || item.nivel_escolaridad==15"
                            >
                              <option value selected>Seleccione</option>
                              <option value="Ninguno">Ninguno</option>
                              <option
                                v-for="item in grados_option[item.nivel_escolaridad]"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.etnia"
                              :class="item.etnia==''?'':'is-valid'"
                              @input="etnia=>updateJefe(item,etnia,'etnia',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in etnia_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.clasificacion"
                              :class="item.clasificacion==''?'':'is-valid'"
                              @input="clasificacion=>updateJefe(item,clasificacion,'clasificacion',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in clasifi_options[item.etnia]"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.perdida_peso"
                              :class="item.perdida_peso==''?'':'is-valid'"
                              @input="perdida_peso=>updateJefe(item,perdida_peso,'perdida_peso',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="ND">NO DECLARA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.entiende"
                              :class="item.entiende==''?'':'is-valid'"
                              @input="entiende=>updateJefe(item,entiende,'entiende',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.pyp"
                              :class="item.pyp==''?'':'is-valid'"
                              @input="pyp=>updateJefe(item,pyp,'pyp',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="Crecimiento">Crecimiento y Desarrollo</option>
                              <option value="Joven">Joven</option>
                              <option value="Adulto">Adulto Mayor</option>
                              <option value="Planificacion">Planificación Familiar</option>
                              <option value="Control">Control Prenatal</option>
                              <option value="Alimentacion">Alimentación Escolar</option>
                              <option value="Ninguno">Ninguno</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.migrante"
                              :class="item.migrante==''?'':'is-valid'"
                              @input="migrante=>updateJefe(item,migrante,'migrante',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Salario"
                              v-model.trim="item.salario"
                              :class="item.salario==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'salario',index)"
                              style="width:150px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.programa_icbf"
                              :class="item.programa_icbf==''?'':'is-valid'"
                              @input="programa_icbf=>updateJefe(item,programa_icbf,'programa_icbf',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemJefe(index,item)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="kt-separator kt-separator--border-dashed"></div>
                  </div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">B.Integrantes de la familia</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Tipo de Documento:</label>
                  <b-form-select
                    v-model="CA1.tipo_id"
                    @change="formato('tipoid2')"
                    :class="CA1.tipo_id=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="CC">CEDULA DE CIUDADANIA</option>
                    <option value="PA">PASAPORTE</option>
                    <option value="RC">REGISTRO CIVIL</option>
                    <option value="TI">TARJETA DE IDENTIDAD</option>
                    <option value="ASI">ADULTO SIN IDENTIFICACIÓN</option>
                    <option value="MSI">MENOR SIN IDENTIFICACIÓN</option>
                    <option value="CE">CEDULA DE EXTRANJERIA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Documento:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Documento"
                    v-model="CA1.identificacion"
                    @change="formato('id2')"
                    :class="CA1.identificacion==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-4">
                  <label>Parentesco:</label>
                  <b-form-select
                    v-model="CA1.parentesco"
                    :class="CA1.parentesco=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in parentesco_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Sexo:</label>
                  <b-form-select v-model="CA1.sexo" :class="CA1.sexo=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMENINO">FEMENINO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Orientación Sexual (*):</label>
                  <b-form-select
                    v-model.trim="CA1.orientacion"
                    :class="CA1.orientacion=='0'?'':'is-valid'"
                    ref="sexo"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="HETEROSEXUAL">HETEROSEXUAL</option>
                    <option value="HOMOSEXUAL">HOMOSEXUAL</option>
                    <option value="BISEXUAL">BISEXUAL</option>
                    <option value="NODECLARA">NO DECLARA</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Identidad de Genero (*):</label>
                  <b-form-select
                    v-model.trim="CA1.identidad_genero"
                    :class="CA1.identidad_genero=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="HETEROSEXUAL">CISGENERO</option>
                    <option value="HOMOSEXUAL">TRANSGENERO</option>
                    <option value="BISEXUAL">TRANSEXUAL</option>
                    <option value="NODECLARA">TERCER GENERO Ó NO BINARIOS</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Primer Nombre:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Primer Nombre"
                    v-model="CA1.pnom"
                    :class="CA1.pnom==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Segundo Nombre:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Segundo Nombre"
                    v-model="CA1.snom"
                    :class="CA1.snom==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Primer Apellido:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Primer Apellido"
                    v-model="CA1.pape"
                    :class="CA1.pape==''?'':'is-valid'"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Segundo Apellido:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Segundo Apellido"
                    v-model="CA1.sape"
                    :class="CA1.sape==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Telefono:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Telefono"
                    v-model.trim="CA1.telefono"
                    :class="CA1.telefono==''?'':'is-valid'"
                    @change="formato('telefono2')"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Estado Civil:</label>
                  <b-form-select
                    v-model="CA1.estado_civil"
                    :class="CA1.estado_civil=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in estado_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Puntaje Sisben:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    v-model.trim="CA1.puntaje_sisben"
                    :class="CA1.puntaje_sisben==''?'':'is-valid'"
                    @change="formato('puntaje')"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Fecha de Nacimiento:</label>
                  <input
                    id="date"
                    type="date"
                    placeholder="Fecha de Nacimiento"
                    v-model="CA1.fecha_nac"
                    :class="CA1.fecha_nac==''?'':'is-valid'"
                    class="form-control text-capitalize"
                    ref="fecha_nacimiento"
                    :max="hoy | moment"
                    @change="calculaEdad"
                  />
                </div>
                <div class="col-lg-2">
                  <label>Edad:</label>
                  <input
                    type="text"
                    v-model="calEdad"
                    class="form-control text-capitalize"
                    placeholder="Edad"
                    :class="CA1.edad==''?'':'is-valid'"
                    readonly
                  />
                </div>
                <div class="col-lg-2">
                  <label>Meses:</label>
                  <input
                    type="text"
                    v-model="CA1.meses"
                    class="form-control text-capitalize"
                    placeholder="Edad"
                    :class="CA1.meses==''?'':'is-valid'"
                    readonly
                  />
                </div>
                <div class="col-lg-2">
                  <label>Dias:</label>
                  <input
                    type="text"
                    v-model="CA1.dias"
                    class="form-control text-capitalize"
                    placeholder="Edad"
                    :class="CA1.dias==''?'':'is-valid'"
                    readonly
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-8">
                  <label>EPS:</label>
                  <b-form-select
                    v-model="CA1.afi_entidad"
                    :class="CA1.afi_entidad=='0'?'':'is-valid'"
                    @change="mostrarOtro('OEPS2')"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="NINGUNA">NINGUNA</option>
                    <option value="OTRA">OTRA</option>
                    <option
                      v-for="item in admini_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-2">
                  <label>Tipo Afiliación:</label>
                  <b-form-select
                    v-model="CA1.tipo_afiliacion"
                    :class="CA1.tipo_afiliacion=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SUBSIDIADO">SUBSIDIADO</option>
                    <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                    <option value="ESPECIAL">ESPECIAL</option>
                    <option value="PPNA">POBLACIÓN POBRE NO ASEGURADA</option>
                    <option value="BENEFICIARIO">BENEFICIARIO</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOEPS2">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="CA1.otra_eps"
                    :class="CA1.otra_eps==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Embarazo:</label>
                  <b-form-select v-model="CA1.embarazo" :class="CA1.embarazo=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="SI" :disabled="inputDisabled">SI</option>
                    <option value="NO" :disabled="inputDisabled">NO</option>
                    <option value="NOAPLICA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Embarazo Multiple:</label>
                  <b-form-select
                    v-model="CA1.embarazo_multiple"
                    :class="CA1.embarazo_multiple=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="SI" :disabled="inputDisabled">SI</option>
                    <option value="NO" :disabled="inputDisabled">NO</option>
                    <option value="NOAPLICA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Discapacidad:</label>
                  <b-form-select
                    v-model="CA1.discapacidad"
                    :class="CA1.discapacidad=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="1">FISICA</option>
                    <option value="2">COGNITIVA</option>
                    <option value="3">SENSORIAL</option>
                    <option value="4">PSÍQUICA</option>
                    <option value="5">NINGUNA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Nivel Educativo:</label>
                  <b-form-select
                    v-model="CA1.escolaridad"
                    :class="CA1.escolaridad=='0'?'':'is-valid'"
                    @change="mostrarOtro('mOCOL2')"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option
                      v-for="item in escolaridad_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6" v-show="mOCOL2">
                  <label>Colegio:</label>
                  <b-form-select v-model="CA1.colegio" :class="CA1.colegio==''?'':'is-valid'">
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in colegio_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3" v-show="mOCOL2">
                  <label>Grado:</label>
                  <b-form-select v-model="CA1.grado" :class="CA1.grado=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option
                      v-for="item in grados_option[CA1.escolaridad]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Ocupación:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Ocupaciones"
                    v-model="ocupacionAuxiliar2"
                    ref="ocupacion"
                    :class="ocupacionAuxiliar2==''?'':'is-valid'"
                    @click="abrirModalOcupaciones('inte')"
                    :readonly="true"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Etnia:</label>
                  <b-form-select
                    v-model="CA1.etnia"
                    :class="CA1.etnia=='0'?'':'is-valid'"
                    @change="cambiarCombo('etnia')"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in etnia_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>

                <div class="col-lg-4">
                  <label>Clasificación de la Etnia:</label>
                  <b-form-select
                    v-model="CA1.clasificacion"
                    :class="CA1.clasificacion=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in clasifi_options[CA1.etnia]"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>

                <div class="col-lg-4">
                  <label>Perdida de peso en los ultimos 3 meses:</label>
                  <b-form-select
                    v-model="CA1.perdida_peso"
                    :class="CA1.perdida_peso=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="ND">NO DECLARA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Entiende Español:</label>
                  <b-form-select v-model="CA1.entiende" :class="CA1.entiende=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>PYP:</label>
                  <b-form-select v-model="CA1.pyp" :class="CA1.pyp=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="Crecimiento">Crecimiento y Desarrollo</option>
                    <option value="Joven">Joven</option>
                    <option value="Adulto">Adulto Mayor</option>
                    <option value="Planificacion">Planificación Familiar</option>
                    <option value="Control">Control Prenatal</option>
                    <option value="Alimentacion">Alimentación Escolar</option>
                    <option value="Ninguno">Ninguno</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Migrante:</label>
                  <b-form-select v-model="CA1.migrante" :class="CA1.migrante=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-3">
                  <label>Pertenece a algún programa del ICBF:</label>
                  <b-form-select
                    v-model="CA1.programa_icbf"
                    :class="CA1.programa_icbf=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Jefe del hogar:</label>
                  <b-form-select v-model="CA1.jefe" :class="CA1.jefe=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in datosJefe"
                      :value="item.identificacion"
                      :key="item.value"
                    >{{item.pnom.toUpperCase()}} {{item.snom.toUpperCase()}} {{item.pape.toUpperCase()}} {{item.sape.toUpperCase()}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Excepciones:</label>
                  <b-form-select
                    v-model="CA1.excepciones"
                    :class="CA1.excepciones=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option value="1">Vida sexual prematura</option>
                    <option value="2">Consumo de tabaco</option>
                    <option value="3">Consumo de SPA</option>
                    <option value="4">Consumo de alcohol</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
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
                    @click.prevent="agregar"
                  >
                    <i class="fa fa-plus"></i>
                  </a>&nbsp;
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>No.</th>
                          <th>Tipo de Documento</th>
                          <th>Documento</th>
                          <th>Primer Nombre</th>
                          <th>Segundo Nombre</th>
                          <th>Primer Apellido</th>
                          <th>Segundo Apellido</th>
                          <th>Sexo</th>
                          <th>Orientación Sexual</th>
                          <th>Identidad de Genero</th>
                          <th>Parentesco</th>
                          <th>Telefono</th>
                          <th>Estado Civil</th>
                          <th>Nacimiento</th>
                          <th>Edad</th>
                          <th>Puntaje Sisben</th>
                          <th>Eps</th>
                          <th>Cual Eps</th>
                          <th>Tipo Afiliación</th>
                          <th>Embarazo</th>
                          <th>Embarazo Multiple</th>
                          <th>Discapacidad</th>
                          <th>Nivel de Escolaridad</th>
                          <th>Ocupación</th>
                          <th>Colegio</th>
                          <th>Grado</th>
                          <th>Etnia</th>
                          <th>Clasificación de la Etnia</th>
                          <th>Perdida de Peso</th>
                          <th>Entiende Español</th>
                          <th>PYP</th>
                          <th>Migrante</th>
                          <th>Programa ICBF</th>
                          <th>Jefe de Hogar</th>
                          <th>Excepciones</th>
                          <th class="text-center">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in datos" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.tipo_id"
                              :class="item.tipo_id=='0'?'':'is-valid'"
                              @input="tipo_id=>updateIntegrante(item,tipo_id,'tipo_id',index)"
                              style="width:250px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="CC">CEDULA DE CIUDADANIA</option>
                              <option value="PA">PASAPORTE</option>
                              <option value="RC">REGISTRO CIVIL</option>
                              <option value="TI">TARJETA DE IDENTIDAD</option>
                              <option value="ASI">ADULTO SIN IDENTIFICACIÓN</option>
                              <option value="MSI">MENOR SIN IDENTIFICACIÓN</option>
                              <option value="CE">CEDULA DE EXTRANJERIA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Documento"
                              v-model.trim="item.identificacion"
                              :class="item.identificacion==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'identificacion',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Primer Nombre"
                              v-model.trim="item.pnom"
                              :class="item.pnom==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'pnom',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Segundo Nombre"
                              v-model.trim="item.snom"
                              :class="item.snom==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'snom',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Primer Apellido"
                              v-model.trim="item.pape"
                              :class="item.pape==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'pape',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Segundo Apellido"
                              v-model.trim="item.sape"
                              :class="item.sape==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'sape',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.sexo"
                              :class="item.sexo=='0'?'':'is-valid'"
                              @input="sexo=>updateIntegrante(item,sexo,'sexo',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="MASCULINO">MASCULINO</option>
                              <option value="FEMENINO">FEMENINO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.orientacion"
                              :class="item.orientacion=='0'?'':'is-valid'"
                              @input="orientacion=>updateIntegrante(item,orientacion,'orientacion',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="HETEROSEXUAL">HETEROSEXUAL</option>
                              <option value="HOMOSEXUAL">HOMOSEXUAL</option>
                              <option value="BISEXUAL">BISEXUAL</option>
                              <option value="NODECLARA">NO DECLARA</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.identidad_genero"
                              :class="item.identidad_genero=='0'?'':'is-valid'"
                              @input="identidad_genero=>updateIntegrante(item,identidad_genero,'identidad_genero',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="HETEROSEXUAL">CISGENERO</option>
                              <option value="HOMOSEXUAL">TRANSGENERO</option>
                              <option value="BISEXUAL">TRANSEXUAL</option>
                              <option value="NODECLARA">TERCER GENERO Ó NO BINARIOS</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.parentesco"
                              :class="item.parentesco=='0'?'':'is-valid'"
                              @input="parentesco=>updateIntegrante(item,parentesco,'parentesco',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option
                                v-for="item in parentesco_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Telefono"
                              v-model.trim="item.telefono"
                              :class="item.telefono==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'telefono',index)"
                              style="width:200px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.estado_civil"
                              :class="item.estado_civil=='0'?'':'is-valid'"
                              @input="estado_civil=>updateIntegrante(item,estado_civil,'estado_civil',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option
                                v-for="item in estado_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              id="date"
                              type="date"
                              placeholder="Fecha de Nacimiento"
                              v-model="item.fecha_nac"
                              :class="item.fecha_nac==''?'':'is-valid'"
                              class="form-control text-capitalize"
                              :max="hoy | moment"
                              @input="changeupdateIntegrante(item,$event,'fecha_nac',index)"
                              style="width:200px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              v-model="item.edad"
                              class="form-control text-capitalize"
                              placeholder="Edad"
                              :class="item.edad==''?'':'is-valid'"
                              readonly
                              style="width:100px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Puntaje Sisben"
                              v-model.trim="item.puntaje_sisben"
                              :class="item.puntaje_sisben==''?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'puntaje_sisben',index)"
                              style="width:150px;"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Ocupación"
                              v-model="item.textoEps"
                              :class="item.textoEps==''?'':'is-valid'"
                              style="width:400px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Cual"
                              v-model.trim="item.otra_eps"
                              :class="item.otra_eps==''?'':'is-valid'"
                              style="width:400px;"
                              v-show="item.afi_entidad=='OTRA'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.tipo_afiliacion"
                              :class="item.tipo_afiliacion=='0'?'':'is-valid'"
                              @input="tipo_afiliacion=>updateIntegrante(item,tipo_afiliacion,'tipo_afiliacion',index)"
                              style="width:200px;"
                            >
                              <option
                                value="0"
                                selected
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad!=''"
                              >Seleccione</option>
                              <option
                                value="NA"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad!='NINGUNA'"
                              >No Aplica</option>
                              <option
                                value="SUBSIDIADO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >SUBSIDIADO</option>
                              <option
                                value="CONTRIBUTIVO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >CONTRIBUTIVO</option>
                              <option
                                value="ESPECIAL"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >ESPECIAL</option>
                              <option
                                value="PPNA"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >POBLACIÓN POBRE NO ASEGURADA</option>
                              <option
                                value="BENEFICIARIO"
                                :disabled="item.afiliacion_entidad=='' || item.afiliacion_entidad=='NINGUNA'"
                              >BENEFICIARIO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.embarazo"
                              :class="item.embarazo=='0'?'':'is-valid'"
                              @input="embarazo=>updateIntegrante(item,embarazo,'embarazo',index)"
                              style="width:200px;"
                            >
                              <option
                                value="0"
                                selected
                                :disabled="item.sexo=='MASCULINO' || item.sexo=='FEMENINO'"
                              >Seleccione</option>
                              <option
                                value="SI"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >SI</option>
                              <option
                                value="NO"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >NO</option>
                              <option value="NOAPLICA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.embarazo_multiple"
                              :class="item.embarazo_multiple=='0'?'':'is-valid'"
                              @input="embarazo_multiple=>updateIntegrante(item,embarazo_multiple,'embarazo_multiple',index)"
                              style="width:200px;"
                            >
                              <option
                                value="0"
                                selected
                                :disabled="item.sexo=='MASCULINO' || item.sexo=='FEMENINO'"
                              >Seleccione</option>
                              <option
                                value="SI"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO' || item.embarazo=='NO'"
                              >SI</option>
                              <option
                                value="NO"
                                :disabled="item.sexo=='' || item.sexo=='MASCULINO'"
                              >NO</option>
                              <option value="NOAPLICA" :disabled="item.embarazo=='NO'">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.discapacidad"
                              :class="item.discapacidad=='0'?'':'is-valid'"
                              @input="discapacidad=>updateIntegrante(item,discapacidad,'discapacidad',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="1">FISICA</option>
                              <option value="2">COGNITIVA</option>
                              <option value="3">SENSORIAL</option>
                              <option value="4">PSÍQUICA</option>
                              <option value="5">NINGUNA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.escolaridad"
                              :class="item.escolaridad=='0'?'':'is-valid'"
                              @input="escolaridad=>updateIntegrante(item,escolaridad,'escolaridad',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option
                                v-for="item in escolaridad_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Ocupación"
                              v-model="item.textoOcupacion"
                              :class="item.textoOcupacion==''?'':'is-valid'"
                              style="width:400px;"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              placeholder="Colegio"
                              v-model="item.textoColegio"
                              :class="item.textoColegio=='0'?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'colegio',index)"
                              style="width:300px;"
                              v-show="item.escolaridad==3 || item.escolaridad==14 || item.escolaridad==15"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.grado"
                              :class="item.grado=='0'?'':'is-valid'"
                              @input="grado=>updateIntegrante(item,grado,'grado',index)"
                              style="width:200px;"
                              v-show="item.escolaridad==3 || item.escolaridad==14 || item.escolaridad==15"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="Ninguno">Ninguno</option>
                              <option
                                v-for="item in grados_option[item.escolaridad]"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.etnia"
                              :class="item.etnia=='0'?'':'is-valid'"
                              @input="etnia=>updateIntegrante(item,etnia,'etnia',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option
                                v-for="item in etnia_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.clasificacion"
                              :class="item.clasificacion=='0'?'':'is-valid'"
                              @input="clasificacion=>updateIntegrante(item,clasificacion,'clasificacion',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option
                                v-for="item in clasifi_options[item.etnia]"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.perdida_peso"
                              :class="item.perdida_peso==''?'':'is-valid'"
                              @input="perdida_peso=>updateIntegrante(item,perdida_peso,'perdida_peso',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="ND">NO DECLARA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.entiende"
                              :class="item.entiende=='0'?'':'is-valid'"
                              @input="entiende=>updateIntegrante(item,entiende,'entiende',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.pyp"
                              :class="item.pyp=='0'?'':'is-valid'"
                              @input="pyp=>updateIntegrante(item,pyp,'pyp',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="Crecimiento">Crecimiento y Desarrollo</option>
                              <option value="Joven">Joven</option>
                              <option value="Adulto">Adulto Mayor</option>
                              <option value="Planificacion">Planificación Familiar</option>
                              <option value="Control">Control Prenatal</option>
                              <option value="Alimentacion">Alimentación Escolar</option>
                              <option value="Ninguno">Ninguno</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.migrante"
                              :class="item.migrante=='0'?'':'is-valid'"
                              @input="migrante=>updateIntegrante(item,migrante,'migrante',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.programa_icbf"
                              :class="item.programa_icbf==''?'':'is-valid'"
                              @input="programa_icbf=>updateIntegrante(item,programa_icbf,'programa_icbf',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model.trim="item.jefe"
                              :class="item.jefe=='0'?'':'is-valid'"
                              @input="jefe=>updateIntegrante(item,jefe,'jefe',index)"
                              style="width:400px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option
                                v-for="item in datosJefe"
                                :value="item.identificacion"
                                :key="item.value"
                              >{{item.pnom.toUpperCase()}} {{item.snom.toUpperCase()}} {{item.pape.toUpperCase()}} {{item.sape.toUpperCase()}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              v-model="item.excepciones"
                              :class="item.excepciones==''?'':'is-valid'"
                              @input="excepciones=>updateIntegrante(item,excepciones,'excepciones',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="1">Vida sexual prematura</option>
                              <option value="2">Consumo de tabaco</option>
                              <option value="3">Consumo de SPA</option>
                              <option value="4">Consumo de alcohol</option>
                              <option value="NA">NO APLICA</option>
                            </b-form-select>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItem(index,item)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="kt-separator kt-separator--border-dashed"></div>
                  </div>
                </div>
              </div>
              <br />
              <br />
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >FACTORES DE RIESGO Y PROTECTORES DE LA FAMILIA</span>
              </p>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th
                            class="kt-bg-fill-success"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="5"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Como Corrige Usted a Sus Hijos</th>
                          <th
                            class="kt-bg-fill-warning"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Adicciones</th>
                          <th
                            class="kt-bg-fill-brand"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Violencia Intrafamiliar</th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="2"
                          >Estilos de Vida Saludables</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Partiicipa en Grupos Organizados</th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-success">No.</td>
                          <td class="kt-bg-fill-success">Documento</td>
                          <td class="kt-bg-fill-success">Nombre</td>
                          <td class="kt-bg-fill-success">Sexo</td>
                          <td class="kt-bg-fill-success">Edad</td>
                          <td class="kt-bg-fill-danger">Dialogos</td>
                          <td class="kt-bg-fill-danger">Sanción ó Supresión</td>
                          <td class="kt-bg-fill-danger">Castigo Verbal</td>
                          <td class="kt-bg-fill-danger">Castigo Fisico</td>
                          <td class="kt-bg-fill-warning">Alcohol</td>
                          <td class="kt-bg-fill-warning">Tabaco</td>
                          <td class="kt-bg-fill-warning">Sustancias Psicoactivas</td>
                          <td class="kt-bg-fill-warning">Apuestas</td>
                          <td class="kt-bg-fill-brand">Violencia Fisica</td>
                          <td class="kt-bg-fill-brand">Violencia Psicologica</td>
                          <td class="kt-bg-fill-brand">Violencia Economica</td>
                          <td class="kt-bg-fill-brand">Abuso Sexual</td>
                          <td class="kt-bg-fill-dark">Actividad Fisica</td>
                          <td class="kt-bg-fill-dark">Consumo de Frutas y Verduras</td>
                          <td class="kt-bg-fill-danger">Religiosos</td>
                          <td class="kt-bg-fill-danger">Sociales</td>
                          <td class="kt-bg-fill-danger">Culturales</td>
                          <td class="kt-bg-fill-danger">Recreativos</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in factores" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:100px;background-color:white;"
                              :value="(index+1) "
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:200px;background-color:white;"
                              :value="item.tipo_id+' : '+item.identificacion"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:300px;background-color:white;"
                              :value="item.pnom+' '+item.snom+' '+item.pape+' '+item.sape "
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:150px;background-color:white;"
                              :value="item.sexo"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:100px;background-color:white;"
                              :value="item.edad"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dialogos"
                              :class="item.dialogos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.sancion"
                              :class="item.sancion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.castigo_verbal"
                              :class="item.castigo_verbal==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.castigo_fisico"
                              :class="item.castigo_fisico==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.alcohol"
                              :class="item.alcohol==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tabaco"
                              :class="item.tabaco==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.sustancias_psico"
                              :class="item.sustancias_psico==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.apuestas"
                              :class="item.apuestas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.violencia_fisica"
                              :class="item.violencia_fisica==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.violencia_psico"
                              :class="item.violencia_psico==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.violencia_economica"
                              :class="item.violencia_economica==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.abuso_sexual"
                              :class="item.abuso_sexual==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.actividad_fisica"
                              :class="item.actividad_fisica==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consumo_frutas"
                              :class="item.consumo_frutas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.religiosos"
                              :class="item.religiosos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.sociales"
                              :class="item.sociales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.culturales"
                              :class="item.culturales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.recreativos"
                              :class="item.recreativos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
            </div>
            <!-- Identificación -->
          </div>
        </div>

        <!--begin::Modal-->
        <b-modal
          ref="modalOcupaciones"
          hide-footer
          title="Ocupaciones"
          size="xl"
          centered
          header-bg-variant="danger"
          header-text-variant="light"
          :no-close-on-backdrop="true"
        >
          <div class="d-block">
            <form>
              <div class="row">
                <div class="col-md-6 col-lg-6"></div>
                <div class="col-md-6 col-lg-6">
                  <form class="kt-form">
                    <div class="form-group">
                      <div class="input-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Busqueda"
                          v-model="txtbusqueda"
                        />
                        <div class="input-group-append">
                          <button
                            type="button"
                            class="btn btn-primary btn-icon"
                            @click="consultarOcupaciones(1)"
                          >
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="table-responsive" style="height: 350px;">
                    <table class="table table-sm table-hover">
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>No.</th>
                          <th>Ocupación</th>
                          <td class="text-center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in ocupacionesVector" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.descripcion}}</span>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-success"
                              type="button"
                              title="Seleccionar"
                              @click="seleccionarOcupaciones(item)"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                version="1.1"
                                class="kt-svg-icon"
                              >
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                  <path
                                    d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                    id="Path-94"
                                    fill="#000000"
                                    fill-rule="nonzero"
                                    transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                                  />
                                </g>
                              </svg>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-warning" @click="cerrarModal">
                  <i class="fa fa-window-close"></i> Cerrar
                </button>
              </div>
            </form>
          </div>
        </b-modal>
        <!--end::Modal-->

        <!--begin::Modal-->
        <b-modal
          ref="modalActividad"
          hide-footer
          title="Actividades Economicas"
          size="xl"
          centered
          header-bg-variant="danger"
          header-text-variant="light"
          :no-close-on-backdrop="true"
        >
          <div class="d-block">
            <form>
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <form class="kt-form">
                    <div class="form-group">
                      <div class="input-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Busqueda"
                          v-model="txtbusquedaAct"
                        />
                        <div class="input-group-append">
                          <button
                            type="button"
                            class="btn btn-primary btn-icon"
                            @click="consultarActividades(1)"
                          >
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="table-responsive" style="height: 350px;">
                    <table class="table table-sm table-hover">
                      <thead class>
                        <tr class="kt-bg-fill-brand">
                          <th>No.</th>
                          <th>Actividad Economica</th>
                          <td class="text-center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in actividadesVector" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.descripcion}}</span>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-success"
                              type="button"
                              title="Seleccionar"
                              @click="seleccionarActividades(item)"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                version="1.1"
                                class="kt-svg-icon"
                              >
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                  <path
                                    d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                    id="Path-94"
                                    fill="#000000"
                                    fill-rule="nonzero"
                                    transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                                  />
                                </g>
                              </svg>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-warning" @click="cerrarModal">
                  <i class="fa fa-window-close"></i> Cerrar
                </button>
              </div>
            </form>
          </div>
        </b-modal>
        <!--end::Modal-->
      </div>
    </div>
  </div>
  <!--End::Section-->
</template>
<script>
  "use strict";

  import * as caracterizacionServicios from "../../Servicios/caracterizacion_servicios";
  import * as barriosServicios from "../../Servicios/barrios_servicios";
  import * as colegiosServicios from "../../Servicios/colegios_servicios";
  import * as ocupacionesServicios from "../../Servicios/ocupaciones_servicios";
  import * as actividadesServicios from "../../Servicios/actividad_servicios";
  import Datepicker from "vuejs-datepicker";
  import { en, es } from "vuejs-datepicker/dist/locale";

  const isPhoneNumber = helpers.regex("numeric", /^3[0-9]{9}$/);
  const alpha = helpers.regex("alpha", /^[a-zA-Z]*$/);
  const alphaNumAndDotValidator = helpers.regex("alphaNumAndDot", /^[a-z\d.]*$/i);
  const entero = value => {
    return /^[0-9]*$/.test(value);
  };

  import {
    required,
    numeric,
    helpers,
    minLength,
    maxLength,
    decimal,
    alphaNum
  } from "vuelidate/lib/validators";
  export default {
    components: {
      Datepicker
    },
    mounted() {
      this.hoy = moment();
      this.IDHOGAR = this.$route.params.IDHOGAR;
      this.nuevo(this.IDHOGAR);
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
    data() {
      return {
        hoy: "",
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        dpto_options: [],
        muni_options: {},
        corregi_options: {},
        barrio_options: {},
        parentesco_options: {},
        estado_options: {},
        escolaridad_options: {},
        ocupacion_options: {},
        etnia_options: {},
        admini_options: {},
        clasifi_options: {},
        vereda_options: {},
        grados_option: {},
        morbilidadNacer_options: {},
        morbilidad_options: {},
        metodos_options: {},
        motivos_options: {},
        grupos_options: {},
        enfcro_options: {},
        enfinf_options: {},
        religion_options: {},
        colegio_options: {},
        opciones1: [
          { value: 1, texto: "Ninguno" },
          { value: 2, texto: "1 Celular" },
          { value: 3, texto: "2 Celulares" },
          { value: 4, texto: "Tiene 3 Celulares" },
          { value: 5, texto: "Tiene 4 o mas Celulares" }
        ],
        opciones2: [
          { value: 1, texto: "No Tiene" },
          { value: 2, texto: "1 Tv" },
          { value: 3, texto: "2 Tv" },
          { value: 4, texto: "3 o mas tv" }
        ],
        opciones3: [
          { value: 1, texto: "No tene Vehiculos" },
          { value: 2, texto: "1 Vehiculo" },
          { value: 3, texto: "2 Vehiculos" },
          { value: 4, texto: "3 o mas Vehiculos" }
        ],
        opciones4: [
          { value: 1, texto: "Sin estudios" },
          { value: 2, texto: "Primaria incompleta" },
          { value: 3, texto: "Prmaria Completa" },
          { value: 4, texto: "Secundaria Incompleta" },
          { value: 5, texto: "Secundaria completa" },
          { value: 6, texto: "Educación superior incompleta" },
          { value: 7, texto: "Educación superior completa" },
          { value: 8, texto: "Posgrado" }
        ],
        opciones5: [
          { value: 1, texto: "Entre $0  y $500.000 pesos" },
          { value: 2, texto: "Entre $500.001 Y $1.100.000 pesos" },
          { value: 3, texto: "Entre $1.100.001 a $2.069.000" },
          { value: 4, texto: "Entre $2.070.000 y $3.269.000" },
          { value: 5, texto: "Entre $3.270.000 y $4.780.000" },
          { value: 6, texto: "Entre $4,780.001 y $5.150.000" },
          { value: 7, texto: "Más de $5.150.000" },
          { value: 8, texto: "No aplica" }
        ],
        opciones6: [
          { value: 1, texto: "Entre $ 0 y $ 980.000" },
          { value: 2, texto: "Entre $981.000  y $ 1.890.000" },
          { value: 3, texto: "Entre $1.890,001  y $3.305.000" },
          { value: 4, texto: "Entre $ 3.305.001  y  $ 5.050.000" },
          { value: 5, texto: "Entre $ 5.050.001 y  $ 7.650.000" },
          { value: 6, texto: "Entre $ 7.650.001 y $ 10.170.000" },
          { value: 7, texto: "Mas de $ 10.170.001" },
          { value: 8, texto: "No aplica" }
        ],
        hogar: {
          id: 0,
          id_dpto: "",
          id_mun: "",
          id_corre: "",
          id_vereda: "",
          id_barrio: "",
          id_zona: "",
          tenencia_vivienda: "",
          numero_hogares: "",
          poblacion_especial: "",
          vias_acceso: "",
          servicios_publicos: "",
          direccion: ""
        },
        caracData: {
          id: 0,
          id_hogar: 0,
          telefono: "",
          puntaje_sisben: "",
          afiliacion_entidad: "",
          otra_eps: "",
          tipo_id: "",
          identificacion: "",
          sexo: "",
          parentesco: "",
          pnom: "",
          snom: "",
          pape: "",
          sape: "",
          salario: "",
          id_compania: "",
          estado: "",
          estado_civil: "",
          fecha_nacimiento: "",
          tipo_afiliacion: "",
          embarazo: "",
          embarazo_multiple: "",
          discapacidad: "",
          nivel_escolaridad: "",
          ocupacion: "",
          colegio: "",
          grado: "",
          etnia: "",
          clasificacion: "",
          entiende: "",
          pyp: "",
          migrante: "",
          edad: "",
          orientacion: "",
          identidad_genero: "",
          perdida_peso: "",
          programa_icbf: ""
        },
        CA1: {
          id: 0,
          tipo_id: "0",
          identificacion: "",
          sexo: "0",
          parentesco: "0",
          pnom: "",
          snom: "",
          pape: "",
          sape: "",
          estado_civil: "0",
          fecha_nac: "",
          edad: 0,
          puntaje_sisben: "",
          afi_entidad: "0",
          otra_eps: "",
          tipo_afiliacion: "0",
          embarazo: "0",
          embarazo_multiple: "0",
          discapacidad: "0",
          escolaridad: "0",
          ocupacion: "0",
          colegio: "",
          grado: "0",
          entiende: "0",
          migrante: "0",
          pyp: "0",
          etnia: "0",
          clasificacion: "0",
          id_hogar: 0,
          jefe: "0",
          orientacion: "0",
          identidad_genero: "0",
          telefono: "",
          perdida_peso: "0",
          programa_icbf: "0",
          excepciones: "0",
          meses: 0,
          dias: 0
        },
        viviendaData: {
          id: 0,
          id_hogar: 0,
          tipo_vivienda: "",
          tipo_estructura: "",
          otro_tipo_estructura: "",
          numero_cuartos: "",
          personas_por_cuartos: "0",
          material_predominante: "",
          tipo_cubierta: "",
          otro_tipo_cubierta: "",
          actividad_economica: "",
          cual_actividad_economica: "",
          evento_afecta_vivienda: "",
          familias_accion: "",
          promedio_ingresos: "",
          promedio_gastos: "",
          fuente_agua: "",
          energia_electrica: "",
          gas_natural: "",
          acueducto: "",
          alcantarillado: "",
          telefono_fijo: "",
          aseo: "",
          internet_subsidiado: "",
          internet_privado: "",
          cual_fuente: "",
          donde_almacena_agua: "",
          otro_almacena_agua: "",
          ubicacion_tanque: "",
          tipo_tratamiento_agua: "",
          destino_final_basura: "",
          otro_destino_final_basura: "",
          porquerizas: "",
          plagas: "",
          industrias: "",
          malos_olores: "",
          rellenos: "",
          contaminacion_a: "",
          contaminacion_v: "",
          rio: "",
          otro_cerca: "",
          cual_cerca: "",
          aereopuertos: "",
          avenidas_transitadas: "",
          lotes_abandonados: "",
          servicio_sanitario: "",
          donde_sanitario: "",
          excretas: "",
          otro_depositan_excretas: "",
          cocina: "",
          dormitorio_a: "",
          sala: "",
          dormitorio_n: "",
          sanitario: "",
          lavadero: "",
          iluminacion_adecuada: "",
          techo_adecuado: "",
          ventilacion_adecuada: "",
          pisos_adecuado: "",
          paredes_adecuadas: "",
          gasolina: "",
          plaguicidas: "",
          detergentes: "",
          plaguicidas_insectos: "",
          envases_vacios: "",
          otro_envases_vacios: "",
          elementos_protecion: "",
          otro_elementos_protecion: "",
          metodos_coccion: "",
          otro_metodos_coccion: "",
          lugares_preparan_alimentos: "",
          lugares_almacenan_alimentos: "",
          otro_lugares_almacenan_alimentos: "",
          lava_frutas: "",
          tipo_explotacion: "",
          otro_tipo_explotacion: "",
          flora_afectados: "",
          fauna_afectados: "",
          suelo_afectados: "",
          aire_afectados: "",
          agua_afectados: "",
          residuos_solidos_genera: "",
          aguas_servidas_genera: "",
          desechos_cocina_genera: "",
          heces_animales_genera: "",
          quimicos_genera: "",
          otros_genera: "",
          cual_genera: "",
          tipo_combustible: "",
          mantenimiento_red: "",
          zona_alto_riesgo: "",
          almacenamiento_residuos: "",
          fuente_contaminacion: "",
          aguas_negras: "",
          zonas_verdes: "",
          desplazamientos: "",
          rotacion_cultivo: "",
          emplea_fertilizantes: "",
          suministro_energia_ilegal: "",
          quema_cultivo: "",
          mantenimiento_preventivo: "",
          veces_inundaciones: "",
          fachada: "",
          cuantos_baños: "",
          estado_conservacion_baños: "",
          acabados_externos: "",
          estado_conservacion_estructuras: "",
          mobiliario_cocina: "",
          andenes: ""
        },
        estratificacionData: {
          cuenta_internet: "",
          tiene_pc_escritorio: "",
          tiene_pc_portatil: "",
          cuantos_celulares: "",
          tiene_equipo_sonido: "",
          cuantos_tv_color: "",
          cuantos_vehiculos: "",
          nivel_instruccion: "",
          afiliacion_salud_privada: "",
          ingresos_zona_rural: "",
          ingresos_ciudad: "",
          id_jefe: "0"
        },
        animalesData: [],
        estratificacion: [],
        animal: "",
        nombreAnimal: "",
        cuantosAnimal: "",
        vacunadoAnimal: "0",
        mOTE: false,
        mOTC: false,
        mOAE: false,
        mOFA: false,
        mODA: false,
        mOFB: false,
        mOOC: false,
        mOEV: false,
        mOEP: false,
        mOMC: false,
        mOAA: false,
        mODH: false,
        mOES: false,
        mOOG: false,
        mOEPS1: false,
        mOEPS2: false,
        mOCOL1: false,
        mOCOL2: false,
        format: "yyyy-MM-dd",
        lenguaje: es,
        claseAyuda: "form-control",
        datos: [],
        datosJefe: [],
        Men1A: [],
        De1A5: [],
        De6A11: [],
        De10A59: [],
        ParPost: [],
        De12A17: [],
        De18A28: [],
        De29A59: [],
        De60: [],
        EnCro: [],
        EnInf: [],
        Migra: [],
        vectorJefes: [],
        vectorIntegrante: [],
        vectorAyuda: [],
        factores: [],
        GIDEN: false,
        GVIVI: false,
        GCARXCI: false,
        GADOLE: false,
        GADULT: false,
        GMIGRA: false,
        IDHOGAR: 0,
        ocupacionesVector: [],
        txtbusqueda: "",
        ocupacionAuxiliar: "",
        ocupacionAuxiliar2: "",
        opcionOcupaciones: "",
        txtbusquedaAct: "",
        actividadesVector: [],
        actividadesAuxiliar: "",
        SAPU: false,
        CODIGOGENE: "",
        valGIden: true,
        valGVivi: true,
        valGCart: true,
        valGAdole: true,
        valGAdul: true,
        valGMig: true,
        valGActu: true
      };
    },
    validations: {
      viviendaData: {
        tipo_vivienda: { required },
        tipo_estructura: { required },
        numero_cuartos: { required, numeric },
        personas_por_cuartos: { required, numeric },
        material_predominante: { required },
        tipo_cubierta: { required },
        // actividad_economica: { required },
        evento_afecta_vivienda: { required },
        familias_accion: { required },
        promedio_ingresos: { required },
        promedio_gastos: { required },
        fuente_agua: { required },
        energia_electrica: { required },
        gas_natural: { required },
        acueducto: { required },
        alcantarillado: { required },
        telefono_fijo: { required },
        aseo: { required },
        internet_subsidiado: { required },
        internet_privado: { required },
        donde_almacena_agua: { required },
        ubicacion_tanque: { required },
        tipo_tratamiento_agua: { required },
        destino_final_basura: { required },
        porquerizas: { required },
        plagas: { required },
        industrias: { required },
        malos_olores: { required },
        rellenos: { required },
        contaminacion_a: { required },
        contaminacion_v: { required },
        rio: { required },
        otro_cerca: { required },
        aereopuertos: { required },
        avenidas_transitadas: { required },
        lotes_abandonados: { required },
        servicio_sanitario: { required },
        donde_sanitario: { required },
        excretas: { required },
        cocina: { required },
        dormitorio_a: { required },
        sala: { required },
        dormitorio_n: { required },
        sanitario: { required },
        lavadero: { required },
        iluminacion_adecuada: { required },
        techo_adecuado: { required },
        ventilacion_adecuada: { required },
        pisos_adecuado: { required },
        paredes_adecuadas: { required },
        gasolina: { required },
        plaguicidas: { required },
        detergentes: { required },
        plaguicidas_insectos: { required },
        envases_vacios: { required },
        elementos_protecion: { required },
        metodos_coccion: { required },
        lugares_preparan_alimentos: { required },
        lugares_almacenan_alimentos: { required },
        lava_frutas: { required },
        tipo_explotacion: { required },
        flora_afectados: { required },
        fauna_afectados: { required },
        suelo_afectados: { required },
        aire_afectados: { required },
        agua_afectados: { required },
        residuos_solidos_genera: { required },
        aguas_servidas_genera: { required },
        desechos_cocina_genera: { required },
        heces_animales_genera: { required },
        quimicos_genera: { required },
        otros_genera: { required },
        tipo_combustible: { required },
        mantenimiento_red: { required },
        zona_alto_riesgo: { required },
        almacenamiento_residuos: { required },
        fuente_contaminacion: { required },
        aguas_negras: { required },
        zonas_verdes: { required },
        desplazamientos: { required },
        rotacion_cultivo: { required },
        emplea_fertilizantes: { required },
        suministro_energia_ilegal: { required },
        quema_cultivo: { required },
        mantenimiento_preventivo: { required },
        veces_inundaciones: { required },

        fachada: { required },
        cuantos_baños: { required },
        estado_conservacion_baños: { required },
        acabados_externos: { required },
        estado_conservacion_estructuras: { required },
        mobiliario_cocina: { required },
        andenes: { required }
      }
    },
    computed: {
      calEdad() {
        let nacimiento = moment(this.CA1.fecha_nac);
        let hoy = moment();
        let edad = 0;
        if (nacimiento < hoy) {
          edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
        }
        // console.info(hoy);
        return edad;
      },
      calEdad2() {
        let nacimiento = moment(this.caracData.fecha_nacimiento);
        let hoy = moment();
        let edad = 0;
        if (nacimiento < hoy) {
          edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
        }
        this.caracData.edad = edad;
        return edad;
      },
      wrongNumber: function() {
        return this.isNumeric(this.number) === false;
      },
      inputDisabled() {
        if (this.CA1.sexo === "MASCULINO") {
          this.CA1.embarazo = "NOAPLICA";
          this.CA1.embarazo_multiple = "NOAPLICA";
        } else {
          // this.CA1.embarazo = "0";
          // this.CA1.embarazo_multiple = "0";
          if (this.CA1.embarazo === "NO") {
            this.CA1.embarazo_multiple = "NO";
          } else {
            // this.caracData.embarazo = "0";
            this.CA1.embarazo_multiple = "0";
          }
        }
        return this.CA1.sexo === "MASCULINO";
      },
      inputDisabled2() {
        if (this.caracData.sexo === "MASCULINO") {
          this.caracData.embarazo = "NOAPLICA";
          this.caracData.embarazo_multiple = "NOAPLICA";
        } else {
          // this.caracData.embarazo = "";
          // this.caracData.embarazo_multiple = "";
          if (this.caracData.embarazo === "NO") {
            this.caracData.embarazo_multiple = "NO";
          } else {
            // this.caracData.embarazo = "0";
            this.caracData.embarazo_multiple = "";
          }
        }
        return this.caracData.sexo === "MASCULINO";
      },
      soloNum() {
        // alert(this.Men1A.peso_nacer);
        // return this.Men1A.peso_nacer.replace( /[^\d]/g, '' ).trim();
      },
      calHoy() {
        let hoy = moment();
        return hoy;
      },
      spinGIden() {
        if (this.valGIden) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGVivi() {
        if (this.valGVivi) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGCart() {
        if (this.valGCart) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGAdole() {
        if (this.valGAdole) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGAdul() {
        if (this.valGAdul) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGMig() {
        if (this.valGMig) {
          return {};
        } else {
          return [
            "kt-spinner",
            "kt-spinner--right",
            "kt-spinner--sm",
            "kt-spinner--light"
          ];
        }
      },
      spinGActu() {
        if (this.valGActu) {
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
    methods: {
      nuevo: async function(id_hogar) {
        const parametros = {
          _token: this.csrf,
          id_hogar: id_hogar
        };
        try {
          await caracterizacionServicios
            .editarCaracterizacion(parametros)
            .then(respuesta => {
              this.dpto_options = respuesta.data.arrayDpto;
              this.muni_options = respuesta.data.arrayMuni;
              this.corregi_options = respuesta.data.arrayCorregi;
              this.vereda_options = respuesta.data.arrayVeredas;
              this.parentesco_options = respuesta.data.arrayParentesco;
              this.estado_options = respuesta.data.arrayEstado;
              this.escolaridad_options = respuesta.data.arrayEscolaridad;
              this.ocupacion_options = respuesta.data.arrayOcupacion;
              this.etnia_options = respuesta.data.arrayEtnia;
              this.admini_options = respuesta.data.arrayAdmini;
              this.clasifi_options = respuesta.data.arrayCLasifi;
              this.grados_option = respuesta.data.arrayGrados;
              this.morbilidadNacer_options = respuesta.data.arrayMorbilidadNacer;
              this.morbilidad_options = respuesta.data.arrayMorbilidad;
              this.metodos_options = respuesta.data.arrayMetodos;
              this.motivos_options = respuesta.data.arrayMotivos;
              this.grupos_options = respuesta.data.arrayGrupos;
              this.enfcro_options = respuesta.data.arrayEnfCro;
              this.enfinf_options = respuesta.data.arrayEnfInf;
              this.religion_options = respuesta.data.arrayReligion;
              this.CODIGOGENE = respuesta.data.codigo;

              this.hogar.id = respuesta.data.hogar.id;
              this.hogar.id_dpto = respuesta.data.hogar.id_dpto;
              this.hogar.id_mun = respuesta.data.hogar.id_mun;
              this.cambiarCombo("muni");
              this.hogar.id_corre = "" + respuesta.data.hogar.id_corre;
              if (this.hogar.id_corre !== "0") {
                this.cambiarCombo("corregi");
              }
              this.hogar.id_vereda = "" + respuesta.data.hogar.id_vereda;
              this.hogar.id_barrio = "" + respuesta.data.hogar.id_barrio;
              this.hogar.id_zona = respuesta.data.hogar.id_zona;
              this.hogar.tenencia_vivienda =
                respuesta.data.hogar.tenencia_vivienda;
              this.hogar.numero_hogares =
                "" + respuesta.data.hogar.numero_hogares;
              this.hogar.poblacion_especial =
                respuesta.data.hogar.poblacion_especial;
              this.hogar.vias_acceso = respuesta.data.hogar.vias_acceso;
              this.hogar.servicios_publicos =
                respuesta.data.hogar.servicios_publicos;

              // GESTION DE LAS VARIABLES DEL HOGAR
              this.hogar.direccion = respuesta.data.hogar.direccion;
              this.datosJefe = respuesta.data.jefes;
              this.datos = respuesta.data.integrantes;
              this.factores = respuesta.data.factores;

              console.log(this.datosJefe)
              for (let i = 0; i < this.datosJefe.length; i++) {
                let indice = this.datosJefe.findIndex(
                  identi =>
                    identi.identificacion === this.datosJefe[i].identificacion
                );
                this.vectorJefes.push({
                  index: indice,
                  identificacion: this.datosJefe[i].identificacion
                });
                              
              }
              for (let i = 0; i < this.vectorJefes.length; i++) {
                console.log("index: " + this.vectorJefes[i].index + " -> identificacion: " + this.vectorJefes[i].identificacion);
              }
              // GESTION DE LAS VARIABLES DEL HOGAR

              
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
      volver() {
        this.$router.push("/gestion");
      },
      habilitar_zonas() {
        if (this.hogar.id_zona === "") {
          this.estratificacionData.ingresos_zona_rural = "";
          this.estratificacionData.ingresos_ciudad = "";
        }
        if (this.hogar.id_zona === "0") {
          this.estratificacionData.ingresos_zona_rural = 8;
          this.estratificacionData.ingresos_ciudad = 8;
        }
        if (this.hogar.id_zona === "1") {
          this.estratificacionData.ingresos_zona_rural = 8;
          this.estratificacionData.ingresos_ciudad = "";
        }
        if (this.hogar.id_zona === "2" || this.hogar.id_zona === "3") {
          this.estratificacionData.ingresos_zona_rural = "";
          this.estratificacionData.ingresos_ciudad = 8;
        }
      },
      allLetter(valor) {
        var letters = /^([0-9])*$/;
        if (valor === "") {
          return false;
        } else {
          if (valor.match(letters)) {
            // console.log("no hay letras");
            return true;
          } else {
            // console.log("hay letras");
            return false;
          }
        }
      },
      validarNumHog() {
        if (this.hogar.numero_hogares <= 0) {
          this.hogar.numero_hogares = "";
        }
      },
      cambiarCombo: async function(caja) {
        if (caja === "dpto") {
          this.hogar.id_mun = "";
          this.hogar.id_corre = "";
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";
        }
        if (caja === "muni") {
          this.hogar.id_corre = "";
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";
          const parametros = {
            _token: this.csrf,
            id: this.hogar.id_mun,
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
          try {
            await colegiosServicios.combo(parametros).then(respuesta => {
              this.colegio_options = respuesta.data.arrayColegios;
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
          this.hogar.id_vereda = "";
          this.hogar.id_barrio = "";

          if (this.hogar.id_corre !== "0") {
            const parametros = {
              _token: this.csrf,
              id: this.hogar.id_corre,
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

            try {
              await colegiosServicios.combo(parametros).then(respuesta => {
                this.colegio_options = respuesta.data.arrayColegios;
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
        if (caja === "etnia") {
          this.CA1.clasificacion = "0";
        }
      },
      formato(caja) {
        if (caja == "id1") {
          if (this.caracData.tipo_id == "CC") {
            this.caracData.identificacion = this.caracData.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
            let val = (this.caracData.identificacion / 1)
              .toFixed(0)
              .replace(".", ",");
            this.caracData.identificacion = val
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (this.caracData.identificacion == "NaN") {
              this.caracData.identificacion = "";
            }
            if (this.caracData.identificacion == "0") {
              this.caracData.identificacion = "";
            }
          }
        }
        if (caja == "salario") {
          this.caracData.salario = this.caracData.salario.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          let val = (this.caracData.salario / 1).toFixed(0).replace(".", ",");
          this.caracData.salario = val
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (this.caracData.salario == "NaN") {
            this.caracData.salario = "";
          }
          if (this.caracData.salario == "0") {
            this.caracData.salario = "";
          }
        }
        if (caja == "tipoid") {
          this.caracData.identificacion = "";
          if (this.caracData.tipo_id != "CC") {
            if (
              this.caracData.tipo_id === "ASI" ||
              this.caracData.tipo_id === "MSI"
            ) {
              this.caracData.identificacion =
                this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
            } else {
              this.caracData.identificacion = this.caracData.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
            }
          } else {
            if (this.caracData.tipo_id == "CC") {
              this.caracData.identificacion = this.caracData.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
              let val = (this.caracData.identificacion / 1)
                .toFixed(0)
                .replace(".", ",");
              this.caracData.identificacion = val
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              if (this.caracData.identificacion == "NaN") {
                this.caracData.identificacion = "";
              }
              if (this.caracData.identificacion == "0") {
                this.caracData.identificacion = "";
              }
            }
          }
        }
        if (caja == "id2") {
          if (this.CA1.tipo_id == "CC") {
            this.CA1.identificacion = this.CA1.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
            let val = (this.CA1.identificacion / 1).toFixed(0).replace(".", ",");
            this.CA1.identificacion = val
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (this.CA1.identificacion == "NaN") {
              this.CA1.identificacion = "";
            }
            if (this.CA1.identificacion == "0") {
              this.CA1.identificacion = "";
            }
          }
        }
        if (caja == "tipoid2") {
          this.CA1.identificacion = "";
          if (this.CA1.tipo_id != "CC") {
            if (this.CA1.tipo_id === "ASI" || this.CA1.tipo_id === "MSI") {
              this.CA1.identificacion =
                this.CODIGOGENE + Math.floor(Math.random() * 100 + 1);
            } else {
              this.CA1.identificacion = this.CA1.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
            }
          } else {
            if (this.CA1.tipo_id == "CC") {
              this.CA1.identificacion = this.CA1.identificacion.replace(
                /[.*+\-?^${}()|[\]\\]/g,
                ""
              );
              let val = (this.CA1.identificacion / 1)
                .toFixed(0)
                .replace(".", ",");
              this.CA1.identificacion = val
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              if (this.CA1.identificacion == "NaN") {
                this.CA1.identificacion = "";
              }
              if (this.CA1.identificacion == "0") {
                this.CA1.identificacion = "";
              }
            }
          }
        }
        if (caja == "telefono1") {
          this.caracData.telefono = this.caracData.telefono
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.caracData.telefono == "NaN") {
            this.caracData.telefono = "";
          }
          if (this.caracData.telefono == "0") {
            this.caracData.telefono = "";
          }
        }
        if (caja == "telefono2") {
          this.CA1.telefono = this.CA1.telefono.replace(/[^.\d]/g, "").trim();
          if (this.CA1.telefono == "NaN") {
            this.CA1.telefono = "";
          }
          if (this.CA1.telefono == "0") {
            this.CA1.telefono = "";
          }
        }
        if (caja == "puntaje") {
        }
        if (caja == "puntaje1") {
        }
      },
      mostrarOtro(tipo) {
        if (tipo === "TE") {
          if (this.viviendaData.tipo_estructura === "5") {
            this.mOTE = true;
          } else {
            this.mOTE = false;
          }
          this.viviendaData.otro_tipo_estructura = "";
        }
        if (tipo === "TC") {
          if (this.viviendaData.tipo_cubierta === "9") {
            this.mOTC = true;
          } else {
            this.mOTC = false;
          }
          this.viviendaData.otro_tipo_cubierta = "";
        }
        if (tipo === "AE") {
          if (this.viviendaData.actividad_economica === "CUAL") {
            this.mOAE = true;
          } else {
            this.mOAE = false;
          }
          this.viviendaData.cual_actividad_economica = "";
        }
        if (tipo === "FA") {
          if (this.viviendaData.fuente_agua === "9") {
            this.mOFA = true;
          } else {
            this.mOFA = false;
          }
          this.viviendaData.cual_fuente = "";
        }
        if (tipo === "DA") {
          if (this.viviendaData.donde_almacena_agua === "5") {
            this.mODA = true;
          } else {
            this.mODA = false;
          }
          this.viviendaData.otro_almacena_agua = "";
        }
        if (tipo === "FB") {
          if (this.viviendaData.destino_final_basura === "5") {
            this.mOFB = true;
          } else {
            this.mOFB = false;
          }
          this.viviendaData.otro_destino_final_basura = "";
        }
        if (tipo === "OC") {
          if (this.viviendaData.otro_cerca === "SI") {
            this.mOOC = true;
          } else {
            this.mOOC = false;
          }
          this.viviendaData.cual_cerca = "";
        }
        if (tipo === "EV") {
          if (this.viviendaData.envases_vacios === "7") {
            this.mOEV = true;
          } else {
            this.mOEV = false;
          }
          this.viviendaData.otro_envases_vacios = "";
        }
        if (tipo === "EP") {
          if (this.viviendaData.elementos_protecion === "5") {
            this.mOEP = true;
          } else {
            this.mOEP = false;
          }
          this.viviendaData.otro_elementos_protecion = "";
        }
        if (tipo === "MC") {
          if (this.viviendaData.metodos_coccion === "6") {
            this.mOMC = true;
          } else {
            this.mOMC = false;
          }
          this.viviendaData.otro_metodos_coccion = "";
        }
        if (tipo === "AA") {
          if (this.viviendaData.lugares_almacenan_alimentos === "6") {
            this.mOAA = true;
          } else {
            this.mOAA = false;
          }
          this.viviendaData.otro_lugares_almacenan_alimentos = "";
        }
        if (tipo === "DH") {
          if (this.viviendaData.excretas === "7") {
            this.mODH = true;
          } else {
            this.mODH = false;
          }
          this.viviendaData.otro_depositan_excretas = "";
        }
        if (tipo === "ES") {
          if (this.viviendaData.tipo_explotacion === "5") {
            this.mOES = true;
          } else {
            this.mOES = false;
          }
          this.viviendaData.otro_tipo_explotacion = "";
        }
        if (tipo === "OG") {
          if (this.viviendaData.otros_genera === "SI") {
            this.mOOG = true;
          } else {
            this.mOOG = false;
          }
          this.viviendaData.cual_genera = "";
        }
        if (tipo === "OEPS1") {
          if (this.caracData.afiliacion_entidad === "OTRA") {
            this.mOEPS1 = true;
          } else {
            this.mOEPS1 = false;
          }
          this.caracData.otra_eps = "";
        }
        if (tipo === "OEPS2") {
          if (this.CA1.afi_entidad === "OTRA") {
            this.mOEPS2 = true;
          } else {
            this.mOEPS2 = false;
          }
          this.CA1.otra_eps = "";
        }
        if (tipo === "mOCOL1") {
          if (
            this.caracData.nivel_escolaridad === 3 ||
            this.caracData.nivel_escolaridad === 14 ||
            this.caracData.nivel_escolaridad === 15
          ) {
            this.mOCOL1 = true;
          } else {
            this.mOCOL1 = false;
          }
          this.caracData.colegio = "";
          this.caracData.grado = "";
        }
        if (tipo === "mOCOL2") {
          if (
            this.CA1.escolaridad === 3 ||
            this.CA1.escolaridad === 14 ||
            this.CA1.escolaridad === 15
          ) {
            this.mOCOL2 = true;
          } else {
            this.mOCOL2 = false;
          }
          this.CA1.colegio = "";
          this.CA1.grado = "0";
        }
      },
      // OPCIONES DE LAS OCUPACIONES
      abrirModalOcupaciones(opcion) {
        this.opcionOcupaciones = opcion;
        this.txtbusqueda = "";
        this.consultarOcupaciones(1);
        this.$refs.modalOcupaciones.show();
      },
      cerrarModal() {
        this.$refs.modalOcupaciones.hide();
        this.$refs.modalActividad.hide();
      },
      async consultarOcupaciones(pagina) {
        const parametros = {
          txtbusqueda: this.txtbusqueda.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await ocupacionesServicios
            .listarOcupaciones(parametros)
            .then(respuesta => {
              this.ocupacionesVector = respuesta.data.ocupaciones.data;
              this.paginacionVector = respuesta.data.paginacion;
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
      seleccionarOcupaciones(item) {
        if (this.opcionOcupaciones === "jefe") {
          this.caracData.ocupacion = item.id;
          this.ocupacionAuxiliar = item.descripcion;
        } else {
          this.CA1.ocupacion = item.id;
          this.ocupacionAuxiliar2 = item.descripcion;
        }
        this.$refs.modalOcupaciones.hide();
      },
      // OPCIONES DE LAS OCUPACIONES

      //OPCIONES DEL JEFE DE HOGAR
      agregarJefe: async function() {
        if (this.checkForm() === true) {
          // VALIDAR SI EL JEFE DE HOGAR SE ENCUENTRA AGREGADO
          this.caracData.identificacion = this.caracData.identificacion.replace(
            /[.*+\-?^${}()|[\]\\]/g,
            ""
          );
          const parametros = {
            _token: this.csrf,
            identificacion: this.caracData.identificacion
          };
          try {
            await caracterizacionServicios
              .validarJefe(parametros)
              .then(respuesta => {
                if (respuesta.data.OPC == "EXISTE") {
                  let val = (respuesta.data.identificacion / 1)
                    .toFixed(0)
                    .replace(".", ",");
                  let iden = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                  this.$swal(
                    "Validar...!",
                    "El Documento <b>" + iden + "</b> Se Encuentra Registrado",
                    "warning"
                  );
                  return false;
                } else {
                  // VERIFICAR SI ESTA EN LA TABLA
                  let resultado = this.datosJefe.filter(identi =>
                    identi.identificacion.includes(this.caracData.identificacion)
                  );
                  // VERIFICAR SI ESTA EN LA TABLA
                  if (resultado.length) {
                    this.$swal(
                      "Validar...!",
                      "El Documento <b>" +
                        this.caracData.identificacion +
                        "</b> Se Encuentra Agregado",
                      "warning"
                    );
                    return false;
                  } else {
                    let nacimiento = moment(this.caracData.fecha_nacimiento);
                    let hoy = moment();
                    let edad = 0;
                    if (nacimiento < hoy) {
                      edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
                    }

                    if (edad < 14) {
                      this.$swal(
                        "Validar...!",
                        "El Valor de la edad introducido no es aceptable, debe ser mayor ó igual a 14 años",
                        "warning"
                      );
                      return false;
                    }
                    let textoEps = "";
                    if (this.caracData.afiliacion_entidad === "OTRA") {
                      textoEps = "OTRA";
                    } else {
                      if (this.caracData.afiliacion_entidad === "NINGUNA") {
                        textoEps = "NINGUNA";
                      } else {
                        textoEps = this.showText(
                          this.caracData.afiliacion_entidad,
                          this.admini_options
                        );
                      }
                    }
                    this.datosJefe.push({
                      id: 0,
                      id_hogar: 0,
                      telefono: this.caracData.telefono,
                      puntaje_sisben: this.caracData.puntaje_sisben,
                      afiliacion_entidad: this.caracData.afiliacion_entidad,
                      textoEps: textoEps,
                      otra_eps: this.caracData.otra_eps,
                      tipo_id: this.caracData.tipo_id,
                      identificacion: this.caracData.identificacion,
                      sexo: this.caracData.sexo,
                      parentesco: this.caracData.parentesco,
                      textoParentesco: this.showText(
                        this.caracData.parentesco,
                        this.parentesco_options
                      ),
                      pnom: this.caracData.pnom,
                      snom: this.caracData.snom,
                      pape: this.caracData.pape,
                      sape: this.caracData.sape,
                      salario: this.caracData.salario,
                      estado_civil: this.caracData.estado_civil,
                      textoEstado: this.showText(
                        this.caracData.estado_civil,
                        this.estado_options
                      ),
                      fecha_nacimiento: this.caracData.fecha_nacimiento,
                      tipo_afiliacion: this.caracData.tipo_afiliacion,
                      embarazo: this.caracData.embarazo,
                      embarazo_multiple: this.caracData.embarazo_multiple,
                      discapacidad: this.caracData.discapacidad,
                      nivel_escolaridad: this.caracData.nivel_escolaridad,
                      ocupacion: this.caracData.ocupacion,
                      textoOcupacion: this.showText(
                        this.caracData.ocupacion,
                        this.ocupacion_options
                      ),
                      colegio: this.caracData.colegio,
                      textoColegio: this.showText(
                        this.caracData.colegio,
                        this.colegio_options
                      ),
                      grado: this.caracData.grado,
                      entiende: this.caracData.entiende,
                      migrante: this.caracData.migrante,
                      pyp: this.caracData.pyp,
                      etnia: this.caracData.etnia,
                      textoEtnia: this.showText(
                        this.caracData.etnia,
                        this.etnia_options
                      ),
                      clasificacion: this.caracData.clasificacion,
                      edad: this.caracData.edad,
                      orientacion: this.caracData.orientacion,
                      identidad_genero: this.caracData.identidad_genero,
                      perdida_peso: this.caracData.perdida_peso,
                      programa_icbf: this.caracData.programa_icbf,
                      identi_auxi: ""
                    });
                    if (
                      this.caracData.tipo_afiliacion === "CONTRIBUTIVO" ||
                      this.caracData.tipo_afiliacion === "ESPECIAL"
                    ) {
                      this.SAPU = true;
                      this.estratificacionData.afiliacion_salud_privada = "SI";
                    }
                    this.ocupacionAuxiliar = "";
                    this.mOCOL1 = false;
                    let indice = this.datosJefe.findIndex(
                      identi =>
                        identi.identificacion === this.caracData.identificacion
                    );
                    this.vectorJefes.push({
                      index: indice,
                      identificacion: this.caracData.identificacion
                    });

                    console.log(vectorJefes);
                    // AGREGAR FACTORES
                    // this.AFactores(this.caracData, edad);
                    // AGREGAR FACTORES

                    this.caracData.id = "JEFE";
                    // AGREGAR DE 10 A 59 AÑOS
                    if (edad >= 10 && edad <= 59) {
                      // this.Ade10a59Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 10 A 59 AÑOS

                    // AGREGAR PARTO POSTPARTO
                    // alert(this.CA1.embarazo_multiple);
                    if (this.caracData.embarazo === "SI") {
                      // this.AParPost(this.caracData, edad);
                    }
                    // AGREGAR PARTO POSTPARTO

                    // AGREGAR DE 12 A 17 AÑOS
                    if (edad >= 12 && edad <= 17) {
                      // this.Ade12a17Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 12 A 17 AÑOS

                    // AGREGAR DE 18 A 28 AÑOS
                    if (edad >= 18 && edad <= 28) {
                      // this.Ade18a28Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 18 A 28 AÑOS

                    // AGREGAR DE 29 A 59 AÑOS
                    if (edad >= 29 && edad <= 59) {
                      // this.Ade29a59Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 29 A 59 AÑOS

                    // AGREGAR DE 60 ó MAS AÑOS
                    if (edad >= 60) {
                      // this.Ade60Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 60 ó MAS AÑOS

                    // AGREGAR MIGRANTES
                    if (this.caracData.migrante === "SI") {
                      // this.AMigra(this.caracData, edad);
                    }
                    // AGREGAR MIGRANTES
                    this.limpiar2();
                  }
                }
              })
              .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
              });
          } catch (error) {
            this.errorDevuelto = error.response.data.errors;
            this.entrarPorError = true;
          }
        }
      },
      checkForm(e) {
        let bande = true;
        if (this.caracData.tipo_id === "") {
          this.$refs.tipo_id.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione un tipo de identificación!",
            "error"
          );
          return;
        }
        if (this.caracData.identificacion === "") {
          this.$refs.identificacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite una identificación!",
            "error"
          );
          return;
        }
        if (this.caracData.sexo === "") {
          this.$refs.sexo.focus();
          bande = false;
          this.$swal("Error...!", "Por favor seleccione el sexo!", "error");
          return;
        }
        if (this.caracData.orientacion === "") {
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la orientación sexual!",
            "error"
          );
          return;
        }
        if (this.caracData.identidad_genero === "") {
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la identidad de genero!",
            "error"
          );
          return;
        }
        if (this.caracData.parentesco === "") {
          this.$refs.parentesco.focus();
          bande = false;
          this.$swal("Error...!", "Por favor seleccione el parentesco!", "error");
          return;
        }
        if (this.caracData.pnom === "") {
          this.$refs.pnom.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite el primer nombre!", "error");
          return;
        }
        if (this.caracData.pape === "") {
          this.$refs.pape.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor digite el primer apellido!",
            "error"
          );
          return;
        }
        if (this.caracData.estado_civil === "") {
          this.$refs.estado_civil.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione el estado civil!",
            "error"
          );
          return;
        }
        if (this.caracData.fecha_nacimiento === "") {
          this.$refs.fecha_nacimiento.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la fecha de nacimiento!",
            "error"
          );
          return;
        }
        if (this.caracData.afiliacion_entidad === "") {
          this.$refs.afiliacion_entidad.focus();
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la eps!", "error");
          return;
        }
        if (this.caracData.ocupacion === "") {
          this.$refs.ocupacion.focus();
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la ocupación!", "error");
          return;
        }
        if (this.caracData.etnia === "") {
          this.$refs.etnia.focus();
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la etnia!", "error");
          return;
        }
        if (this.caracData.clasificacion === "") {
          this.$refs.clasificacion.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la clasificacion de la etnia!",
            "error"
          );
          return;
        }
        if (this.caracData.salario === "") {
          this.$refs.salario.focus();
          bande = false;
          this.$swal("Error...!", "Por favor digite el salario!", "error");
          return;
        }
        if (this.caracData.perdida_peso === "") {
          this.$refs.perdida_peso.focus();
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione la perdida de peso en los ultimos 3 meses!",
            "error"
          );
          return;
        }
        if (this.caracData.programa_icbf === "") {
          bande = false;
          this.$swal(
            "Error...!",
            "Por favor seleccione si Pertenece a algún programa del ICBF!",
            "error"
          );
          return;
        }
        return bande;
        e.preventDefault();
      },
      showText: function(val, vectorAux) {
        for (var i = 0; i < vectorAux.length; i++) {
          if (vectorAux[i].value === val) {
            return vectorAux[i].texto;
          }
        }
        return "";
      },
      eliminarItemJefe: function(index, item) {
        this.datosJefe.splice(index, 1);
        this.vectorJefes.splice(index, 1);
        let identificacion = item.identificacion;

        this.factores = this.factores.filter(function(men) {
          return men.identificacion != identificacion;
        });

        this.Men1A = this.Men1A.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De1A5 = this.De1A5.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De6A11 = this.De6A11.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De10A59 = this.De10A59.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.ParPost = this.ParPost.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De12A17 = this.De12A17.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De18A28 = this.De18A28.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De29A59 = this.De29A59.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.De60 = this.De60.filter(function(men) {
          return men.identificacion != identificacion;
        });
        this.Migra = this.Migra.filter(function(men) {
          return men.identificacion != identificacion;
        });
      },
      limpiar2() {
        this.caracData.tipo_id = "";
        this.caracData.identificacion = "";
        this.caracData.sexo = "";
        this.caracData.parentesco = "";
        this.caracData.pnom = "";
        this.caracData.snom = "";
        this.caracData.pape = "";
        this.caracData.sape = "";
        this.caracData.estado_civil = "";
        this.caracData.fecha_nacimiento = "";
        this.caracData.salario = "";
        this.caracData.telefono = "";
        this.caracData.edad = 0;
        this.caracData.afiliacion_entidad = "";
        this.caracData.otra_eps = "";
        this.caracData.tipo_afiliacion = "";
        this.caracData.embarazo = "";
        this.caracData.embarazo_multiple = "";
        this.caracData.discapacidad = "";
        this.caracData.nivel_escolaridad = "";
        this.caracData.ocupacion = "";
        this.caracData.colegio = "";
        this.caracData.grado = "";
        this.caracData.entiende = "";
        this.caracData.migrante = "";
        this.caracData.pyp = "";
        this.caracData.etnia = "";
        this.caracData.clasificacion = "";
        this.caracData.puntaje_sisben = "";
        this.caracData.orientacion = "";
        this.caracData.identidad_genero = "";
        this.caracData.perdida_peso = "";
        this.caracData.programa_icbf = "";
      },
      updateJefe(item, valor, opcion, index) {
        if (opcion === "tipo_id") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.factores[indice].tipo_id = valor;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De10A59[indice].tipo_id = valor;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.ParPost[indice].tipo_id = valor;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De12A17[indice].tipo_id = valor;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De18A28[indice].tipo_id = valor;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De29A59[indice].tipo_id = valor;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De60[indice].tipo_id = valor;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.Migra[indice].tipo_id = valor;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion === "sexo") {
          if (item.sexo === "") {
            item.embarazo = "";
            item.embarazo_multiple = "";
          }
          if (item.sexo === "MASCULINO") {
            item.embarazo = "NOAPLICA";
            item.embarazo_multiple = "NOAPLICA";
          }
          if (item.sexo === "FEMENINO") {
            item.embarazo = "";
            item.embarazo_multiple = "";
          }

          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.factores[indice].sexo = valor;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De10A59[indice].sexo = valor;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.ParPost[indice].sexo = valor;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De12A17[indice].sexo = valor;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De18A28[indice].sexo = valor;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De29A59[indice].sexo = valor;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De60[indice].sexo = valor;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.Migra[indice].sexo = valor;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion === "embarazo") {
          if (item.embarazo === "") {
            item.embarazo_multiple = "";
          }
          if (item.embarazo === "SI") {
            item.embarazo_multiple = "";
          }
          if (item.embarazo === "NO") {
            item.embarazo_multiple = "NO";
          }
        }
        if (opcion === "afiliacion_entidad") {
          if (item.afiliacion_entidad === "NINGUNA") {
            item.tipo_afiliacion = "0";
          } else {
            if (item.afiliacion_entidad === "OTRA") {
              item.otra_eps = "";
            } else {
              item.tipo_afiliacion = "";
            }
          }
        }
        if (opcion === "nivel_escolaridad") {
          item.colegio = "";
          item.grado = "";
        }
      },
      changeupdateJefe(item, event, opcion, index) {
        if (opcion == "identificacion") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.factores[indice].identificacion = item.identificacion;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].identificacion = item.identificacion;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].identificacion = item.identificacion;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].identificacion = item.identificacion;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].identificacion = item.identificacion;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].identificacion = item.identificacion;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].identificacion = item.identificacion;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].identificacion = item.identificacion;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }

          //CAMBIAR LA IDENTIFICACION DEL VECTOR JEFE POR LA NUEVA IDENTIFICACION
          //DIGITADA EN LA TABLA
          this.vectorJefes[index].identificacion = item.identificacion;
          // Vue.set(this.vectorJefes, 1, this.vectorJefes[index]);
          this.vectorJefes.splice(index, 1, this.vectorJefes[index]);
        }
        if (opcion == "pnom") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.factores[indice].pnom = item.pnom;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].pnom = item.pnom;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].pnom = item.pnom;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].pnom = item.pnom;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].pnom = item.pnom;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].pnom = item.pnom;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].pnom = item.pnom;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].pnom = item.pnom;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "snom") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.factores[indice].snom = item.snom;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].snom = item.snom;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].snom = item.snom;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].snom = item.snom;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].snom = item.snom;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].snom = item.snom;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].snom = item.snom;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].snom = item.snom;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "pape") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.factores[indice].pape = item.pape;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].pape = item.pape;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].pape = item.pape;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].pape = item.pape;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].pape = item.pape;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].pape = item.pape;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].pape = item.pape;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].pape = item.pape;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "sape") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE JEFES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorJefes[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.factores.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.factores[indice].sape = item.sape;
            this.factores.splice(indice, 1, this.factores[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].sape = item.sape;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].sape = item.sape;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].sape = item.sape;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].sape = item.sape;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].sape = item.sape;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].sape = item.sape;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].sape = item.sape;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "salario") {
          item.salario = event.target.value.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          let val = (item.salario / 1).toFixed(0).replace(".", ",");
          item.salario = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          if (item.salario == "NaN") {
            item.salario = "";
          }
          if (item.salario == "0") {
            item.salario = "";
          }
        }
      },
      //OPCIONES DEL JEFE DE HOGAR

      //OPCIONES DE LOS INTEGRANTES
      calculaEdad() {
        var a = moment();
        var b = moment(this.CA1.fecha_nac);

        var years = a.diff(b, "year");
        b.add(years, "years");

        var months = a.diff(b, "months");
        b.add(months, "months");

        var days = a.diff(b, "days");

        if (years == 0) {
          if (months <= 1) {
            if (days <= 1) {
              this.CA1.meses = months + " MES";
              this.CA1.dias = days + " DIA";
            } else {
              this.CA1.meses = months + " MES";
              this.CA1.dias = days + " DIAS";
            }
          } else {
            if (days <= 1) {
              this.CA1.meses = months + " MESES";
              this.CA1.dias = days + " DIA";
            } else {
              this.CA1.meses = months + " MESES";
              this.CA1.dias = days + " DIAS";
            }
          }
        }
      },
      updateIntegrante(item, valor, opcion, index) {
        if (opcion === "tipo_id") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].tipo_id = valor;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].tipo_id = valor;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].tipo_id = valor;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De10A59[indice].tipo_id = valor;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.ParPost[indice].tipo_id = valor;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De12A17[indice].tipo_id = valor;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De18A28[indice].tipo_id = valor;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De29A59[indice].tipo_id = valor;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De60[indice].tipo_id = valor;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.Migra[indice].tipo_id = valor;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion === "sexo") {
          if (item.sexo === "0") {
            item.embarazo = "0";
            item.embarazo_multiple = "0";
          }
          if (item.sexo === "MASCULINO") {
            item.embarazo = "NOAPLICA";
            item.embarazo_multiple = "NOAPLICA";
          }
          if (item.sexo === "FEMENINO") {
            item.embarazo = "0";
            item.embarazo_multiple = "0";
          }

          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].sexo = valor;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].sexo = valor;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].sexo = valor;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De10A59[indice].sexo = valor;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.ParPost[indice].sexo = valor;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De12A17[indice].sexo = valor;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De18A28[indice].sexo = valor;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De29A59[indice].sexo = valor;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De60[indice].sexo = valor;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.Migra[indice].sexo = valor;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion === "embarazo") {
          if (item.embarazo === "0") {
            item.embarazo_multiple = "0";
          }
          if (item.embarazo === "SI") {
            item.embarazo_multiple = "0";
          }
          if (item.embarazo === "NO") {
            item.embarazo_multiple = "NO";
          }
        }
        if (opcion === "afi_entidad") {
          if (item.afi_entidad === "NINGUNA") {
            item.tipo_afiliacion = "0";
          } else {
            if (item.afi_entidad === "OTRA") {
              item.otra_eps = "";
            } else {
              item.tipo_afiliacion = "0";
            }
          }
        }
        if (opcion === "escolaridad") {
          item.colegio = "";
          item.grado = "0";
        }
      },
      changeupdateIntegrante(item, event, opcion, index) {
        if (opcion == "identificacion") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].identificacion = item.identificacion;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].identificacion = item.identificacion;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].identificacion = item.identificacion;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].identificacion = item.identificacion;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].identificacion = item.identificacion;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].identificacion = item.identificacion;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].identificacion = item.identificacion;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].identificacion = item.identificacion;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].identificacion = item.identificacion;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].identificacion = item.identificacion;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }

          //CAMBIAR LA IDENTIFICACION DEL VECTOR JEFE POR LA NUEVA IDENTIFICACION
          //DIGITADA EN LA TABLA
          this.vectorIntegrante[index].identificacion = item.identificacion;
          // Vue.set(this.vectorJefes, 1, this.vectorJefes[index]);
          this.vectorIntegrante.splice(index, 1, this.vectorIntegrante[index]);
        }
        if (opcion == "pnom") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].pnom = item.pnom;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].pnom = item.pnom;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].pnom = item.pnom;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].pnom = item.pnom;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].pnom = item.pnom;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].pnom = item.pnom;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].pnom = item.pnom;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].pnom = item.pnom;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].pnom = item.pnom;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].pnom = item.pnom;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "snom") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].snom = item.snom;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].snom = item.snom;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].snom = item.snom;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].snom = item.snom;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].snom = item.snom;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].snom = item.snom;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].snom = item.snom;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].snom = item.snom;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].snom = item.snom;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].snom = item.snom;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "pape") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].pape = item.pape;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].pape = item.pape;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].pape = item.pape;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].pape = item.pape;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].pape = item.pape;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].pape = item.pape;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].pape = item.pape;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].pape = item.pape;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].pape = item.pape;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].pape = item.pape;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
        if (opcion == "sape") {
          //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
          //VIENE DE LA TABLA
          let id = this.vectorIntegrante[index].identificacion;

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          let indice = this.Men1A.findIndex(
            identi => identi.identificacion === id
          );
          if (indice >= 0) {
            this.Men1A[indice].sape = item.sape;
            this.Men1A.splice(indice, 1, this.Men1A[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De1A5.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De1A5[indice].sape = item.sape;
            this.De1A5.splice(indice, 1, this.De1A5[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De6A11.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            this.De6A11[indice].sape = item.sape;
            this.De6A11.splice(indice, 1, this.De6A11[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De10A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De10A59[indice].sape = item.sape;
            this.De10A59.splice(indice, 1, this.De10A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.ParPost.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.ParPost[indice].sape = item.sape;
            this.ParPost.splice(indice, 1, this.ParPost[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De12A17.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De12A17[indice].sape = item.sape;
            this.De12A17.splice(indice, 1, this.De12A17[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De18A28.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De18A28[indice].sape = item.sape;
            this.De18A28.splice(indice, 1, this.De18A28[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De29A59.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De29A59[indice].sape = item.sape;
            this.De29A59.splice(indice, 1, this.De29A59[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.De60.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.De60[indice].sape = item.sape;
            this.De60.splice(indice, 1, this.De60[indice]);
          }

          //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
          indice = this.Migra.findIndex(identi => identi.identificacion === id);
          if (indice >= 0) {
            //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
            this.Migra[indice].sape = item.sape;
            this.Migra.splice(indice, 1, this.Migra[indice]);
          }
        }
      },
      //OPCIONES DE LOS INTEGRANTES

      //OPCIONES DE LOS CICLOS DE VIDA
      Ade10a59Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        if(vector.sexo==="MASCULINO"){
          this.De10A59.push({
            id: 0,
            tipo_id: vector.tipo_id,
            identificacion: vector.identificacion,
            pnom: vector.pnom,
            snom: vector.snom,
            pape: vector.pape,
            sape: vector.sape,
            sexo: vector.sexo,
            edad: edad,
            primera_mes: "NA",
            flujo_vaginal: "NA",
            flujo_uretral: "",
            relaciones_sexuales: "",
            compa_sexuales: "",
            usa_condon: "",
            abortos_seis: "NA",
            embarazo_adolecentes: "NA",
            metodo: "",
            tiempo_metodo: "",
            controles: "",
            motivo: "",
            citologia: "NA",
            colposcopia: "NA",
            examen_seno: "NA",
            violencia: "",
            tdit: "NA",
            tripleviral: "NA",
            nacidos_vivos: "NA",
            abortos: "NA",
            examen_prostata: "",
            biposia_prostata: "",
            opci: opcion
          });                    
        }else{
          this.De10A59.push({
            id: 0,
            tipo_id: vector.tipo_id,
            identificacion: vector.identificacion,
            pnom: vector.pnom,
            snom: vector.snom,
            pape: vector.pape,
            sape: vector.sape,
            sexo: vector.sexo,
            edad: edad,
            primera_mes: "",
            flujo_vaginal: "",
            flujo_uretral: "",
            relaciones_sexuales: "",
            compa_sexuales: "",
            usa_condon: "",
            abortos_seis: "",
            embarazo_adolecentes: "",
            metodo: "",
            tiempo_metodo: "",
            controles: "",
            motivo: "",
            citologia: "",
            colposcopia: "",
            examen_seno: "",
            violencia: "",
            tdit: "",
            tripleviral: "",
            nacidos_vivos: "",
            abortos: "",
            examen_prostata: "NA",
            biposia_prostata: "NA",
            opci: opcion
          });
        }
      },
      changeupdateDe10A59(item, event, opcion) {},
      updateDe10A59(item, valor, opcion) {
        if (opcion === "flujo_vaginal") {
          item.flujo_vaginal = valor;
        }
        if (opcion === "flujo_uretral") {
          item.flujo_uretral = valor;
        }
        if (opcion === "relaciones_sexuales") {
          item.relaciones_sexuales = valor;
        }
        if (opcion === "usa_condon") {
          item.usa_condon = valor;
        }
        if (opcion === "abortos_seis") {
          item.abortos_seis = valor;
        }
        if (opcion === "embarazo_adolecentes") {
          item.embarazo_adolecentes = valor;
        }
        if (opcion === "metodo") {
          item.metodo = valor;
        }
        if (opcion === "motivo") {
          item.motivo = valor;
        }
        if (opcion === "controles") {
          item.controles = valor;
        }
        if (opcion === "citologia") {
          item.citologia = valor;
        }
        if (opcion === "colposcopia") {
          item.colposcopia = valor;
        }
        if (opcion === "examen_seno") {
          item.examen_seno = valor;
        }
        if (opcion === "violencia") {
          item.violencia = valor;
        }
        if (opcion === "tdit") {
          item.tdit = valor;
        }
        if (opcion === "tripleviral") {
          item.tripleviral = valor;
        }
        if (opcion === "abortos") {
          item.abortos = valor;
        }
        if (opcion === "examen_prostata") {
          item.examen_prostata = valor;
        }
        if (opcion === "biposia_prostata") {
          item.biposia_prostata = valor;
        }
        if (opcion === "tiempo_metodo") {
          item.tiempo_metodo = valor;
        }
        if (opcion === "primera_mes") {
          if(item.sexo==="MASCULINO"){
            item.primera_mes = "NA";
          }else{
            item.primera_mes = valor;
          }          
        } 
        if (opcion === "compa_sexuales") {
          if(item.sexo==="MASCULINO"){
            item.compa_sexuales = "NA";
          }else{
            item.compa_sexuales = valor;
          }          
        }
        if (opcion === "nacidos_vivos") {
          if(item.sexo==="MASCULINO"){
            item.nacidos_vivos = "NA";
          }else{
            item.nacidos_vivos = valor;
          }          
        }                       
      },
      //OPCIONES DE LOS CICLOS DE VIDA
    }
  };
</script>

<style>
  .modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
  }
  .modal-title {
    color: #f8f9fa !important;
  }
  .close {
    display: none;
  }
  .color-datepicker {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
  }
</style>
