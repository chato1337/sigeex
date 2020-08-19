<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Comuneros
                    </div>
                    <div class="card-body">
                        <h1>Listado de comuneros</h1>
                        <table class="table">
                            <thead>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Tipo Doc.</th>
                                <th>Número Doc.</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody v-for="(item, index) in items" :key="index">
                                <tr>
                                    <td v-text="item.nombres"></td>
                                    <td v-text="item.apellidos"></td>
                                    <td v-text="item.documento_id"></td>
                                    <td v-text="item.numero_documento"></td>
                                    <td>
                                        <button class="btn btn-info" @click="mostrarComunero(item.id)">Ver</button>
                                        <button class="btn btn-danger">Desactivar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items: [],
                persona: {}
            }
        },
        methods: {
            listarPersonas(){
                let me = this;
                var url = '/personas';
                axios.get(url).then(function(response){
                    var respuesta = response.data.personas;
                    console.log(respuesta);
                    me.items = respuesta;
                })
                .catch(function(error){
                    console.log(error)
                })
            },
            mostrarComunero(id){
                let URL = 'personas/'+id;
                axios.get(URL)
                    .then(response => this.persona = response.data.comunero)
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            console.log('Component personas mounted.');
            this.listarPersonas();
        }

    }
</script>
