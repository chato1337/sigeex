<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <div class="card-header">Comuneros</div>
          <div class="card-body">
            <h1>Listado de comuneros</h1>
            <table class="table">
              <thead>
                <th class="text-center text-uppercase">Nombres y apellidos</th>
                <th class="text-center text-uppercase">Tipo Doc.</th>
                <th class="text-center text-uppercase">Número Doc.</th>
                <th class="text-center text-uppercase">Acciones</th>
              </thead>
              <tbody>
                <tr v-for="(item, index) in items" :key="index">
                  <td class="text-center text-uppercase" v-text="item.nombres +' '+ item.apellidos"></td>
                  <td class="text-center text-uppercase" v-text="item.documento.name"></td>
                  <td class="text-center text-uppercase" v-text="item.numero_documento"></td>
                  <td class="text-center text-uppercase">
                    <!-- Button trigger modal -->
                    <button
                      type="button"
                      class="btn btn-info"
                      data-toggle="modal"
                      data-target="#staticBackdrop"
                      @click="mostrarComunero(item.id)"
                    >Ver expediente</button>

                    <button class="btn btn-danger" @click="desactivarComunero(item.id)">Desactivar</button>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- Modal -->
            <div
              class="modal fade"
              id="staticBackdrop"
              data-backdrop="static"
              tabindex="-1"
              aria-labelledby="staticBackdropLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-body">
                    <mostrar-persona :persona="persona" :id="persona.id"></mostrar-persona>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                  </div>
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
      items: [],
      persona: {},
    };
  },
  methods: {
    listarPersonas() {
      let me = this;
      var url = "/personas";
      axios
        .get(url)
        .then(function (response) {
          var respuesta = response.data.personas;
          console.log(respuesta);
          me.items = respuesta;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    mostrarComunero(id) {
      let URL = "personas/" + id;
      axios
        .get(URL)
        .then((response) => {
          this.persona = response.data.personas;
        })
        .catch((error) => console.log(error));
    },
    desactivarComunero(id) {
      let URL = "personas/" + id;
      axios
        .delete(URL)
        .then((response) => {
          this.listarPersonas();
          this.mostrarAlerta("success", "top-end", response.data);
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
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
    console.log("Component personas mounted.");
    this.listarPersonas();
  },
};
</script>
