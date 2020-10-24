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
              <button type="button" class="btn btn-brand" @click.prevent="Actualizar">
                <i class="la la-refresh"></i>
                <span class="kt-hidden-mobile">Actualizar</span>
              </button>
            </div>            
            <!-- <div class="btn-group">
              <button type="button" class="btn btn-brand" @click.prevent="Guardar">
                <i class="la la-check"></i>
                <span class="kt-hidden-mobile">Guardar</span>
              </button>
            </div> -->
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
              <a class="nav-link" data-toggle="tab" href="#adultomayor" role="tab" @click="cambiarTab2('adultomayor')">Adulto mayor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#migrante" role="tab" @click="cambiarTab2('migrante')">Migrante</a>
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
                    :class="{'is-valid':hogar.id_corre}"                  
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
                    :class="{'is-valid':hogar.id_vereda}"
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
                  <b-form-select v-model="hogar.id_barrio" :class="{'is-valid':hogar.id_barrio}">
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
                    :class="{'is-valid':hogar.id_zona}"
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
                  <!-- <b-form-select
                    v-model="caracData.ocupacion"
                    ref="ocupacion"
                    :class="caracData.ocupacion==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option
                      v-for="item in ocupacion_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select> -->
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
                          <th>Entiende Español</th>
                          <th>PYP</th>
                          <th>Migrante</th>
                          <th>Salario</th>
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
                            <!-- <b-form-select
                              v-model.trim="item.afiliacion_entidad"
                              :class="item.afiliacion_entidad==''?'':'is-valid'"
                              @input="afiliacion_entidad=>updateJefe(item,afiliacion_entidad,'afiliacion_entidad',index)"
                              style="width:400px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NINGUNA">NINGUNA</option>
                              <option value="OTRA">OTRA</option>
                              <option
                                v-for="item in admini_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select> -->

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
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
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
                            <!-- <b-form-select
                              v-model="item.ocupacion"
                              :class="item.ocupacion==''?'':'is-valid'"
                              @input="ocupacion=>updateJefe(item,ocupacion,'ocupacion',index)"
                              style="width:200px;"
                            >
                              <option value selected>Seleccione</option>
                              <option value="0">No Aplica</option>
                              <option
                                v-for="item in ocupacion_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select> -->
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
                              v-model="item.colegio"
                              :class="item.colegio==''?'':'is-valid'"
                              @input="changeupdateJefe(item,$event,'colegio',index)"
                              style="width:300px;"
                              v-show="item.nivel_escolaridad==3 || item.nivel_escolaridad==14 || item.nivel_escolaridad==15"
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
                    <!--begin: Section-->

                    <!--end: Section-->
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
                    :class="CA1.orientacion==''?'':'is-valid'"
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
                    v-model.trim="CA1.identidad_genero"
                    :class="CA1.identidad_genero==''?'':'is-valid'"
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
                <div class="col-lg-2">
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
                <div class="col-lg-9">
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
                <div class="col-lg-3">
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
                  <!-- <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Colegio"
                    v-model="CA1.colegio"
                    :class="CA1.colegio==''?'':'is-valid'"
                  /> -->

                  <b-form-select
                    v-model="CA1.colegio"
                    :class="CA1.colegio==''?'':'is-valid'"
                  >
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
                  <!-- <b-form-select v-model="CA1.ocupacion" :class="CA1.ocupacion=='0'?'':'is-valid'">
                    <option value="0" selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option
                      v-for="item in ocupacion_options"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select> -->
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
                          <th>Entiende Español</th>
                          <th>PYP</th>
                          <th>Migrante</th>
                          <th>Jefe de Hogar</th>
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
                            <!-- <b-form-select
                              v-model.trim="item.afi_entidad"
                              :class="item.afi_entidad=='0'?'':'is-valid'"
                              @input="afi_entidad=>updateIntegrante(item,afi_entidad,'afi_entidad',index)"
                              style="width:400px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="NINGUNA">NINGUNA</option>
                              <option value="OTRA">OTRA</option>
                              <option
                                v-for="item in admini_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select> -->
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
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
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
                            <!-- <b-form-select
                              v-model="item.ocupacion"
                              :class="item.ocupacion=='0'?'':'is-valid'"
                              @input="ocupacion=>updateIntegrante(item,ocupacion,'ocupacion',index)"
                              style="width:200px;"
                            >
                              <option value="0" selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option
                                v-for="item in ocupacion_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select> -->
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
                              v-model="item.colegio"
                              :class="item.colegio=='0'?'':'is-valid'"
                              @input="changeupdateIntegrante(item,$event,'colegio',index)"
                              style="width:300px;"
                              v-show="item.escolaridad==3 || item.escolaridad==14 || item.escolaridad==15"
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
                    <!--begin: Section-->

                    <!--end: Section-->
                  </div>
                </div>
              </div>
              <br><br>
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

            <!-- Vivienda -->
            <div class="tab-pane" id="tabVivienda" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('cartxciclo','tabVivienda')"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">Vivienda</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Tipo de Vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_vivienda.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_vivienda.$error,'is-valid':!$v.viviendaData.tipo_vivienda.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">No Aplica</option>
                    <option value="2">Casa</option>
                    <option value="3">Apartamento</option>
                    <option value="4">Pieza</option>
                    <option value="5">Finca</option>
                    <option value="6">Vivienda Indigena</option>
                    <option value="7">Improvisada - Lote</option>
                  </b-form-select>
                  <div class="valid-feedback">Tipo de Vivienda Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_vivienda.required"
                    >El Tipo de Vivienda es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-2">
                  <label>Tipo de Estructura:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_estructura.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_estructura.$error,'is-valid':!$v.viviendaData.tipo_estructura.$invalid}"
                    @change="mostrarOtro('TE')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">No Aplica</option>
                    <option value="2">Concreto</option>
                    <option value="3">Ladrillo ó Bloque</option>
                    <option value="4">Madera</option>
                    <option value="5">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Tipo de Estructura Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_estructura.required"
                    >El Tipo de Estructura es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-7" v-show="mOTE">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_tipo_estructura"
                    :class="viviendaData.otro_tipo_estructura==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label># de Habitaciones:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="# de Cuartos"
                    v-model.trim="$v.viviendaData.numero_cuartos.$model"
                    :class="{'is-invalid': $v.viviendaData.numero_cuartos.$error,'is-valid':!$v.viviendaData.numero_cuartos.$invalid}"
                    @blur="$v.viviendaData.numero_cuartos.$touch()"
                  />
                  <div class="valid-feedback">El Numero de Cuartos es Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.numero_cuartos.required"
                    >El Numero de Cuartos es obligatorio</span>
                    <span
                      v-if="!$v.viviendaData.numero_cuartos.numeric"
                    >El Numero de Cuartos debe ser Numerico</span>
                  </div>
                </div>
                <div class="col-lg-3" style="display:none;">
                  <label>Personas por Cuarto:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Personas por Cuarto"
                    v-model.trim="$v.viviendaData.personas_por_cuartos.$model"
                    :class="{'is-invalid': $v.viviendaData.personas_por_cuartos.$error,'is-valid':!$v.viviendaData.personas_por_cuartos.$invalid}"
                  />
                  <div class="valid-feedback">Personas por Cuarto es Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.personas_por_cuartos.required"
                    >Personas por Cuarto es obligatorio</span>
                    <span
                      v-if="!$v.viviendaData.personas_por_cuartos.numeric"
                    >Personas por Cuarto debe ser Numerico</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Materia Predominante Piso:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.material_predominante.$model"
                    :class="{'is-invalid': $v.viviendaData.material_predominante.$error,'is-valid':!$v.viviendaData.material_predominante.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Marmol ó Madera Pulida</option>
                    <option value="2">Cerámica ó Tablón</option>
                    <option value="3">Cemento</option>
                    <option value="4">Madera</option>
                    <option value="5">Tierra</option>
                    <option value="6">Bolsa ó Vinilo</option>
                    <option value="6">Otros</option>
                  </b-form-select>
                  <div class="valid-feedback">Materia Predominante Piso Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.material_predominante.required"
                    >El Materia Predominante Piso es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Tipo de Cubierta:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_cubierta.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_cubierta.$error,'is-valid':!$v.viviendaData.tipo_cubierta.$invalid}"
                    @change="mostrarOtro('TC')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">No aplica</option>
                    <option value="2">Material de Desecho Plastico - Lona</option>
                    <option value="3">Zinc</option>
                    <option value="4">Eternit</option>
                    <option value="5">Entre Piso</option>
                    <option value="6">Teja de Barro</option>
                    <option value="7">Placa Definitiva</option>
                    <option value="8">Paja ó Palma</option>
                    <option value="9">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Tipo de Cubierta Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_cubierta.required"
                    >El Tipo de Cubierta es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOTC">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_tipo_cubierta"
                    :class="viviendaData.otro_tipo_cubierta==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>Actividad Económica:</label>
                  <!-- <b-form-select
                    v-model.trim="$v.viviendaData.actividad_economica.$model"
                    :class="{'is-invalid': $v.viviendaData.actividad_economica.$error,'is-valid':!$v.viviendaData.actividad_economica.$invalid}"
                    @change="mostrarOtro('AE')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Ganaderia</option>
                    <option value="2">Agricola</option>
                    <option value="3">Comerciante</option>
                    <option value="4">Empleado</option>
                    <option value="5">Emprendedor</option>
                    <option value="CUAL">CUAL</option>
                  </b-form-select> -->
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Ocupaciones"
                    v-model="actividadesAuxiliar"                    
                    ref="ocupacion"
                    :class="actividadesAuxiliar==''?'':'is-valid'"
                    @click="abrirModalActividades()"
                    :readonly="true"
                  />
                  <!-- <div class="valid-feedback">Actividad Economica Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.actividad_economica.required"
                    >La Actividad Economica es obligatoria</span>
                  </div> -->
                </div>
                <div class="col-lg-10" v-show="mOAE">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.cual_actividad_economica"
                    :class="viviendaData.cual_actividad_economica==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Evento que Puede Afectar la Vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.evento_afecta_vivienda.$model"
                    :class="{'is-invalid': $v.viviendaData.evento_afecta_vivienda.$error,'is-valid':!$v.viviendaData.evento_afecta_vivienda.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">No aplica</option>
                    <option value="2">Inundación</option>
                    <option value="3">Arroyo</option>
                    <option value="4">Oleaje Fuerte</option>
                    <option value="5">Deslizamiento</option>
                  </b-form-select>
                  <div class="valid-feedback">Evento que Puede Afectar la Vivienda Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.evento_afecta_vivienda.required"
                    >El Evento que Puede Afectar la Vivienda es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Pertenece a Familias en Acción:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.familias_accion.$model"
                    :class="{'is-invalid': $v.viviendaData.familias_accion.$error,'is-valid':!$v.viviendaData.familias_accion.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Pertenece a Familias en Acción Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.familias_accion.required"
                    >Pertenece a Familias en Acción es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Promedio de Ingresos Mensuales:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.promedio_ingresos.$model"
                    :class="{'is-invalid': $v.viviendaData.promedio_ingresos.$error,'is-valid':!$v.viviendaData.promedio_ingresos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Menos de un salario minimo legal vigente</option>
                    <option value="2">Un salario minimo legal vigente</option>
                    <option value="3">Entre 1 y 3 salarios mínimos</option>
                    <option value="4">Entre 3 y 5 salarios mínimos</option>
                    <option value="5">Más de 5 salarios mínimos</option>
                  </b-form-select>
                  <div class="valid-feedback">Promedio de Ingresos Mensuales Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.promedio_ingresos.required"
                    >El Promedio de Ingresos Mensuales es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Prom. de Gastos Mens. En Servicios Publicos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.promedio_gastos.$model"
                    :class="{'is-invalid': $v.viviendaData.promedio_gastos.$error,'is-valid':!$v.viviendaData.promedio_gastos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Menos de $100.000</option>
                    <option value="2">Entre $100.001 y $300.000</option>
                    <option value="3">Entre $300.001 y $500.000</option>
                    <option value="4">Mas de $500.000</option>
                  </b-form-select>
                  <div class="valid-feedback">Prom. de Gastos Mens. En Servicios Publicos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.promedio_gastos.required"
                    >El Prom. de Gastos Mens. En Servicios Publicos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Fuente de Agua para Consumo:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.fuente_agua.$model"
                    :class="{'is-invalid': $v.viviendaData.fuente_agua.$error,'is-valid':!$v.viviendaData.fuente_agua.$invalid}"
                    @change="mostrarOtro('FA')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Acueducto publico</option>
                    <option value="2">Acueducto veredal comunal</option>
                    <option value="3">Pozo con bomba</option>
                    <option value="4">Laguna o jaguey</option>
                    <option value="5">Rio quebrada ó manantial</option>
                    <option value="6">Aguas lluvias</option>
                    <option value="7">Carro tanque</option>
                    <option value="8">Agua tratada envasada</option>
                    <option value="9">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Fuente de Agua para Consumo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.fuente_agua.required"
                    >Fuente de Agua para Consumo es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOFA">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.cual_fuente"
                    :class="viviendaData.cual_fuente==''?'':'is-valid'"
                  />
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">Acceso a servicios públicos</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Energia Electrica:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.energia_electrica.$model"
                    :class="{'is-invalid': $v.viviendaData.energia_electrica.$error,'is-valid':!$v.viviendaData.energia_electrica.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Energia Electrica Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.energia_electrica.required"
                    >Energia Electrica es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Gas Natural:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.gas_natural.$model"
                    :class="{'is-invalid': $v.viviendaData.gas_natural.$error,'is-valid':!$v.viviendaData.gas_natural.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="PI">SI PIPETA DE GAS</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Gas Natural Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.gas_natural.required">Gas Natural es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Acueducto:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.acueducto.$model"
                    :class="{'is-invalid': $v.viviendaData.acueducto.$error,'is-valid':!$v.viviendaData.acueducto.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Acueducto Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.acueducto.required">Acueducto es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Alcantarillado:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.alcantarillado.$model"
                    :class="{'is-invalid': $v.viviendaData.alcantarillado.$error,'is-valid':!$v.viviendaData.alcantarillado.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Alcantarillado Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.alcantarillado.required"
                    >Alcantarillado es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Telefono Fijo:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.telefono_fijo.$model"
                    :class="{'is-invalid': $v.viviendaData.telefono_fijo.$error,'is-valid':!$v.viviendaData.telefono_fijo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Telefono Fijo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.telefono_fijo.required"
                    >Telefono Fijo es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Aseo:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.aseo.$model"
                    :class="{'is-invalid': $v.viviendaData.aseo.$error,'is-valid':!$v.viviendaData.aseo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Aseo Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.aseo.required">Aseo es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Internet Subsidiado:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.internet_subsidiado.$model"
                    :class="{'is-invalid': $v.viviendaData.internet_subsidiado.$error,'is-valid':!$v.viviendaData.internet_subsidiado.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Internet Subsidiado Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.internet_subsidiado.required"
                    >Internet Subsidiado es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Internet Privado:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.internet_privado.$model"
                    :class="{'is-invalid': $v.viviendaData.internet_privado.$error,'is-valid':!$v.viviendaData.internet_privado.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Internet Privado Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.internet_privado.required"
                    >Internet Privado es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Donde se Almacena el Agua:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.donde_almacena_agua.$model"
                    :class="{'is-invalid': $v.viviendaData.donde_almacena_agua.$error,'is-valid':!$v.viviendaData.donde_almacena_agua.$invalid}"
                    @change="mostrarOtro('DA')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">No almacenan</option>
                    <option value="2">Tanque</option>
                    <option value="3">Alberca</option>
                    <option value="4">Planta acuatica</option>
                    <option value="5">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Donde se Almacena el Agua Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.donde_almacena_agua.required"
                    >Donde se Almacena el Agua es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-8" v-show="mODA">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_almacena_agua"
                    :class="viviendaData.otro_almacena_agua==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Ubicación del Tanque:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.ubicacion_tanque.$model"
                    :class="{'is-invalid': $v.viviendaData.ubicacion_tanque.$error,'is-valid':!$v.viviendaData.ubicacion_tanque.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">Interior de la vivienda</option>
                    <option value="2">Exterior de la vivienda bajo techo</option>
                    <option value="3">Exterior de la vivienda sin techo</option>
                    <option value="4">Sobre el techo</option>
                    <option value="5">No aplica</option>
                  </b-form-select>
                  <div class="valid-feedback">Ubicación del Tanque Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.ubicacion_tanque.required"
                    >Ubicación del Tanque es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Tipo de Tratamiento del Agua:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_tratamiento_agua.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_tratamiento_agua.$error,'is-valid':!$v.viviendaData.tipo_tratamiento_agua.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Clorada</option>
                    <option value="2">Filtrada</option>
                    <option value="3">Hervida</option>
                    <option value="4">Consume sin tratamiento</option>
                  </b-form-select>
                  <div class="valid-feedback">Tipo de Tratamiento del Agua Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_tratamiento_agua.required"
                    >El Tipo de Tratamiento del Agua es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Destino final de la Basura:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.destino_final_basura.$model"
                    :class="{'is-invalid': $v.viviendaData.destino_final_basura.$error,'is-valid':!$v.viviendaData.destino_final_basura.$invalid}"
                    @change="mostrarOtro('FB')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Aseo municipal</option>
                    <option value="2">Quemada</option>
                    <option value="3">Cielo Abierto</option>
                    <option value="4">Enterrada</option>
                    <option value="5">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Destino final de la Basura Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.destino_final_basura.required"
                    >El Destino final de la Basura es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOFB">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_destino_final_basura"
                    :class="viviendaData.otro_destino_final_basura==''?'':'is-valid'"
                  />
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >Observe si cerca de la vivienda hay</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Porquerizas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.porquerizas.$model"
                    :class="{'is-invalid': $v.viviendaData.porquerizas.$error,'is-valid':!$v.viviendaData.porquerizas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Porquerizas Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.porquerizas.required">Porquerizas es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Plagas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.plagas.$model"
                    :class="{'is-invalid': $v.viviendaData.plagas.$error,'is-valid':!$v.viviendaData.plagas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Plagas Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.plagas.required">Plagas es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Industrias Contaminantes:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.industrias.$model"
                    :class="{'is-invalid': $v.viviendaData.industrias.$error,'is-valid':!$v.viviendaData.industrias.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Industrias Contaminantes Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.industrias.required"
                    >Industrias Contaminantes es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Malos Olores:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.malos_olores.$model"
                    :class="{'is-invalid': $v.viviendaData.malos_olores.$error,'is-valid':!$v.viviendaData.malos_olores.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Malos Olores Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.malos_olores.required">Malos Olores es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Rellenos Sanitarios:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.rellenos.$model"
                    :class="{'is-invalid': $v.viviendaData.rellenos.$error,'is-valid':!$v.viviendaData.rellenos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Rellenos Sanitarios Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.rellenos.required"
                    >Rellenos Sanitarios es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Contaminación Auditiva:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.contaminacion_a.$model"
                    :class="{'is-invalid': $v.viviendaData.contaminacion_a.$error,'is-valid':!$v.viviendaData.contaminacion_a.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Contaminación Auditiva Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.contaminacion_a.required"
                    >Contaminación Auditiva es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Contaminación Visual:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.contaminacion_v.$model"
                    :class="{'is-invalid': $v.viviendaData.contaminacion_v.$error,'is-valid':!$v.viviendaData.contaminacion_v.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Contaminación Visual Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.contaminacion_v.required"
                    >Contaminación Visual es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Rio ó Quebrada:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.rio.$model"
                    :class="{'is-invalid': $v.viviendaData.rio.$error,'is-valid':!$v.viviendaData.rio.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Rio ó Quebrada Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.rio.required">Rio ó Quebrada es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Aereopuertos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.aereopuertos.$model"
                    :class="{'is-invalid': $v.viviendaData.aereopuertos.$error,'is-valid':!$v.viviendaData.aereopuertos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Aereopuertos Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.aereopuertos.required">Aereopuertos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Avenidas transitadas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.avenidas_transitadas.$model"
                    :class="{'is-invalid': $v.viviendaData.avenidas_transitadas.$error,'is-valid':!$v.viviendaData.avenidas_transitadas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Avenidas transitadas Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.avenidas_transitadas.required"
                    >Avenidas transitadas es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Lotes Abandonados:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.lotes_abandonados.$model"
                    :class="{'is-invalid': $v.viviendaData.lotes_abandonados.$error,'is-valid':!$v.viviendaData.lotes_abandonados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Lotes Abandonados Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.lotes_abandonados.required"
                    >Lotes Abandonados es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Otro:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.otro_cerca.$model"
                    :class="{'is-invalid': $v.viviendaData.otro_cerca.$error,'is-valid':!$v.viviendaData.otro_cerca.$invalid}"
                    @change="mostrarOtro('OC')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Otro Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.otro_cerca.required">Otro es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOOC">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.cual_cerca"
                    :class="viviendaData.cual_cerca==''?'':'is-valid'"
                  />
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >Animales dentro de la Vivienda</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Animal:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Animal"
                    v-model="animal"
                  />
                </div>
                <div class="col-lg-2">
                  <label>Cuantos:</label>
                  <input
                    type="number"
                    min="1"
                    class="form-control text-capitalize"
                    placeholder="Cuantos"
                    v-model="cuantosAnimal"
                  />
                </div>
                <div class="col-lg-3">
                  <label>Vacunados:</label>
                  <b-form-select v-model="vacunadoAnimal">
                    <option value="0" selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-1">
                  <br />
                  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <a
                    href="javascript:;"
                    class="btn btn-outline-info btn-icon"
                    data-skin="dark"
                    data-toggle="kt-tooltip"
                    data-placement="top"
                    title="Agregar"
                    @click.prevent="agregarAnimales"
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
                          <th>Animal</th>
                          <th>Cuantos</th>
                          <th>Vacunado</th>
                          <td class="text-center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in animalesData" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.animal}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.cuantos}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.vacunados}}</span>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemAnimales(index)"
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
                <div class="col-lg-6">
                  <label>El Servicio Sanitario Es:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.servicio_sanitario.$model"
                    :class="{'is-invalid': $v.viviendaData.servicio_sanitario.$error,'is-valid':!$v.viviendaData.servicio_sanitario.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">De Uso Exclusivo de las Personas de la Familia</option>
                    <option value="2">Compartida con Personas de Otras Familias</option>
                    <option value="3">Sin servicio sanitario</option>
                  </b-form-select>
                  <div class="valid-feedback">Servicio Sanitario Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.servicio_sanitario.required"
                    >El Servicio Sanitario es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Donde se Encuentra el Sanitario,Inodoro Ó Letrina:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.donde_sanitario.$model"
                    :class="{'is-invalid': $v.viviendaData.donde_sanitario.$error,'is-valid':!$v.viviendaData.donde_sanitario.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">Fuera de la casa</option>
                    <option value="2">Patio</option>
                    <option value="3">Dentro de la casa</option>
                    <option value="4">No aplica</option>
                  </b-form-select>
                  <div class="valid-feedback">Sanitario,Inodoro Ó Letrina Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.donde_sanitario.required"
                    >El Sanitario,Inodoro Ó Letrina es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Donde se Disponen las Excretas (HECES):</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.excretas.$model"
                    :class="{'is-invalid': $v.viviendaData.excretas.$error,'is-valid':!$v.viviendaData.excretas.$invalid}"
                    @change="mostrarOtro('DH')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Letrina</option>
                    <option value="2">Inodoro con descarga al aire libre</option>
                    <option value="3">Inodoro conectado a red de alcantarillado</option>
                    <option value="4">En agua corriente</option>
                    <option value="5">Pozo séptico</option>                                        
                    <option value="6">Campo abierto</option>
                    <option value="7">Otro</option>                    
                  </b-form-select>
                  <div class="valid-feedback">Donde se Disponen las Excretas (HECES) Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.excretas.required"
                    >Donde se Disponen las Excretas (HECES) es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mODH">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_depositan_excretas"
                    :class="viviendaData.otro_depositan_excretas==''?'':'is-valid'"
                  />
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >La vivienda Tiene los Siguientes Ambientes Separados</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Cocina:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.cocina.$model"
                    :class="{'is-invalid': $v.viviendaData.cocina.$error,'is-valid':!$v.viviendaData.cocina.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Cocina Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.cocina.required">La Cocina es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Dormitorio Adultos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.dormitorio_a.$model"
                    :class="{'is-invalid': $v.viviendaData.dormitorio_a.$error,'is-valid':!$v.viviendaData.dormitorio_a.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Dormitorio Adultos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.dormitorio_a.required"
                    >El Dormitorio Adultos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Sala Comedor:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.sala.$model"
                    :class="{'is-invalid': $v.viviendaData.sala.$error,'is-valid':!$v.viviendaData.sala.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Sala Comedor Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.sala.required">La Sala Comedor es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Dormitorio Niño:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.dormitorio_n.$model"
                    :class="{'is-invalid': $v.viviendaData.dormitorio_n.$error,'is-valid':!$v.viviendaData.dormitorio_n.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Dormitorio Niño Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.dormitorio_n.required"
                    >El Dormitorio Niño es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Sanitario:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.sanitario.$model"
                    :class="{'is-invalid': $v.viviendaData.sanitario.$error,'is-valid':!$v.viviendaData.sanitario.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Sanitario Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.sanitario.required">El Sanitario es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Lavadero:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.lavadero.$model"
                    :class="{'is-invalid': $v.viviendaData.lavadero.$error,'is-valid':!$v.viviendaData.lavadero.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">NO APLICA</option>
                  </b-form-select>
                  <div class="valid-feedback">Lavadero Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.lavadero.required">El Lavadero es obligatorio</span>
                  </div>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">Observe Si Hay</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Iluminación Adecuada:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.iluminacion_adecuada.$model"
                    :class="{'is-invalid': $v.viviendaData.iluminacion_adecuada.$error,'is-valid':!$v.viviendaData.iluminacion_adecuada.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Iluminación Adecuada Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.iluminacion_adecuada.required"
                    >La Iluminación Adecuada es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Techo Adecuado:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.techo_adecuado.$model"
                    :class="{'is-invalid': $v.viviendaData.techo_adecuado.$error,'is-valid':!$v.viviendaData.techo_adecuado.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Techo Adecuado Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.techo_adecuado.required"
                    >El Techo Adecuado es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Ventilación Adecuada:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.ventilacion_adecuada.$model"
                    :class="{'is-invalid': $v.viviendaData.ventilacion_adecuada.$error,'is-valid':!$v.viviendaData.ventilacion_adecuada.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Ventilación Adecuada Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.ventilacion_adecuada.required"
                    >La Ventilación Adecuada es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Pisos Adecuados:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.pisos_adecuado.$model"
                    :class="{'is-invalid': $v.viviendaData.pisos_adecuado.$error,'is-valid':!$v.viviendaData.pisos_adecuado.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Pisos Adecuados Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.pisos_adecuado.required"
                    >El Pisos Adecuados es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Paredes Adecuadas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.paredes_adecuadas.$model"
                    :class="{'is-invalid': $v.viviendaData.paredes_adecuadas.$error,'is-valid':!$v.viviendaData.paredes_adecuadas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Paredes Adecuadas Validas</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.paredes_adecuadas.required"
                    >Las Paredes Adecuadas es obligatoria</span>
                  </div>
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >Almacena Junto A Los Alimentos Y/O Agua De Consumo Alguno De Los Siguientes Productos</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label>Gasolina:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.gasolina.$model"
                    :class="{'is-invalid': $v.viviendaData.gasolina.$error,'is-valid':!$v.viviendaData.gasolina.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Gasolina Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.gasolina.required">La Gasolina es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Plaguicidas Agricolas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.plaguicidas.$model"
                    :class="{'is-invalid': $v.viviendaData.plaguicidas.$error,'is-valid':!$v.viviendaData.plaguicidas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Plaguicidas Agricolas Validas</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.plaguicidas.required"
                    >Los Plaguicidas Agricolas es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Detergentes/Desifectantes:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.detergentes.$model"
                    :class="{'is-invalid': $v.viviendaData.detergentes.$error,'is-valid':!$v.viviendaData.detergentes.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Detergentes/Desifectantes Validos</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.detergentes.required"
                    >Los Detergentes/Desifectantes son obligatorios</span>
                  </div>
                </div>
                <div class="col-lg-3">
                  <label>Plaguicidas Para Insectos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.plaguicidas_insectos.$model"
                    :class="{'is-invalid': $v.viviendaData.plaguicidas_insectos.$error,'is-valid':!$v.viviendaData.plaguicidas_insectos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Plaguicidas Para Insectos Validos</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.plaguicidas_insectos.required"
                    >Los Plaguicidas Para Insectos son obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Uso Final Que Le Dan A Los Envases Vacios De Los Plaguicidas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.envases_vacios.$model"
                    :class="{'is-invalid': $v.viviendaData.envases_vacios.$error,'is-valid':!$v.viviendaData.envases_vacios.$invalid}"
                    @change="mostrarOtro('EV')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">NO APLICA</option>
                    <option value="2">Guardar alimentos y agua</option>
                    <option value="3">Para varios usos en el hogar</option>
                    <option value="4">Los botan a la basura</option>
                    <option value="5">Los entierran</option>
                    <option value="6">Los queman</option>
                    <option value="7">Otro</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Uso Final Que Le Dan A Los Envases Vacios De Los Plaguicidas Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.envases_vacios.required"
                    >El Uso Final Que Le Dan A Los Envases Vacios De Los Plaguicidas es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mOEV">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_envases_vacios"
                    :class="viviendaData.otro_envases_vacios==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Con Que Tipo De Elementos Se Protegen Contra Animales,Plagas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.elementos_protecion.$model"
                    :class="{'is-invalid': $v.viviendaData.elementos_protecion.$error,'is-valid':!$v.viviendaData.elementos_protecion.$invalid}"
                    @change="mostrarOtro('EP')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="1">Toldillos/mosquiteros</option>
                    <option value="2">Anjeos</option>
                    <option value="3">Fumigación con insecticidas/plaguicidas</option>
                    <option value="4">Raticidas</option>
                    <option value="5">Otro</option>
                    <option value="6">Ninguna</option>
                    <option value="7">No aplica</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Con Que Tipo De Elementos Se Protegen Contra Animales,Plagas Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.elementos_protecion.required"
                    >El Tipo De Elementos Con Que Se Protegen Contra Animales,Plagas es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mOEP">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_elementos_protecion"
                    :class="viviendaData.otro_elementos_protecion==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Metodo de cocción de los alimentos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.metodos_coccion.$model"
                    :class="{'is-invalid': $v.viviendaData.metodos_coccion.$error,'is-valid':!$v.viviendaData.metodos_coccion.$invalid}"
                    @change="mostrarOtro('MC')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Estufa a gas</option>
                    <option value="2">Estufa electrica</option>
                    <option value="3">Estufa a gasolina</option>
                    <option value="4">Leña</option>
                    <option value="5">Carbon</option>
                    <option value="6">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Metodo de cocción de los alimentos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.metodos_coccion.required"
                    >El Metodo de cocción de los alimentos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mOMC">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_metodos_coccion"
                    :class="viviendaData.otro_metodos_coccion==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>En cual de los siguientes lugares preparan los alimentos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.lugares_preparan_alimentos.$model"
                    :class="{'is-invalid': $v.viviendaData.lugares_preparan_alimentos.$error,'is-valid':!$v.viviendaData.lugares_preparan_alimentos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">En un cuarto usado solo para cocinar</option>
                    <option value="2">En un cuarto usado tambien para dormir</option>
                    <option value="3">En una sala comedor con lavaplatos</option>
                    <option value="4">En una sala comedor sin lavaplatos</option>
                    <option value="5">En un patio comedor al aire libre</option>
                    <option value="6">En ninguna parte(no preparan alimentos)</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >En cual de los siguientes lugares preparan los alimentos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.lugares_preparan_alimentos.required"
                    >En cual de los siguientes lugares preparan los alimentos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Antes de consumir frutas y verduras las lava:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.lava_frutas.$model"
                    :class="{'is-invalid': $v.viviendaData.lava_frutas.$error,'is-valid':!$v.viviendaData.lava_frutas.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Antes de consumir frutas y verduras las lava Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.lava_frutas.required"
                    >Antes de consumir frutas y verduras las lava es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Como conserva los alimentos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.lugares_almacenan_alimentos.$model"
                    :class="{'is-invalid': $v.viviendaData.lugares_almacenan_alimentos.$error,'is-valid':!$v.viviendaData.lugares_almacenan_alimentos.$invalid}"
                    @change="mostrarOtro('AA')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Refrigerador</option>
                    <option value="2">Recipientes Abiertos</option>
                    <option value="3">Recipientes Cerrados</option>
                    <option value="4">Al aire libre dentro de la casa</option>
                    <option value="5">AL aire libre fuera de la casa</option>
                    <option value="6">Otro</option>
                  </b-form-select>
                  <div class="valid-feedback">Metodo de cocción de los alimentos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.lugares_almacenan_alimentos.required"
                    >El Metodo de cocción de los alimentos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mOAA">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_lugares_almacenan_alimentos"
                    :class="viviendaData.otro_lugares_almacenan_alimentos==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>¿Qué tipo de explotación se le está dando al suelo?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_explotacion.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_explotacion.$error,'is-valid':!$v.viviendaData.tipo_explotacion.$invalid}"
                    @change="mostrarOtro('ES')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Forestal</option>
                    <option value="2">Ganadería</option>
                    <option value="3">Agricultura</option>
                    <option value="4">Urbanístico</option>
                    <option value="5">Otro</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Qué tipo de explotación se le está dando al suelo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_explotacion.required"
                    >Qué tipo de explotación se le está dando al suelo es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6" v-show="mOES">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.otro_tipo_explotacion"
                    :class="viviendaData.otro_tipo_explotacion==''?'':'is-valid'"
                  />
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >¿Qué tipo de recursos naturales son afectados?</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Flora:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.flora_afectados.$model"
                    :class="{'is-invalid': $v.viviendaData.flora_afectados.$error,'is-valid':!$v.viviendaData.flora_afectados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Flora Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.flora_afectados.required">Flora es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Fauna:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.fauna_afectados.$model"
                    :class="{'is-invalid': $v.viviendaData.fauna_afectados.$error,'is-valid':!$v.viviendaData.fauna_afectados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Fauna Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.fauna_afectados.required">Fauna es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Suelo:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.suelo_afectados.$model"
                    :class="{'is-invalid': $v.viviendaData.suelo_afectados.$error,'is-valid':!$v.viviendaData.suelo_afectados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Suelo Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.suelo_afectados.required">Suelo es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Aire:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.aire_afectados.$model"
                    :class="{'is-invalid': $v.viviendaData.aire_afectados.$error,'is-valid':!$v.viviendaData.aire_afectados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Aire Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.aire_afectados.required">Aire es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Agua:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.agua_afectados.$model"
                    :class="{'is-invalid': $v.viviendaData.agua_afectados.$error,'is-valid':!$v.viviendaData.agua_afectados.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Agua Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.agua_afectados.required">Agua es obligatoria</span>
                  </div>
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >¿Cuáles son los tipos de residuos que se genera en su casa?</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Residuos sólidos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.residuos_solidos_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.residuos_solidos_genera.$error,'is-valid':!$v.viviendaData.residuos_solidos_genera.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Residuos sólidos Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.residuos_solidos_genera.required"
                    >Residuos sólidos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Aguas servidas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.aguas_servidas_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.aguas_servidas_genera.$error,'is-valid':!$v.viviendaData.aguas_servidas_genera.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Aguas servidas Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.aguas_servidas_genera.required"
                    >Aguas servidas es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Desechos de cocinas:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.desechos_cocina_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.desechos_cocina_genera.$error,'is-valid':!$v.viviendaData.desechos_cocina_genera.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Desechos de cocinas Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.desechos_cocina_genera.required"
                    >Desechos de cocinas es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Heces de animales:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.heces_animales_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.heces_animales_genera.$error,'is-valid':!$v.viviendaData.heces_animales_genera.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Heces de animales Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.heces_animales_genera.required"
                    >Heces de animales es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Químicos:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.quimicos_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.quimicos_genera.$error,'is-valid':!$v.viviendaData.quimicos_genera.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Químicos Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.quimicos_genera.required">Químicos es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Otros:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.otros_genera.$model"
                    :class="{'is-invalid': $v.viviendaData.otros_genera.$error,'is-valid':!$v.viviendaData.otros_genera.$invalid}"
                    @change="mostrarOtro('OG')"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Otros Valido</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.otros_genera.required">Otros es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12" v-show="mOOG">
                  <label>Cual:</label>
                  <input
                    type="text"
                    class="form-control text-capitalize"
                    placeholder="Cual"
                    v-model.trim="viviendaData.cual_genera"
                    :class="viviendaData.cual_genera==''?'':'is-valid'"
                  />
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>¿Cuál es el tipo de combustible utilizado en su casa para cocinar?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.tipo_combustible.$model"
                    :class="{'is-invalid': $v.viviendaData.tipo_combustible.$error,'is-valid':!$v.viviendaData.tipo_combustible.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Luz eléctrica</option>
                    <option value="2">Gasolina</option>
                    <option value="3">Leña</option>
                    <option value="4">Carbón</option>
                    <option value="5">Gas natural</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Cuál es el tipo de combustible utilizado en su casa para cocinar Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.tipo_combustible.required"
                    >Cuál es el tipo de combustible utilizado en su casa para cocinar es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>¿Realizan mantenimiento de la red de suministros de gas natural?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.mantenimiento_red.$model"
                    :class="{'is-invalid': $v.viviendaData.mantenimiento_red.$error,'is-valid':!$v.viviendaData.mantenimiento_red.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Nunca</option>
                    <option value="2">Periódico</option>
                    <option value="3">Ocasional</option>
                    <option value="4">Permanente</option>
                  </b-form-select>
                  <div class="valid-feedback">Aguas servidas Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.mantenimiento_red.required"
                    >Aguas servidas es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-5">
                  <label>Su vivienda se encuentra en una zona de alto riesgo:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.zona_alto_riesgo.$model"
                    :class="{'is-invalid': $v.viviendaData.zona_alto_riesgo.$error,'is-valid':!$v.viviendaData.zona_alto_riesgo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="0">No Aplica</option>
                    <option value="1">Ladera</option>
                    <option value="2">Rio</option>
                    <option value="3">suelo inestable, derrumbes</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Su vivienda se encuentra en una zona de alto riesgo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.zona_alto_riesgo.required"
                    >Su vivienda se encuentra en una zona de alto riesgo es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-7">
                  <label>¿Existe un lugar apto para el almacenamiento de los residuos antes de la recolección?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.almacenamiento_residuos.$model"
                    :class="{'is-invalid': $v.viviendaData.almacenamiento_residuos.$error,'is-valid':!$v.viviendaData.almacenamiento_residuos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Existe un lugar apto para el almacenamiento de los residuos antes de la recolección Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.almacenamiento_residuos.required"
                    >Existe un lugar apto para el almacenamiento de los residuos antes de la recolección es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Existe una fuente de contaminación cerca del lugar de la vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.fuente_contaminacion.$model"
                    :class="{'is-invalid': $v.viviendaData.fuente_contaminacion.$error,'is-valid':!$v.viviendaData.fuente_contaminacion.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Existe una fuente de contaminación cerca del lugar de la vivienda Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.fuente_contaminacion.required"
                    >Existe una fuente de contaminación cerca del lugar de la vivienda es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>¿Se presenta en tu barrio problemáticas de aguas negras?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.aguas_negras.$model"
                    :class="{'is-invalid': $v.viviendaData.aguas_negras.$error,'is-valid':!$v.viviendaData.aguas_negras.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Se presenta en tu barrio problemáticas de aguas negras Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.aguas_negras.required"
                    >Se presenta en tu barrio problemáticas de aguas negras es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Considera que su comunidad posee adecuadas zonas verdes como parques:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.zonas_verdes.$model"
                    :class="{'is-invalid': $v.viviendaData.zonas_verdes.$error,'is-valid':!$v.viviendaData.zonas_verdes.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">SI HAY</option>
                    <option value="2">NO HAY</option>
                    <option value="3">SI HAY EN MAL ESTADO</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Considera usted que su comunidad posee adecuadas zonas verdes como parques Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.zonas_verdes.required"
                    >Considera usted que su comunidad posee adecuadas zonas verdes como parques es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Cuantas veces los deslizamientos afectaron su comunidad o su vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.desplazamientos.$model"
                    :class="{'is-invalid': $v.viviendaData.desplazamientos.$error,'is-valid':!$v.viviendaData.desplazamientos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Más de 2 veces al año</option>
                    <option value="2">Al menos una vez al año</option>
                    <option value="3">Una vez cada 2 años</option>
                    <option value="4">Nunca</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Cuantas veces los deslizamientos afectaron su comunidad o su vivienda Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.desplazamientos.required"
                    >Cuantas veces los deslizamientos afectaron su comunidad o su vivienda es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>¿Realiza usted rotación del cultivo? :</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.rotacion_cultivo.$model"
                    :class="{'is-invalid': $v.viviendaData.rotacion_cultivo.$error,'is-valid':!$v.viviendaData.rotacion_cultivo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Permanentemente</option>
                    <option value="2">Nunca</option>
                    <option value="3">Ocasional</option>
                    <option value="4">Periódicamente</option>
                    <option value="5">No aplica</option>
                  </b-form-select>
                  <div class="valid-feedback">Realiza usted rotación del cultivo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.rotacion_cultivo.required"
                    >Realiza usted rotación del cultivo es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>Emplea fertilizantes químicos o plaguicidas en su actividad:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.emplea_fertilizantes.$model"
                    :class="{'is-invalid': $v.viviendaData.emplea_fertilizantes.$error,'is-valid':!$v.viviendaData.emplea_fertilizantes.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    <option value="NA">No aplica</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Emplea fertilizantes químicos o plaguicidas en su actividad Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.emplea_fertilizantes.required"
                    >Emplea fertilizantes químicos o plaguicidas en su actividad es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Suministro de energía ilegal :</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.suministro_energia_ilegal.$model"
                    :class="{'is-invalid': $v.viviendaData.suministro_energia_ilegal.$error,'is-valid':!$v.viviendaData.suministro_energia_ilegal.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Suministro de energía ilegal Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.suministro_energia_ilegal.required"
                    >Suministro de energía ilegal es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label>¿Usted realiza quema de cultivo?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.quema_cultivo.$model"
                    :class="{'is-invalid': $v.viviendaData.quema_cultivo.$error,'is-valid':!$v.viviendaData.quema_cultivo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                  <div class="valid-feedback">Usted realiza quema de cultivo Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.quema_cultivo.required"
                    >Usted realiza quema de cultivo es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <label>¿ha evidenciado usted mantenimiento preventivo a la red de alcantarillado en su comunidad?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.mantenimiento_preventivo.$model"
                    :class="{'is-invalid': $v.viviendaData.mantenimiento_preventivo.$error,'is-valid':!$v.viviendaData.mantenimiento_preventivo.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Permanentemente</option>
                    <option value="2">Nunca</option>
                    <option value="3">Ocasional</option>
                    <option value="4">Periódicamente</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >ha evidenciado usted mantenimiento preventivo a la red de alcantarillado en su comunidad Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.mantenimiento_preventivo.required"
                    >ha evidenciado usted mantenimiento preventivo a la red de alcantarillado en su comunidad es obligatoria</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Cuantas veces las inundaciones afectaron su comunidad o su vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.veces_inundaciones.$model"
                    :class="{'is-invalid': $v.viviendaData.veces_inundaciones.$error,'is-valid':!$v.viviendaData.veces_inundaciones.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Más de 2 veces al año</option>
                    <option value="2">Al menos una vez al año</option>
                    <option value="3">Una vez cada 2 años</option>
                    <option value="4">Nunca</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Cuantas veces las inundaciones afectaron su comunidad o su vivienda Valida</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.veces_inundaciones.required"
                    >Cuantas veces las inundaciones afectaron su comunidad o su vivienda es obligatoria</span>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Fachada de la casa:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.fachada.$model"
                    :class="{'is-invalid': $v.viviendaData.fachada.$error,'is-valid':!$v.viviendaData.fachada.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Pobre</option>
                    <option value="2">Sencilla</option>
                    <option value="3">Regular</option>
                    <option value="4">Buena</option>
                    <option value="5">Lujosa</option>
                  </b-form-select>
                  <div class="valid-feedback">Fachada de la casa Valida</div>
                  <div class="invalid-feedback">
                    <span v-if="!$v.viviendaData.fachada.required">Fachada de la casa es obligatoria</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>¿Cuantos baños de uso exclusivo tiene?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.cuantos_baños.$model"
                    :class="{'is-invalid': $v.viviendaData.cuantos_baños.$error,'is-valid':!$v.viviendaData.cuantos_baños.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">No posee baño de uso exclusivo</option>
                    <option value="2">1 Baño</option>
                    <option value="3">2 Baños</option>
                    <option value="4">3 Baños ó mas</option>
                  </b-form-select>
                  <div class="valid-feedback">Baños de uso exclusivo Validos</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.cuantos_baños.required"
                    >Baños de uso exclusivo son obligatorios</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Estado de conservacion de los baños:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.estado_conservacion_baños.$model"
                    :class="{'is-invalid': $v.viviendaData.estado_conservacion_baños.$error,'is-valid':!$v.viviendaData.estado_conservacion_baños.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Malo</option>
                    <option value="2">Regular</option>
                    <option value="3">Bueno</option>
                    <option value="4">Excelente</option>
                  </b-form-select>
                  <div class="valid-feedback">Estado de conservacion de los baños Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.estado_conservacion_baños.required"
                    >Estado de conservacion de los baños es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>Acabados externos de los muros ó paredes:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.acabados_externos.$model"
                    :class="{'is-invalid': $v.viviendaData.acabados_externos.$error,'is-valid':!$v.viviendaData.acabados_externos.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Sin cubrimiento</option>
                    <option value="2">Pañete ó ladrillos presado</option>
                    <option value="3">Estuco, Cerámica, Papel de Colgadura</option>
                    <option value="4">Madera Piedra Ornamental</option>
                    <option value="5">Marmol, lujoso</option>
                  </b-form-select>
                  <div class="valid-feedback">Acabados externos de los muros Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.acabados_externos.required"
                    >Acabados externos de los muros es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Estado de Conservacion de las estructuras de la Vivienda:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.estado_conservacion_estructuras.$model"
                    :class="{'is-invalid': $v.viviendaData.estado_conservacion_estructuras.$error,'is-valid':!$v.viviendaData.estado_conservacion_estructuras.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Malo</option>
                    <option value="2">Regular</option>
                    <option value="3">Bueno</option>
                    <option value="4">Excelente</option>
                  </b-form-select>
                  <div
                    class="valid-feedback"
                  >Estado de Conservacion de las estructuras de la Vivienda Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.estado_conservacion_estructuras.required"
                    >Estado de Conservacion de las estructuras de la Vivienda es obligatorio</span>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label>Mobiliario de la cocina:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.mobiliario_cocina.$model"
                    :class="{'is-invalid': $v.viviendaData.mobiliario_cocina.$error,'is-valid':!$v.viviendaData.mobiliario_cocina.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">Pobre</option>
                    <option value="2">Sencillo</option>
                    <option value="3">Regular</option>
                    <option value="4">Excelente</option>
                  </b-form-select>
                  <div class="valid-feedback">Mobiliario de la cocina Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.mobiliario_cocina.required"
                    >Mobiliario de la cocina es obligatorio</span>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>¿Estado de los andenes y bordillo de la vivienda?:</label>
                  <b-form-select
                    v-model.trim="$v.viviendaData.andenes.$model"
                    :class="{'is-invalid': $v.viviendaData.andenes.$error,'is-valid':!$v.viviendaData.andenes.$invalid}"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="1">No tiene.</option>
                    <option value="2">Si tiene, pavimentado</option>
                    <option value="3">Si tiene en mal estado</option>
                  </b-form-select>
                  <div class="valid-feedback">Estado de los andenes y bordillo de la vivienda Valido</div>
                  <div class="invalid-feedback">
                    <span
                      v-if="!$v.viviendaData.andenes.required"
                    >Estado de los andenes y bordillo de la vivienda es obligatorio</span>
                  </div>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 18px;">Estratificación</span>
              </p>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>¿Cuenta ese Hogar con Internet?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.cuenta_internet"
                    :class="estratificacionData.cuenta_internet==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>¿Tiene computador de Escritorío?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.tiene_pc_escritorio"
                    :class="estratificacionData.tiene_pc_escritorio==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>¿Tiene Computador Portatil?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.tiene_pc_portatil"
                    :class="estratificacionData.tiene_pc_portatil==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4">
                  <label>¿Cuantos celulares en uso hay en el Hogar?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.cuantos_celulares"
                    :class="estratificacionData.cuantos_celulares==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in opciones1"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Tiene Equipo de sonido:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.tiene_equipo_sonido"
                    :class="estratificacionData.tiene_equipo_sonido==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-4">
                  <label>Cuantos Tv a Color:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.cuantos_tv_color"
                    :class="estratificacionData.cuantos_tv_color==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in opciones2"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6">
                  <label>Cuantos Vehiculos de Uso exclusivo tiene el Hogar:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.cuantos_vehiculos"
                    :class="estratificacionData.cuantos_vehiculos==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in opciones3"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-6">
                  <label>¿Cual es el nivel de Instrucción del jefe del Hogar?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.nivel_instruccion"
                    :class="estratificacionData.nivel_instruccion==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option
                      v-for="item in opciones4"
                      :value="item.value"
                      :key="item.value"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-7">
                  <label>¿Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.afiliacion_salud_privada"
                    :class="estratificacionData.afiliacion_salud_privada==''?'':'is-valid'"
                  >
                    <option value selected>Seleccione</option>
                    <option value="NA">No Aplica</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </b-form-select>
                </div>
                <div class="col-lg-5">
                  <label>¿Ingresos mensuales por Hogar zona rural?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.ingresos_zona_rural"
                    :class="estratificacionData.ingresos_zona_rural==''?'':'is-valid'"
                  >
                    <option
                      value
                      selected
                      :disabled="hogar.id_zona=='' || hogar.id_zona==0 || hogar.id_zona==1"
                    >Seleccione</option>
                    <option
                      v-for="item in opciones5"
                      :value="item.value"
                      :key="item.value"
                      :disabled="hogar.id_zona=='' || hogar.id_zona==0 || hogar.id_zona==1"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-5">
                  <label>¿Ingresos mensuales por Hogar en Ciudad?:</label>
                  <b-form-select
                    v-model.trim="estratificacionData.ingresos_ciudad"
                    :class="estratificacionData.ingresos_ciudad==''?'':'is-valid'"
                  >
                    <option
                      value
                      selected
                      :disabled="hogar.id_zona=='' || hogar.id_zona==0 || hogar.id_zona==2 || hogar.id_zona==3"
                    >Seleccione</option>
                    <option
                      v-for="item in opciones6"
                      :value="item.value"
                      :key="item.value"
                      :disabled="hogar.id_zona=='' || hogar.id_zona==0 || hogar.id_zona==2 || hogar.id_zona==3"
                    >{{item.texto}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-5">
                  <label>Jefe del hogar:</label>
                  <b-form-select
                    v-model="estratificacionData.id_jefe"
                    :class="estratificacionData.id_jefe=='0'?'':'is-valid'"
                  >
                    <option value="0" selected>Seleccione</option>
                    <option
                      v-for="item in datosJefe"
                      :value="item.identificacion"
                      :key="item.value"
                    >{{item.pnom.toUpperCase()}} {{item.snom.toUpperCase()}} {{item.pape.toUpperCase()}} {{item.sape.toUpperCase()}}</option>
                  </b-form-select>
                </div>
                <div class="col-lg-2">
                  <br />
                  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <a
                    href="javascript:;"
                    class="btn btn-outline-info btn-icon"
                    data-skin="dark"
                    data-toggle="kt-tooltip"
                    data-placement="top"
                    title="Agregar"
                    @click.prevent="agregarEstratificacion"
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
                          <th>¿Cuenta ese Hogar con Internet?</th>
                          <th>¿Tiene computador de Escritorío?</th>
                          <th>¿Tiene Computador Portatil?</th>
                          <th>¿Cuantos celular en uso hay en el Hogar?</th>
                          <th>Tiene Equipo de sonido</th>
                          <th>Cuantos Tv a Color</th>
                          <th>Cuantos Vehiculos de Uso exclusivo tiene el Hogar</th>
                          <th>¿Cual es el nivel de Instrucción del jefe del Hogar?</th>
                          <th>¿Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?</th>
                          <th>¿Ingresos mensuales por Hogar zona rural?</th>
                          <th>¿Ingresos mensuales por Hogar en Ciudad?</th>
                          <th>Jefe del hogar</th>
                          <td class="text-center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in estratificacion" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">{{ (index+1) }}</td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.cuenta_internet}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_pc_escritorio}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_pc_portatil}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_celulares}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.tiene_equipo_sonido}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_tv_color}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_cuantos_vehiculos}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_nivel_instruccion}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.afiliacion_salud_privada}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_ingresos_zona_rural}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.texto_ingresos_ciudad}}</span>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <span class="text-capitalize">{{item.id_jefe}}</span>
                          </td>
                          <td style="text-align:center;vertical-align: middle;text-align: center;">
                            <button
                              class="btn btn-icon btn-sm btn-outline-danger"
                              type="button"
                              title="Eliminar"
                              @click="eliminarItemEstratificacion(index)"
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
            </div>
            <!-- Vivienda -->

            <!-- Cart. X ciclo -->
            <div class="tab-pane" id="cartxciclo" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('adolescente','cartxciclo')"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 18px;"
                >IV CARACTERIZACIÓN POR CICLO VITAL</span>
              </p>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >A. PRIMERA INFANCIA NIÑOS(AS) MENORES DE UN AÑO</span>
              </p>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-sm table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th
                            class="kt-bg-fill-success"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="25"
                          >Crecimiento y Desarrollo</th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="8"
                          >Vacunación</th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="9"></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Integral</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="8"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración del Desarrollo</th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="8"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-success">
                          <th>No.</th>
                          <th>Documento</th>
                          <th>Nombre</th>
                          <th>Sexo</th>
                          <th>Lugar de Nacimiento</th>
                          <th>Hemoclasificación</th>
                          <th>Complicaciones en el parto</th>
                          <th>Via de Parto</th>
                          <th>Control de CyC</th>
                          <th class="kt-bg-fill-dark">2-3 meses</th>
                          <th class="kt-bg-fill-dark">6-8 meses</th>
                          <th class="kt-bg-fill-dark">9-11 meses</th>
                          <th class="kt-bg-fill-danger">Lactancia Exclusiva</th>
                          <th class="kt-bg-fill-danger">Peso al Nacer (Kgs)</th>
                          <th class="kt-bg-fill-danger">Peso Actual (Kgs)</th>
                          <th class="kt-bg-fill-danger">Longitud al Nacer (cm)</th>
                          <th class="kt-bg-fill-danger">Longitud Actual (cm)</th>
                          <th class="kt-bg-fill-danger">Peso/Longitud</th>
                          <th class="kt-bg-fill-danger">P.Cefalico</th>
                          <th class="kt-bg-fill-danger">Edemas</th>
                          <th class="kt-bg-fill-info">Lenguaje</th>
                          <th class="kt-bg-fill-info">Motora</th>
                          <th class="kt-bg-fill-info">Conducta</th>
                          <th class="kt-bg-fill-warning">Visuales</th>
                          <th class="kt-bg-fill-warning">Auditivos</th>
                          <th class="kt-bg-fill-dark">Carnet (PAI)</th>
                          <th class="kt-bg-fill-dark">BCG</th>
                          <th class="kt-bg-fill-dark">HEP-B</th>
                          <th class="kt-bg-fill-dark">POLIO</th>
                          <th class="kt-bg-fill-dark">PENTAVALENTE</th>
                          <th class="kt-bg-fill-dark">Maltrato</th>
                          <th class="kt-bg-fill-dark">Morbilidad</th>
                          <th class="kt-bg-fill-dark">TSH</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in Men1A" :key="index">
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
                              class="form-control text-capitalize"
                              style="width:200px;background-color:white;"
                              :value="item.tipo_id+' : '+item.identificacion"
                              :class="item.tipo_id==''?'':'is-valid'"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              style="width:300px;background-color:white;"
                              :value="item.pnom+' '+item.snom+' '+item.pape+' '+item.sape "
                              :class="item.pnom==''?'':'is-valid'"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              class="form-control text-capitalize"
                              style="width:150px;background-color:white;"
                              :value="item.sexo"
                              :class="item.sexo==''?'':'is-valid'"
                              readonly
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.lugar_nacimiento"
                              @input="lugar_nacimiento=>updateMenA1(item,lugar_nacimiento,'lugar_nacimiento')"
                              :class="item.lugar_nacimiento==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="HOSPITAL">HOSPITAL</option>
                              <option value="CASA">CASA</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.hemoclasificacion"
                              @input="hemoclasificacion=>updateMenA1(item,hemoclasificacion,'hemoclasificacion')"
                              :class="item.hemoclasificacion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:200px;"
                              v-model="item.compli_parto"
                              @input="compli_parto=>updateMenA1(item,compli_parto,'compli_parto')"
                              :class="item.compli_parto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.via_parto"
                              @input="via_parto=>updateMenA1(item,via_parto,'via_parto')"
                              :class="item.via_parto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="CESAREA">CESAREA</option>
                              <option value="PARTO">PARTO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cyc"
                              @input="cyc=>updateMenA1(item,cyc,'cyc')"
                              :class="item.cyc==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_23"
                              @input="valoracion_23=>updateMenA1(item,valoracion_23,'valoracion_23')"
                              :class="item.valoracion_23==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_68"
                              @input="valoracion_68=>updateMenA1(item,valoracion_68,'valoracion_68')"
                              :class="item.valoracion_68==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_911"
                              @input="valoracion_911=>updateMenA1(item,valoracion_911,'valoracion_911')"
                              :class="item.valoracion_911==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.lactancia"
                              @input="lactancia=>updateMenA1(item,lactancia,'lactancia')"
                              :class="item.lactancia==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso_nacer"
                              @input="changeupdateMenA1(item,$event,'peso_nacer')"
                              :class="item.peso_nacer==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso_actual"
                              @input="changeupdateMenA1(item,$event,'peso_actual')"
                              :class="item.peso_actual==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.longitud_nacer"
                              @input="changeupdateMenA1(item,$event,'longitud_nacer')"
                              :class="item.longitud_nacer==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.longitud_actual"
                              @input="changeupdateMenA1(item,$event,'longitud_actual')"
                              :class="item.longitud_actual==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:160px;"
                              class="form-control text-capitalize"
                              v-model="item.peso_long"
                              @input="changeupdateMenA1(item,$event,'peso_long')"
                              :class="item.peso_long==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cinta"
                              @input="cinta=>updateMenA1(item,cinta,'cinta')"
                              :class="item.cinta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="PC">P.C</option>
                              <option value="PB">P.B</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.edemas"
                              @input="edemas=>updateMenA1(item,edemas,'edemas')"
                              :class="item.edemas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.lenguaje"
                              @input="lenguaje=>updateMenA1(item,lenguaje,'lenguaje')"
                              :class="item.lenguaje==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.motora"
                              @input="motora=>updateMenA1(item,motora,'motora')"
                              :class="item.motora==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateMenA1(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateMenA1(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateMenA1(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.carnet"
                              @input="carnet=>updateMenA1(item,carnet,'carnet')"
                              :class="item.carnet==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="DESAC">DESAC</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.bcg"
                              @input="bcg=>updateMenA1(item,bcg,'bcg')"
                              :class="item.bcg==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.hepb"
                              @input="hepb=>updateMenA1(item,hepb,'hepb')"
                              :class="item.hepb==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.polio"
                              @input="polio=>updateMenA1(item,polio,'polio')"
                              :class="item.polio==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="D5">D5</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.pentavalente"
                              @input="pentavalente=>updateMenA1(item,pentavalente,'pentavalente')"
                              :class="item.pentavalente==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateMenA1(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.morbilidad"
                              @input="morbilidad=>updateMenA1(item,morbilidad,'morbilidad')"
                              :class="item.morbilidad==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in morbilidadNacer_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tsh"
                              @input="tsh=>updateMenA1(item,tsh,'tsh')"
                              :class="item.tsh==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="1">SI-NORMAL</option>
                              <option value="2">SI-ANORMAL</option>
                              <option value="3">SI-NO SABE EL RESULTADO</option>
                              <option value="4">NO SE TOMO EL EXAMEN</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >B.PRIMERA INFANCIA NIÑOS(AS) DE 1 A 5 AÑOS (12 a 60 Meses)</span>
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
                            colspan="22"
                          >Crecimiento y Desarrollo</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Salud Oral</th>
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="8"
                          >Vacunación</th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          ></th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="7"></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Integral</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="7"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="8"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-primary">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td>Beneficiario de un Programa</td>
                          <td>Control de CyC</td>
                          <td class="kt-bg-fill-dark">18-23 meses</td>
                          <td class="kt-bg-fill-dark">30-35 meses</td>
                          <td class="kt-bg-fill-dark">4 años</td>
                          <td class="kt-bg-fill-danger">Peso(Kgs)</td>
                          <td class="kt-bg-fill-danger">Talla(cm)</td>
                          <td class="kt-bg-fill-danger">IMC</td>
                          <td class="kt-bg-fill-danger">P.B</td>
                          <td class="kt-bg-fill-danger">P/T</td>
                          <td class="kt-bg-fill-danger">T/E</td>
                          <td class="kt-bg-fill-danger">Perimetro Cefálico</td>
                          <td class="kt-bg-fill-info">Lenguaje</td>
                          <td class="kt-bg-fill-info">Motora</td>
                          <td class="kt-bg-fill-info">Conducta</td>
                          <td class="kt-bg-fill-warning">Visuales</td>
                          <td class="kt-bg-fill-warning">Auditivos</td>
                          <td class="kt-bg-fill-danger">Caries</td>
                          <td class="kt-bg-fill-danger">No. Cepillado Dia</td>
                          <td class="kt-bg-fill-danger">Consulta Odontologica (ultimos 6 meses)</td>
                          <td class="kt-bg-fill-info">Carnet (PAI)</td>
                          <td class="kt-bg-fill-info">BCG</td>
                          <td class="kt-bg-fill-info">POLIO</td>
                          <td class="kt-bg-fill-info">DPT</td>
                          <td class="kt-bg-fill-info">Fiebre Amarilla</td>
                          <td class="kt-bg-fill-info">Triple Viral</td>
                          <td class="kt-bg-fill-info">Pentavalente</td>
                          <td class="kt-bg-fill-info">Otras</td>
                          <td class="kt-bg-fill-dark">Desparacitado</td>
                          <td class="kt-bg-fill-dark">Señales de Maltrato</td>
                          <td class="kt-bg-fill-dark">Enfermedad</td>
                          <td class="kt-bg-fill-dark">Medicamento</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De1A5" :key="index">
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
                              v-model="item.beneficiario"
                              @input="beneficiario=>updateDe1A5(item,beneficiario,'beneficiario')"
                              :class="item.beneficiario==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="1">Hogares Comunitarios</option>
                              <option value="2">ICBF</option>
                              <option value="3">Desayuno Escolar</option>
                              <option value="4">Jardin Social - CDI</option>
                              <option value="5">Otro</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cyc"
                              @input="cyc=>updateDe1A5(item,cyc,'cyc')"
                              :class="item.cyc==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_1823"
                              @input="valoracion_1823=>updateDe1A5(item,valoracion_1823,'valoracion_1823')"
                              :class="item.valoracion_1823==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_3035"
                              @input="valoracion_3035=>updateDe1A5(item,valoracion_3035,'valoracion_3035')"
                              :class="item.valoracion_3035==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.valoracion_4"
                              @input="valoracion_4=>updateDe1A5(item,valoracion_4,'valoracion_4')"
                              :class="item.valoracion_4==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe1A5(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe1A5(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe1A5(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pb"
                              @input="changeupdateDe1A5(item,$event,'pb')"
                              :class="item.pb==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pt"
                              @input="changeupdateDe1A5(item,$event,'pt')"
                              :class="item.pt==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.te"
                              @input="changeupdateDe1A5(item,$event,'te')"
                              :class="item.te==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pcefalico"
                              @input="changeupdateDe1A5(item,$event,'pcefalico')"
                              :class="item.pcefalico==''?'is-invalid':'is-valid'"
                            />
                          </td>                          
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.lenguaje"
                              @input="lenguaje=>updateDe1A5(item,lenguaje,'lenguaje')"
                              :class="item.lenguaje==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.motora"
                              @input="motora=>updateDe1A5(item,motora,'motora')"
                              :class="item.motora==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateDe1A5(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateDe1A5(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateDe1A5(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.caries"
                              @input="caries=>updateDe1A5(item,caries,'caries')"
                              :class="item.caries==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.nocepillado"
                              @input="changeupdateDe1A5(item,$event,'nocepillado')"
                              :class="item.nocepillado==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consultaodon"
                              @input="consultaodon=>updateDe1A5(item,consultaodon,'consultaodon')"
                              :class="item.consultaodon==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.carnet"
                              @input="carnet=>updateDe1A5(item,carnet,'carnet')"
                              :class="item.carnet==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="DESACTUALIZADO">DESACTUALIZADO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.bcg"
                              @input="bcg=>updateDe1A5(item,bcg,'bcg')"
                              :class="item.bcg==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.polio"
                              @input="polio=>updateDe1A5(item,polio,'polio')"
                              :class="item.polio==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="D5">D5</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dpt"
                              @input="dpt=>updateDe1A5(item,dpt,'dpt')"
                              :class="item.dpt==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="D5">D5</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.fiebrea"
                              @input="fiebrea=>updateDe1A5(item,fiebrea,'fiebrea')"
                              :class="item.fiebrea==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tripleviral"
                              @input="tripleviral=>updateDe1A5(item,tripleviral,'tripleviral')"
                              :class="item.tripleviral==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.pentavalente"
                              @input="pentavalente=>updateDe1A5(item,pentavalente,'pentavalente')"
                              :class="item.pentavalente==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>                          
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.otras"
                              @input="changeupdateDe1A5(item,$event,'otras')"
                              :class="item.otras==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.desparacitado"
                              @input="desparacitado=>updateDe1A5(item,desparacitado,'desparacitado')"
                              :class="item.desparacitado==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateDe1A5(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedad"
                              @input="enfermedad=>updateDe1A5(item,enfermedad,'enfermedad')"
                              :class="item.enfermedad==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.medicamento"
                              @input="medicamento=>updateDe1A5(item,medicamento,'medicamento')"
                              :class="item.medicamento==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                              <option value="NA">No Aplica</option>
                            </b-form-select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >C.INFANCIA NIÑOS(AS) DE 6 A 11 AÑOS</span>
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
                            colspan="14"
                          >Crecimiento y Desarrollo</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Salud Oral</th>
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="5"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Relación Familiar</th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="6"></th>
                          <th class="kt-bg-fill-success" colspan="1"></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="5"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-primary">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td>Control de CyC</td>
                          <td class="kt-bg-fill-dark">Valoración Integral</td>
                          <td class="kt-bg-fill-danger">Peso(Kgs)</td>
                          <td class="kt-bg-fill-danger">Talla(cm)</td>
                          <td class="kt-bg-fill-danger">IMC/E</td>
                          <!-- <td class="kt-bg-fill-danger">P.B</td> -->
                          <!-- <td class="kt-bg-fill-danger">P/T</td> -->
                          <td class="kt-bg-fill-danger">T/E</td>
                          <td class="kt-bg-fill-warning">Conducta</td>
                          <td class="kt-bg-fill-warning">Visuales</td>
                          <td class="kt-bg-fill-warning">Auditivos</td>
                          <td class="kt-bg-fill-danger">Dientes Sanos</td>
                          <td class="kt-bg-fill-danger">Consulta Odontologica (ultimos 6 meses)</td>
                          <td class="kt-bg-fill-danger">No. Aplicacion Fluor</td>
                          <td class="kt-bg-fill-danger">No. Cepillado Dia</td>
                          <td class="kt-bg-fill-info">Señales Maltrato ó Abuso</td>
                          <td class="kt-bg-fill-info">Sustancias Psicoactivas</td>
                          <td class="kt-bg-fill-info">Desparacitado</td>
                          <td class="kt-bg-fill-info">Enfermedad</td>
                          <td class="kt-bg-fill-info">Medicamento</td>
                          <td class="kt-bg-fill-dark">Padre</td>
                          <td class="kt-bg-fill-dark">Madre</td>
                          <td class="kt-bg-fill-dark">Hermanos</td>
                          <td class="kt-bg-fill-dark">Conyuge</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De6A11" :key="index">
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
                              v-model="item.cyc"
                              @input="cyc=>updateDe6A11(item,cyc,'cyc')"
                              :class="item.cyc==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.atencion"
                              @input="atencion=>updateDe6A11(item,atencion,'atencion')"
                              :class="item.atencion==''?'is-invalid':'is-valid'"
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
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe6A11(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe6A11(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe6A11(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pb"
                              @input="changeupdateDe6A11(item,$event,'pb')"
                              :class="item.pb==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pt"
                              @input="changeupdateDe6A11(item,$event,'pt')"
                              :class="item.pt==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.te"
                              @input="changeupdateDe6A11(item,$event,'te')"
                              :class="item.te==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateDe6A11(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateDe6A11(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateDe6A11(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dientes_sanos"
                              @input="dientes_sanos=>updateDe6A11(item,dientes_sanos,'dientes_sanos')"
                              :class="item.dientes_sanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consultaodon"
                              @input="consultaodon=>updateDe6A11(item,consultaodon,'consultaodon')"
                              :class="item.consultaodon==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >

                            <b-form-select
                              style="width:150px;"
                              v-model="item.nofluor"
                              @input="nofluor=>updateDe6A11(item,nofluor,'nofluor')"
                              :class="item.nofluor==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">NO APLICA</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="NI">NINGUNO</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.nocepillado"
                              @input="changeupdateDe6A11(item,$event,'nocepillado')"
                              :class="item.nocepillado==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateDe6A11(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.sustanciaspsico"
                              @input="sustanciaspsico=>updateDe6A11(item,sustanciaspsico,'sustanciaspsico')"
                              :class="item.sustanciaspsico==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.desparacitado"
                              @input="desparacitado=>updateDe6A11(item,desparacitado,'desparacitado')"
                              :class="item.desparacitado==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedad"
                              @input="enfermedad=>updateDe6A11(item,enfermedad,'enfermedad')"
                              :class="item.enfermedad==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.medicamento"
                              @input="medicamento=>updateDe6A11(item,medicamento,'medicamento')"
                              :class="item.medicamento==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.padre"
                              @input="padre=>updateDe6A11(item,padre,'padre')"
                              :class="item.padre==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.madre"
                              @input="madre=>updateDe6A11(item,madre,'madre')"
                              :class="item.madre==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.hermanos"
                              @input="hermanos=>updateDe6A11(item,hermanos,'hermanos')"
                              :class="item.hermanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conyuge"
                              @input="conyuge=>updateDe6A11(item,conyuge,'conyuge')"
                              :class="item.conyuge==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>                                                            
                            </b-form-select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >D.SALUD SEXUAL Y REPRODUCTIVA DE 10 A 59 AÑOS</span>
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
                            colspan="17"
                          >Planificación Familiar(Hombres y Mujeres de 10 a 59 años)</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="8"
                          >Mujer</th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="2"
                          >Hombre</th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="13"></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Planifica</th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >No Planifica</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Vacunas</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-primary">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td class="kt-bg-fill-success">Edad Primera Mestruación</td>
                          <td class="kt-bg-fill-success">Flujo Vaginal</td>
                          <td class="kt-bg-fill-success">Flujo Uretral</td>
                          <td class="kt-bg-fill-success">Relaciones Sexuales</td>
                          <td class="kt-bg-fill-success">No. Compañeros Sexuales</td>
                          <td class="kt-bg-fill-success">Usa Condon</td>
                          <td class="kt-bg-fill-success">Abortos Antes de 6 Meses</td>
                          <td class="kt-bg-fill-success">Embarazo en Adolecentes</td>
                          <td class="kt-bg-fill-danger">Metodo</td>
                          <td class="kt-bg-fill-danger">Tiempo de Metodo</td>
                          <td class="kt-bg-fill-danger">Controles Ultimo Año</td>
                          <td class="kt-bg-fill-warning">Motivo</td>
                          <td class="kt-bg-fill-danger">Citologia Cervico Vaginal</td>
                          <td class="kt-bg-fill-danger">Colposcopia</td>
                          <td class="kt-bg-fill-danger">Examen de seno</td>
                          <td class="kt-bg-fill-danger">Violencia Intrafamiliar</td>
                          <td class="kt-bg-fill-info">TD/IT</td>
                          <td class="kt-bg-fill-info">Triple Viral</td>
                          <td class="kt-bg-fill-danger">Hijos Nacidos Vivos</td>
                          <td class="kt-bg-fill-danger">Abortos</td>
                          <td class="kt-bg-fill-dark">Examen de Prostata</td>
                          <td class="kt-bg-fill-dark">Biposia de Prostata</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De10A59" :key="index">
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
                              @input="sexo=>updateDe10A59(item,sexo,'sexo')"
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
                              style="width:150px;background-color:white;"
                              v-model="item.primera_mes"
                              @input="primera_mes=>updateDe10A59(item,primera_mes,'primera_mes')"
                              :class="item.primera_mes==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">Menor de 10 años</option>
                              <option value="2">Entre 10 y 12 años</option>
                              <option value="3">Entre 12 y 14 años</option>
                              <option value="4">Mas de 15 años</option>
                              <option value="5">Ninguna</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.flujo_vaginal"
                              @input="flujo_vaginal=>updateDe10A59(item,flujo_vaginal,'flujo_vaginal')"
                              :class="item.flujo_vaginal==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
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
                              v-model="item.flujo_uretral"
                              @input="flujo_uretral=>updateDe10A59(item,flujo_uretral,'flujo_uretral')"
                              :class="item.flujo_uretral==''?'is-invalid':'is-valid'"                              
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
                              v-model="item.relaciones_sexuales"
                              @input="relaciones_sexuales=>updateDe10A59(item,relaciones_sexuales,'relaciones_sexuales')"
                              :class="item.relaciones_sexuales==''?'is-invalid':'is-valid'"
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
                              style="width:150px;background-color:white;"
                              v-model="item.compa_sexuales"
                              @input="compa_sexuales=>updateDe10A59(item,compa_sexuales,'compa_sexuales')"
                              :class="item.compa_sexuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">1 Compañero</option>
                              <option value="2">Entre 2 y 3</option>
                              <option value="3">Entre 4 y 6</option>
                              <option value="4">Entre 7 y 9</option>
                              <option value="5">Mas de 10</option>
                              <option value="6">Ninguna</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.usa_condon"
                              @input="usa_condon=>updateDe10A59(item,usa_condon,'usa_condon')"
                              :class="item.usa_condon==''?'is-invalid':'is-valid'"
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
                              style="width:150px;background-color:white;"
                              v-model="item.abortos_seis"
                              @input="abortos_seis=>updateDe10A59(item,abortos_seis,'abortos_seis')"
                              :class="item.abortos_seis==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
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
                              style="width:150px;background-color:white;"
                              v-model="item.embarazo_adolecentes"
                              @input="embarazo_adolecentes=>updateDe10A59(item,embarazo_adolecentes,'embarazo_adolecentes')"
                              :class="item.embarazo_adolecentes==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
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
                              v-model="item.metodo"
                              @input="metodo=>updateDe10A59(item,metodo,'metodo')"
                              :class="item.metodo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option
                                v-for="item in metodos_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tiempo_metodo"
                              @input="tiempo_metodo=>updateDe10A59(item,tiempo_metodo,'tiempo_metodo')"
                              :class="item.tiempo_metodo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">Menos de 6 meses</option>
                              <option value="2">Menos de 1 año</option>
                              <option value="3">Mas de 1 año</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.controles"
                              @input="controles=>updateDe10A59(item,controles,'controles')"
                              :class="item.controles==''?'is-invalid':'is-valid'"                              
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
                              v-model="item.motivo"
                              @input="motivo=>updateDe10A59(item,motivo,'motivo')"
                              :class="item.motivo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in motivos_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>                          
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.citologia"
                              @input="citologia=>updateDe10A59(item,citologia,'citologia')"
                              :class="item.citologia==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.colposcopia"
                              @input="colposcopia=>updateDe10A59(item,colposcopia,'colposcopia')"
                              :class="item.colposcopia==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.examen_seno"
                              @input="examen_seno=>updateDe10A59(item,examen_seno,'examen_seno')"
                              :class="item.examen_seno==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.violencia"
                              @input="violencia=>updateDe10A59(item,violencia,'violencia')"
                              :class="item.violencia==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.tdit"
                              @input="tdit=>updateDe10A59(item,tdit,'tdit')"
                              :class="item.tdit==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="D5">D5</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.tripleviral"
                              @input="tripleviral=>updateDe10A59(item,tripleviral,'tripleviral')"
                              :class="item.tripleviral==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            > 
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="D1">D1</option>
                              <option value="D1">D2</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >

                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.nacidos_vivos"
                              @input="nacidos_vivos=>updateDe10A59(item,nacidos_vivos,'nacidos_vivos')"
                              :class="item.nacidos_vivos==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">1 Hijo</option>
                              <option value="2">Entre 2 y 3</option>
                              <option value="3">Entre 4 y 6</option>
                              <option value="4">Mas de 7</option>
                              <option value="5">Ninguna</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.abortos"
                              @input="abortos=>updateDe10A59(item,abortos,'abortos')"
                              :class="item.abortos==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='MASCULINO'"
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
                              style="width:150px;background-color:white;"
                              v-model="item.examen_prostata"
                              @input="examen_prostata=>updateDe10A59(item,examen_prostata,'examen_prostata')"
                              :class="item.examen_prostata==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='FEMENINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;background-color:white;"
                              v-model="item.biposia_prostata"
                              @input="biposia_prostata=>updateDe10A59(item,biposia_prostata,'biposia_prostata')"
                              :class="item.biposia_prostata==''?'is-invalid':'is-valid'"
                              :disabled="item.sexo=='FEMENINO'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
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
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span class="kt-font-boldest" style="font-size: 14px;">GESTACIÓN PARTO Y POSTPARTO</span>
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
                            colspan="28"
                          >Gestión</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="2"
                          >Parto</th>
                          <!-- <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="1"
                          >PostParto</th> -->
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Morbilidad</th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="6"></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Riesgo Materno</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Examen</th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="5"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Habitos</th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <!-- <th
                            class="kt-bg-fill-dark"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th> -->
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-info">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td>Aceptación del Embarazo</td>
                          <td class="kt-bg-fill-danger">Control Prenatal</td>
                          <td class="kt-bg-fill-danger">Atención del Parto</td>
                          <td>Carnet de Control Prenatal</td>
                          <td>Fecha Ultima Mestruación</td>
                          <td>Fecha Probable Parto</td>
                          <td class="kt-bg-fill-warning">Peso(Kgs)</td>
                          <td class="kt-bg-fill-warning">Talla(cm)</td>
                          <td class="kt-bg-fill-warning">IMC/EG</td>
                          <td class="kt-bg-fill-warning">Gestación (Sem)</td>
                          <td>No. Controles Prenatales</td>
                          <td class="kt-bg-fill-danger">Vih</td>
                          <td class="kt-bg-fill-danger">Toxoplasma</td>
                          <td class="kt-bg-fill-danger">V.D.R.L</td>
                          <td class="kt-bg-fill-dark">Odontologia</td>
                          <td class="kt-bg-fill-dark">Vacunación TD/IT</td>
                          <td class="kt-bg-fill-dark">Fecha Ultimo Parto</td>
                          <td class="kt-bg-fill-dark">Suplementación con Hierro</td>
                          <td class="kt-bg-fill-dark">Enfermedades Cronicas</td>
                          <td class="kt-bg-fill-success">Sedentarismo</td>
                          <td class="kt-bg-fill-success">Fuma</td>
                          <td class="kt-bg-fill-success">Consumo SPA</td>
                          <td class="kt-bg-fill-success">Consume Bebidas Alcoholicas</td>
                          <td class="kt-bg-fill-danger">Tipo de Parto</td>
                          <td class="kt-bg-fill-danger">Atención Institucional</td>
                          <!-- <td class="kt-bg-fill-dark">Consulta de Control 8 Dias</td> -->
                          <td>Gestación</td>
                          <td>Parto</td>
                          <td>Postparto</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in ParPost" :key="index">
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
                              v-model="item.aceptacion"
                              @input="aceptacion=>updatePosparto(item,aceptacion,'aceptacion')"
                              :class="item.aceptacion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.control_prenatal"
                              @input="control_prenatal=>updatePosparto(item,control_prenatal,'control_prenatal')"
                              :class="item.control_prenatal==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.atencion_parto"
                              @input="atencion_parto=>updatePosparto(item,atencion_parto,'atencion_parto')"
                              :class="item.atencion_parto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SICASA">SI EN CASA</option>
                              <option value="SIHOSPITAL">SI EN HOSPITAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.carnet"
                              @input="carnet=>updatePosparto(item,carnet,'carnet')"
                              :class="item.carnet==''?'is-invalid':'is-valid'"
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
                              id="date"
                              type="date"
                              v-model="item.fecha_ultima"
                              @input="changeupdatePosparto(item,$event,'fecha_ultima')"
                              class="form-control text-capitalize"
                              :class="item.fecha_ultima==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              id="date"
                              type="date"
                              v-model="item.fecha_probable"
                              @input="changeupdatePosparto(item,$event,'fecha_probable')"
                              class="form-control text-capitalize"
                              :class="item.fecha_probable==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdatePosparto(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdatePosparto(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdatePosparto(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.semanas_ges"
                              @input="changeupdatePosparto(item,$event,'semanas_ges')"
                              :class="item.semanas_ges==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.num_controles"
                              @input="num_controles=>updatePosparto(item,num_controles,'num_controles')"
                              :class="item.num_controles==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.vih"
                              @input="vih=>updatePosparto(item,vih,'vih')"
                              :class="item.vih==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIP">SI POSITIVO</option>
                              <option value="SIN">SI NEGATIVO</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.toxoplasma"
                              @input="toxoplasma=>updatePosparto(item,toxoplasma,'toxoplasma')"
                              :class="item.toxoplasma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIP">SI POSITIVO</option>
                              <option value="SIN">SI NEGATIVO</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.vdrl"
                              @input="vdrl=>updatePosparto(item,vdrl,'vdrl')"
                              :class="item.vdrl==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIP">SI POSITIVO</option>
                              <option value="SIN">SI NEGATIVO</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.odontologia"
                              @input="odontologia=>updatePosparto(item,odontologia,'odontologia')"
                              :class="item.odontologia==''?'is-invalid':'is-valid'"
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
                              v-model="item.vacunaciontdit"
                              @input="vacunaciontdit=>updatePosparto(item,vacunaciontdit,'vacunaciontdit')"
                              :class="item.vacunaciontdit==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="D5">D5</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              id="date"
                              type="date"
                              v-model="item.fecha_ultimo_parto"
                              class="form-control text-capitalize"
                              @input="changeupdatePosparto(item,$event,'fecha_ultimo_parto')"
                              :class="item.fecha_ultimo_parto==''?'is-invalid':'is-valid'"
                            />
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.suplementacion"
                              @input="suplementacion=>updatePosparto(item,suplementacion,'suplementacion')"
                              :class="item.suplementacion==''?'is-invalid':'is-valid'"
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
                              v-model="item.enfermedades_cronicas"
                              @input="enfermedades_cronicas=>updatePosparto(item,enfermedades_cronicas,'enfermedades_cronicas')"
                              :class="item.enfermedades_cronicas==''?'is-invalid':'is-valid'"
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
                              v-model="item.sedentarismo"
                              @input="sedentarismo=>updatePosparto(item,sedentarismo,'sedentarismo')"
                              :class="item.sedentarismo==''?'is-invalid':'is-valid'"
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
                              v-model="item.fuma"
                              @input="fuma=>updatePosparto(item,fuma,'fuma')"
                              :class="item.fuma==''?'is-invalid':'is-valid'"
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
                              v-model="item.consumo"
                              @input="consumo=>updatePosparto(item,consumo,'consumo')"
                              :class="item.consumo==''?'is-invalid':'is-valid'"
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
                              v-model="item.bebidas"
                              @input="bebidas=>updatePosparto(item,bebidas,'bebidas')"
                              :class="item.bebidas==''?'is-invalid':'is-valid'"
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
                              v-model="item.tipo_parto"
                              @input="tipo_parto=>updatePosparto(item,tipo_parto,'tipo_parto')"
                              :class="item.tipo_parto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="VAGINAL">VAGINAL</option>
                              <option value="CESAREA">CESAREA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.atencion_institucional"
                              @input="atencion_institucional=>updatePosparto(item,atencion_institucional,'atencion_institucional')"
                              :class="item.atencion_institucional==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cc18"
                              @input="cc18=>updatePosparto(item,cc18,'cc18')"
                              :class="item.cc18==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.morgestacion"
                              @input="morgestacion=>updatePosparto(item,morgestacion,'morgestacion')"
                              :class="item.morgestacion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in morbilidad_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.morparto"
                              @input="morparto=>updatePosparto(item,morparto,'morparto')"
                              :class="item.morparto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in morbilidad_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.morposparto"
                              @input="morposparto=>updatePosparto(item,morposparto,'morposparto')"
                              :class="item.morposparto==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in morbilidad_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
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
            <!-- Cart. X ciclo -->

            <!-- Adolescente -->
            <div class="tab-pane" id="adolescente" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('adultomayor','adolescente')"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 14px;">ADOLESCENTES DE 12 A 17 AÑOS</span>
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
                            colspan="11"
                          >Crecimiento y Desarrollo</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="1"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Salud Oral</th>
                          <th
                            class="kt-bg-fill-warning"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="11"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-success">No.</td>
                          <td class="kt-bg-fill-success">Documento</td>
                          <td class="kt-bg-fill-success">Nombre</td>
                          <td class="kt-bg-fill-success">Sexo</td>
                          <td class="kt-bg-fill-success">Edad</td>
                          <td class="kt-bg-fill-success">Peso(Kgs)</td>
                          <td class="kt-bg-fill-success">Talla(m)</td>
                          <td class="kt-bg-fill-success">IMC</td>
                          <!-- <td class="kt-bg-fill-success">PB</td> -->
                          <td class="kt-bg-fill-success">Visuales</td>
                          <td class="kt-bg-fill-success">Auditivos</td>
                          <td class="kt-bg-fill-success">De Conducta</td>
                          <td class="kt-bg-fill-danger">Enfermedad Cronica</td>
                          <td class="kt-bg-fill-dark">Dientes Sanos</td>
                          <td class="kt-bg-fill-dark">Consulta Odontologica (ultimos 6 meses)</td>
                          <td class="kt-bg-fill-dark">No. Cepillado Dia</td>
                          <td class="kt-bg-fill-warning">Señales de Maltrato</td>
                          <td class="kt-bg-fill-warning">Alcohol</td>
                          <td class="kt-bg-fill-warning">Fuma</td>
                          <td class="kt-bg-fill-warning">SPA</td>
                          <td class="kt-bg-fill-warning">Desparacitado</td>
                          <td class="kt-bg-fill-warning">Empleo</td>
                          <td class="kt-bg-fill-warning">Religión</td>
                          <td class="kt-bg-fill-warning">Sabe que es VIH</td>
                          <td class="kt-bg-fill-warning">Sabe que es Cancer de Utero</td>
                          <td class="kt-bg-fill-warning">Sabe que es el Papiloma</td>
                          <td class="kt-bg-fill-warning">Sabe que es el Cancer de Seno</td>
                          <td class="kt-bg-fill-danger">Padre</td>
                          <td class="kt-bg-fill-danger">Madre</td>
                          <td class="kt-bg-fill-danger">Hermanos</td>
                          <td class="kt-bg-fill-danger">Conyuge</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De12A17" :key="index">
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
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe12A17(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe12A17(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe12A17(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pb"
                              @input="changeupdateDe12A17(item,$event,'pb')"
                              :class="item.pb==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateDe12A17(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateDe12A17(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateDe12A17(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedades_cronicas"
                              @input="enfermedades_cronicas=>updateDe12A17(item,enfermedades_cronicas,'enfermedades_cronicas')"
                              :class="item.enfermedades_cronicas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dientes_sanos"
                              @input="dientes_sanos=>updateDe12A17(item,dientes_sanos,'dientes_sanos')"
                              :class="item.dientes_sanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consultaodon"
                              @input="consultaodon=>updateDe12A17(item,consultaodon,'consultaodon')"
                              :class="item.consultaodon==''?'is-invalid':'is-valid'"
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
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.nocepillado"
                              @input="changeupdateDe12A17(item,$event,'nocepillado')"
                              :class="item.nocepillado==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateDe12A17(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
                              @input="alcohol=>updateDe12A17(item,alcohol,'alcohol')"
                              :class="item.alcohol==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.fuma"
                              @input="fuma=>updateDe12A17(item,fuma,'fuma')"
                              :class="item.fuma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.spa"
                              @input="spa=>updateDe12A17(item,spa,'spa')"
                              :class="item.spa==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.desparacitado"
                              @input="desparacitado=>updateDe12A17(item,desparacitado,'desparacitado')"
                              :class="item.desparacitado==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.empleo"
                              @input="empleo=>updateDe12A17(item,empleo,'empleo')"
                              :class="item.empleo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.religion"
                              @input="religion=>updateDe12A17(item,religion,'religion')"
                              :class="item.religion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in religion_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>                           
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queesvih"
                              @input="queesvih=>updateDe12A17(item,queesvih,'queesvih')"
                              :class="item.queesvih==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queescancerutero"
                              @input="queescancerutero=>updateDe12A17(item,queescancerutero,'queescancerutero')"
                              :class="item.queescancerutero==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queespapiloma"
                              @input="queespapiloma=>updateDe12A17(item,queespapiloma,'queespapiloma')"
                              :class="item.queespapiloma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queescancerseno"
                              @input="queescancerseno=>updateDe12A17(item,queescancerseno,'queescancerseno')"
                              :class="item.queescancerseno==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.padre"
                              @input="padre=>updateDe12A17(item,padre,'padre')"
                              :class="item.padre==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.madre"
                              @input="madre=>updateDe12A17(item,madre,'madre')"
                              :class="item.madre==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.hermanos"
                              @input="hermanos=>updateDe12A17(item,hermanos,'hermanos')"
                              :class="item.hermanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conyuge"
                              @input="conyuge=>updateDe12A17(item,conyuge,'conyuge')"
                              :class="item.conyuge==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="1">BUENA</option>
                              <option value="2">MUY BUENA</option>
                              <option value="3">REGULAR</option>
                              <option value="4">MALA</option>
                            </b-form-select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >JUVENTUD, JOVENES DE 18 A 28 AÑOS</span>
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
                            colspan="13"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Salud Oral</th>
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="1"
                          ></th>
                          <th
                            class="kt-bg-fill-warning"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Consumo Sustancias Psicoactivas</th>
                          <th
                            class="kt-bg-fill-success"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="6"
                          ></th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="5"></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Habitos</th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="6"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-success">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td class="kt-bg-fill-danger">Peso(Kgs)</td>
                          <td class="kt-bg-fill-danger">Talla(m)</td>
                          <td class="kt-bg-fill-danger">IMC</td>
                          <td class="kt-bg-fill-danger">P. Cintura</td>
                          <!-- <td class="kt-bg-fill-danger">PB</td> -->
                          <td class="kt-bg-fill-info">Visuales</td>
                          <td class="kt-bg-fill-info">Auditivos</td>
                          <td class="kt-bg-fill-info">De Conducta</td>
                          <td class="kt-bg-fill-success">Enfermedad Cronica</td>
                          <td class="kt-bg-fill-danger">Dientes Sanos</td>
                          <td class="kt-bg-fill-danger">Consulta Odontologica (ultimos 6 meses)</td>
                          <td class="kt-bg-fill-danger">No. Cepillado Dia</td>
                          <td class="kt-bg-fill-info">Señales de Maltrato</td>
                          <td class="kt-bg-fill-warning">Alcohol</td>
                          <td class="kt-bg-fill-warning">Fuma</td>
                          <td class="kt-bg-fill-warning">SPA</td>
                          <td>Desparacitado</td>
                          <td>Empleo</td>
                          <td>Religión</td>
                          <td>Sabe que es VIH</td>
                          <td>Sabe que es Cancer de Utero</td>
                          <td>Sabe que es el Papiloma</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De18A28" :key="index">
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
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe18A28(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe18A28(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe18A28(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pcintura"
                              @input="changeupdateDe18A28(item,$event,'pcintura')"
                              :class="item.pcintura==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pb"
                              @input="changeupdateDe18A28(item,$event,'pb')"
                              :class="item.pb==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateDe18A28(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateDe18A28(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateDe18A28(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedades_cronicas"
                              @input="enfermedades_cronicas=>updateDe18A28(item,enfermedades_cronicas,'enfermedades_cronicas')"
                              :class="item.enfermedades_cronicas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dientes_sanos"
                              @input="dientes_sanos=>updateDe18A28(item,dientes_sanos,'dientes_sanos')"
                              :class="item.dientes_sanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consultaodon"
                              @input="consultaodon=>updateDe18A28(item,consultaodon,'consultaodon')"
                              :class="item.consultaodon==''?'is-invalid':'is-valid'"
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
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.nocepillado"
                              @input="changeupdateDe18A28(item,$event,'nocepillado')"
                              :class="item.nocepillado==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateDe18A28(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
                              @input="alcohol=>updateDe18A28(item,alcohol,'alcohol')"
                              :class="item.alcohol==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.fuma"
                              @input="fuma=>updateDe18A28(item,fuma,'fuma')"
                              :class="item.fuma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.spa"
                              @input="spa=>updateDe18A28(item,spa,'spa')"
                              :class="item.spa==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.desparacitado"
                              @input="desparacitado=>updateDe18A28(item,desparacitado,'desparacitado')"
                              :class="item.desparacitado==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.empleo"
                              @input="empleo=>updateDe18A28(item,empleo,'empleo')"
                              :class="item.empleo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.religion"
                              @input="religion=>updateDe18A28(item,religion,'religion')"
                              :class="item.religion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in religion_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>                            
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queesvih"
                              @input="queesvih=>updateDe18A28(item,queesvih,'queesvih')"
                              :class="item.queesvih==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queescancerutero"
                              @input="queescancerutero=>updateDe18A28(item,queescancerutero,'queescancerutero')"
                              :class="item.queescancerutero==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queespapiloma"
                              @input="queespapiloma=>updateDe18A28(item,queespapiloma,'queespapiloma')"
                              :class="item.queespapiloma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
              <div class="kt-separator kt-separator--border-dashed"></div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >HOMBRES Y MUJERES DE 29 AÑOS A 59 AÑOS</span>
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
                            colspan="13"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Salud Oral</th>
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="1"
                          ></th>
                          <th
                            class="kt-bg-fill-warning"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Consumo Sustancias Psicoactivas</th>
                          <th
                            class="kt-bg-fill-success"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="2"
                          ></th>
                          <!-- <th
                            class="kt-bg-fill-dark"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="3"
                          >Detección Temprana</th> -->
                          <th
                            class="kt-bg-fill-success"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="6"
                          ></th>
                        </tr>
                        <tr>
                          <th class="kt-bg-fill-success" colspan="5"></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Problemas</th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-info"
                            colspan="1"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-warning"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          >Habitos</th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="2"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-dark"
                            colspan="3"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                          <th
                            class="kt-bg-fill-success"
                            colspan="4"
                            style="padding: 0;font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-success">
                          <td>No.</td>
                          <td>Documento</td>
                          <td>Nombre</td>
                          <td>Sexo</td>
                          <td>Edad</td>
                          <td class="kt-bg-fill-danger">Peso(Kgs)</td>
                          <td class="kt-bg-fill-danger">Talla(m)</td>
                          <td class="kt-bg-fill-danger">IMC</td>
                          <td class="kt-bg-fill-danger">P. Cintura</td>
                          <!-- <td class="kt-bg-fill-danger">PB</td> -->
                          <td class="kt-bg-fill-info">Visuales</td>
                          <td class="kt-bg-fill-info">Auditivos</td>
                          <td class="kt-bg-fill-info">De Conducta</td>
                          <td class="kt-bg-fill-success">Enfermedad Cronica</td>
                          <td class="kt-bg-fill-danger">Dientes Sanos</td>
                          <td class="kt-bg-fill-danger">Consulta Odontologica (ultimos 6 meses)</td>
                          <td class="kt-bg-fill-danger">No. Cepillado Dia</td>
                          <td class="kt-bg-fill-info">Señales de Maltrato</td>
                          <td class="kt-bg-fill-warning">Alcohol</td>
                          <td class="kt-bg-fill-warning">Fuma</td>
                          <td class="kt-bg-fill-warning">SPA</td>
                          <td>Desparacitado</td>
                          <td>Empleo</td>
                          <!-- <td class="kt-bg-fill-dark">Examen de Prostata</td>
                          <td class="kt-bg-fill-dark">Citologias</td>
                          <td class="kt-bg-fill-dark">Examen de MAMA</td> -->
                          <td>Religión</td>
                          <td>Sabe que es VIH</td>
                          <td>Sabe que es Cancer de Utero</td>
                          <td>Sabe que es el Papiloma</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De29A59" :key="index">
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
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe29A59(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe29A59(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe29A59(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pcintura"
                              @input="changeupdateDe29A59(item,$event,'pcintura')"
                              :class="item.pcintura==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pb"
                              @input="changeupdateDe29A59(item,$event,'pb')"
                              :class="item.pb==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.visuales"
                              @input="visuales=>updateDe29A59(item,visuales,'visuales')"
                              :class="item.visuales==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.auditivos"
                              @input="auditivos=>updateDe29A59(item,auditivos,'auditivos')"
                              :class="item.auditivos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.conducta"
                              @input="conducta=>updateDe29A59(item,conducta,'conducta')"
                              :class="item.conducta==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedades_cronicas"
                              @input="enfermedades_cronicas=>updateDe29A59(item,enfermedades_cronicas,'enfermedades_cronicas')"
                              :class="item.enfermedades_cronicas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.dientes_sanos"
                              @input="dientes_sanos=>updateDe29A59(item,dientes_sanos,'dientes_sanos')"
                              :class="item.dientes_sanos==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.consultaodon"
                              @input="consultaodon=>updateDe29A59(item,consultaodon,'consultaodon')"
                              :class="item.consultaodon==''?'is-invalid':'is-valid'"
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
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.nocepillado"
                              @input="changeupdateDe29A59(item,$event,'nocepillado')"
                              :class="item.nocepillado==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.maltrato"
                              @input="maltrato=>updateDe29A59(item,maltrato,'maltrato')"
                              :class="item.maltrato==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
                              @input="alcohol=>updateDe29A59(item,alcohol,'alcohol')"
                              :class="item.alcohol==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.fuma"
                              @input="fuma=>updateDe29A59(item,fuma,'fuma')"
                              :class="item.fuma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.spa"
                              @input="spa=>updateDe29A59(item,spa,'spa')"
                              :class="item.spa==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.desparacitado"
                              @input="desparacitado=>updateDe29A59(item,desparacitado,'desparacitado')"
                              :class="item.desparacitado==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.empleo"
                              @input="empleo=>updateDe29A59(item,empleo,'empleo')"
                              :class="item.empleo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.examen_prostata"
                              @input="examen_prostata=>updateDe29A59(item,examen_prostata,'examen_prostata')"
                              :class="item.examen_prostata==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.citologia"
                              @input="citologia=>updateDe29A59(item,citologia,'citologia')"
                              :class="item.citologia==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.examen_mama"
                              @input="examen_mama=>updateDe29A59(item,examen_mama,'examen_mama')"
                              :class="item.examen_mama==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.religion"
                              @input="religion=>updateDe29A59(item,religion,'religion')"
                              :class="item.religion==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in religion_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>                            
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queesvih"
                              @input="queesvih=>updateDe29A59(item,queesvih,'queesvih')"
                              :class="item.queesvih==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queescancerutero"
                              @input="queescancerutero=>updateDe29A59(item,queescancerutero,'queescancerutero')"
                              :class="item.queescancerutero==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.queespapiloma"
                              @input="queespapiloma=>updateDe29A59(item,queespapiloma,'queespapiloma')"
                              :class="item.queespapiloma==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
            <!-- Adolescente -->

            <!-- Adulto Mayor -->
            <div class="tab-pane" id="adultomayor" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('migrante','adultomayor')"
                  >
                    <i class="la la-arrow-right"></i>
                    <span class="kt-hidden-mobile">Siguiente</span>
                  </button>
                </div>
              </div>
              <p>
                <span
                  class="kt-font-boldest"
                  style="font-size: 14px;"
                >E. ADULTO MAYOR (HOMBRES Y MUJERES DE 60 AÑOS Y MAS)</span>
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
                            colspan="6"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Valoración Nutricional</th>
                          <th
                            class="kt-bg-fill-warning"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="15"
                          ></th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-success">No.</td>
                          <td class="kt-bg-fill-success">Documento</td>
                          <td class="kt-bg-fill-success">Nombre</td>
                          <td class="kt-bg-fill-success">Sexo</td>
                          <td class="kt-bg-fill-success">Edad</td>
                          <td class="kt-bg-fill-success">Grupo de Ayudas</td>
                          <td class="kt-bg-fill-danger">Peso(Kgs)</td>
                          <td class="kt-bg-fill-danger">Talla(m)</td>
                          <td class="kt-bg-fill-danger">IMC</td>
                          <td class="kt-bg-fill-danger">P.Cintura</td>
                          <!-- <td class="kt-bg-fill-danger">Glicemia</td> -->
                          <td class="kt-bg-fill-warning">Cigarrillo ó Tabaco</td>
                          <td class="kt-bg-fill-warning">Consumo de Alcohol</td>
                          <td class="kt-bg-fill-warning">Actividad Fisica Recreativa</td>
                          <td class="kt-bg-fill-warning">Sintomático Respiratorio</td>
                          <td class="kt-bg-fill-warning">Examen de Seno</td>
                          <td class="kt-bg-fill-warning">Citologia Cervico Vaginal</td>
                          <td class="kt-bg-fill-warning">Colposcopia</td>
                          <td class="kt-bg-fill-warning">Examen de Prostata</td>
                          <td class="kt-bg-fill-warning">Biposia de Prostata</td>
                          <td class="kt-bg-fill-warning">Examen de Agudeza Visual</td>
                          <td class="kt-bg-fill-warning">Subsidio de Entidad del Estado</td>
                          <td class="kt-bg-fill-warning">Enfermedades Cronicas</td>
                          <td class="kt-bg-fill-warning">Enfermedades Infecciosas</td>
                          <td class="kt-bg-fill-warning">Empleo</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in De60" :key="index">
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
                              v-model="item.grupo_ayudas"
                              @input="grupo_ayudas=>updateDe60(item,grupo_ayudas,'grupo_ayudas')"
                              :class="item.grupo_ayudas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option
                                v-for="item in grupos_options"
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
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.peso"
                              @input="changeupdateDe60(item,$event,'peso')"
                              :class="item.peso==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.talla"
                              @input="changeupdateDe60(item,$event,'talla')"
                              :class="item.talla==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.imc"
                              @input="changeupdateDe60(item,$event,'imc')"
                              readonly
                              :class="item.imc==''?'is-invalid':'is-valid'"
                            />
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.pa"
                              @input="changeupdateDe60(item,$event,'pa')"
                              :class="item.pa==''?'is-invalid':'is-valid'"
                            />
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.glicemia"
                              @input="changeupdateDe60(item,$event,'glicemia')"
                              :class="item.glicemia==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cigarrillo"
                              @input="cigarrillo=>updateDe60(item,cigarrillo,'cigarrillo')"
                              :class="item.cigarrillo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
                              @input="alcohol=>updateDe60(item,alcohol,'alcohol')"
                              :class="item.alcohol==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
                              @input="actividad_fisica=>updateDe60(item,actividad_fisica,'actividad_fisica')"
                              :class="item.actividad_fisica==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.sintomatico"
                              @input="sintomatico=>updateDe60(item,sintomatico,'sintomatico')"
                              :class="item.sintomatico==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.examen_seno"
                              @input="examen_seno=>updateDe60(item,examen_seno,'examen_seno')"
                              :class="item.examen_seno==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.citologia"
                              @input="citologia=>updateDe60(item,citologia,'citologia')"
                              :class="item.citologia==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.colposcopia"
                              @input="colposcopia=>updateDe60(item,colposcopia,'colposcopia')"
                              :class="item.colposcopia==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.examen_prostata"
                              @input="examen_prostata=>updateDe60(item,examen_prostata,'examen_prostata')"
                              :class="item.examen_prostata==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.biposia_prostata"
                              @input="biposia_prostata=>updateDe60(item,biposia_prostata,'biposia_prostata')"
                              :class="item.biposia_prostata==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.agudeza_visual"
                              @input="agudeza_visual=>updateDe60(item,agudeza_visual,'agudeza_visual')"
                              :class="item.agudeza_visual==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="NA">No Aplica</option>
                              <option value="SIN">SI NORMAL</option>
                              <option value="SIA">SI ANORMAL</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.subsidio"
                              @input="subsidio=>updateDe60(item,subsidio,'subsidio')"
                              :class="item.subsidio==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedades_cronicas"
                              @input="enfermedades_cronicas=>updateDe60(item,enfermedades_cronicas,'enfermedades_cronicas')"
                              :class="item.enfermedades_cronicas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedades_infecciosas"
                              @input="enfermedades_infecciosas=>updateDe60(item,enfermedades_infecciosas,'enfermedades_infecciosas')"
                              :class="item.enfermedades_infecciosas==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>

                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.empleo"
                              @input="empleo=>updateDe60(item,empleo,'empleo')"
                              :class="item.empleo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
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
              <p>
                <span class="kt-font-boldest" style="font-size: 14px;">V. MORBILIDAD GENERAL</span>
              </p>
              <p>
                <span class="kt-font-boldest" style="font-size: 10px;">ENFERMEDAD CRONICA</span>
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
                            colspan="4"
                          ></th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Enfermedad Cronica</th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-success">No.</td>
                          <td class="kt-bg-fill-success">Documento</td>
                          <td class="kt-bg-fill-success">Nombre</td>
                          <td class="kt-bg-fill-success">Sexo</td>
                          <td class="kt-bg-fill-danger">Nombre de la Enfermedad</td>
                          <td class="kt-bg-fill-danger">Diagnosticado Hace cuanto tiempo</td>
                          <td class="kt-bg-fill-danger">Está en Tratamiento</td>
                          <!-- <td class="kt-bg-fill-danger">Complicaciones</td> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in EnCro" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:100px;background-color:white;"
                              :value="(index+1)"
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
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedad"
                              @input="enfermedad=>updateEnCro(item,enfermedad,'enfermedad')"
                              :class="item.enfermedad==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in enfcro_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tiempo"
                              @input="tiempo=>updateEnCro(item,tiempo,'tiempo')"
                              :class="item.tiempo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="1">Reciente</option>
                              <option value="2">3 Meses</option>
                              <option value="3">Entre 3 y 6 meses</option>
                              <option value="4">Mas de 1 año</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tratamiento"
                              @input="tratamiento=>updateEnCro(item,tratamiento,'tratamiento')"
                              :class="item.tratamiento==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.complicaciones"
                              @input="changeupdateEnCro(item,$event,'complicaciones')"
                              :class="item.complicaciones==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 10px;">ENFERMEDADES INFECCIOSAS</span>
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
                            colspan="4"
                          ></th>
                          <th
                            class="kt-bg-fill-brand"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="4"
                          >Enfermedad Infecciosas</th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-success">No.</td>
                          <td class="kt-bg-fill-success">Documento</td>
                          <td class="kt-bg-fill-success">Nombre</td>
                          <td class="kt-bg-fill-success">Sexo</td>
                          <td class="kt-bg-fill-brand">Nombre de la Enfermedad</td>
                          <td class="kt-bg-fill-brand">Diagnosticado Hace cuanto tiempo</td>
                          <td class="kt-bg-fill-brand">Está en Tratamiento</td>
                          <!-- <td class="kt-bg-fill-brand">Complicaciones</td> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in EnInf" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:100px;background-color:white;"
                              :value="(index+1)"
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
                            <b-form-select
                              style="width:150px;"
                              v-model="item.enfermedad"
                              @input="enfermedad=>updateEnInf(item,enfermedad,'enfermedad')"
                              :class="item.enfermedad==''?'is-invalid':'is-valid'"
                            > 
                              <option value selected>Seleccione</option>
                              <option
                                v-for="item in enfinf_options"
                                :value="item.value"
                                :key="item.value"
                              >{{item.texto}}</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tiempo"
                              @input="tiempo=>updateEnInf(item,tiempo,'tiempo')"
                              :class="item.tiempo==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="1">Menos de 6 Meses</option>
                              <option value="2">Menos de 1 Años</option>
                              <option value="3">Menos de 5 Años</option>
                              <option value="4">Mas de 5 Años</option>
                            </b-form-select>                            
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.tratamiento"
                              @input="tratamiento=>updateEnInf(item,tratamiento,'tratamiento')"
                              :class="item.tratamiento==''?'is-invalid':'is-valid'"
                            >
                              <option value selected>Seleccione</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <!-- <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              v-model="item.complicaciones"
                              @input="changeupdateEnInf(item,$event,'complicaciones')"
                              :class="item.complicaciones==''?'is-invalid':'is-valid'"
                            />
                          </td> -->
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="kt-separator kt-separator--border-dashed"></div>
                </div>
              </div>
            </div>
            <!-- Adulto Mayor -->

            <!-- Migrante -->
            <div class="tab-pane" id="migrante" role="tabpanel">
              <div class="row">
                <div class="col-12 kt-align-right">
                  <button
                    type="button"
                    class="btn btn-brand"
                    @click="cambiarTab1('guardar','migrante')"
                  >
                    <i class="la la-check"></i>
                    <span class="kt-hidden-mobile">Guardar</span>
                  </button>
                </div>
              </div>
              <p>
                <span class="kt-font-boldest" style="font-size: 14px;">MIGRANTE</span>
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
                            colspan="14"
                          >Migrante</th>
                        </tr>
                        <tr>
                          <th
                            class="kt-bg-fill-info"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="6"
                          >Identificación</th>
                          <th
                            class="kt-bg-fill-danger"
                            style="font-weight: normal;vertical-align: middle;text-align: center;text-transform:capitalize;"
                            colspan="7"
                          >Condicciones</th>
                        </tr>
                        <tr class="kt-bg-fill-warning">
                          <td class="kt-bg-fill-info">No.</td>
                          <td class="kt-bg-fill-info">Documento</td>
                          <td class="kt-bg-fill-info">Nombre</td>
                          <td class="kt-bg-fill-info">Sexo</td>
                          <td class="kt-bg-fill-info">Edad</td>
                          <td class="kt-bg-fill-info">Pais de Origen</td>
                          <td class="kt-bg-fill-danger">Registrado Como Migrante</td>
                          <td class="kt-bg-fill-danger">Hace Cuanto Llego Al Pais</td>
                          <td class="kt-bg-fill-danger">¿En el Futuro Usted Piensa?</td>
                          <td class="kt-bg-fill-danger">¿Usted a Recibido Ayudas del Gobierno?</td>
                          <td class="kt-bg-fill-danger">Principal Necesidad en Estos Momnetos</td>
                          <td class="kt-bg-fill-danger">Personas Que Dependen de Usted</td>
                          <td class="kt-bg-fill-danger">Ingreso Mensual Actualmente</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item,index) in Migra" :key="index">
                          <td style="font-weight: normal;vertical-align: middle;">
                            <input
                              type="text"
                              class="form-control text-capitalize is-valid"
                              style="width:100px;background-color:white;"
                              :value="(index+1)"
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
                              class="form-control text-capitalize"
                              style="width:300px;background-color:white; is-valid"
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
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              :class="item.pais==''?'is-invalid':'is-valid'"
                              v-model="item.pais"
                              @input="changeupdateMigra(item,$event,'pais')"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.registrado"
                              @input="registrado=>updateMigra(item,registrado,'registrado')"
                              class="form-control text-capitalize"
                              :class="item.registrado==''?'is-invalid':'is-valid'"
                            >
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.cuantollego"
                              @input="cuantollego=>updateMigra(item,cuantollego,'cuantollego')"
                              class="form-control text-capitalize"
                              :class="item.cuantollego==''?'is-invalid':'is-valid'"
                            >
                              <option value="1">Menos de 3 meses</option>
                              <option value="2">6 meses a 12 meses</option>
                              <option value="3">12 meses a 24 meses</option>
                              <option value="4">Más de 24 meses</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.futuro"
                              @input="futuro=>updateMigra(item,futuro,'futuro')"
                              class="form-control text-capitalize"
                              :class="item.futuro==''?'is-invalid':'is-valid'"                              
                            >
                              <option value="1">Volver al Pais de Origen</option>
                              <option value="2">Radicarse en este pais</option>
                              <option value="3">Irse a otro Pais</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.recibido"
                              @input="recibido=>updateMigra(item,recibido,'recibido')"
                              class="form-control text-capitalize"
                              :class="item.recibido==''?'is-invalid':'is-valid'"                                                            
                            >
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.necesidad"
                              @input="necesidad=>updateMigra(item,necesidad,'necesidad')"
                              class="form-control text-capitalize"
                              :class="item.necesidad==''?'is-invalid':'is-valid'"                              
                            >
                              <option value="1">Hospedaje</option>
                              <option value="2">Alimentación</option>
                              <option value="3">Transporte</option>
                              <option value="4">Salud</option>
                              <option value="5">Trabajo</option>
                              <option value="6">Ropa</option>
                            </b-form-select>
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <input
                              type="text"
                              style="width:150px;"
                              class="form-control text-capitalize"
                              :class="item.dependen==''?'is-invalid':'is-valid'"                              
                              v-model="item.dependen"
                              @input="changeupdateMigra(item,$event,'dependen',index)"
                            />
                          </td>
                          <td
                            style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                          >
                            <b-form-select
                              style="width:150px;"
                              v-model="item.ingreso"
                              @input="ingreso=>updateMigra(item,ingreso,'ingreso')"
                              class="form-control text-capitalize"
                              :class="item.ingreso==''?'is-invalid':'is-valid'"                              
                            >
                              <option value="1">menos de 500.000</option>
                              <option value="2">500.000 a 800.0000</option>
                              <option value="3">mas de 800.000</option>
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
            <!-- Migrante -->
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
              <div class="col-md-6 col-lg-6">

              </div>
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
            <div class="form-group row" >
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                    <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
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
            <div class="form-group row" >
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                    <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
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
      this.nuevo();
      this.hoy = moment();      
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
          identidad_genero: ""
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
          orientacion: "",
          identidad_genero: "",
          telefono: ""          
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
        ocupacionesVector:[],
        txtbusqueda: "",
        ocupacionAuxiliar: "",
        ocupacionAuxiliar2: "",
        opcionOcupaciones: "",
        txtbusquedaAct: "",
        actividadesVector:[],
        actividadesAuxiliar: "",
        SAPU: false
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
      } 
    },
    methods: {
      abrirModalOcupaciones(opcion){
        this.opcionOcupaciones=opcion;
        this.txtbusqueda="";
        this.consultarOcupaciones(1);
        this.$refs.modalOcupaciones.show();        
      },
      cerrarModal(){
        this.$refs.modalOcupaciones.hide();
        this.$refs.modalActividad.hide();            
      },       
      async consultarOcupaciones(pagina){
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
      seleccionarOcupaciones(item){
        if(this.opcionOcupaciones==="jefe"){
          this.caracData.ocupacion=item.id;
          this.ocupacionAuxiliar=item.descripcion;
        }else{
          this.CA1.ocupacion=item.id;
          this.ocupacionAuxiliar2=item.descripcion;          
        }
        this.$refs.modalOcupaciones.hide();
      },

      abrirModalActividades(){
        this.txtbusquedaAct="";
        this.consultarActividades(1);
        this.$refs.modalActividad.show();        
      }, 
      async consultarActividades(pagina){
        const parametros = {
          txtbusqueda: this.txtbusquedaAct.trim(),
          _token: this.csrf,
          page: pagina
        };
        try {
          await actividadesServicios
            .listar(parametros)
            .then(respuesta => {
              this.actividadesVector = respuesta.data.actividades.data;          
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
      seleccionarActividades(item){
        this.viviendaData.actividad_economica=item.id;
        this.actividadesAuxiliar=item.descripcion;
        this.$refs.modalActividad.hide();
      },      
      
      async Actualizar(){
        let id=0;
        let opcion="";
        if(this.hogar.id_corre!=""){
          opcion="CORRE";
          id=this.hogar.id_corre;
        }else{
          opcion="MUN";
          id=this.hogar.id_mun;          
        }
        const parametros = {
          _token: this.csrf,
          id: id,
          opcion: opcion
        };
        try {
          await caracterizacionServicios.actualizar(parametros).then(respuesta => {
            this.corregi_options = respuesta.data.arrayCorregi;
            this.vereda_options = respuesta.data.arrayVeredas;
            this.parentesco_options = respuesta.data.arrayParentesco;
            this.estado_options = respuesta.data.arrayEstado;
            this.escolaridad_options = respuesta.data.arrayEscolaridad;
            this.ocupacion_options = respuesta.data.arrayOcupacion;
            this.etnia_options = respuesta.data.arrayEtnia;
            this.admini_options = respuesta.data.arrayAdmini;
            this.clasifi_options = respuesta.data.arrayCLasifi;
            this.morbilidadNacer_options = respuesta.data.arrayMorbilidadNacer;
            this.morbilidad_options = respuesta.data.arrayMorbilidad;
            this.metodos_options = respuesta.data.arrayMetodos;
            this.motivos_options = respuesta.data.arrayMotivos;
            this.grupos_options = respuesta.data.arrayGrupos;
            this.enfcro_options = respuesta.data.arrayEnfCro;
            this.enfinf_options = respuesta.data.arrayEnfInf;
            this.religion_options = respuesta.data.arrayReligion; 
            this.colegio_options = respuesta.data.arrayColegios;
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
      },
      cambiarTab2(opcion) {
        if(this.GIDEN===false){
          // $('.nav-tabs a[href="#' + opcion + '"]').tab('show');
          $('.nav-tabs a[href="#tabIdentificacion"]').tab('show');
          return false;
        }else{

        }                
      },      
      async cambiarTab1(opcion, actual) {
        let bandera = false;
        if (actual === "tabIdentificacion") {
          if (this.GIDEN === false) {
            //VALIDAR DATOS DEL HOGAR
            if (this.hogar.id_dpto === "") {
              this.$refs.id_dpto.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione el departamento!",
                "error"
              );
              return;
            }
            if (this.hogar.id_mun === "") {
              this.$refs.id_mun.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione el municipio!",
                "error"
              );
              return;
            }
            if (this.hogar.tenencia_vivienda === "") {
              this.$refs.tenencia_vivienda.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione la tenencia de vivienda!",
                "error"
              );
              return;
            }
            if (this.allLetter(this.hogar.numero_hogares) === false) {
              this.$refs.numero_hogares.focus();
              this.hogar.numero_hogares = "";
              this.$swal(
                "Error...!",
                "Por favor digite solo numero en el numero de hogares!",
                "error"
              );
              return;
            }
            if (this.hogar.numero_hogares === "") {
              this.$refs.numero_hogares.focus();
              this.$swal(
                "Error...!",
                "Por favor digite el numero de hogares!",
                "error"
              );
              return;
            }
            if (this.hogar.poblacion_especial === "") {
              this.$refs.poblacion_especial.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione la población especial!",
                "error"
              );
              return;
            }
            if (this.hogar.vias_acceso === "") {
              this.$refs.vias_acceso.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione si la comunidad presenta vías de acceso!",
                "error"
              );
              return;
            }
            if (this.hogar.servicios_publicos === "") {
              this.$refs.servicios_publicos.focus();
              this.$swal(
                "Error...!",
                "Por favor seleccione si presenta acceso fácil a los servicios públicos!",
                "error"
              );
              return;
            }
            if (this.hogar.direccion === "") {
              this.$refs.direccion.focus();
              this.$swal("Error...!", "Por favor digite la dirección!", "error");
              return;
            }
            //VALIDAR DATOS DEL HOGAR

            //VALIDAR LA TABLA JEFES DE HOGAR
            if (this.datosJefe.length <= 0) {
              this.$swal(
                "Error...!",
                "Por favor agregue por lo menos un jefe de hogar",
                "error"
              );
              return;
            } else {
              let resul = this.valJef1();
              if (resul) {
                bandera = true;
              } else {
                return false;
              }
              this.vectorAyuda = [];
              await this.valJef2();
              if (this.vectorAyuda.length > 0) {
                for (let i = 0; i < this.vectorAyuda.length; i++) {
                  if (this.vectorAyuda[i].error === "ERROR1") {
                    let val = (this.vectorAyuda[i].identificacion / 1)
                      .toFixed(0)
                      .replace(".", ",");
                    let iden = val
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    this.$swal(
                      "Validar...!",
                      "El Documento <b>" +
                        iden +
                        "</b> De La Fila <b>" +
                        (i + 1) +
                        "</b> Se Encuentra Registrado",
                      "warning"
                    );
                    bandera = false;
                  }
                }
              } else {
                bandera = true;
              }
            }
            //VALIDAR LA TABLA JEFES DE HOGAR

            //VALIDAR LA TABLA INTEGRANTES
            if (this.datos.length > 0) {
              let resul = this.valInt1();
              if (resul) {
                bandera = true;
              } else {
                return false;
              }
              this.vectorAyuda = [];
              await this.valInt2();
              if (this.vectorAyuda.length > 0) {
                for (let i = 0; i < this.vectorAyuda.length; i++) {
                  if (this.vectorAyuda[i].error === "ERROR1") {
                    let val1 = (this.vectorAyuda[i].identificacion / 1)
                      .toFixed(0)
                      .replace(".", ",");
                    let iden1 = val1
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    this.$swal(
                      "Validar...!",
                      "El Documento <b>" +
                        iden1 +
                        "</b> De La Fila <b>" +
                        (i + 1) +
                        "</b> Se Encuentra Registrado En Los Integrantes",
                      "warning"
                    );
                    bandera = false;
                  }
                }
              } else {
                bandera = true;
              }
            }
            //VALIDAR LA TABLA INTEGRANTES

            
            //VALIDAR LA TABLA FACTORES
            if (this.factores.length > 0) {
              let resul = this.valFactores();
              if (resul) {
                bandera = true;     
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA FACTORES
            
            //GUARDAR DATOS
            const parametros = {
              _token: this.csrf,
              hogar: this.hogar,
              caracterizacion: this.datosJefe,
              integrantes: this.datos,
              factores: this.factores,
              opcion: "GUARDAR",
              opc: "GUAINDEN"
            };
            try {
              await caracterizacionServicios
                .guardar(parametros)
                .then(respuesta => {
                  if (respuesta.data.OPC == "SI") {
                    this.GIDEN = true;
                    this.IDHOGAR = respuesta.data.IDHOGAR;
                  }
                })
                .catch(error => {
                  this.errorDevuelto = error.response.data.errors;
                  this.entrarPorError = true;
                  this.$swal(
                    "Error...!",
                    "No se pudo guardar los datos de la pestaña investigación",
                    "error"
                  );
                  return;
                });
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
            //GUARDAR DATOS
          }else{
            bandera = true;
          }
        }
        if (actual === "tabVivienda") {
          bandera = true;
          if (this.GIDEN===false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Hogar",
              "error"
            );            
            return false;
          }          
          this.$v.$touch();
          const isInvalid = this.$v.$invalid;          
          if (isInvalid) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Vivienda",
              "error"
            );
            return false;
          } else {
            if (this.GVIVI === false && this.GIDEN===true && this.IDHOGAR!==0) {
                if (this.estratificacion.length <= 0) {
                  this.$swal(
                    "Error...!",
                    "Por favor agregue por lo menos una estratificación",
                    "error"
                  );
                  return;
                }
                //GUARDAR DATOS
                const parametros = {
                  _token: this.csrf,
                  vivienda: this.viviendaData,
                  estratificacion: this.estratificacion,
                  Animales: this.animalesData,
                  opcion: "GUARDAR",
                  opc: "GUAVIVI",
                  IDHOGAR: this.IDHOGAR
                };
                try {
                  await caracterizacionServicios
                    .guardar(parametros)
                    .then(respuesta => {
                      if (respuesta.data.OPC == "SI") {
                        this.GVIVI = true;
                        bandera = true;                  
                      }
                    })
                    .catch(error => {
                      this.errorDevuelto = error.response.data.errors;
                      this.entrarPorError = true;
                      this.$swal(
                        "Error...!",
                        "No se pudo guardar los datos de la pestaña vivienda",
                        "error"
                      );
                      return;                    
                    });
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
                //GUARDAR DATOS
            }else{
              bandera = true;
            }
          }          
        }
        if (actual === "cartxciclo") {
          bandera = true;
          if (this.GIDEN===false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Hogar",
              "error"
            );            
            return false;
          }
          if (this.GVIVI === false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Vivienda",
              "error"
            );            
            return false;
          }          
          if (this.GCARXCI === false && this.GIDEN===true && this.GVIVI === true) {
            let auxi=false;
            //VALIDAR LA TABLA MENORES DE 1 AÑO
            if (this.Men1A.length > 0) {
              let resul = this.valMen1();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA MENORES DE 1 AÑO

            //VALIDAR LA TABLA DE 1 A 5 AÑOS
            if (this.De1A5.length > 0) {
              let resul = this.valDe1A5();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA DE 1 A 5 AÑOS

            //VALIDAR LA TABLA DE 6 A 11 AÑOS
            if (this.De6A11.length > 0) {
              let resul = this.valDe6A11();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA DE 6 A 11 AÑOS

            //VALIDAR LA TABLA DE 10 A 59 AÑOS
            if (this.De10A59.length > 0) {
              let resul = this.valDe10A59();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA DE 10 A 59 AÑOS          

            //VALIDAR LA TABLA POSTPAR
            if (this.ParPost.length > 0) {
              let resul = this.valParPost();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }
            //VALIDAR LA TABLA POSTPAR                        
            if(auxi){
              //GUARDAR DATOS
              const parametros = {
                _token: this.csrf,
                Men1A: this.Men1A,
                De1A5: this.De1A5,
                De6A11: this.De6A11,
                De10A59: this.De10A59,
                ParPost: this.ParPost,
                opcion: "GUARDAR",
                opc: "GUACARCI",
                IDHOGAR: this.IDHOGAR
              };
              try {
                await caracterizacionServicios
                  .guardar(parametros)
                  .then(respuesta => {
                    if (respuesta.data.OPC == "SI") {
                      this.GCARXCI = true;
                      bandera = true;
                    }
                  })
                  .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                    this.$swal(
                      "Error...!",
                      "No se pudo guardar los datos de la pestaña ciclos",
                      "error"
                    );
                    return;                  
                  });
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
              //GUARDAR DATOS
            }else{
              bandera = true;
            }
          }else{
            bandera = true;
          }
        }
        if (actual === "adolescente") {
          bandera = true;
          let auxi=false;
          if (this.GIDEN===false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Hogar",
              "error"
            );            
            return false;
          }
          if (this.GVIVI === false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Vivienda",
              "error"
            );            
            return false;
          }      
          if(this.Men1A.length > 0 || this.De1A5.length > 0 || this.De6A11.length > 0 || this.De10A59.length > 0 || this.ParPost.length > 0){
            if(this.GCARXCI === false){
              this.$swal(
                "Error...!",
                "Por Favor Guarde Los Datos de la Pestaña Cart. X ciclo",
                "error"
              );            
              return false;
            }
          }          
          if (this.GADOLE === false && this.GIDEN===true && this.GVIVI === true ) {
            //VALIDAR LA TABLA DE 12 A 17 AÑOS
            if (this.De12A17.length > 0) {
              let resul = this.valDe12A17();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }            
            //VALIDAR LA TABLA DE 12 A 17 AÑOS

            //VALIDAR LA TABLA DE 18 A 28 AÑOS
            if (this.De18A28.length > 0) {
              let resul = this.valDe18A28();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }            
            //VALIDAR LA TABLA DE 18 A 28 AÑOS

            //VALIDAR LA TABLA DE 29 A 59 AÑOS
            if (this.De29A59.length > 0) {
              let resul = this.valDe29A59();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }            
            //VALIDAR LA TABLA DE 29 A 59 AÑOS
            if(auxi){
              //GUARDAR DATOS
              const parametros = {
                _token: this.csrf,
                De12A17: this.De12A17,
                De18A28: this.De18A28,
                De29A59: this.De29A59,
                opcion: "GUARDAR",
                opc: "GUADOLE",
                IDHOGAR: this.IDHOGAR
              };
              try {
                await caracterizacionServicios
                  .guardar(parametros)
                  .then(respuesta => {
                    if (respuesta.data.OPC == "SI") {
                      this.GADOLE = true;
                      bandera = true;
                    }
                  })
                  .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                    this.$swal(
                      "Error...!",
                      "No se pudo guardar los datos de la pestaña adolescentes",
                      "error"
                    );
                    return;                  
                  });
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
              //GUARDAR DATOS
            }else{
              bandera = true;
            }
          }else{
            bandera = true;
          }
        }
        if (actual === "adultomayor") {
          let auxi=false;
          if (this.GIDEN===false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Hogar",
              "error"
            );            
            return false;
          }
          if (this.GVIVI === false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Vivienda",
              "error"
            );            
            return false;
          }
          
          if(this.Men1A.length > 0 || this.De1A5.length > 0 || this.De6A11.length > 0 || this.De10A59.length > 0 || this.ParPost.length > 0){
            if(this.GCARXCI === false){              
              this.$swal(
                "Error...!",
                "Por Favor Guarde Los Datos de la Pestaña Cart. X ciclo",
                "error"
              );            
              return false;
            }
          }                   
          if(this.De12A17.length > 0 || this.De18A28.length > 0 || this.De29A59.length > 0 ){
            if(this.GADOLE === false){
              this.$swal(
                "Error...!",
                "Por Favor Complete Los Campos Obligatorios de la Pestaña Adolecentes/Jovenes",
                "error"
              );            
              return false;
            }                        
          }        
                    
          //VALIDAR LA TABLA ENFERMEDADES INFECCIOSAS          
          if (this.GADULT === false ) {
            //VALIDAR LA TABLA MAYORES DE 60 AÑOS
            if (this.De60.length > 0) {
              let resul = this.valDe60();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }                        
            //VALIDAR LA TABLA MAYORES DE 60 AÑOS
                        
            //VALIDAR LA TABLA ENFERMEDADES CRONICAS
            if (this.EnCro.length > 0) {
              let resul = this.valEnCro();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }                        
            //VALIDAR LA TABLA ENFERMEDADES CRONICAS
            
            //VALIDAR LA TABLA ENFERMEDADES INFECCIOSAS
            if (this.EnInf.length > 0) {
              let resul = this.valEnInf();
              if (resul) {
                bandera = true;
                auxi=true;
              } else {
                return false;
              }
            }          
            if(auxi){
              //GUARDAR DATOS
              const parametros = {
                _token: this.csrf,
                De60: this.De60,
                EnCro: this.EnCro,
                EnInf: this.EnInf,
                opcion: "GUARDAR",
                opc: "GUADULT",
                IDHOGAR: this.IDHOGAR
              };
              try {
                await caracterizacionServicios
                  .guardar(parametros)
                  .then(respuesta => {
                    if (respuesta.data.OPC == "SI") {
                      console.log("SI GUARDE");
                      this.GADULT = true;
                      bandera = true;
                    }
                  })
                  .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                    this.$swal(
                      "Error...!",
                      "No se pudo guardar los datos de la pestaña adultos",
                      "error"
                    );
                    return;                  
                  });
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
              //GUARDAR DATOS            
            }else{
              bandera = true;
            }
          }else{
            bandera = true;
          }
        }
        if (actual === "migrante") {
          let auxi=false;
          if (this.GIDEN===false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Hogar",
              "error"
            );            
            return false;
          }
          if (this.GVIVI === false) {
            this.$swal(
              "Error...!",
              "Por Favor Complete Los Campos Obligatorios de la Pestaña Vivienda",
              "error"
            );            
            return false;
          }          
          if(this.Men1A.length > 0 || this.De1A5.length > 0 || this.De6A11.length > 0 || this.De10A59.length > 0 || this.ParPost.length > 0){
            if(this.GCARXCI === false){
              this.$swal(
                "Error...!",
                "Por Favor Guarde Los Datos de la Pestaña Cart. X ciclo",
                "error"
              );            
              return false;
            }
          }
          if(this.De12A17.length > 0 || this.De18A28.length > 0 || this.De29A59.length > 0 ){
            if(this.GADOLE === false){
              this.$swal(
                "Error...!",
                "Por Favor Complete Los Campos Obligatorios de la Pestaña Adolecentes/Jovenes",
                "error"
              );            
              return false;
            }                        
          }
          if(this.De60.length > 0 || this.EnCro.length > 0 || this.EnInf.length > 0 ){
            if(this.GADULT === false){
              this.$swal(
                "Error...!",
                "Por Favor Complete Los Campos Obligatorios de la Pestaña Adulto mayor",
                "error"
              );            
              return false;
            }                        
          }                    
          if (this.GMIGRA === false) {
            //VALIDAR LA TABLA MIGRANTES
            if (this.Migra.length > 0) {
              let resul = this.valMigra();
              if (resul) {
                bandera = true;  
                auxi=true;              
              } else {
                return false;
              }
            }            
            //VALIDAR LA TABLA MIGRANTES
            if(auxi){
              const parametros = {
                _token: this.csrf,
                Migra: this.Migra,
                opcion: "GUARDAR",
                opc: "GUAMIGRA",
                IDHOGAR: this.IDHOGAR
              };
              try {
                await caracterizacionServicios
                  .guardar(parametros)
                  .then(respuesta => {
                    if (respuesta.data.OPC == "SI") {
                      this.$swal(
                        "Guardar...!",
                        "Datos Guardados Exitosamente!",
                        "success"
                      );
                      this.$router.push("/gestion");
                    }
                  })
                  .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                    this.$swal(
                      "Error...!",
                      "No se pudo guardar los datos de la pestaña migrantes",
                      "error"
                    );
                    return;                  
                  });
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
            }else{
              bandera = true;
              this.$swal(
                "Guardar...!",
                "Datos Guardados Exitosamente!",
                "success"
              );
              this.$router.push("/gestion");              
            }
          }else{
            this.$swal(
              "Guardar...!",
              "Datos Guardados Exitosamente!",
              "success"
            );
            this.SAPU=false;
            this.$router.push("/gestion");          
          }
        }
        if (bandera) {
          bandera = false;
          $('.nav-tabs a[href="#' + opcion + '"]').tab("show");
        }
      },
      //VALIDACIONES
      valJef1() {
        for (let i = 0; i < this.datosJefe.length; i++) {
          if (this.datosJefe[i].tipo_id === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione un <b>tipo de identificación</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].identificacion === "") {
            this.$swal(
              "Error...!",
              "Por favor digite una <b>identificación</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].pnom === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>primer nombre</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].pape === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>primer apellido</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].sexo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>sexo</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].orientacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Orientación Sexual</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].identidad_genero === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Identidad de Genero</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }          
          if (this.datosJefe[i].parentesco === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>parentesco</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].estado_civil === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>estado civil</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].fecha_nacimiento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>fecha de nacimiento</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].afiliacion_entidad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>eps</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].tipo_afiliacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>tipo de afiliación</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].nivel_escolaridad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>nivel de escolaridad</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].ocupacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>ocupación</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].etnia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>etnia</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].clasificacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>clasificacion de la etnia</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }
          if (this.datosJefe[i].salario === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>salario</b> en la fila " +
                (i + 1) +
                " de los jefes de hogar",
              "error"
            );
            return false;
          }              
          // VERIFICAR SI ESTA EN LA TABLA
          let resultado = this.buscarIguales(
            this.datosJefe,
            this.datosJefe[i].identificacion
          );
          // VERIFICAR SI ESTA EN LA TABLA
          if (resultado > 1) {
            this.$swal(
              "Validar...!",
              "El Documento <b>" +
                this.datosJefe[i].identificacion +
                "</b> De La Fila <b>" +
                (i + 1) +
                "</b>  Se Encuentra Agregado En La Tabla de Jefes de Hogar",
              "warning"
            );
            return false;
          }
        }
        return true;
      },
      buscarIguales(vector, busqueda) {
        let contador = 0;
        for (let i = 0; i < vector.length; i++) {
          if (vector[i].identificacion === busqueda) {
            contador++;
          }
        }
        return contador;
      },
      valJef2: async function() {
        for (let i = 0; i < this.datosJefe.length; i++) {
          const parametros = {
            _token: this.csrf,
            identificacion: this.datosJefe[i].identificacion
          };
          try {
            await caracterizacionServicios
              .validarJefe(parametros)
              .then(respuesta => {
                if (respuesta.data.OPC == "EXISTE") {
                  this.vectorAyuda.push({
                    identificacion: respuesta.data.identificacion,
                    fila: i + 1,
                    error: "ERROR1"
                  });
                  return false;
                } else {
                }
              })
              .catch(error => {});
          } catch (error) {}
        }
      },
      valInt1() {
        for (let i = 0; i < this.datos.length; i++) {
          if (this.datos[i].tipo_id === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione un <b>tipo de identificación</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].identificacion === "") {
            this.$swal(
              "Error...!",
              "Por favor digite una <b>identificación</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].pnom === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>primer nombre</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].pape === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>primer apellido</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].sexo === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>sexo</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].orientacion === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Orientación Sexual</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].identidad_genero === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Identidad de Genero</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }          
          if (this.datos[i].parentesco === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>parentesco</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].estado_civil === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>estado civil</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].fecha_nac === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>fecha de nacimiento</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].afi_entidad === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>eps</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].tipo_afiliacion === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>tipo de afiliación</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].escolaridad === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>nivel de escolaridad</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].ocupacion === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>ocupación</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].etnia === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>etnia</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].clasificacion === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>clasificacion de la etnia</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }
          if (this.datos[i].jefe === "0") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>jefe de hogar</b> en la fila " +
                (i + 1) +
                " de los integrantes",
              "error"
            );
            return false;
          }                    
          // VERIFICAR SI ESTA EN LA TABLA
          let resultado = this.buscarIguales(
            this.datos,
            this.datos[i].identificacion
          );
          // VERIFICAR SI ESTA EN LA TABLA
          if (resultado > 1) {
            this.$swal(
              "Validar...!",
              "El Documento <b>" +
                this.datos[i].identificacion +
                "</b> De La Fila <b>" +
                (i + 1) +
                "</b>  Se Encuentra Agregado En La Tabla de Integrantes",
              "warning"
            );
            // item.identificacion="";
            return false;
          }
        }
        return true;
      },
      valInt2: async function() {
        for (let i = 0; i < this.datos.length; i++) {
          const parametros = {
            _token: this.csrf,
            identificacion: this.datos[i].identificacion
          };
          try {
            await caracterizacionServicios
              .validar(parametros)
              .then(respuesta => {
                if (respuesta.data.OPC == "EXISTE") {
                  this.vectorAyuda.push({
                    identificacion: respuesta.data.identificacion,
                    fila: i + 1,
                    error: "ERROR1"
                  });
                  return false;
                } else {
                }
              })
              .catch(error => {});
          } catch (error) {}
        }
      },
      valFactores() {
        for (let i = 0; i < this.factores.length; i++) {
          if (this.factores[i].dialogos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Dialogos</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].sancion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Sanción ó Supresión</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].castigo_verbal === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Castigo Verbal</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].castigo_fisico === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Castigo Fisico</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].alcohol === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Alcohol</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].tabaco === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Tabaco</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].sustancias_psico === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Sustancias Psicoactivas</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].apuestas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Apuestas</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].violencia_fisica === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Violencia Fisica</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].violencia_psico === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Violencia Psicologica</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].violencia_economica === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Violencia Economica</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].abuso_sexual === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Abuso Sexual</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].actividad_fisica === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Actividad Fisica</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].consumo_frutas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Consumo de Frutas y Verduras</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].religiosos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Religiosos</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].sociales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Sociales</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].culturales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Culturales</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }
          if (this.factores[i].recreativos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Recreativos</b> en la fila " +
                (i + 1) +
                " de la tabla factores de riesgo y protectores de la familia",
              "error"
            );
            return false;
          }                                                                                                                                                                                                                                                                                                                                                      
        }
        return true;
      },
      //VALIDACIONES DE LOS CICLOS
      valMen1() {
        for (let i = 0; i < this.Men1A.length; i++) {
          if (this.Men1A[i].lugar_nacimiento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>lugar de nacimiento</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].hemoclasificacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>hemoclasificacion</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].compli_parto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>complicaciones en el parto</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].via_parto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>via del parto</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].cyc === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>control de CyC</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].valoracion_23 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>valoración integral de 2 a 3 meses</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].valoracion_68 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>valoración integral de 6 a 8 meses</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].valoracion_911 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>valoración integral de 9 a 11 meses</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].lactancia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>lactancia exclusiva</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].peso_nacer === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>peso al nacer</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].peso_actual === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>peso actual</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].longitud_nacer === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>longitud al nacer</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].longitud_actual === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>longitud actual</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].longitud_actual === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>longitud actual</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].cinta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>cinta</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].edemas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>edemas</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].lenguaje === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la valoración del desarrollo el <b>lenguaje</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].motora === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la valoración del desarrollo la opcion <b>motora</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la valoración del desarrollo la <b>conducta</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione si tiene problemas <b>visuales</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione si tiene problemas <b>auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].carnet === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la vacunación si tiene <b>CARNET(PAI)</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].bcg === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la vacunación si tiene la vacuna <b>BCG</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].hepb === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la vacunación si tiene la vacuna <b>HEP-B</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].polio === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la vacunación si tiene la vacuna <b>POLIO</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].pentavalente === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la vacunación si tiene la vacuna <b>PENTAVALENTE</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione si sufre de <b>maltrato</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].morbilidad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>morbilidad</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }
          if (this.Men1A[i].tsh === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>TSH</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) menores de 1 año",
              "error"
            );
            return false;
          }                                                                                                                                                                                    
        }
        return true;
      },
      valDe1A5(){
        for (let i = 0; i < this.De1A5.length; i++) {
          if (this.De1A5[i].beneficiario === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Beneficiario de un Programa</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].cyc === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Control de CyC</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].valoracion_1823 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Integral <b>18-23 meses</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].valoracion_3035 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Integral <b>30-35 meses</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].valoracion_4 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Integral <b>4 años</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>peso</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional la <b>talla</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>IMC</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].pb === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>P.B</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].pt === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>P/T</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].te === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>T/E</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].pcefalico === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en la Valoración Nutricional el <b>Perimetro Cefálico</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }                    
          if (this.De1A5[i].lenguaje === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Del Desarrollo el <b>Lenguaje</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].motora === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Del Desarrollo <b>Motora</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de la Valoración Del Desarrollo La <b>Conducta</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Problemas Los <b>Visuales</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Problemas Los <b>Auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].caries === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Salud Oral Las <b>Caries</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].nocepillado === "") {
            this.$swal(
              "Error...!",
              "Por favor digite en Salud Oral El <b>No. Cepillado Dia</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].consultaodon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Salud Oral La <b>Consulta Odontologica</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].carnet === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación el <b>Carnet (PAI)</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].bcg === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación el <b>BCG</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].polio === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación el <b>POLIO</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].dpt === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación el <b>DPT</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].fiebrea === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación la <b>Fiebre Amarilla</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].tripleviral === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación la <b>Triple Viral</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].pentavalente === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de Vacunación la <b>Pentavalente</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }          
          
          if (this.De1A5[i].desparacitado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Desparacitado</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione las <b> Señales de Maltrato</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].enfermedad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b> Enfermedad</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }
          if (this.De1A5[i].medicamento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b> Medicamento</b> en la fila " +
                (i + 1) +
                " de la tabla primera infancia, niños(as) de 1 a 5 años",
              "error"
            );
            return false;
          }                                                           
        }
        return true;
      },
      valDe6A11(){
        for (let i = 0; i < this.De6A11.length; i++) {
          if (this.De6A11[i].cyc === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Control de CyC</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].atencion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Atencion Por</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Peso</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>Talla</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>IMC/E</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].pb === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>P.B</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          // if (this.De6A11[i].pt === "") {
          //   this.$swal(
          //     "Error...!",
          //     "Por favor digite el <b>P/T</b> en la fila " +
          //       (i + 1) +
          //       " de la tabla infancia, niños(as) de 6 a 11 años",
          //     "error"
          //   );
          //   return false;
          // }
          if (this.De6A11[i].te === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>T/E</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de problemas la <b>Conducta</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de problemas <b>Visuales</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de problemas <b>Auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].dientes_sanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de salud oral <b>Dientes Sanos</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].consultaodon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de salud oral la <b>Consulta Odontologica</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].nofluor === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de salud oral el <b>No. Aplicacion Fluor</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].nocepillado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione de salud oral el <b>No. Cepillado Dia</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Señales Maltrato ó Abuso</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].sustanciaspsico === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Sustancias Psicoactivas</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].desparacitado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Desparacitado</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].enfermedad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Enfermedad</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].medicamento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Medicamento</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].padre === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione Relación Familiar <b>Padre</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].madre === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione Relación Familiar <b>Madre</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }
          if (this.De6A11[i].hermanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione Relación Familiar <b>Hermanos</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }                                                                                                                                                                                                                     
          if (this.De6A11[i].conyuge === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione Relación Familiar <b>Conyuge</b> en la fila " +
                (i + 1) +
                " de la tabla infancia, niños(as) de 6 a 11 años",
              "error"
            );
            return false;
          }          
        }
        return true;
      },
      valDe10A59(){
        for (let i = 0; i < this.De10A59.length; i++) {
          if (this.De10A59[i].primera_mes === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Edad Primera Mestruación</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].flujo_vaginal === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Flujo Vaginal</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].flujo_uretral === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Flujo Uretral</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].relaciones_sexuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Relaciones Sexuales</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].compa_sexuales === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>No. Compañeros Sexuales</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].usa_condon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Usa Condon</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].abortos_seis === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Abortos Antes de 6 Meses</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].embarazo_adolecentes === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Embarazo en Adolecentes</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].metodo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Metodo</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].tiempo_metodo === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Tiempo de Metodo</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].controles === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Controles Ultimo Año</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].motivo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione en No Planifica el <b>Motivo</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].citologia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Citologia Cervico Vaginal</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].colposcopia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Colposcopia</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].examen_seno === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Examen de seno</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].violencia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Violencia Intrafamiliar</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].tdit === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione en Vacunación la <b>TD/IT</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].tripleviral === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione en Vacunación la <b>Triple Viral</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].nacidos_vivos === "") {
            this.$swal(
              "Error...!",
              "Por favor digite los <b>Hijos Nacidos Vivos</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].abortos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Abortos</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].examen_prostata === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Examen de Prostata</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De10A59[i].biposia_prostata === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione <b>Biposia de Prostata</b> en la fila " +
                (i + 1) +
                " de la tabla salud sexual y reproductiva de 10 a 59 años",
              "error"
            );
            return false;
          }                                                                                                                                                                                                            
        }
        return true;
      },
      valParPost(){
        for (let i = 0; i < this.ParPost.length; i++) {
          if (this.ParPost[i].aceptacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Aceptación del Embarazo</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].control_prenatal === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Control Prenatal</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].atencion_parto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Atención del Parto</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].carnet === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Carnet de Control Prenatal</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].fecha_ultima === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Fecha Ultima Mestruación</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].fecha_probable === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la <b>Fecha Probable Parto</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Peso</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>Talla</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>IMC</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].semanas_ges === "") {
            this.$swal(
              "Error...!",
              "Por favor digite las <b>Semanas de Gestación</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].num_controles === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>No. Controles Prenatales</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].vih === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Vih</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].toxoplasma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>Toxoplasma</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].vdrl === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione el <b>V.D.R.L</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].odontologia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Odontologia</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].vacunaciontdit === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Vacunación TD/IT</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          // if (this.ParPost[i].fecha_ultimo_parto === "") {
          //   this.$swal(
          //     "Error...!",
          //     "Por favor seleccione la opción <b>Fecha Ultimo Parto</b> en la fila " +
          //       (i + 1) +
          //       " de la gestión de parto y postparto",
          //     "error"
          //   );
          //   return false;
          // }
          if (this.ParPost[i].suplementacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Suplementación con Hierro</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].enfermedades_cronicas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Enfermedades Cronicas</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].sedentarismo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Sedentarismo</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].fuma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Fuma</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }                                                                                                                                                                                                  
          if (this.ParPost[i].consumo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Consumo SPA</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].bebidas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Consume Bebidas Alcoholicas</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].tipo_parto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Tipo de Parto</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].atencion_institucional === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Atención Institucional</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].cc18 === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Consulta de Control 8 Dias</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].morgestacion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Gestación</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].morparto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Parto</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }
          if (this.ParPost[i].morposparto === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opción <b>Postparto</b> en la fila " +
                (i + 1) +
                " de la gestión de parto y postparto",
              "error"
            );
            return false;
          }                                                                              
        }
        return true;
      },
      valDe12A17(){
        for (let i = 0; i < this.De12A17.length; i++) {
          if (this.De12A17[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Peso</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>Talla</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>IMC</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].pb === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>PB</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Visuales</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>De Conducta</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].enfermedades_cronicas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Enfermedad Cronica</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].dientes_sanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Dientes Sanos</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].consultaodon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Consulta Odontologica</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].nocepillado === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>No. Cepillado Dia</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Señales de Maltrato</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].alcohol === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Alcohol</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].fuma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Fuma</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].spa === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>SPA</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].desparacitado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Desparacitado</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].empleo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Empleo</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].religion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Religión</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].queesvih === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es VIH</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].queescancerutero === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es Cancer de Utero</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].queespapiloma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es el Papiloma</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].queescancerseno === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es el Cancer de Seno</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].padre === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Padre</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].madre === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Madre</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].hermanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Hermanos</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }
          if (this.De12A17[i].conyuge === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Conyuge</b> en la fila " +
                (i + 1) +
                " de la tabla adolescentes de 12 a 17 años",
              "error"
            );
            return false;
          }                                                                                                                                                                                                                                                 
        }
        return true;
      },
      valDe18A28(){
        for (let i = 0; i < this.De18A28.length; i++) { 
          if (this.De18A28[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Peso</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>Talla</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>IMC</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].pcintura === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>P. Cintura</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }          
          if (this.De18A28[i].pb === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>PB</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Visuales</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>De Conducta</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].enfermedades_cronicas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Enfermedad Cronica</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].dientes_sanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Dientes Sanos</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].consultaodon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Consulta Odontologica</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].nocepillado === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>No. Cepillado Dia</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Señales de Maltrato</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].alcohol === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Alcohol</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].fuma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Fuma</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].spa === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>SPA</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].desparacitado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Desparacitado</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].empleo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Empleo</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].religion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Religión</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].queesvih === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es VIH</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].queescancerutero === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es Cancer de Utero</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }
          if (this.De18A28[i].queespapiloma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es el Papiloma</b> en la fila " +
                (i + 1) +
                " de la tabla juventud, jovenes de 18 a 28 años",
              "error"
            );
            return false;
          }          
        }
        return true;
      },
      valDe29A59(){
        for (let i = 0; i < this.De29A59.length; i++) { 
          if (this.De29A59[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>Peso</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la <b>Talla</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite el <b>IMC</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].pcintura === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>P. Cintura</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }          
          if (this.De29A59[i].pb === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>PB</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].visuales === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Visuales</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].auditivos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Auditivos</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].conducta === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>De Conducta</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].enfermedades_cronicas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Enfermedad Cronica</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].dientes_sanos === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Dientes Sanos</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].consultaodon === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Consulta Odontologica</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].nocepillado === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>No. Cepillado Dia</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].maltrato === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Señales de Maltrato</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].alcohol === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Alcohol</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].fuma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Fuma</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].spa === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>SPA</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].desparacitado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Desparacitado</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].empleo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Empleo</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].examen_prostata === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Examen de Prostata</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].citologia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Citologias</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].examen_mama === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Examen de MAMA</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }                              
          if (this.De29A59[i].religion === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Religión</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].queesvih === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es VIH</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].queescancerutero === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es Cancer de Utero</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }
          if (this.De29A59[i].queespapiloma === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sabe que es el Papiloma</b> en la fila " +
                (i + 1) +
                " de la tabla hombres y mujeres de 29 a 59 años",
              "error"
            );
            return false;
          }          
        }
        return true;
      },
      valDe60(){
        for (let i = 0; i < this.De60.length; i++) { 
          if (this.De60[i].grupo_ayudas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Grupo de Ayudas</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].peso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Peso</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].talla === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Talla</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].imc === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>IMC</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].pa === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>PA</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          // if (this.De60[i].glicemia === "") {
          //   this.$swal(
          //     "Error...!",
          //     "Por favor seleccione la opcion <b>Glicemia</b> en la fila " +
          //       (i + 1) +
          //       " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
          //     "error"
          //   );
          //   return false;
          // }
          if (this.De60[i].cigarrillo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Cigarrillo ó Tabaco</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].alcohol === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Consumo de Alcohol</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].actividad_fisica === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Actividad Fisica Recreativa</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].sintomatico === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Sintomático Respiratorio</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].examen_seno === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Examen de Seno</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].citologia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Citologia Cervico Vaginal</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].colposcopia === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Colposcopia</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].examen_prostata === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Examen de Prostata</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].biposia_prostata === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Biposia de Prostata</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].agudeza_visual === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Examen de Agudeza Visual</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].subsidio === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Subsidio de Entidad del Estado</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].enfermedades_cronicas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Enfermedades Cronicas</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].enfermedades_infecciosas === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Enfermedades Infecciosas</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }
          if (this.De60[i].empleo === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Empleo</b> en la fila " +
                (i + 1) +
                " de la tabla adulto mayor hombres y mujeres de 60 años y mas",
              "error"
            );
            return false;
          }                                                                                                                                                                                      
        }
        return true;
      },
      valEnCro(){
        for (let i = 0; i < this.EnCro.length; i++) { 
          if (this.EnCro[i].enfermedad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Nombre de la Enfermedad</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades cronicas",
              "error"
            );
            return false;
          }
          if (this.EnCro[i].tiempo === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Diagnosticado Hace cuanto tiempo</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades cronicas",
              "error"
            );
            return false;
          }
          if (this.EnCro[i].tratamiento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Está en Tratamiento</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades cronicas",
              "error"
            );
            return false;
          }
          if (this.EnCro[i].complicaciones === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Complicaciones</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades cronicas",
              "error"
            );
            return false;
          }                                                                                                                                                                                     
        } 
        return true;      
      },
      valEnInf(){
        for (let i = 0; i < this.EnInf.length; i++) { 
          if (this.EnInf[i].enfermedad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Nombre de la Enfermedad</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades infecciosas",
              "error"
            );
            return false;
          }
          if (this.EnInf[i].tiempo === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Diagnosticado Hace cuanto tiempo</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades infecciosas",
              "error"
            );
            return false;
          }
          if (this.EnInf[i].tratamiento === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Está en Tratamiento</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades infecciosas",
              "error"
            );
            return false;
          }
          if (this.EnInf[i].complicaciones === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opcion <b>Complicaciones</b> en la fila " +
                (i + 1) +
                " de la tabla enfermedades infecciosas",
              "error"
            );
            return false;
          }                                                                                                                                                                                     
        } 
        return true;         
      },
      valMigra(){
        for (let i = 0; i < this.Migra.length; i++) { 
          if (this.Migra[i].pais === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opción <b>Pais de Origen</b> en la fila " +
                (i + 1) +
                " de la tabla migrante",
              "error"
            );
            return false;
          }
          if (this.Migra[i].registrado === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Registrado Como Migrante</b> en la fila " +
                (i + 1) +
                " de la tabla migrantes",
              "error"
            );
            return false;
          }
          if (this.Migra[i].cuantollego === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Hace Cuanto Llego Al Pais</b> en la fila " +
                (i + 1) +
                " de la tabla migrantes",
              "error"
            );
            return false;
          }
          if (this.Migra[i].futuro === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>En el Futuro Usted Piensa</b> en la fila " +
                (i + 1) +
                " de la tabla migrantes",
              "error"
            );
            return false;
          }
          if (this.Migra[i].recibido === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Usted a Recibido Ayudas del Gobierno</b> en la fila " +
                (i + 1) +
                " de la tabla migrantes",
              "error"
            );
            return false;
          }
          if (this.Migra[i].necesidad === "") {
            this.$swal(
              "Error...!",
              "Por favor seleccione la opcion <b>Principal Necesidad en Estos Momnetos</b> en la fila " +
                (i + 1) +
                " de la tabla migrantes",
              "error"
            );
            return false;
          }
          if (this.Migra[i].dependen === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opción <b>Personas Que Dependen de Usted</b> en la fila " +
                (i + 1) +
                " de la tabla migrante",
              "error"
            );
            return false;
          }
          if (this.Migra[i].ingreso === "") {
            this.$swal(
              "Error...!",
              "Por favor digite la opción <b>Ingreso Mensual Actualmente</b> en la fila " +
                (i + 1) +
                " de la tabla migrante",
              "error"
            );
            return false;
          }                                      
          
        } 
        return true;
      },
      //VALIDACIONES DE LOS CICLOS
      //VALIDACIONES
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
      isNumeric: function(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      },
      nuevo: async function() {
        const parametros = {
          _token: this.csrf
        };
        try {
          await caracterizacionServicios
            .nuevaCaracterizacion(parametros)
            .then(respuesta => {
              this.dpto_options = respuesta.data.arrayDpto;
              this.muni_options = respuesta.data.arrayMuni;
              this.corregi_options = respuesta.data.arrayCorregi;
              this.vereda_options = respuesta.data.arrayVeredas;
              // this.barrio_options = respuesta.data.arrayBarrios;
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
      agregar: async function() {
        if (this.CA1.tipo_id == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione un tipo de identificación!",
            "error"
          );
          return;
        }
        if (this.CA1.identificacion == "") {
          this.$swal(
            "Error...!",
            "Por favor digite el documento de identificación!",
            "error"
          );
          return;
        }
        if (this.CA1.sexo == "0") {
          this.$swal("Error...!", "Por favor seleccione el sexo!", "error");
          return;
        }
        if (this.CA1.orientacion === "0") {
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la orientación sexual!", "error");
          return;
        }
        if (this.CA1.identidad_genero === "0") {
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la identidad de genero!", "error");
          return;
        }        
        if (this.CA1.parentesco == "0") {
          this.$swal("Error...!", "Por favor seleccione el parentesco!", "error");
          return;
        }
        if (this.CA1.pnom == "0") {
          this.$swal("Error...!", "Por favor digite el primer nombre!", "error");
          return;
        }
        if (this.CA1.pape == "0") {
          this.$swal(
            "Error...!",
            "Por favor digite el primer apellido!",
            "error"
          );
          return;
        }
        if (this.CA1.estado_civil == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione el estado civil!",
            "error"
          );
          return;
        }
        if (this.CA1.fecha_nac == "") {
          this.$swal(
            "Error...!",
            "Por favor seleccione la fecha de nacimiento!",
            "error"
          );
          return;
        }
        if (this.CA1.escolaridad == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione el nivel de escolaridad!",
            "error"
          );
          return;
        }
        if (this.CA1.ocupacion == "0") {
          this.$swal("Error...!", "Por favor seleccione la ocupación!", "error");
          return;
        }
        if (this.CA1.etnia == "0") {
          this.$swal("Error...!", "Por favor seleccione la etnia!", "error");
          return;
        }
        if (this.CA1.clasificacion == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione la clasificacion de la etnia!",
            "error"
          );
          return;
        }
        if (this.CA1.entiende == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción entiende español!",
            "error"
          );
          return;
        }
        if (this.CA1.pyp == "0") {
          this.$swal("Error...!", "Por favor seleccione la opción PYP!", "error");
          return;
        }
        if (this.CA1.migrante == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione la opción migrante!",
            "error"
          );
          return;
        }
        if (this.CA1.jefe == "0") {
          this.$swal(
            "Error...!",
            "Por favor seleccione el un jefe de hogar!",
            "error"
          );
          return;
        }
        // VALIDAR SI EL INTEGRANTE SE ENCUENTRA AGREGADO
        this.CA1.identificacion = this.CA1.identificacion.replace(
          /[.*+\-?^${}()|[\]\\]/g,
          ""
        );
        const parametros = {
          _token: this.csrf,
          identificacion: this.CA1.identificacion
        };
        try {
          await caracterizacionServicios
            .validar(parametros)
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
                let resultado = this.datos.filter(identi =>
                  identi.identificacion.includes(this.CA1.identificacion)
                );
                // VERIFICAR SI ESTA EN LA TABLA
                if (resultado.length > 0) {
                  this.$swal(
                    "Validar...!",
                    "El Documento <b>" +
                      this.CA1.identificacion +
                      "</b> Se Encuentra Agregado",
                    "warning"
                  );
                  return false;
                } else {
                  let nacimiento = moment(this.CA1.fecha_nac);
                  let hoy = moment();
                  let edad = 0;
                  if (nacimiento < hoy) {
                    edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
                  }
                  this.datos.push({
                    id: 0,
                    tipo_id: this.CA1.tipo_id,
                    identificacion: this.CA1.identificacion,
                    sexo: this.CA1.sexo,
                    parentesco: this.CA1.parentesco,
                    textoParentesco: this.showText(
                      this.CA1.parentesco,
                      this.parentesco_options
                    ),
                    pnom: this.CA1.pnom,
                    snom: this.CA1.snom,
                    pape: this.CA1.pape,
                    sape: this.CA1.sape,
                    estado_civil: this.CA1.estado_civil,
                    textoEstado: this.showText(
                      this.CA1.estado_civil,
                      this.estado_options
                    ),
                    fecha_nac: this.CA1.fecha_nac,
                    edad: edad,
                    afi_entidad: this.CA1.afi_entidad,
                    textoEps: this.showText(
                      this.CA1.afi_entidad,
                      this.admini_options
                    ),                    
                    otra_eps: this.CA1.otra_eps,
                    tipo_afiliacion: this.CA1.tipo_afiliacion,
                    embarazo: this.CA1.embarazo,
                    embarazo_multiple: this.CA1.embarazo_multiple,
                    discapacidad: this.CA1.discapacidad,
                    escolaridad: this.CA1.escolaridad,
                    textoEscolaridad: this.showText(
                      this.CA1.escolaridad,
                      this.escolaridad_options
                    ),
                    ocupacion: this.CA1.ocupacion,
                    textoOcupacion: this.showText(
                      this.CA1.ocupacion,
                      this.ocupacion_options
                    ),
                    colegio: this.CA1.colegio,
                    grado: this.CA1.grado,
                    entiende: this.CA1.entiende,
                    migrante: this.CA1.migrante,
                    pyp: this.CA1.pyp,
                    etnia: this.CA1.etnia,
                    textoEtnia: this.showText(this.CA1.etnia, this.etnia_options),
                    clasificacion: this.CA1.clasificacion,
                    puntaje_sisben: this.CA1.puntaje_sisben,
                    jefe: this.CA1.jefe,
                    orientacion: this.CA1.orientacion,
                    identidad_genero: this.CA1.identidad_genero,
                    telefono: this.CA1.telefono
                  });

                  if(this.CA1.tipo_afiliacion==="CONTRIBUTIVO" || this.CA1.tipo_afiliacion==="ESPECIAL"){
                    this.SAPU=true;
                    this.estratificacionData.afiliacion_salud_privada="SI";        
                  }
                  this.ocupacionAuxiliar2="";
                  this.mOCOL2 = false;
                  let indice = this.datos.findIndex(
                    identi => identi.identificacion === this.CA1.identificacion
                  );
                  this.vectorIntegrante.push({
                    index: indice,
                    identificacion: this.CA1.identificacion
                  });

                  this.CA1.id = "INTE";

                  // AGREGAR NIÑOS MENORES DE 1 AÑO
                  if (edad <= 0) {
                    this.Amenores1Anio(this.CA1);
                  }
                  // AGREGAR NIÑOS MENORES DE 1 AÑO
                  // AGREGAR DE 1 A 5 AÑOS
                  if (edad >= 1 && edad <= 5) {
                    this.Ade1a5Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 1 A 5 AÑOS

                  // AGREGAR DE 6 A 11 AÑOS
                  if (edad >= 6 && edad <= 11) {
                    this.Ade6a11Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 6 A 11 AÑOS

                  // AGREGAR DE 10 A 59 AÑOS
                  if (edad >= 10 && edad <= 59) {
                    this.Ade10a59Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 10 A 59 AÑOS

                  // AGREGAR PARTO POSTPARTO
                  // alert(this.CA1.embarazo_multiple);
                  if (this.CA1.embarazo === "SI") {
                    this.AParPost(this.CA1, edad);
                  }
                  // AGREGAR PARTO POSTPARTO

                  // AGREGAR DE 12 A 17 AÑOS
                  if (edad >= 12 && edad <= 17) {
                    this.Ade12a17Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 12 A 17 AÑOS

                  // AGREGAR DE 18 A 28 AÑOS
                  if (edad >= 18 && edad <= 28) {
                    this.Ade18a28Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 18 A 28 AÑOS

                  // AGREGAR DE 29 A 59 AÑOS
                  if (edad >= 29 && edad <= 59) {
                    this.Ade29a59Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 29 A 59 AÑOS

                  // AGREGAR DE 60 ó MAS AÑOS
                  if (edad >= 60) {
                    this.Ade60Anio(this.CA1, edad);
                  }
                  // AGREGAR DE 60 ó MAS AÑOS

                  // AGREGAR MIGRANTES

                  if (this.CA1.migrante === "SI") {
                    this.AMigra(this.CA1, edad);
                  }
                  // AGREGAR MIGRANTES
                  this.limpiar();
                }
              }
            })
            .catch(error => {
              this.errorDevuelto = error.response.data.errors;
              this.entrarPorError = true;
            });
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
        // VALIDAR SI EL INTEGRANTE SE ENCUENTRA AGREGADO
      },
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

                    this.datosJefe.push({
                      id: 0,
                      id_hogar: 0,
                      telefono: this.caracData.telefono,
                      puntaje_sisben: this.caracData.puntaje_sisben,
                      afiliacion_entidad: this.caracData.afiliacion_entidad,
                      textoEps: this.showText(
                        this.caracData.afiliacion_entidad,
                        this.admini_options
                      ),                      
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
                      identidad_genero: this.caracData.identidad_genero                      
                    });
                    if(this.caracData.tipo_afiliacion==="CONTRIBUTIVO" || this.caracData.tipo_afiliacion==="ESPECIAL"){
                      this.SAPU=true;
                      this.estratificacionData.afiliacion_salud_privada="SI";        
                    }                    
                    this.ocupacionAuxiliar="";
                    this.mOCOL1 = false;
                    let indice = this.datosJefe.findIndex(
                      identi =>
                        identi.identificacion === this.caracData.identificacion
                    );
                    this.vectorJefes.push({
                      index: indice,
                      identificacion: this.caracData.identificacion
                    });

                    // AGREGAR FACTORES
                    this.AFactores(this.caracData, edad);
                    // AGREGAR FACTORES

                    this.caracData.id = "JEFE";
                    // AGREGAR DE 10 A 59 AÑOS
                    if (edad >= 10 && edad <= 59) {
                      this.Ade10a59Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 10 A 59 AÑOS

                    // AGREGAR PARTO POSTPARTO
                    // alert(this.CA1.embarazo_multiple);
                    if (this.caracData.embarazo === "SI") {
                      this.AParPost(this.caracData, edad);
                    }
                    // AGREGAR PARTO POSTPARTO

                    // AGREGAR DE 12 A 17 AÑOS
                    if (edad >= 12 && edad <= 17) {
                      this.Ade12a17Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 12 A 17 AÑOS

                    // AGREGAR DE 18 A 28 AÑOS
                    if (edad >= 18 && edad <= 28) {
                      this.Ade18a28Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 18 A 28 AÑOS

                    // AGREGAR DE 29 A 59 AÑOS
                    if (edad >= 29 && edad <= 59) {
                      this.Ade29a59Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 29 A 59 AÑOS

                    // AGREGAR DE 60 ó MAS AÑOS
                    if (edad >= 60) {
                      this.Ade60Anio(this.caracData, edad);
                    }
                    // AGREGAR DE 60 ó MAS AÑOS

                    // AGREGAR MIGRANTES
                    if (this.caracData.migrante === "SI") {
                      this.AMigra(this.caracData, edad);
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
          this.$swal("Error...!", "Por favor seleccione la orientación sexual!", "error");
          return;
        }
        if (this.caracData.identidad_genero === "") {
          bande = false;
          this.$swal("Error...!", "Por favor seleccione la identidad de genero!", "error");
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
      eliminarItem: function(index, item) {
        this.datos.splice(index, 1);
        this.vectorIntegrante.splice(index, 1);
        let identificacion = item.identificacion;
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
      validarTablaIntegrantes: async function() {
        for (let i = 0; i < this.datos.length; i++) {
          const parametros = {
            _token: this.csrf,
            identificacion: this.datos[i].identificacion
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
                    "El Documento <b>" +
                      iden +
                      "</b> De La Fila <b>" +
                      (i + 1) +
                      "</b> Se Encuentra Registrado",
                    "warning"
                  );
                  // item.identificacion="";
                  return false;
                } else {
                  // VERIFICAR SI ESTA EN LA TABLA
                  let resultado = this.datos.filter(identi =>
                    identi.identificacion.includes(this.datos[i].identificacion)
                  );
                  // VERIFICAR SI ESTA EN LA TABLA
                  if (resultado.length > 1) {
                    this.$swal(
                      "Validar...!",
                      "El Documento <b>" +
                        this.datos[i].identificacion +
                        "</b> De La Fila <b>" +
                        (i + 1) +
                        "</b>  Se Encuentra Agregado En La Tabla de Integrantes",
                      "warning"
                    );
                    // item.identificacion="";
                    return false;
                  } else {
                    if (this.datos[i].tipo_id === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione un <b>tipo de identificación</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].identificacion === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite una <b>identificación</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].pnom === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite el <b>primer nombre</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].pape === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite el <b>primer apellido</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].sexo === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>sexo</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].parentesco === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>parentesco</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].estado_civil === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>estado civil</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].fecha_nac === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>fecha de nacimiento</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].afi_entidad === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>eps</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].tipo_afiliacion === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>tipo de afiliación</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].escolaridad === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>nivel de escolaridad</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].ocupacion === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>ocupación</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].etnia === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>etnia</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].clasificacion === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>clasificacion de la etnia</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    if (this.datos[i].jefe === "0") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>jefe de hogar</b> en la fila " +
                          (i + 1) +
                          " de los integrantes",
                        "error"
                      );
                      return false;
                    }
                    return true;
                  }
                }
              })
              .catch(error => {});
          } catch (error) {}
        }
      },
      validarTablaJefes: async function() {
        for (let i = 0; i < this.datosJefe.length; i++) {
          const parametros = {
            _token: this.csrf,
            identificacion: this.datosJefe[i].identificacion
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
                    "El Documento <b>" +
                      iden +
                      "</b> De La Fila <b>" +
                      (i + 1) +
                      "</b> Se Encuentra Registrado",
                    "warning"
                  );
                  // item.identificacion="";
                  return false;
                } else {
                  // VERIFICAR SI ESTA EN LA TABLA
                  let resultado = this.datosJefe.filter(identi =>
                    identi.identificacion.includes(
                      this.datosJefe[i].identificacion
                    )
                  );
                  // VERIFICAR SI ESTA EN LA TABLA
                  if (resultado.length > 1) {
                    this.$swal(
                      "Validar...!",
                      "El Documento <b>" +
                        this.datosJefe[i].identificacion +
                        "</b> De La Fila <b>" +
                        (i + 1) +
                        "</b>  Se Encuentra Agregado En La Tabla de Jefes de Hogar",
                      "warning"
                    );
                    // item.identificacion="";
                    return false;
                  } else {
                    if (this.datosJefe[i].tipo_id === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione un <b>tipo de identificación</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].identificacion === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite una <b>identificación</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].pnom === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite el <b>primer nombre</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].pape === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite el <b>primer apellido</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].sexo === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>sexo</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].parentesco === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>parentesco</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].estado_civil === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>estado civil</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].fecha_nacimiento === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>fecha de nacimiento</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].afiliacion_entidad === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>eps</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].tipo_afiliacion === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>tipo de afiliación</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].nivel_escolaridad === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione el <b>nivel de escolaridad</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].ocupacion === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>ocupación</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].etnia === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>etnia</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].clasificacion === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor seleccione la <b>clasificacion de la etnia</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    if (this.datosJefe[i].salario === "") {
                      this.$swal(
                        "Error...!",
                        "Por favor digite el <b>salario</b> en la fila " +
                          (i + 1) +
                          " de los jefes de hogar",
                        "error"
                      );
                      return false;
                    }
                    return true;
                  }
                }
              })
              .catch(error => {});
          } catch (error) {}
        }
      },
      Guardar: async function() {
        this.$v.$touch();
        const isInvalid = this.$v.$invalid;
        if (isInvalid) {
          // display error message
          this.$swal(
            "Error...!",
            "Por Favor Complete Los Campos Obligatorios",
            "error"
          );
        } else {
          // console.log("Form is correct");
          // submit to server
          this.entrarPorError = false;
          this.errores = [];

          if (this.datosJefe.length <= 0) {
            this.$swal(
              "Error...!",
              "Por favor agregue por lo menos un jefe de hogar",
              "error"
            );
            return;
          }
          if (this.estratificacion.length <= 0) {
            this.$swal(
              "Error...!",
              "Por favor agregue por lo menos una estratificación",
              "error"
            );
            return;
          }

          //VALIDAR LOS CAMPOS DEL VECTOR JEFES DE HOGAR
          this.validarTablaJefes();
          //VALIDAR LOS CAMPOS DEL VECTOR JEFES DE HOGAR

          //VALIDAR LOS CAMPOS DEL VECTOR INTEGRANTES
          this.validarTablaIntegrantes();
          //VALIDAR LOS CAMPOS DEL VECTOR INTEGRANTES

          const parametros = {
            _token: this.csrf,
            hogar: this.hogar,
            caracterizacion: this.datosJefe,
            integrantes: this.datos,
            vivienda: this.viviendaData,
            estratificacion: this.estratificacion,
            Men1A: this.Men1A,
            De1A5: this.De1A5,
            De6A11: this.De6A11,
            De10A59: this.De10A59,
            ParPost: this.ParPost,
            De12A17: this.De12A17,
            De18A28: this.De18A28,
            De29A59: this.De29A59,
            De60: this.De60,
            EnCro: this.EnCro,
            EnInf: this.EnInf,
            Migra: this.Migra,
            Animales: this.animalesData,
            opcion: "GUARDAR"
          };
          try {
            await caracterizacionServicios
              .guardar(parametros)
              .then(respuesta => {
                console.info(respuesta.data);
                if (respuesta.data.OPC == "SI") {
                  this.datos = [];
                  this.$swal(
                    "Guardar...!",
                    "Datos Guardados Exitosamente!",
                    "success"
                  );
                  this.$router.push("/gestion");
                }
                if (respuesta.data.OPC == "VALIDAR") {
                  let val = (respuesta.data.identificacion / 1)
                    .toFixed(0)
                    .replace(".", ",");
                  let iden = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                  this.$swal(
                    "Validar...!",
                    "El Documento <b>" + iden + "</b> Se Encuentra Registrado",
                    "success"
                  );
                }
              })
              .catch(error => {
                this.errorDevuelto = error.response.data.errors;
                this.entrarPorError = true;
              });
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
        }
      },
      SoloNumeros: function(event) {
        if (event.keyCode < 48 || event.keyCode > 57) {
          return false;
          // this.caracData.salario = 0;
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
      validarNumHog() {
        if (this.hogar.numero_hogares <= 0) {
          this.hogar.numero_hogares = "";
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
          if (this.caracData.tipo_id != "CC") {
            this.caracData.identificacion = this.caracData.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
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
          if (this.CA1.tipo_id != "CC") {
            this.CA1.identificacion = this.CA1.identificacion.replace(
              /[.*+\-?^${}()|[\]\\]/g,
              ""
            );
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
          this.CA1.telefono = this.CA1.telefono
            .replace(/[^.\d]/g, "")
            .trim();
          if (this.CA1.telefono == "NaN") {
            this.CA1.telefono = "";
          }
          if (this.CA1.telefono == "0") {
            this.CA1.telefono = "";
          }
        }        
        if (caja == "puntaje") {
          // this.CA1.puntaje_sisben = this.CA1.puntaje_sisben
          //   .replace(/[^.\d]/g, "")
          //   .trim();
          // if (this.CA1.puntaje_sisben == "NaN") {
          //   this.CA1.puntaje_sisben = "";
          // }
          // if (this.CA1.puntaje_sisben == "0") {
          //   this.CA1.puntaje_sisben = "";
          // }
        }
        if (caja == "puntaje1") {
          // this.caracData.puntaje_sisben = this.caracData.puntaje_sisben
          //   .replace(/[^.\d]/g, "")
          //   .trim();
          // if (this.caracData.puntaje_sisben == "NaN") {
          //   this.caracData.puntaje_sisben = "";
          // }
          // if (this.caracData.puntaje_sisben == "0") {
          //   this.caracData.puntaje_sisben = "";
          // }
        }
      },
      volver() {
        this.$router.push("/gestion");
      },
      limpiar() {
        this.CA1.tipo_id = "0";
        this.CA1.identificacion = "";
        this.CA1.sexo = "0";
        this.CA1.parentesco = "0";
        this.CA1.pnom = "";
        this.CA1.snom = "";
        this.CA1.pape = "";
        this.CA1.sape = "";
        this.CA1.estado_civil = "0";
        this.CA1.fecha_nac = "";
        this.CA1.edad = 0;
        this.CA1.afi_entidad = "0";
        this.CA1.tipo_afiliacion = "0";
        this.CA1.otra_eps = "";
        this.CA1.embarazo = "0";
        this.CA1.embarazo_multiple = "0";
        this.CA1.discapacidad = "0";
        this.CA1.escolaridad = "0";
        this.CA1.ocupacion = "0";
        this.CA1.colegio = "";
        this.CA1.grado = "0";
        this.CA1.entiende = "0";
        this.CA1.migrante = "0";
        this.CA1.pyp = "0";
        this.CA1.etnia = "0";
        this.CA1.clasificacion = "0";
        this.CA1.puntaje_sisben = "";
        this.CA1.jefe = "0";
        this.CA1.telefono = "";
        this.CA1.orientacion = "0";
        this.CA1.identidad_genero = "0";        
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
      eliminarItemAnimales: function(index) {
        this.animalesData.splice(index, 1);
      },
      eliminarItemEstratificacion: function(index) {
        this.estratificacion.splice(index, 1);
      },
      agregarAnimales: function() {
        if (this.animal === "") {
          this.$swal("Error...!", "Por favor Digite Un Animal!", "error");
          return;
        }
        if (this.vacunadoAnimal === "0") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si El Animal Se Encuentra Vacunado!",
            "error"
          );
          return;
        }
        if (this.cuantosAnimal === "") {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Animales Tiene!",
            "error"
          );
          return;
        }
        if (!this.isNumeric(this.cuantosAnimal)) {
          this.$swal(
            "Error...!",
            "Por favor Digite cuantos Animales Tiene!",
            "error"
          );
          return;
        }
        this.animalesData.push({
          id: 0,
          animal: this.animal,
          cuantos: this.cuantosAnimal,
          vacunados: this.vacunadoAnimal
        });
        this.animal = "";
        this.cuantosAnimal = "";
        this.vacunadoAnimal = "0";
      },
      agregarEstratificacion: function() {
        if (this.estratificacionData.cuenta_internet === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si Cuenta ese Hogar con Internet!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.tiene_pc_escritorio === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si Tiene computador de Escritorío!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.tiene_pc_portatil === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si Tiene Computador Portatil!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.cuantos_celulares === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Cuantos celulares en uso hay en el Hogar!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.tiene_equipo_sonido === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si Tiene Equipo de sonido!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.cuantos_tv_color === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Cuantos Tv a Color!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.cuantos_vehiculos === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Cuantos Vehiculos de Uso exclusivo tiene el Hogar!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.nivel_instruccion === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Cual es el nivel de Instrucción del jefe del Hogar!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.afiliacion_salud_privada === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Si Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.ingresos_zona_rural === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Ingresos mensuales por Hogar zona rural!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.ingresos_ciudad === "") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione Ingresos mensuales por Hogar en Ciudad!",
            "error"
          );
          return;
        }
        if (this.estratificacionData.id_jefe === "0") {
          this.$swal(
            "Error...!",
            "Por favor Seleccione El Jefe del Hogar!",
            "error"
          );
          return;
        }

        this.estratificacion.push({
          id: 0,
          id_hogar: 0,
          cuenta_internet: this.estratificacionData.cuenta_internet,
          tiene_pc_escritorio: this.estratificacionData.tiene_pc_escritorio,
          tiene_pc_portatil: this.estratificacionData.tiene_pc_portatil,
          cuantos_celulares: this.estratificacionData.cuantos_celulares,
          tiene_equipo_sonido: this.estratificacionData.tiene_equipo_sonido,
          cuantos_tv_color: this.estratificacionData.cuantos_tv_color,
          cuantos_vehiculos: this.estratificacionData.cuantos_vehiculos,
          nivel_instruccion: this.estratificacionData.nivel_instruccion,
          afiliacion_salud_privada: this.estratificacionData
            .afiliacion_salud_privada,
          ingresos_zona_rural: this.estratificacionData.ingresos_zona_rural,
          ingresos_ciudad: this.estratificacionData.ingresos_ciudad,
          id_jefe: this.estratificacionData.id_jefe,
          texto_cuantos_celulares: this.showText(
            this.estratificacionData.cuantos_celulares,
            this.opciones1
          ),
          texto_cuantos_tv_color: this.showText(
            this.estratificacionData.cuantos_tv_color,
            this.opciones2
          ),
          texto_cuantos_vehiculos: this.showText(
            this.estratificacionData.cuantos_vehiculos,
            this.opciones3
          ),
          texto_nivel_instruccion: this.showText(
            this.estratificacionData.nivel_instruccion,
            this.opciones4
          ),
          texto_ingresos_zona_rural: this.showText(
            this.estratificacionData.ingresos_zona_rural,
            this.opciones5
          ),
          texto_ingresos_ciudad: this.showText(
            this.estratificacionData.ingresos_ciudad,
            this.opciones6
          )
        });
        this.estratificacionData.cuenta_internet = "";
        this.estratificacionData.tiene_pc_escritorio = "";
        this.estratificacionData.tiene_pc_portatil = "";
        this.estratificacionData.cuantos_celulares = "";
        this.estratificacionData.tiene_equipo_sonido = "";
        this.estratificacionData.cuantos_tv_color = "";
        this.estratificacionData.cuantos_vehiculos = "";
        this.estratificacionData.nivel_instruccion = "";
        if(this.SAPU===true){
          this.estratificacionData.afiliacion_salud_privada="SI";
        }else{
          this.estratificacionData.afiliacion_salud_privada="";
        }        
        // this.estratificacionData.ingresos_zona_rural = "";
        // this.estratificacionData.ingresos_ciudad = "";
        this.estratificacionData.id_jefe = "0";
      },
      Amenores1Anio(vector) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.Men1A.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          lugar_nacimiento: "",
          hemoclasificacion: "",
          compli_parto: "",
          via_parto: "",
          cyc: "",
          valoracion_23: "",
          valoracion_68: "",
          valoracion_911: "",
          lactancia: "",
          peso_nacer: "",
          peso_actual: "",
          longitud_nacer: "",
          longitud_actual: "",
          peso_long: "",
          cinta: "",
          edemas: "",
          lenguaje: "",
          motora: "",
          conducta: "",
          visuales: "",
          auditivos: "",
          carnet: "",
          bcg: "",
          hepb: "",
          polio: "",
          pentavalente: "",
          maltrato: "",
          morbilidad: "",
          tsh: "",
          opci: opcion
        });
      },
      changeupdateMenA1(item, event, opcion) {
        if (opcion === "peso_nacer") {
          item.peso_nacer = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "peso_actual") {
          item.peso_actual = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "longitud_nacer") {
          item.longitud_nacer = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "longitud_actual") {
          item.longitud_actual = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "peso_long") {
          item.peso_long = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateMenA1(item, valor, opcion) {
        if (opcion === "hemoclasificacion") {
          item.hemoclasificacion = valor;
        }
        if (opcion === "lugar_nacimiento") {
          item.lugar_nacimiento = valor;
        }
        if (opcion === "compli_parto") {
          item.compli_parto = valor;
        }
        if (opcion === "via_parto") {
          item.via_parto = valor;
        }
        if (opcion === "cyc") {
          item.cyc = valor;
        }
        if (opcion === "valoracion_23") {
          item.valoracion_23 = valor;
        }
        if (opcion === "valoracion_68") {
          item.valoracion_68 = valor;
        }
        if (opcion === "valoracion_911") {
          item.valoracion_911 = valor;
        }
        if (opcion === "lactancia") {
          item.lactancia = valor;
        }
        if (opcion === "cinta") {
          item.cinta = valor;
        }
        if (opcion === "edemas") {
          item.edemas = valor;
        }
        if (opcion === "lenguaje") {
          item.lenguaje = valor;
        }
        if (opcion === "motora") {
          item.motora = valor;
        }
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "carnet") {
          item.carnet = valor;
        }
        if (opcion === "bcg") {
          item.bcg = valor;
        }
        if (opcion === "hepb") {
          item.hepb = valor;
        }
        if (opcion === "polio") {
          item.polio = valor;
        }
        if (opcion === "pentavalente") {
          item.pentavalente = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "morbilidad") {
          item.morbilidad = valor;
        }
        if (opcion === "tsh") {
          item.tsh = valor;
        }
      },
      Ade1a5Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De1A5.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          beneficiario: "",
          cyc: "",
          valoracion_1823: "",
          valoracion_3035: "",
          valoracion_4: "",
          peso: "",
          talla: "",
          imc: "",
          pb: "",
          pt: "",
          te: "",
          lenguaje: "",
          motora: "",
          conducta: "",
          visuales: "",
          auditivos: "",
          caries: "",
          nocepillado: "",
          consultaodon: "",
          carnet: "",
          bcg: "",
          polio: "",
          dpt: "",
          fiebrea: "",
          tripleviral: "",
          pentavalente: "",
          otras: "",
          desparacitado: "",
          maltrato: "",
          enfermedad: "",
          medicamento: "",
          opci: opcion,
          pcefalico: ""
        });
      },
      changeupdateDe1A5(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        // if (opcion === "imc") {
        //   item.imc = event.target.value.replace( /[^.\d]/g, '' ).trim();;
        // }
        if (opcion === "pb") {
          item.pb = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pt") {
          item.pt = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "te") {
          item.te = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "nocepillado") {
          item.nocepillado = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "otras") {
          item.otras = event.target.value.trim();
        }
      },
      updateDe1A5(item, valor, opcion) {
        if (opcion === "beneficiario") {
          item.beneficiario = valor;
        }
        if (opcion === "cyc") {
          item.cyc = valor;
        }
        if (opcion === "valoracion_1823") {
          item.valoracion_1823 = valor;
        }
        if (opcion === "valoracion_3035") {
          item.valoracion_3035 = valor;
        }
        if (opcion === "valoracion_4") {
          item.valoracion_4 = valor;
        }
        if (opcion === "lenguaje") {
          item.lenguaje = valor;
        }
        if (opcion === "motora") {
          item.motora = valor;
        }
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "caries") {
          item.caries = valor;
        }
        if (opcion === "consultaodon") {
          item.consultaodon = valor;
        }
        if (opcion === "carnet") {
          item.carnet = valor;
        }
        if (opcion === "bcg") {
          item.bcg = valor;
        }
        if (opcion === "polio") {
          item.polio = valor;
        }
        if (opcion === "dpt") {
          item.dpt = valor;
        }
        if (opcion === "fiebrea") {
          item.fiebrea = valor;
        }
        if (opcion === "tripleviral") {
          item.tripleviral = valor;
        }
        if (opcion === "pentavalente") {
          item.pentavalente = valor;
        }        
        
        if (opcion === "desparacitado") {
          item.desparacitado = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "enfermedad") {
          item.enfermedad = valor;
        }
        if (opcion === "medicamento") {
          item.medicamento = valor;
        }
      },
      Ade6a11Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De6A11.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          cyc: "",
          atencion: "",
          peso: "",
          talla: "",
          imc: "",
          pb: "NA",
          pt: "NA",
          te: "",
          conducta: "",
          visuales: "",
          auditivos: "",
          dientes_sanos: "",
          consultaodon: "",
          nofluor: "",
          nocepillado: "",
          maltrato: "",
          sustanciaspsico: "",
          desparacitado: "",
          enfermedad: "",
          medicamento: "",
          padre: "",
          madre: "",
          hermanos: "",
          conyuge: "",
          opci: opcion
        });
      },
      changeupdateDe6A11(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pb") {
          item.pb = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pt") {
          item.pt = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "te") {
          item.te = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "nocepillado") {
          item.nocepillado = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateDe6A11(item, valor, opcion) {
        if (opcion === "cyc") {
          item.cyc = valor;
        }
        if (opcion === "atencion") {
          item.atencion = valor;
        }
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "dientes_sanos") {
          item.dientes_sanos = valor;
        }
        if (opcion === "consultaodon") {
          item.consultaodon = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "sustanciaspsico") {
          item.sustanciaspsico = valor;
        }
        if (opcion === "desparacitado") {
          item.desparacitado = valor;
        }
        if (opcion === "enfermedad") {
          item.enfermedad = valor;
        }
        if (opcion === "medicamento") {
          item.medicamento = valor;
        }
        if (opcion === "padre") {
          item.padre = valor;
        }
        if (opcion === "madre") {
          item.madre = valor;
        }
        if (opcion === "hermanos") {
          item.hermanos = valor;
        }
        if (opcion === "conyuge") {
          item.conyuge = valor;
        }
        if (opcion === "nofluor") {
          item.nofluor = valor;
        }        
      },
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
      changeupdateDe10A59(item, event, opcion) {
       
      },
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
      AParPost(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.ParPost.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          aceptacion: "",
          control_prenatal: "",
          atencion_parto: "",
          carnet: "",
          fecha_ultima: "",
          fecha_probable: "",
          peso: "",
          talla: "",
          imc: "",
          semanas_ges: "",
          num_controles: "",
          vih: "",
          toxoplasma: "",
          vdrl: "",
          odontologia: "",
          vacunaciontdit: "",
          fecha_ultimo_parto: "",
          suplementacion: "",
          enfermedades_cronicas: "",
          sedentarismo: "",
          fuma: "",
          consumo: "",
          bebidas: "",
          tipo_parto: "",
          atencion_institucional: "",
          cc18: "NA",
          morgestacion: "",
          morparto: "",
          morposparto: "",
          opci: opcion
        });
      },
      changeupdatePosparto(item, event, opcion) {
        moment.locale("es");
        if (opcion === "fecha_ultima") {          
          let fecha = moment.utc(item.fecha_ultima, "YYYY-MM-DD");
          let suma = fecha.add(9, "months");
          suma = suma.add(7, "days");
          item.fecha_probable=suma.format("YYYY-MM-DD");
          // console.log(suma.format("DD/MM/YYYY"));
          // console.log(item.fecha_probable);
        }
        if (opcion === "fecha_probable") {
          let fecha = moment.utc(item.fecha_probable, "YYYY-MM-DD");
          let suma = fecha.subtract(9, "months");
          suma = suma.subtract(7, "days");
          item.fecha_ultima=suma.format("YYYY-MM-DD");
          // item.fecha_probable = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "semanas_ges") {
          item.semanas_ges = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "fecha_ultimo_parto") {
          // item.fecha_ultimo_parto = event.target.value
          //   .replace(/[^.\d]/g, "")
          //   .trim();
        }
      },
      updatePosparto(item, valor, opcion) {
        if (opcion === "aceptacion") {
          item.aceptacion = valor;
        }
        if (opcion === "control_prenatal") {
          item.control_prenatal = valor;
        }
        if (opcion === "atencion_parto") {
          item.atencion_parto = valor;
        }
        if (opcion === "carnet") {
          item.carnet = valor;
        }
        if (opcion === "num_controles") {
          item.num_controles = valor;
        }
        if (opcion === "vih") {
          item.vih = valor;
        }
        if (opcion === "toxoplasma") {
          item.toxoplasma = valor;
        }
        if (opcion === "vdrl") {
          item.vdrl = valor;
        }
        if (opcion === "odontologia") {
          item.odontologia = valor;
        }
        if (opcion === "vacunaciontdit") {
          item.vacunaciontdit = valor;
        }
        if (opcion === "suplementacion") {
          item.suplementacion = valor;
        }
        if (opcion === "enfermedades_cronicas") {
          item.enfermedades_cronicas = valor;
        }
        if (opcion === "sedentarismo") {
          item.sedentarismo = valor;
        }
        if (opcion === "fuma") {
          item.fuma = valor;
        }
        if (opcion === "consumo") {
          item.consumo = valor;
        }
        if (opcion === "bebidas") {
          item.bebidas = valor;
        }
        if (opcion === "tipo_parto") {
          item.tipo_parto = valor;
        }
        if (opcion === "atencion_institucional") {
          item.atencion_institucional = valor;
        }
        if (opcion === "cc18") {
          item.cc18 = valor;
        }
        if (opcion === "morgestacion") {
          item.morgestacion = valor;
        }
        if (opcion === "morparto") {
          item.morparto = valor;
        }
        if (opcion === "morposparto") {
          item.morposparto = valor;
        }
      },
      Ade12a17Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De12A17.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          peso: "",
          talla: "",
          imc: "",
          pb: "NA",
          visuales: "",
          auditivos: "",
          conducta: "",
          enfermedades_cronicas: "",
          dientes_sanos: "",
          consultaodon: "",
          nocepillado: "",
          maltrato: "",
          alcohol: "",
          fuma: "",
          spa: "",
          desparacitado: "",
          empleo: "",
          religion: "",
          queesvih: "",
          queescancerutero: "",
          queespapiloma: "",
          queescancerseno: "",
          padre: "",
          madre: "",
          hermanos: "",
          conyuge: "",
          opci: opcion
        });
      },
      changeupdateDe12A17(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "pb") {
          item.pb = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "nocepillado") {
          item.nocepillado = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateDe12A17(item, valor, opcion) {
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "enfermedades_cronicas") {
          item.enfermedades_cronicas = valor;
        }
        if (opcion === "dientes_sanos") {
          item.dientes_sanos = valor;
        }
        if (opcion === "consultaodon") {
          item.consultaodon = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "alcohol") {
          item.alcohol = valor;
        }
        if (opcion === "fuma") {
          item.fuma = valor;
        }
        if (opcion === "spa") {
          item.spa = valor;
        }
        if (opcion === "desparacitado") {
          item.desparacitado = valor;
        }
        if (opcion === "empleo") {
          item.empleo = valor;
        }
        if (opcion === "religion") {
          item.religion = valor;
        }        
        if (opcion === "queesvih") {
          item.queesvih = valor;
        }
        if (opcion === "queescancerutero") {
          item.queescancerutero = valor;
        }
        if (opcion === "queespapiloma") {
          item.queespapiloma = valor;
        }
        if (opcion === "queescancerseno") {
          item.queescancerseno = valor;
        }
        if (opcion === "padre") {
          item.padre = valor;
        }
        if (opcion === "madre") {
          item.madre = valor;
        }
        if (opcion === "hermanos") {
          item.hermanos = valor;
        }
        if (opcion === "conyuge") {
          item.conyuge = valor;
        }
      },
      Ade18a28Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De18A28.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          peso: "",
          talla: "",
          imc: "",
          pcintura: "",
          pb: "NA",
          visuales: "",
          auditivos: "",
          conducta: "",
          enfermedades_cronicas: "",
          dientes_sanos: "",
          consultaodon: "",
          nocepillado: "",
          maltrato: "",
          alcohol: "",
          fuma: "",
          spa: "",
          desparacitado: "",
          empleo: "",
          religion: "",
          queesvih: "",
          queescancerutero: "",
          queespapiloma: "",
          opci: opcion
        });
      },
      changeupdateDe18A28(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pb") {
          item.pb = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pcintura") {
          item.pcintura = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "nocepillado") {
          item.nocepillado = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateDe18A28(item, valor, opcion) {
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "enfermedades_cronicas") {
          item.enfermedades_cronicas = valor;
        }
        if (opcion === "dientes_sanos") {
          item.dientes_sanos = valor;
        }
        if (opcion === "consultaodon") {
          item.consultaodon = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "alcohol") {
          item.alcohol = valor;
        }
        if (opcion === "fuma") {
          item.fuma = valor;
        }
        if (opcion === "spa") {
          item.spa = valor;
        }
        if (opcion === "desparacitado") {
          item.desparacitado = valor;
        }
        if (opcion === "empleo") {
          item.empleo = valor;
        }
        if (opcion === "religion") {
          item.religion = valor;
        }        
        if (opcion === "queesvih") {
          item.queesvih = valor;
        }
        if (opcion === "queescancerutero") {
          item.queescancerutero = valor;
        }
        if (opcion === "queespapiloma") {
          item.queespapiloma = valor;
        }
      },
      Ade29a59Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De29A59.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          peso: "",
          talla: "",
          imc: "",
          pcintura: "",
          pb: "NA",
          visuales: "",
          auditivos: "",
          conducta: "",
          enfermedades_cronicas: "",
          dientes_sanos: "",
          consultaodon: "",
          nocepillado: "",
          maltrato: "",
          alcohol: "",
          fuma: "",
          spa: "",
          desparacitado: "",
          empleo: "",
          examen_prostata: "NA",
          citologia: "NA",
          examen_mama: "NA",
          religion: "",
          queesvih: "",
          queescancerutero: "",
          queespapiloma: "",
          opci: opcion
        });
      },
      changeupdateDe29A59(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pb") {
          item.pb = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pcintura") {
          item.pcintura = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "nocepillado") {
          item.nocepillado = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateDe29A59(item, valor, opcion) {
        if (opcion === "conducta") {
          item.conducta = valor;
        }
        if (opcion === "visuales") {
          item.visuales = valor;
        }
        if (opcion === "auditivos") {
          item.auditivos = valor;
        }
        if (opcion === "enfermedades_cronicas") {
          item.enfermedades_cronicas = valor;
        }
        if (opcion === "dientes_sanos") {
          item.dientes_sanos = valor;
        }
        if (opcion === "consultaodon") {
          item.consultaodon = valor;
        }
        if (opcion === "maltrato") {
          item.maltrato = valor;
        }
        if (opcion === "alcohol") {
          item.alcohol = valor;
        }
        if (opcion === "fuma") {
          item.fuma = valor;
        }
        if (opcion === "spa") {
          item.spa = valor;
        }
        if (opcion === "desparacitado") {
          item.desparacitado = valor;
        }
        if (opcion === "empleo") {
          item.empleo = valor;
        }
        if (opcion === "religion") {
          item.religion = valor;
        }        
        if (opcion === "examen_prostata") {
          item.examen_prostata = valor;
        }
        if (opcion === "citologia") {
          item.citologia = valor;
        }
        if (opcion === "examen_mama") {
          item.examen_mama = valor;
        }
        if (opcion === "queesvih") {
          item.queesvih = valor;
        }
        if (opcion === "queescancerutero") {
          item.queescancerutero = valor;
        }
        if (opcion === "queespapiloma") {
          item.queespapiloma = valor;
        }
      },
      Ade60Anio(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.De60.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          grupo_ayudas: "",
          peso: "",
          talla: "",
          imc: "",
          pa: "",
          glicemia: "",
          cigarrillo: "",
          alcohol: "",
          actividad_fisica: "",
          sintomatico: "",
          examen_seno: "",
          citologia: "",
          colposcopia: "",
          examen_prostata: "",
          biposia_prostata: "",
          agudeza_visual: "",
          subsidio: "",
          enfermedades_cronicas: "",
          enfermedades_infecciosas: "",
          opci: opcion,
          empleo: ""
        });
      },
      changeupdateDe60(item, event, opcion) {
        if (opcion === "peso") {
          item.peso = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "talla") {
          item.talla = event.target.value.replace(/[^.\d]/g, "").trim();
          item.imc = this.calcularImc(item.peso, item.talla);
        }
        if (opcion === "imc") {
          item.imc = event.target.value.replace(/[^.\d]/g, "").trim();
        }
        if (opcion === "pa") {
          item.pa = event.target.value.trim();
        }
        if (opcion === "glicemia") {
          item.glicemia = event.target.value.trim();
        }
      },
      updateDe60(item, valor, opcion) {
        if (opcion === "grupo_ayudas") {
          item.grupo_ayudas = valor;
        }
        if (opcion === "cigarrillo") {
          item.cigarrillo = valor;
        }
        if (opcion === "alcohol") {
          item.alcohol = valor;
        }
        if (opcion === "actividad_fisica") {
          item.actividad_fisica = valor;
        }
        if (opcion === "sintomatico") {
          item.sintomatico = valor;
        }
        if (opcion === "examen_seno") {
          item.examen_seno = valor;
        }
        if (opcion === "citologia") {
          item.citologia = valor;
        }
        if (opcion === "colposcopia") {
          item.colposcopia = valor;
        }
        if (opcion === "examen_prostata") {
          item.examen_prostata = valor;
        }
        if (opcion === "biposia_prostata") {
          item.biposia_prostata = valor;
        }
        if (opcion === "agudeza_visual") {
          item.agudeza_visual = valor;
        }
        if (opcion === "subsidio") {
          item.subsidio = valor;
        }
        if (opcion === "enfermedades_cronicas") {
          item.enfermedades_cronicas = valor;
          if (valor === "SI") {
            // AGREGAR ENFERMEDADES CONTAGIOSAS
            this.AEnCro(item);
            // AGREGAR ENFERMEDADES CONTAGIOSAS
          } else {
            // ELIMINAR ENFERMEDADES CONTAGIOSAS
            this.EEnCro(item);
            // ELIMINAR ENFERMEDADES CONTAGIOSAS
          }
        }
        if (opcion === "enfermedades_infecciosas") {
          item.enfermedades_infecciosas = valor;
          if (valor === "SI") {
            // AGREGAR ENFERMEDADES INFECCIOSAS
            this.AEnInf(item);
            // AGREGAR ENFERMEDADES INFECCIOSAS
          } else {
            // ELIMINAR ENFERMEDADES INFECCIOSAS
            this.EEnInf(item);
            // ELIMINAR ENFERMEDADES INFECCIOSAS
          }
        }
      },
      AEnCro(vector) {
        let opcion = "";
        if (vector.opci === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.EnCro.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          enfermedad: "",
          tiempo: "",
          tratamiento: "",
          complicaciones: "0",
          opci: opcion
        });
      },
      changeupdateEnCro(item, event, opcion) {
        if (opcion === "complicaciones") {
          item.complicaciones = event.target.value.trim();
        }
      },
      updateEnCro(item, valor, opcion) {
        if (opcion === "enfermedad") {
          item.enfermedad = valor;
        }
        if (opcion === "tratamiento") {
          item.tratamiento = valor;
        }
        if (opcion === "tiempo") {
          item.tiempo = valor;
        }        
      },
      EEnCro(item) {
        let identificacion = item.identificacion;
        this.EnCro = this.EnCro.filter(function(men) {
          return men.identificacion != identificacion;
        });
      },
      AEnInf(vector) {
        let opcion = "";
        if (vector.opci === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.EnInf.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          enfermedad: "",
          tiempo: "",
          tratamiento: "",
          complicaciones: "0",
          opci: opcion
        });
      },
      changeupdateEnInf(item, event, opcion) {
        if (opcion === "complicaciones") {
          item.complicaciones = event.target.value.trim();
        }
      },
      updateEnInf(item, valor, opcion) {
        if (opcion === "enfermedad") {
          item.enfermedad = valor;
        }
        if (opcion === "tratamiento") {
          item.tratamiento = valor;
        }
        if (opcion === "tiempo") {
          item.tiempo = valor;
        }        
      },
      EEnInf(item) {
        let identificacion = item.identificacion;
        this.EnInf = this.EnInf.filter(function(men) {
          return men.identificacion != identificacion;
        });
      },
      AMigra(vector, edad) {
        let opcion = "";
        if (vector.id === "JEFE") {
          opcion = "JEFE";
        } else {
          opcion = "INTE";
        }
        this.Migra.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          pais: "",
          registrado: "",
          cuantollego: "",
          futuro: "",
          recibido: "",
          necesidad: "",
          dependen: "",
          ingreso: "",
          opci: opcion
        });
      },
      changeupdateMigra(item, event, opcion) {
        if (opcion === "pais") {
          item.pais = event.target.value.trim();
        }
        if (opcion === "dependen") {
          item.dependen = event.target.value.replace(/[^.\d]/g, "").trim();
        }
      },
      updateMigra(item, valor, opcion) {
        if (opcion === "registrado") {
          item.registrado = valor;
        }
        if (opcion === "cuantollego") {
          item.cuantollego = valor;
        }
        if (opcion === "futuro") {
          item.futuro = valor;
        }
        if (opcion === "recibido") {
          item.recibido = valor;
        }
        if (opcion === "necesidad") {
          item.necesidad = valor;
        }
        if (opcion === "ingreso") {
          item.ingreso = valor;
        }
      },
      calcularImc(peso, talla) {
        if (peso === "") {
          peso = 0;
        }
        if (talla === "") {
          talla = 1;
        }
        talla=talla/100;     
        let imc = peso / (talla * talla);
        return imc.toFixed(2);
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
          indice = this.De10A59.findIndex(
            identi => identi.identificacion === id
          );
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
        // if (opcion === "fecha_nac") {
        //   let nacimiento = moment(event.target.value);
        //   let hoy = moment();
        //   let edad = 0;
        //   if (nacimiento < hoy) {
        //     edad = hoy.diff(nacimiento, "years"); //Calculamos la diferencia en años
        //   }
        //   item.edad = edad;

        //   //SABER LA IDENTIFICACION EN EL VECTOR DE INTEGRANTES SEGUN EL INDICE Q
        //   //VIENE DE LA TABLA
        //   let id = this.vectorIntegrante[index].identificacion;

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   let indice = this.Men1A.findIndex(
        //     identi => identi.identificacion === id
        //   );
        //   if (indice >= 0) {
        //     this.Men1A[indice].edad = item.edad;
        //     this.Men1A.splice(indice, 1, this.Men1A[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De1A5.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     this.De1A5[indice].edad = item.edad;
        //     this.De1A5.splice(indice, 1, this.De1A5[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De6A11.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     this.De6A11[indice].edad = item.edad;
        //     this.De6A11.splice(indice, 1, this.De6A11[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De10A59.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.De10A59[indice].edad = item.edad;
        //     this.De10A59.splice(indice, 1, this.De10A59[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.ParPost.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.ParPost[indice].edad = item.edad;
        //     this.ParPost.splice(indice, 1, this.ParPost[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De12A17.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.De12A17[indice].edad = item.edad;
        //     this.De12A17.splice(indice, 1, this.De12A17[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De18A28.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.De18A28[indice].edad = item.edad;
        //     this.De18A28.splice(indice, 1, this.De18A28[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De29A59.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.De29A59[indice].edad = item.edad;
        //     this.De29A59.splice(indice, 1, this.De29A59[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.De60.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.De60[indice].edad = item.edad;
        //     this.De60.splice(indice, 1, this.De60[indice]);
        //   }

        //   //SABER EL INDICE DE LA IDENTIFICACION QUE ESTA EN ESTE ARRAY
        //   indice = this.Migra.findIndex(identi => identi.identificacion === id);
        //   if (indice >= 0) {
        //     //CAMBIAR LA IDENTIFICACION DE ESTE VECTOR POR LA IDENTIFICACION DEL VECTOR JEFES
        //     this.Migra[indice].edad = item.edad;
        //     this.Migra.splice(indice, 1, this.Migra[indice]);
        //   }
        // }
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

      AFactores(vector, edad) {
        this.factores.push({
          id: 0,
          tipo_id: vector.tipo_id,
          identificacion: vector.identificacion,
          pnom: vector.pnom,
          snom: vector.snom,
          pape: vector.pape,
          sape: vector.sape,
          sexo: vector.sexo,
          edad: edad,
          dialogos: "",
          sancion: "",
          castigo_verbal: "",
          castigo_fisico: "",
          alcohol: "",
          tabaco: "",
          sustancias_psico: "",
          apuestas: "",
          violencia_fisica: "",
          violencia_psico: "",
          violencia_economica: "",
          abuso_sexual: "",
          actividad_fisica: "",
          consumo_frutas: "",
          religiosos: "",
          sociales: "",
          culturales: "",
          recreativos: ""
        });
      },      
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
