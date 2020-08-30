<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Crea una nueva persona</div>

          <div class="card-body">
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label for>Nombres</label>
                  <input v-model="nombres" type="text" class="form-control" placeholder="David" />
                  <div v-if="error.nombres" class="alert alert-danger">{{ error.nombres[0] }}</div>
                </div>
                <div class="col">
                  <label for>Apellidos</label>
                  <input v-model="apellidos" type="text" class="form-control" placeholder="Linch" />
                  <div v-if="error.apellidos" class="alert alert-danger">{{ error.apellidos[0] }}</div>
                </div>
                <div class="col">
                  <label for>Fecha de naciemiento</label>
                  <input v-model="fecha_nacimiento" type="date" class="form-control" />
                  <div
                    v-if="error.fecha_nacimiento"
                    class="alert alert-danger"
                  >{{ error.fecha_nacimiento[0] }}</div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <label for>Tipo de documento</label>
                  <select class="custom-select" v-model="tipo_documento">
                    <option value="0">Seleccione</option>
                    <option
                      v-for="documento in documentos"
                      :key="documento.id"
                      :value="documento.id"
                      v-text="documento.name"
                    ></option>
                  </select>
                  <div
                    v-if="flag_documento"
                    class="alert alert-danger"
                  >Seleccione el tipo de documento</div>
                </div>
                <div class="col">
                  <label for>Numero de documento</label>
                  <input v-model="numero_documento" type="number" class="form-control" />
                  <div v-if="flag_num" class="alert alert-danger">Numero de documento invalido</div>
                  <div
                    v-if="error.numero_documento"
                    class="alert alert-danger"
                  >{{ error.numero_documento[0] }}</div>
                </div>
              </div>
              <div class="row">
                <div class="col mt-2">
                  <button @click="registrarPersona()" class="btn btn-success">Crear comunero</button>
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
  data() {
    return {
      documentos: [],
      nombres: "",
      apellidos: "",
      fecha_nacimiento: "",
      tipo_documento: 0,
      numero_documento: 0,
      error: [],
      flag_documento: false,
      flag_num: false,
    };
  },
  methods: {
    obtenerDocumentos() {
      let URL = "/documentos";
      axios
        .get(URL)
        .then((response) => (this.documentos = response.data.documentos))
        .catch((error) => console.log(error));
    },
    registrarPersona() {
      let URL = "personas/";
      if (this.tipo_documento === 0) {
        this.flag_documento = true;
        return;
      }
      if (this.numero_documento === 0) {
        this.flag_num = true;
        return;
      }
      axios
        .post(URL, {
          nombres: this.nombres,
          apellidos: this.apellidos,
          fecha_nacimiento: this.fecha_nacimiento,
          documento_id: this.tipo_documento,
          numero_documento: this.numero_documento,
        })
        .then((response) => {
          this.resetearFormulario();
          this.mostrarAlerta("success", "top-end", response.data);
        })
        .catch((error) => {
          console.log(error.response.data.errors);
          this.error = error.response.data.errors;
        });
    },
    resetearFormulario() {
      this.nombres = "";
      this.apellidos = "";
      (this.fecha_nacimiento = ""),
        (this.tipo_documento = 0),
        (this.numero_documento = 0);
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
    console.log("Componente Crear Persona mounted.");
    this.obtenerDocumentos();
  },
};
</script>
