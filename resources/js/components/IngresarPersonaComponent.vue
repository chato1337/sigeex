<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuevo expediente de comunero</div>

                    <div class="card-body">
                        <div>
                            <b-form @submit="onSubmit" @reset="onReset" v-if="show">

                            <b-form-group id="input-group-1" label="Nombres:" label-for="input-1">
                                <b-form-input
                                id="input-1"
                                v-model="form.nombres"
                                required
                                placeholder="Ingresa los nombres del comunero"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="input-group-2" label="apeliidos:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.apellidos"
                                required
                                placeholder="Ingresa los apeliidos del comunero"
                                ></b-form-input>
                            </b-form-group>

                            <div>
                                <label for="example-datepicker">Fecha de nacimiento</label>
                                <b-form-datepicker id="example-datepicker" v-model="form.fecha_nacimiento" class="mb-2"></b-form-datepicker>
                            </div>

                            <b-form-group id="input-group-3" label="Food:" label-for="input-3">
                                <b-form-select
                                id="input-3"
                                v-model="form.food"
                                :options="foods"
                                required
                                ></b-form-select>
                            </b-form-group>

                            <b-form-group id="input-group-2" label="numero_documento:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                type="number"
                                v-model="form.numero_documento"
                                required
                                placeholder="Numero de documento de identificación"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="input-group-3" label="Genero:" label-for="input-3">
                                <b-form-select
                                id="input-3"
                                v-model="form.genero"
                                :options="generos"
                                required
                                ></b-form-select>
                            </b-form-group>

                            <b-form-group id="input-group-4">
                                <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                                <b-form-checkbox value="me">Check me out</b-form-checkbox>
                                <b-form-checkbox value="that">Check that out</b-form-checkbox>
                                </b-form-checkbox-group>
                            </b-form-group>

                            <b-button type="submit" variant="primary">Submit</b-button>
                            <b-button type="reset" variant="danger">Reset</b-button>
                            </b-form>
                            <b-card class="mt-3" header="Form Data Result">
                            <pre class="m-0">{{ form }}</pre>
                            </b-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          nombres: '',
          apellidos: '',
          fecha_nacimiento: '',
          food: null,
          numero_documento: 0,
          genero: null,
          checked: []
        },
        foods: [{ text: 'Select One', value: null }, 'Carrots', 'Beans', 'Tomatoes', 'Corn'],
        generos: [{ text: 'Selecciona uno', value: null }, 'Hombre', 'Mujer', 'Otro'],
        show: true
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.nombres = ''
        this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    },
    computed: {
        validation() {
          //  return this.userId.length > 4 && this.userId.length < 13
        }
    }
  }
</script>
