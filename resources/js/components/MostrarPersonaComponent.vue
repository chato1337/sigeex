<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8 alert alert-success">
                <small>datos basicos:</small>
                <button class="btn btn-primary btn-sm">Editar</button>
                <div class="datos-basicos d-flex">
                  <div class="imagen-comunero">
                    <img
                      class="img-fluid img-thumbnail"
                      src="img/default.jpg"
                      alt="imagen del comunero"
                    />
                  </div>
                  <div class="info-comunero row">
                    <table class="table">
                      <thead>
                        <th>Nombres y apellidos:</th>
                        <th>Fecha de nacimiento:</th>
                        <th>Tipo doc:</th>
                        <th>Num documento:</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td
                            v-text="
                                                            persona.nombres +
                                                                ' ' +
                                                                persona.apellidos
                                                        "
                          ></td>
                          <td
                            v-text="
                                                            persona.fecha_nacimiento
                                                        "
                          ></td>
                          <td v-text="persona.documento.name"></td>
                          <td
                            v-text="
                                                            persona.numero_documento
                                                        "
                          ></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <small>Info de contacto:</small>
                <div class="info-contacto d-flex">
                  <div class="item-contacto">
                    <span class="border-bottom">Correo electronico</span>
                    <ul>
                      <li v-for="correo in persona.correo" :key="correo.id">
                        <a :href="'mailto:'+correo.descripcion" v-text="correo.descripcion"></a>
                      </li>
                    </ul>
                    <div v-if="correo_edit" class="add-mail">
                      <input
                        v-model="correo"
                        type="email"
                        placeholder="me@me.com"
                        title="presiona enter para guardar"
                        @keyup.enter="registrarCorreo()"
                      />
                      <button class="btn btn-success btn-sm" @click="registrarCorreo()">+</button>
                    </div>
                    <button
                      class="btn btn-success btn-sm"
                      v-if="!correo_edit"
                      v-text="correo_texto"
                      @click="nuevoCorreo(true, 'Cancelar')"
                    ></button>
                    <button
                      class="btn btn-outline-info btn-sm mt-2"
                      v-if="correo_edit"
                      v-text="correo_texto"
                      @click="nuevoCorreo(false, 'Agregar correo')"
                    ></button>
                  </div>
                  <div class="item-contacto">
                    <span class="border-bottom">Telefonos:</span>
                    <ul>
                      <li>3127330437</li>
                    </ul>
                  </div>
                  <div class="item-contacto">
                    <span class="border-bottom">Otros</span>
                    <ul>
                      <li>Direccion: los andes</li>
                    </ul>
                  </div>
                </div>
                <small>Parentezco:</small>
              </div>
              <div class="col-md-4">
                <small>Procesos juridicos:</small>
                <div class="alert alert-warning">
                  <span class="badge badge-info">Proceso cerrado</span>
                  <div class="row">
                    <div class="col">
                      <span>Codigo del proceso:</span>
                      <p>19262016212</p>
                    </div>
                    <div class="col">
                      <span>Tipologia:</span>
                      <p>Hurto/estafa</p>
                    </div>
                  </div>
                  <span>breve detalle:</span>
                  <p class="border-top">
                    Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Hic, quaerat mollitia
                    accusamus eum architecto est!
                  </p>
                  <span>Autoridad encargada:</span>
                  <p>
                    <a href="#">Argenis Yatacue</a>
                  </p>
                  <button class="btn btn-info btn-sm">Ver proceso:</button>
                </div>
                <div class="alert alert-danger">
                  <span class="badge badge-info">Proceso abierto</span>
                  <div class="row">
                    <div class="col">
                      <span>Codigo del proceso:</span>
                      <p>19262016212</p>
                    </div>
                    <div class="col">
                      <span>Tipologia:</span>
                      <p>Hurto/estafa</p>
                    </div>
                  </div>
                  <span>breve detalle:</span>
                  <p class="border-top">
                    Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Hic, quaerat mollitia
                    accusamus eum architecto est!
                  </p>
                  <span>Autoridad encargada:</span>
                  <p>
                    <a href="#">Argenis Yatacue</a>
                  </p>
                  <button class="btn btn-info btn-sm">Ver proceso:</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  props: {
    persona: Object,
    id: Number,
  },
  data() {
    return {
      correo_texto: "Agregar correo",
      correo_edit: false,
      correo: "",
      correos: [],
    };
  },
  methods: {
    nuevoCorreo(estado, mensaje) {
      this.correo_edit = estado;
      this.correo_texto = mensaje;
    },
    listarCorreos(id) {
      let URL = "/correos/" + id;

      axios
        .get(URL)
        .then((response) => (this.correos = response.data.listado_correos))
        .catch((error) => console.log(error));
    },
    registrarCorreo() {
      let URL = "/correos";
      axios
        .post(URL, {
          persona_id: this.persona.id,
          descripcion: this.correo,
        })
        .then((response) => {
          this.correo_edit = false;
          this.listarCorreos(this.persona.id);
          this.persona.correo.push({ descripcion: this.correo });
          this.correo = "";
          this.mostrarAlerta("success", "top-end", response.data);
        })
        .catch((error) => console.log(error));
    },
    mostrarAlerta(tipo, posicion, mensaje) {
      Swal.fire({
        position: posicion,
        icon: tipo,
        title: mensaje,
        showConfirmButton: false,
        timer: 1500,
      });
    },
  },
  mounted() {
    console.log("Componente mostrar persona mounted.");
  },
};
</script>
