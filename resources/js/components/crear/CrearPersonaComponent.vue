<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Crea una nueva persona</div>

                    <div class="card-body">
                        <div class="alert alert-danger">
                            <ul>
                                <li>alerta1</li>
                                <li>alerta2</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nombres</label>
                                    <input v-model="nombres" type="text" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Apellidos</label>
                                    <input v-model="apellidos" type="text" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Fecha de naciemiento</label>
                                    <input v-model="fecha_nacimiento" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="">Tipo de documento</label>
                                    <select class="custom-select" v-model="tipo_documento">
                                        <option value="0">Seleccione</option>
                                        <option 
                                            v-for="documento in documentos" 
                                            :key="documento.id" 
                                            :value="documento.id" 
                                            v-text="documento.name"
                                        ></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Numero de documento</label>
                                    <input v-model="numero_documento" type="number" class="form-control">
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
    export default {
        data() {
            return {
                documentos: [],
                nombres: '',
                apellidos: '',
                fecha_nacimiento: '',
                tipo_documento: 0,
                numero_documento: 0,
                error: null
            }
        },
        methods: {
            obtenerDocumentos() {
                let URL = '/documentos'
                axios.get(URL)
                    .then(response => this.documentos = response.data.documentos)
                    .catch(error => console.log(error))
            },
            registrarPersona(){
                let URL = 'personas/'
                axios.post(URL, {
                    'nombres': this.nombres,
                    'apellidos': this.apellidos,
                    'fecha_nacimiento': this.fecha_nacimiento,
                    'documento_id': this.tipo_documento,
                    'numero_documento': this.numero_documento
                })
                .then(response => this.resetearFormulario())
                .catch(error => this.error = error.response.data.errors)
            },
            resetearFormulario(){
                this.nombres = '';
                this.apellidos = '';
                this.fecha_nacimiento = '',
                this.tipo_documento = 0,
                this.numero_documento = 0
            }
        },
        mounted() {
            console.log('Componente Crear Persona mounted.')
            this.obtenerDocumentos()
        }
    }
</script>
