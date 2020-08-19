<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="datos-basicos d-flex">
                                    <div class="imagen-comunero">
                                        <img src="#" alt="imagen del comunero">
                                    </div>
                                    <div class="info-comunero">
                                        <input class="form-control" type="text" value="Didier Cuetia">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                colummna2
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
